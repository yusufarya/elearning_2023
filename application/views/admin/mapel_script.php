<script>
    function deleteMapel(kode) {
        $('#modalDelete').modal('show')
        $('h5.modal-title').text('Hapus Data ?')
        $('.modal-body p').html('Anda yakin ingin menghapus data ' + '<b>' + kode + '</b> ?')

        $('#modalDelete #kode').val(kode)
    }

    $('#filter_kelas').on('change', function() {
        $('button#submit').click()
    })
</script>