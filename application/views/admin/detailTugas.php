<?php
$data = json_decode(json_encode($pageInfo), True); 
$me = $data['me'];
$level = $me['role_id'];

$getUri = $this->uri->segment(2);

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h3"></h1> -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Materi Dan Tugas</li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data['title'] ?></li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4><?= $data['title'] ?> Siswa/i</h4>
        </div>
        <div class="col-md-6">
            <a href="<?= base_url('taskEvaluation') ?>" class="btn btn-sm btn-secondary" style="float: right;">
                < Kembali 
            </a>
        </div>
    </div>

    <?php if ($level == 1) { ?>
        <div class="container-fluid mx-0 px-0 my-4">
            <div class="text-center alert alert-danger">
                Anda masuk sebagai <b>Admin</b>, tidak memiliki akses ini
            </div>
        </div>
    <?php } else { ?>

        <div class="table-responsive small">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 4%;">Id </th>
                        <th>Nama Siswa/i</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Judul</th>
                        <th>File Tugas</th>
                        <th class="text-center">Nilai</th>
                        <th style="width:10%; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['tugas'] as $row) {
                    ?>
                        <tr>
                            <td><?= $row['id'] ?></td> 
                            <td><?= $row['murid'] ?></td>
                            <td><?= $row['mapel'] ?></td>
                            <td><?= $row['kelass'] ?></td>
                            <td><?= $row['tugas'] ?></td>
                            <td><a href="<?= base_url('assets/docfile/').substr($row['file'], 5, strlen($row['file'])) ?>">Lihat Tugas</a></td>
                            <td class="<?= $row['nilai'] ? 'text-center' : 'text-center bg-danger text-white' ?>">
                                <?= $row['nilai'] ? $row['nilai'] : 'Belum dinilai' ?>
                            </td>
                            <td style="text-align: center;">
                            <button type="button" class="btn btn-info btn-sm" onclick="Penilaian(`<?= $row['id'] ?>`, `<?= $row['murid'] ?>`)">
                                Beri nilai
                            </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <?php } ?>

</main>

<div class="modal fade" id="modal_penilaian" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('MaterialAndTask/updateNilai') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="Nilai">Nilai</label>
                        </div>
                        <div class="col-md-10">
                            <input type="hidden" name="tugasId" value="<?= $getUri ?>">
                            <input type="hidden" name="id" id="id" >
                            <input type="text" class="form-control" name="nilai" id="nilai" placeholder="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">&nbsp;Ya&nbsp;</button>
                </div>
            </form>
        </div>
    </div>
</div>