<script>
    const message = <?= json_encode($message) ?>;
    if (message != null) {
        setTimeout(() => {
            $('#flashData').fadeOut("slow");
        }, 2000);
    }
</script>