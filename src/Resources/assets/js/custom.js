(function($) {
    $(window).load(function() {
        $('.changeLanguage').on('change', function() {
            let _t = $(this).val();
            window.location.href = "/admin/language/" + _t;
        });

        $("#page").on("change", function(e) {
            var formData = $('#formSearch').serialize();
            var url = window.location.pathname;
            var pageSize = $(this).val();
            window.location.href = url + '?pageSize=' + pageSize + '&' + formData;
        });

        $('#formSearch').on('submit', function() {
            var formData = $('#formSearch').serialize();
            console.log(formData);
            var url = window.location.pathname;
            var pageSize = $("#page").val();
            window.location.href = url + '?pageSize=' + pageSize + '&' + formData;

            return false;
        })

        setTimeout(function() {
            $("div.alert").slideUp();
        }, 10000);
    });
})(jQuery);