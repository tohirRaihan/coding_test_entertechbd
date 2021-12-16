<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="<?= url_for('assets/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Sweet alert 2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- File specific Scripts -->
<?php
if (isset($scripts)) {
    load_scripts(url_for('assets/js/'), $scripts);
}
?>
</body>

</html>
