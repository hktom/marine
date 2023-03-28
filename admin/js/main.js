jQuery(document).ready(function($) {
    var dateFormat = "dd/mm/yy";
    // subtractMonth
    function subtractMonths(numOfMonths, date = new Date()) {
        date.setMonth(date.getMonth() - numOfMonths);

        return date;
    }

    function setDefaultDate() {
        if ($("#datepicker-from").val() == "") {
            $("#datepicker-from").val(
                subtractMonths(1).toLocaleDateString("fr-FR").split("T")[0]
            );
        }

        if ($("#datepicker-to").val() == "") {
            $("#datepicker-to").val(
                subtractMonths(0).toLocaleDateString("fr-FR").split("T")[0]
            );
        }
    }

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }

    (from = $("#datepicker-from")
        .datepicker({
            dateFormat: dateFormat,
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        })),
    (to = $("#datepicker-to")
        .datepicker({
            dateFormat: dateFormat,
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
        })
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));
        }));

    setDefaultDate();

});