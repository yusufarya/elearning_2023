<?php
$data = json_decode(json_encode($pageInfo), True);
$me = $data['me'];

$dataMateri = $this->Master_model->getDataMateri($me['mapel_id']);

$dataKelas = $this->db->get('kelas')->result_array();

$warning = $this->session->flashData('warning');

$tugas = $data['tugas']; 

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h3"></h1> -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Materi Dan Tugas</li>
                <li class="breadcrumb-item"><a href="<?= base_url('taskEvaluation') ?>">Tugas dan Penilaian</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data['title'] ?></li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-10">
            <h2><?= $data['title'] ?></h2>
            <hr>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 shadow">
                <?php
                if ($warning) {
                ?>
                    <div class="alert alert-danger py-2 mt-3 warning">
                        <?= $warning ?>
                    </div>
                <?php
                }
                ?>

                <form action="<?= base_url('MaterialAndTask/updateTask') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row m-2">

                        <div class="col-md-2 mb-3">
                            <label for="pertemuan">Pertemuan</label>
                            <input type="text" maxlength="1" id="pertemuan" name="pertemuan" class="form-control" placeholder="0" required onkeyup="format(this)" autocomplete="off" value="<?= $tugas['pertemuan'] ?>" disabled>
                            <input type="hidden" name="id" value="<?= $tugas['id'] ?>">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="kelas">Kelas</label>
                            <select id="kelas" name="kelas" class="form-select" disabled>
                                <option value="">- Pilih -</option>
                                <?php foreach ($dataKelas as $kls) { ?>
                                    <option value="<?= $kls['id'] ?>" <?= $tugas['kelas_id'] == $kls['id'] ? "selected" : "" ?>>
                                        <?= $kls['kelas'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-7 mb-3">
                            <label for="pelajaran">Pelajaran</label>
                            <select id="materi" name="materi" class="form-select" disabled>
                                <option value="">- Pilih -</option>
                                <?php foreach ($dataMateri as $mp) { ?>
                                    <option value="<?= $mp['id'] ?>" <?= $tugas['materi_id'] == $mp['id'] ? 'selected' : '' ?>>
                                        <?= $mp['kelass'] . ' - ' . $mp['judul'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-5 mb-3" hidden>
                            <label for="tanggal">Tanggal Posting</label>
                            <input type="date" maxlength="20" id="tanggal" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="tugas">Judul Pertemuan</label>
                            <input type="text" maxlength="50" id="tugas" name="tugas" class="form-control" placeholder="Judul ..." required value="<?= $tugas['tugas'] ?>">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="deskripsi">Catatan</label>
                            <textarea type="text" rows="5" id="deskripsi" name="deskripsi" class="form-control" placeholder="Tambahkan text... " required></textarea>
                        </div>

                        <div class="col-md-5 mb-3">
                            <label for="uploadFile">File &nbsp; <small class="text-success">(Opsional, max : 2MB "pdf|doc|docx" )</small></label>
                            <input type="file" id="uploadFile" name="uploadFile" class="form-control">
                            <input type="hidden" name="oldFile" value="<?= $tugas['file'] ?>">
                        </div>
                        <div class="col-md-7 mb-3">
                            <label for="uploadFile">Doc file</label>
                            <a href="<?= base_url('assets/docfile/') . $tugas['file'] ?>" class="d-block"><?= $tugas['file'] ?></a>
                        </div>

                        <div class="col-md-8 mb-3"></div>
                        <div class="col-md-4 mb-3">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success" style="float:right">Simpan Data</button>
                            <a href="<?= base_url('taskEvaluation') ?>" class="btn btn-dark  mx-3" style="float:right">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>

<?php
$this->session->unset_userdata('warning');
?>