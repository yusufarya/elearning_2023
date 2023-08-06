<script>
    function deleteTask(id) {
        $('#modalDelete').modal('show')
        $('h5.modal-title').text('Hapus Data ?')
        $('.modal-body p').html('Anda yakin ingin menghapus data ' + '<b>' + id + '</b> ?')

        $('#modalDelete #id').val(id)
    }
</script>
<script>
    $('#filter_kelas').on('change', function() {
        $('button#submit').click()
    })
</script>