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

    function exportToXls(data) {
        let options = {
            fileName: `${new Date().toLocaleDateString("fr-FR")}_reservations`,
        };
        let ordersFormatted = formatOrders(data);
        var tableData = [{
            sheetName: "Sheet1",
            data: ordersFormatted,
        }, ];
        console.log("options", ordersFormatted);
        Jhxlsx.export(tableData, options);
    }

    $("#btn-export").on("click", function() {
        exportToXls(reservations['reservations']);
    });

    // $("#downloadlink_simple").on("click", function() {
    //     exportToXls(orders["simple"], "simple");
    // });
});