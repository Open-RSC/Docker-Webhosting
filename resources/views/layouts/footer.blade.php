<script src="{{ mix('js/app.js') }}"></script>
<script>
    $(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>
