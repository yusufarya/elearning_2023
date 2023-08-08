<script>
    $(function() {
        const pembahasan = <?= json_encode($materi['pembahasan']) ?>;
        const thisValue = $("#kelas").val()
        getPelajaran(thisValue)

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

        $('#pembahasan').val(pembahasan)
    })

    function getPelajaran(thisValue) {
        const val_pelajaran = <?= json_encode($materi['kode_pelajaran']) ?>;
        $('select#kode_pelajaran').empty()
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "<?= base_url('MaterialAndTask/getSubjectByClass') ?>",
            data: {
                kelas: thisValue
            },
            success: (result) => {
                console.log(result)
                var row = '<option value="">- Pilih -</option>';
                for (let index = 0; index < result.length; index++) {
                    const kode = result[index]['kode'];
                    const kelas = result[index]['kelass'];
                    const pelajaran = result[index]['pelajaran'];

                    const selected = val_pelajaran == kode ? 'selected' : ''

                    row += `<option value="` + kode + `" ` + selected + `>` + kelas + ` - ` + pelajaran + `</option>`
                }

                $('select#kode_pelajaran').append(row)
            }
        })
    }
</script>