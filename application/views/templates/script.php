<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<script src="<?= base_url('assets/js/jquery-3.7.0.js') ?>"></script>

<script>
    $(function() {
        $('#logout').on('click', () => {
            $("#modalLogoout").modal('show')
        })
    })
</script>

<script>
    $('#mapel').on('change', function() {
        $('button#submit').click()
    })
</script>