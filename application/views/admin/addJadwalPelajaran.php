<?php
$data = json_decode(json_encode($pageInfo), True);

$dataMapel = $this->Master_model->getMapelAndKelas();

$warning = $this->session->flashData('warning');

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h3"></h1> -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pengguna</li>
                <li class="breadcrumb-item"><a href="<?= base_url('scheduleOfSubjects') ?>">Jadwal Pelajaran</a></li>
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
                <form action="<?= base_url('MaterialAndTask/insertSchedule') ?>" method="POST">
                    <div class="row m-2">

                        <div class="col-md-4 mb-2">
                            <label for="hari">Jadwal</label>
                            <select id="hari" name="hari" class="form-select">
                                <option value="">- Pilih Hari - </option>
                                <?php for ($i = 1; $i < 7; $i++) { ?>
                                    <option value="<?= getNamaHari($i) ?>"><?= getNamaHari($i) ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-8 mb-2">
                            <label for="pelajaran">Pelajaran</label>
                            <select id="kode_pelajaran" name="kode_pelajaran" class="form-select">
                                <option value="">- Pilih -</option>
                                <?php foreach ($dataMapel as $kls) { ?>
                                    <option value="<?= $kls['kode'] ?>">
                                        <?= $kls['kelass'] . ' - ' . $kls['pelajaran'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-4 mb-2">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="text" maxlength="5" id="jam_mulai" name="jam_mulai" class="form-control" placeholder="00:00" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="text" maxlength="5" id="jam_selesai" name="jam_selesai" class="form-control" placeholder="00:00" required>
                        </div>
                        <div class="col-md-8 mb-3"></div>
                        <div class="col-md-4 mb-3">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success" style="float:right">Simpan Data</button>
                            <a href="<?= base_url('scheduleOfSubjects') ?>" class="btn btn-dark  mx-3" style="float:right">Batal</a>
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