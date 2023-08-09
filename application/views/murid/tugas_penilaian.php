<?php
$data = json_decode(json_encode($pageInfo), True);

?>

<div class="container-fluid mt-5" style="min-height: 100vh;">
    <br>
    <h4 class="p-3 shadow-sm rounded text-center"><?= $data['title'] ?></h4>
    <hr class="mx-3">

    <div class="row mt-3 mx-4">
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
                    <td><?= $row['pelajaran'] ?></td>
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