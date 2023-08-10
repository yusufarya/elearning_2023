<script>

    function Penilaian(idNilai, nama) {
        $('#modal_penilaian').modal('show')
        $('#modal_penilaian .modal-title').text('Beri Penilaian Tugas '+nama)

        $('#id').val(idNilai)
    }
</script>