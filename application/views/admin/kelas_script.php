<script>
    function deleteKelas(nomor) {
        $('#modalDelete').modal('show')
        $('h5.modal-title').text('Hapus Data ?')
        $('.modal-body p').html('Anda yakin ingin menghapus data ' + '<b>' + nomor + '</b> ?')

        $('#modalDelete #idKls').val(nomor)
    }
</script>