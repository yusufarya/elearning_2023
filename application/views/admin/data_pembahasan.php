<?php
$data = json_decode(json_encode($pageInfo), True);
$datakelas = $this->db->get('kelas')->result_array();
$filterKelas = $data['filterKelas'];

$me = $data['me'];
$level = $me['role_id'];
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
            <h2><?= $data['title'] ?></h2>
        </div>
        <div class="col-md-6 d-flex flex-row-reverse">
            <div class="btn-toolbar mb-2 ">
                <form action="<?= base_url('listDiscussion') ?>" method="post">
                    <select id="filter_kelas" name="kelas" class="form-select">
                        <option value="">- Filter kelas - </option>
                        <option value="">Semua</option>
                        <?php foreach ($datakelas as $kls) { ?>
                            <option value="<?= $kls['id'] ?>" <?= $filterKelas == $kls['id'] ? "selected" : "" ?>>
                                <?= $kls['kelas'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <button id="submit" style="display: none;"> </button>
                </form>
                <a href="<?= base_url('addDiscussion') ?>" class="btn btn-info float-end ms-3"><b>+</b> Data</a>
            </div>
        </div>
    </div>

    <?php if ($level == 1) { ?>
        <div class="container-fluid mx-0 px-0 my-4">
            <div class="text-center alert alert-danger">
                Anda masuk sebagai <b>Admin</b>, tidak memiliki akses ini
            </div>
        </div>
    <?php } else if ($level == 2) { ?>

        <div class="table-responsive small">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 10%;">Pertemuan</th>
                        <th>Pelajaran</th>
                        <th>Kelas</th>
                        <th>Judul</th>
                        <th>Pembahasan</th>
                        <th style="width:13%; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['pembahasan'] as $row) {
                    ?>
                        <tr>
                            <td class="text-center">
                                <div class="badge bg-info p-2"><?= $row['pertemuan'] ?></div>
                            </td>
                            <td><?= $row['mapel'] ?></td>
                            <td><?= $row['kelass'] ?></td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= substr($row['pembahasan'], 0, 157) ?>...</td>
                            <td style="text-align: center;">
                                <a href="<?= base_url('editDiscussion/') . $row['id'] ?>" class="btn btn-sm btn-success py-0 px-1 text-decoration-none">Ubah</a> &nbsp;
                                <a href="#" onclick="deleteMateri(`<?= $row['id'] ?>`)" class="btn btn-sm btn-danger py-0 px-1 text-decoration-none">Hapus</a>
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

<div class="modal fade" id="modalDelete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <form action="<?= base_url('MaterialAndTask/deleteDiscuss') ?>" method="post">
                    <input type="hidden" id="id" name="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">&nbsp;Ya&nbsp;</button>
                </form>
            </div>
        </div>
    </div>
</div>