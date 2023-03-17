jQuery(document).ready(function($) {
    function formatOrders(data) {
        let orderFormatted = [],
            columnRow = [];

        columns_name.forEach((key) => {
            columnRow.push({ text: key });
        });

        orderFormatted.push(columnRow);

        data.forEach((item) => {
            let orderItem = [];
            columns_name.forEach((key) => {
                if (Object.hasOwnProperty.call(item, key)) {
                    orderItem.push({ text: item[key] });
                }
            });

            orderFormatted.push(orderItem);
        });

        return orderFormatted;
    }

    function exportToXls(data, type) {
        let options = {
            fileName: `${new Date().toLocaleDateString("fr-FR")}_${type}_orders`,
        };
        let ordersFormatted = formatOrders(data);
        var tableData = [{
            sheetName: "Sheet1",
            data: ordersFormatted,
        }, ];
        console.log("options", ordersFormatted);
        Jhxlsx.export(tableData, options);
    }

    $("#downloadlink_sage").on("click", function() {
        exportToXls(orders["sage"], "sage");
    });

    $("#downloadlink_simple").on("click", function() {
        exportToXls(orders["simple"], "simple");
    });
});