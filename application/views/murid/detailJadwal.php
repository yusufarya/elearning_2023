<?php
$data = json_decode(json_encode($pageInfo), True);

$detailMapel = $data['getDetailMapel'];

$mata_pelajaran = $detailMapel ? $detailMapel[0]['pelajaran'] : '';

?>
<div class="container-fluid mt-5" style="min-height: 100vh;">
    <br> 
    <h4 class="p-3 shadow-sm rounded"><?= $data['title'] .' - '. $mata_pelajaran ?></h4>
    <a href="<?= base_url('home') ?>" class="text-decoration-none me-2 text-info" style="font-family: monospace; float: right;">< Kembali ke halaman awal</a><br>
    <hr class="mx-3">

    <section class="mx-3">
        <?php foreach ($detailMapel as $mapel) { ?>
            <div class="row justify-content-start">
                <div class="col-lg-8 col-md-8">
                    <div class="card p-2" style="width: 100%;">
                        <div class="card-title p-3 shadow-sm rounded">
                            <h6><?= $mapel['judul'] ?> - Pertemuan <?= $mapel['pertemuan'] ?></h6>
                        </div>
                        <div class="card-body">
                            <?= substr($mapel['pembahasan'], 0, 169) ?>...
                        </div>
                        <div class="row justify-content-around">
                            <div class="col">
                                <small class="mx-3"><i>Updated : <?= $mapel['tanggal'] ?></i></small>
                            </div>
                            <div class="col me-2 text-end">
                                <a href="<?= base_url('detailPembahasan/').$mapel['id'] ?>" class="btn btn-sm btn-outline-info" style="font-size: 15px; "> 
                                Selengkapnya..
                                </a> - 
                                <a href="<?= base_url('daftar_tugas/').$mapel['id'] ?>" class="btn btn-sm btn-outline-danger" style="font-size: 15px;"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-font" viewBox="0 0.5 16 16">
                                    <path d="M10.943 6H5.057L5 8h.5c.18-1.096.356-1.192 1.694-1.235l.293-.01v5.09c0 .47-.1.582-.898.655v.5H9.41v-.5c-.803-.073-.903-.184-.903-.654V6.755l.298.01c1.338.043 1.514.14 1.694 1.235h.5l-.057-2z"/>
                                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                    </svg>
                                    Lihat Tugas
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?> 
    </section>
</div>