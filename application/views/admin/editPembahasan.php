<?php
$data = json_decode(json_encode($pageInfo), True);

$dataMapel = $this->Master_model->getMapelAndKelas();

$dataKelas = $this->db->get('kelas')->result_array();

$warning = $this->session->flashData('warning');

$materi = $data['materi'];

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h3"></h1> -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pengguna</li>
                <li class="breadcrumb-item"><a href="<?= base_url('listDiscussion') ?>">Pembahasan</a></li>
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
                <?php echo form_open_multipart('MaterialAndTask/updateDiscussion'); ?>
                <div class="row m-2">

                    <div class="col-md-2 mb-3">
                        <label for="pertemuan">Pertemuan</label>
                        <input type="text" maxlength="1" id="pertemuan" name="pertemuan" class="form-control" placeholder="0" required onkeyup="format(this)" autocomplete="off" value="<?= $materi['pertemuan'] ?>" disabled>
                        <input type="hidden" name="id" value="<?= $materi['id'] ?>">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="kelas">Kelas</label>
                        <select id="kelas" name="kelas" class="form-select" disabled>
                            <option value="">- Pilih -</option>
                            <?php foreach ($dataKelas as $kls) { ?>
                                <option value="<?= $kls['id'] ?>" <?= $materi['kelas_id'] == $kls['id'] ? "selected" : "" ?>>
                                    <?= $kls['kelas'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-7 mb-3">
                        <label for="pelajaran">Pelajaran</label>
                        <select id="kode_pelajaran" name="kode_pelajaran" class="form-select" disabled>
                            <option value="">- Pilih -</option>
                        </select>
                    </div>

                    <div class="col-md-5 mb-3" hidden>
                        <label for="tanggal">Tanggal Posting</label>
                        <input type="date" maxlength="20" id="tanggal" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="judul">Judul Pertemuan</label>
                        <input type="text" maxlength="20" id="judul" name="judul" class="form-control" placeholder="Judul ..." required value="<?= $materi['judul'] ?>">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="pembahasan">Pembahasan</label>
                        <textarea type="text" rows="5" id="pembahasan" name="pembahasan" class="form-control" placeholder="Tambahkan text... " required></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="fileName">File &nbsp; <small class="text-success">(Opsional, max : 2MB)</small></label>
                        <input type="file" id="fileName" name="fileName" class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="link">Link &nbsp; <small class="text-success">(Opsional)</small></label>
                        <input type="text" id="link" name="link" class="form-control" autocomplete="off">
                    </div>

                    <div class="col-md-8 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-success" style="float:right">Simpan Data</button>
                        <a href="<?= base_url('scheduleOfSubjects') ?>" class="btn btn-dark  mx-3" style="float:right">Batal</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <!-- </form> -->
            </div>
        </div>

    </div>
</main>

<?php
$this->session->unset_userdata('warning');
?>