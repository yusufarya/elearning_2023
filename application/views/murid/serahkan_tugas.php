<?php
$data = json_decode(json_encode($pageInfo), True);

$detailP = $data['tugas_materi'];

$id_tugas = $data['tugas_id'];
$mata_pelajaran = $detailP ? $detailP['materi'] : '';

?>
<div class="container-fluid mt-5" style="min-height: 100vh;">
    <br>
    <h4 class="p-3 shadow-sm rounded"><?= $data['title'] . ' - ' . $mata_pelajaran ?></h4>
    <a href="#" onclick="history.back()" class="text-decoration-none me-2 text-info" style="font-family: monospace; float: right;">
        < Kembali ke menu tugas </a><br>
            <hr class="mx-3">

            <section class="mx-3">

                <div class="row justify-content-start">
                    <div class="col-lg-8 col-md-8">
                        <div class="card p-2" style="width: 100%;">
                            <div class="card-title p-3 shadow-sm rounded">
                                <h6><?= $detailP['materi'] ?> - Pertemuan <?= $detailP['pertemuan'] ?></h6>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('ControllerMurid/upTugas') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <input type="hidden" name="materi_id" id="materi_id" value="<?= $detailP['materi_id'] ?>">
                                            <input type="hidden" name="nomor_identitas" id="nomor_identitas" value="<?= $data['me']['nomor_identitas'] ?>">
                                            <input type="hidden" name="id_tugas" id="id_tugas" value="<?= $id_tugas ?>">
                                            <label for="uploadFile">File &nbsp; <small class="text-success">(Opsional, max : 2MB "pdf|doc|docx" )</small></label>
                                            <input type="file" id="uploadFile" name="uploadFile" class="form-control">
                                        </div>
                                        <div class="col-md-8 mb-3"></div>
                                        <div class="col-md-4 mb-3">
                                            <label>&nbsp;</label>
                                            <button type="submit" class="btn btn-success" style="float:right">Upload Tugas</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
</div>
