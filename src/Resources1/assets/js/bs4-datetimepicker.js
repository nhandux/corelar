(function ($) {
    $(window).load(function () {

        if (typeof $.fn.datetimepicker != 'undefined') {
            if ($('#start_date').val() != 0 && $('#end_date').val() != 0) {
                $('#start_date').datetimepicker({
                    format: "YYYY-MM-DD",
                    maxDate: moment($('#end_date').val(), "YYYY-MM-DD"),
                    useCurrent: false
                });
                $('#end_date').datetimepicker({
                    format: "YYYY-MM-DD",
                    minDate: moment($('#start_date').val(), "YYYY-MM-DD"),
                    useCurrent: false
                });
            } else if ($('#start_date').val() != 0 && $('#end_date').val() == 0) {
                $('#start_date').datetimepicker({
                    format: "YYYY-MM-DD",
                    useCurrent: false
                });
                $('#end_date').datetimepicker({
                    format: "YYYY-MM-DD",
                    minDate: moment($('#start_date').val(), "YYYY-MM-DD"),
                    useCurrent: false
                });
            } else if ($('#start_date').val() == 0 && $('#end_date').val() != 0) {
                $('#start_date').datetimepicker({
                    format: "YYYY-MM-DD",
                    maxDate: moment($('#end_date').val(), "YYYY-MM-DD"),
                    useCurrent: false
                });
                $('#end_date').datetimepicker({
                    format: "YYYY-MM-DD",
                    useCurrent: false
                });
            } else {
                $('#start_date').datetimepicker({
                    format: "YYYY-MM-DD",
                    useCurrent: false
                });
                $('#end_date').datetimepicker({
                    format: "YYYY-MM-DD",
                    useCurrent: false
                });
            }

            $("#start_date").on("dp.change", function (e) {
                $('#end_date').data("DateTimePicker").minDate(e.date);
            });
            $("#end_date").on("dp.change", function (e) {
                $('#start_date').data("DateTimePicker").maxDate(e.date);
            });
            $('#start_date').keydown(function (e) {
                if (e.keyCode == 13) {
                    $('#formSearch').submit();
                }
            })

            $('#end_date').keydown(function (e) {
                if (e.keyCode == 13) {
                    $('#formSearch').submit();
                }
            })
        }
    });
})(jQuery);