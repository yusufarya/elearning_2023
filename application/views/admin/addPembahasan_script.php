<script>
    $(function() {
        const mapel_id = <?= json_encode($me['mapel_id']) ?>;
        $('#kelas').on('change', () => {
            const thisValue = $("#kelas").val()

            $('select#kode_pelajaran').empty()
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url('MaterialAndTask/getSubjectByClass') ?>",
                data: {
                    kelas: thisValue
                },
                success: (result) => {

                    var row = '<option value="">- Pilih -</option>';
                    for (let index = 0; index < result.length; index++) {
                        const id = result[index]['kode'];
                        const kelas = result[index]['kelass'];
                        const pelajaran = result[index]['pelajaran'];

                        row += `<option value="` + id + `">` + kelas + ` - ` + pelajaran + `</option>`
                    }

                    $('select#kode_pelajaran').append(row)
                    $('select#kode_pelajaran').val(mapel_id).change()
                }
            })
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
    })
</script>