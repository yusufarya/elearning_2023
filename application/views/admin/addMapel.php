<?php
$data = json_decode(json_encode($pageInfo), True);

$SQRY = "SELECT MAX(kode) AS identitas FROM mata_pelajaran ";
$getLastNo = $this->db->query($SQRY)->row_array();
if ($getLastNo['identitas'] == '') {
    $kode = '00001';
} else {
    $nomor = $getLastNo['identitas'];
    $nomor = substr($nomor, -4) + 1;
    $kode = sprintf('%05d', $nomor);
}

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h3"></h1> -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pengguna</li>
                <li class="breadcrumb-item"><a href="<?= base_url('listSubjects') ?>">Mata Pelajaran</a></li>
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
            <div class="col-md-7 shadow">
                <form action="<?= base_url('MaterialAndTask/insertMapel') ?>" method="POST">
                    <div class="row m-2 mt-4">
                        <div class="col-md-4 mb-2">
                            <label for="kode">Kode</label>
                            <input type="text" id="kode" name="kode" class="form-control" value="<?= $kode ?>" readonly>
                        </div>
                        <div class="col-md-8 mb-2">
                            <label for="pelajaran">Pelajaran</label>
                            <input type="text" id="pelajaran" name="pelajaran" class="form-control" placeholder="Mata Pelajaran..." required>
                        </div> 
                        <div class="col-md-4 mb-2">
                            <label for="kelas">Kelas</label>
                            <select id="kelas" name="kelas" class="form-select">
                                <option value="">- Pilih kelas - </option>
                                <?php foreach ($data['kelas'] as $kls) { ?>
                                    <option value="<?= $kls['id'] ?>"><?= $kls['kelas'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4"></div>

                        <div class="col-md-6 mb-3"></div>
                        <div class="col-md-6 my-3">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success" style="float:right">Simpan Data</button>
                            <a href="<?= base_url('listSubjects') ?>" class="btn btn-dark  mx-3" style="float:right">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>