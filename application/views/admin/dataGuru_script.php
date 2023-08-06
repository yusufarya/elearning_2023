<script>
    function deleteTeacher(nomor) {
        $('#modalDelete').modal('show')
        $('h5.modal-title').text('Hapus Data ?')
        $('.modal-body p').html('Anda yakin ingin menghapus data nomor ' + '<b>' + nomor + '</b> ?')

        $('#modalDelete #nomor').val(nomor)
    }
</script>