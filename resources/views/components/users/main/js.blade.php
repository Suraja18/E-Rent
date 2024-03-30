<script src="../JS/jquery.min.js" type="text/javascript"></script>
<script src="../JS/chartjs.min.js" type="text/javascript"></script>
<script src="../JS/wow.min.js" type="text/javascript"></script>
{{ $slot }}
<script src="../JS/index.js" type="text/javascript"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new WOW().init();
    });
</script>
