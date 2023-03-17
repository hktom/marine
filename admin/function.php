<?php

function get_reservations($from, $to)
{

    global $wpdb;
    $table_name = $wpdb->prefix . MARINE_RESERVATION_TABLE;

    $result = [];

    if ($from && $to) {
        $result = $wpdb->get_results("SELECT * FROM " . $table_name . " WHERE created_at >=  " . $from . " AND  created_at <= " . $to . " ");
    } else {
        $result = $wpdb->get_results("SELECT * FROM " . $table_name . " ORDER BY id ASC");
    }

    $data = array();

    foreach ($result as $key => $value) {

        $data[$key]['id'] = $value->id;
        $data[$key]['first_name'] = $value->first_name;
        $data[$key]['last_name'] = $value->last_name;
        $data[$key]['email'] = $value->email;
        $data[$key]['mobile'] = $value->mobile;
        $data[$key]['wellness_choice'] = $value->wellness_choice;
        $data[$key]['activity_sensory_choice'] = $value->activity_sensory_choice;
        $data[$key]['artistique_path_choice'] = $value->artistique_path_choice;
        $data[$key]['guest'] = $value->guest;
        $data[$key]['custom_number_guest'] = $value->custom_number_guest;
        $data[$key]['date_from'] = $value->date_from;
        $data[$key]['date_to'] = $value->date_to;
        $data[$key]['total'] = $value->total;
        $data[$key]['promo_code'] = $value->promo_code;
        $data[$key]['created_at'] = $value->created_at;
    }

    return array(
        'reservations' => $data,
        'total' => sizeof($data),
    );
}

function reformat($date)
{
    if ($date == '') {
        return '';
    }

    $stringToArray = explode("/", $date);
    return $stringToArray[2] . "-" . $stringToArray[1] . "-" . $stringToArray[0];
}

function customInput($name, $type = "text")
{
    $date = isset($_POST['date_' . $name]) ? $_POST['date_' . $name] : '';
    echo '<input type="' . $type . '" name="date_' . $name . '" id="datepicker-' . $name . '" class="w-100 d-block mt-1" value="' . $date . '" required />';
}

function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) {
        $str = '"' . str_replace('"', '""', $str) . '"';
    }
}

function addReservation($data)
{

    global $wpdb;
    $table_name = $wpdb->prefix . MARINE_RESERVATION_TABLE;

    $wpdb->insert(
        $table_name,
        array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'wellness_choice' => $data['wellness'],
            'activity_sensory_choice' => $data['sensory'],
            'artistique_path_choice' => $data['hasArtisticPath'],
            'guest' => $data['guest'],
            // 'custom_number_guest' => $data['custom_number_guest'],
            'date_from' => $data['from'],
            'date_to' => $data['to'],
            'promo_code' => $data['promo'],
            'total' => $data['total'],
            'message' => $data['message'],
            // 'created_at' => $data['created_at'],
        )
    );
}
