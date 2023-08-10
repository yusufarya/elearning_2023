<?php
$data = json_decode(json_encode($pageInfo), True);
$me = $data['me'];

$kelas_id = $me['kelas_id'];

$listMataPelajaran = $this->db->get_where('mata_pelajaran', ['kelas_id'=>$kelas_id])->result_array();

?>

<div class="container-fluid mt-5" style="min-height: 100vh;">
    <br>
    <h4 class="p-3 shadow-sm rounded text-center"><?= $data['title'] ?></h4>
    <hr class="mx-3">

    <div class="row mt-3 mx-4">
        <div class="col-md-4 mb-4">
            <form action="<?= base_url('penilaian_tugas') ?>" method="POST">
                <select name="mapel" id="mapel" class="form-select">
                    <option value="">Pilih Mata Pelajaran</option>
                    <?php foreach($listMataPelajaran as $mapel): ?>
                        <option value="<?= $mapel['kode'] ?>" <?= $mapel['kode'] == $data['filter_mapel'] ? 'selected' : '' ?>><?= $mapel['kode']." - ".ucwords($mapel['pelajaran']) ?></option>
                    <?php endforeach; ?>
                </select>
                <button id="submit" hidden></button>
            </form>
        </div>

        <div class="col-md-12">
            <table class="table table-bordered table-sm">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Mata Pelajaran</th>
                    <th>Kelas</th>
                    <th>Materi</th>
                    <th>File Tugas</th>
                    <th>Nilai</th>
                    <th>Tanggal Upload</th>
                </tr>
                <?php
                $no = 1;
                foreach ($data['penilaian_tugas'] as $row) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= ucwords($row['pelajaran']) ?></td>
                        <td><?= $row['kelass'] ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['file'] ?></td>
                        <td><?= $row['nilai'] > 0 ? $row['nilai'] : '<span class="text-danger">Belum dinilai</span>' ?></td>
                        <td><?= date('d-m-Y', strtotime($row['tgl_update'])) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

</div>