<?php



function get_orders($from, $to)
{
    $orders = wc_get_orders(array(
        'type' => 'shop_order',
        'status' => array('wc-completed'),
        'date_after' => $from,
        'date_before' => $to,
    ));
    return array(
        'sage' => format_orders_sage($orders),
        'simple' => format_orders_simple($orders),
        'total' => sizeof($orders),

    );
}

function reformat($date)
{
    if (!isset($date)) {
        return '';
    }

    $stringToArray = explode("/", $date);
    return $stringToArray[2] . "-" . $stringToArray[1] . "-" . $stringToArray[0];
}

function customInput($name, $type = "text")
{
    echo '<input type="' . $type . '" name="date_' . $name . '" id="datepicker-' . $name . '" class="w-100 d-block mt-1" value="' . $_POST['date_' . $name] . '" required />';
}

function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) {
        $str = '"' . str_replace('"', '""', $str) . '"';
    }
}

function get_items($items)
{
    $items_array = [];
    foreach ($items as $key => $value) {
        $_items = [];
        $_items['order_id'] = $value->get_order_id();
        $_items['name'] = $value->get_name();
        $_items['product_id'] = $value->get_product_id();
        $_items['subtotal_tax'] = $value->get_subtotal_tax();
        $_items['subtotal'] = $value->get_subtotal();
        $_items['total_tax'] = $value->get_total_tax();
        $_items['total'] = $value->get_total();
        $_items['code_compte'] = get_post_meta($value->get_product_id(), "code_compte", true);
        $_items['code_de_suivi'] = get_post_meta($value->get_product_id(), "code_de_suivi", true);

        $items_array[] = $_items;
    }

    return $items_array;
}

function set_total($order, $orderItems, $value)
{
    $total =  "";
    if ($value == "Sous-total TTC") {
        $total = $orderItems['subtotal'];
    }

    if ($value == "Sous-total HTC") {
        $total = $orderItems['subtotal'] - $orderItems['subtotal_tax'];
    }

    if ($value == "TVA") {
        $total = $orderItems['subtotal_tax'];
    }

    if ($total != "") {
        return number_format((float) $total, 2);
    }

    return "";
}

function set_array($order, $orderItems, $value)
{
    $months = array(
        0 => "janvier",
        1 => "février",
        2 => "mars",
        3 => "avril",
        4 => "mai",
        5 => "juin",
        6 => "juillet",
        7 => "août",
        8 => "septembre",
        9 => "octobre",
        10 => "novembre",
        11 => "décembre"
    );

    $month = intval($order['date_created']->date('n'));
    if (empty($order['billing']['company'])) {
        $invoiceOwnerLine = 'Facture ' . $order['billing']['first_name'] . ' du mois ' . $months[$month - 1];
    } else {
        $invoiceOwnerLine = 'Facture ' . $order['billing']['company'] . ' du mois ' . $months[$month - 1];
    }
    return array(
        COLUMNS[0] => "COTEX",
        COLUMNS[1] => "JVT",
        COLUMNS[2] => $order['date_created']->date('d/m/Y'),
        COLUMNS[3] => $value[COLUMNS[3]] == 'standard' ? $orderItems['code_compte'] : $value[COLUMNS[3]],
        COLUMNS[4] => $orderItems['order_id'],
        COLUMNS[5] => $invoiceOwnerLine,
        COLUMNS[6] => $value[COLUMNS[6]],
        COLUMNS[7] => $value[COLUMNS[7]] != "" ? set_total($order, $orderItems, $value[COLUMNS[7]]) : "",
        COLUMNS[8] => $order['usd'],
        COLUMNS[9] => "USD",
        COLUMNS[10] => $value[COLUMNS[10]],
        COLUMNS[11] => $value[COLUMNS[11]] != "standard" ? $value[COLUMNS[11]] : "CTX-" . $orderItems['code_de_suivi'],
        COLUMNS[12] => $value[COLUMNS[12]],

    );
}

function format_orders_simple($orders)
{
    $_orders_export = [];
    for ($i = 0; $i < sizeof($orders); $i++) {
        $orderItems = get_items($orders[$i]->get_items());
        for ($j = 0; $j < sizeof($orderItems); $j++) {
            $_orders_export[] = set_array($orders[$i]->data, $orderItems[$j], SIMPLE_EXPORT);
        }
    }

    return $_orders_export;
}

function format_orders_sage($orders)
{
    $_orders_export = [];
    for ($i = 0; $i < sizeof($orders); $i++) {
        $orderItems = get_items($orders[$i]->get_items());
        for ($j = 0; $j < sizeof($orderItems); $j++) {
            if ($orders[$i]->data['total_tax'] == 0) {
                $_orders_export[] = set_array($orders[$i]->data, $orderItems[$j], NO_TAX_L1);

                $_orders_export[] = set_array($orders[$i]->data, $orderItems[$j], NO_TAX_L2);
            }

            if ($orders[$i]->data['total_tax'] != 0) {
                $_orders_export[] = set_array($orders[$i]->data, $orderItems[$j], TAX_L1);
                $_orders_export[] = set_array($orders[$i]->data, $orderItems[$j], TAX_L2);
                $_orders_export[] = set_array($orders[$i]->data, $orderItems[$j], TAX_L3);
            }
        }
    }

    return $_orders_export;
}
