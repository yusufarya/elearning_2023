<!-- <script> -->
<script>
    const message_error = <?= json_encode($message_error) ?>;
    if (message_error != null) {
        setTimeout(() => {
            $('#flashData').fadeOut("slow");
        }, 2000);
    }

    $('#uploadedImage').change(function(){
        
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.previewImg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('.previewImg').attr('src', 'assets/img/user/default.png');
        }
    });
</script>