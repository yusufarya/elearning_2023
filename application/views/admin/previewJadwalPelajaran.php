<?php
$data = json_decode(json_encode($pageInfo), True);
$datakelas = $this->db->get('kelas')->result_array();
$filterKelas = $data['filterKelas'];
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
        <div class="col-md-9">
            <h2><?= $data['title'] ?></h2>
        </div>
        <div class="col-md-3 d-flex flex-row-reverse">
            <div class="btn-toolbar mb-2 ">
                <form action="<?= base_url('previewSchedule') ?>" method="post">
                    <select id="filter_kelas" name="kelas" class="form-select">
                        <option value="">- Pilih kelas - </option>
                        <!-- <option value="">Semua</option> -->
                        <?php foreach ($datakelas as $kls) { ?>
                            <option value="<?= $kls['id'] ?>" <?= $filterKelas == $kls['id'] ? "selected" : "" ?>>
                                <?= $kls['kelas'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <button id="submit" style="display: none;"> sadasd</button>
                </form>
                <a href="<?= base_url('scheduleOfSubjects') ?>" class="btn btn-secondary float-end ms-3">Kembali</a>
            </div>
        </div>
    </div>

    <div class="small">
        <div class="row mt-3">

            <?php
            if ($filterKelas) {
                for ($i = 1; $i <= 6; $i++) { ?>
                    <div class="col-md-4 my-2">
                        <div class="card">
                            <div class="card-header">
                                <h6>
                                    <?= getNamaHari($i) ?>
                                </h6>
                            </div>
                            <div class="card-body">
                                <?php foreach ($data['dataJadwal'] as $row) {
                                    if (getNamaHari($i) == $row['hari']) {
                                ?>
                                        <div class="row justify-content-beetwen">
                                            <p class="col-md-6"> ⚫ <?= $row['mapel'] ?></p>
                                            <p class="col"> <?= substr($row['jam_mulai'], 0, 5) ?></p>
                                            <p class="col"> <?= substr($row['jam_selesai'], 0, 5) ?></p>
                                        </div>
                                <?php
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>

                <?php }
            } else {
                ?>
                <span class="alert alert-warning text-center">
                    Pilih kelas terlebih dahulu
                </span>

            <?php

            } ?>
        </div>
    </div>
</main>