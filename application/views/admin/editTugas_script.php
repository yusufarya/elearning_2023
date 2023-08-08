<script>
    $(function() {
        const thisValue = $("#kelas").val() 
        const desc = <?= json_encode($tugas['deskripsi']) ?>;
        $('#kelas').on('change', () => {
            const thisValue = $("#kelas").val()
            getPelajaran(thisValue)
        })

        $('#pertemuan').on('focus', () => {
            $('#pertemuan').attr('placeholder', 'Contoh : 0')
            setTimeout(() => {
                $('#pertemuan').attr('placeholder', 'Contoh : 1')
            }, 700)
            setTimeout(() => {
                $('#pertemuan').attr('placeholder', 'Contoh : 2')
            }, 1800)
            setTimeout(() => {
                $('#pertemuan').attr('placeholder', 'Contoh : 3')
            }, 2600)
            setTimeout(() => {
                $('#pertemuan').attr('placeholder', 'Contoh : 0')
            }, 3600)
        })

        $('#deskripsi').val(desc)
    })

    function getPelajaran(thisValue) {
        const val_materi = <?= json_encode($tugas['materi_id']) ?>;
        $('select#materi').empty()
        // $.ajax({
        //     type: "POST",
        //     dataType: "JSON",
        //     url: "<?= base_url('MaterialAndTask/getSubjectByClass') ?>",
        //     data: {
        //         kelas: thisValue
        //     },
        //     success: (result) => {
        //         console.log(result)
        //         var row = '<option value="">- Pilih -</option>';
        //         for (let index = 0; index < result.length; index++) {
        //             const kode = result[index]['kode'];
        //             const kelas = result[index]['kelass'];
        //             const pelajaran = result[index]['pelajaran'];

        //             const selected = val_materi == kode ? 'selected' : ''

        //             row += `<option value="` + kode + `" ` + selected + `>` + kelas + ` - ` + pelajaran + `</option>`
        //         }

        //         $('select#kode_pelajaran').append(row)
        //     }
        // })
    }
</script>