<?php
$data = json_decode(json_encode($pageInfo), True);

$detailP = $data['detailPembahasan'];

$mata_pelajaran = $detailP ? $detailP['pelajaran'] : '';

?>
<div class="container-fluid mt-5" style="min-height: 100vh;">
    <br>
    <h4 class="p-3 shadow-sm rounded"><?= $data['title'] . ' - ' . $mata_pelajaran ?></h4>
    <a href="#" onclick="history.back()" class="text-decoration-none me-2 text-info" style="font-family: monospace; float: right;">
        < Kembali ke pembahasan</a><br>
            <hr class="mx-3">

            <section class="mx-3">

                <div class="row justify-content-start">
                    <div class="col-lg-8 col-md-8">
                        <div class="card p-2" style="width: 100%;">
                            <div class="card-title p-3 shadow-sm rounded">
                                <h6><?= $detailP['judul'] ?> - Pertemuan <?= $detailP['pertemuan'] ?></h6>
                            </div>
                            <div class="card-body">

                                <p class="text-justify">
                                    <?= $detailP['pembahasan'] ?>
                                </p>
                                <?php if ($detailP['file']) { ?>
                                    <p> File : &nbsp;
                                        <a href="<?= base_url('assets/docfile/') . $detailP['file'] ?>" class="text-info" style="font-size: 15px;"> Download Pembahasan Materi</a>
                                    </p>
                                <?php } ?>
                                <?php if ($detailP['link']) { ?>
                                    <p>Link Pembelajaran
                                        <a href="<?= $detailP['link'] ?>" class="text-primary" style="font-size: 15px;"> <?= $detailP['link'] ?> </a>
                                    </p>
                                <?php } ?>

                            </div>
                            <div class="row justify-content-around">
                                <div class="col">
                                    <small class="mx-3">
                                        <i>Posted at : <?= $detailP['tgl_dibuat'] ?> - oleh : <?= $detailP['dibuat_oleh'] ?></i>
                                    </small>
                                </div>
                                <div class="col me-2 text-end">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
</div>