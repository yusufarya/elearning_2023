<?php
$data = json_decode(json_encode($pageInfo), True);

$dataMapel = $this->Master_model->getMapelAndKelas();
$jadwalInfo = $data['dataJadwal'];
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
                <form action="<?= base_url('MaterialAndTask/updateSchedule') ?>" method="POST">
                    <div class="row m-2">
                        
                        <div class="col-md-4 mb-2">
                            <label for="hari">Jadwal</label>
                            <select id="hari" name="hari" class="form-select">
                                <option value="">- Pilih Hari - </option> 
                                <option value="<?= getNamaHari(1) ?>" <?= getNamaHari(1) == $jadwalInfo['hari'] ? 'selected' : '' ?> >
                                    <?= getNamaHari(1) ?>
                                </option> 
                                <option value="<?= getNamaHari(2) ?>" <?= getNamaHari(2) == $jadwalInfo['hari'] ? 'selected' : '' ?>>
                                    <?= getNamaHari(2) ?>
                                </option> 
                                <option value="<?= getNamaHari(3) ?>" <?= getNamaHari(3) == $jadwalInfo['hari'] ? 'selected' : '' ?>>
                                    <?= getNamaHari(3) ?>
                                </option> 
                                <option value="<?= getNamaHari(4) ?>" <?= getNamaHari(4) == $jadwalInfo['hari'] ? 'selected' : '' ?>>
                                    <?= getNamaHari(4) ?>
                                </option> 
                                <option value="<?= getNamaHari(5) ?>" <?= getNamaHari(5) == $jadwalInfo['hari'] ? 'selected' : '' ?>>
                                    <?= getNamaHari(5) ?>
                                </option> 
                                <option value="<?= getNamaHari(6) ?>" <?= getNamaHari(6) == $jadwalInfo['hari'] ? 'selected' : '' ?>>
                                    <?= getNamaHari(6) ?>
                                </option>
                            </select>
                            <input type="hidden" name="id" value="<?= $jadwalInfo['id'] ?>">
                        </div>

                        <div class="col-md-8 mb-2">
                            <label for="pelajaran">Pelajaran</label>
                            <select id="kode_pelajaran" name="kode_pelajaran" class="form-select">
                                <option value="">- Pilih -</option>
                                <?php foreach ($dataMapel as $kls) { ?>
                                    <option value="<?= $kls['kode'] ?>" <?= $kls['kode'] == $jadwalInfo['kode_pelajaran'] ? 'selected' : '' ?>>
                                        <?= $kls['kelass']. ' - ' . $kls['pelajaran'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-4 mb-2">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="text" maxlength="5" id="jam_mulai" name="jam_mulai" class="form-control" placeholder="00:00" required value="<?= $jadwalInfo['jam_mulai'] ?>">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="text" maxlength="5" id="jam_selesai" name="jam_selesai" class="form-control" placeholder="00:00" required value="<?= $jadwalInfo['jam_selesai'] ?>">
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