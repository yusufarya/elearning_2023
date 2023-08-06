<?php
$data = json_decode(json_encode($pageInfo), True);

$SQRY = "SELECT MAX(nomor_identitas) AS identitas FROM users WHERE role_id = '3' ";
$getLastNo = $this->db->query($SQRY)->row_array();
if ($getLastNo['identitas'] == '') {
    $nomor = 'IDS' . date('ymd') . '0001';
} else {
    $nomor = $getLastNo['identitas'];
    $nomor = substr($nomor, -4) + 1;
    $nomor = 'IDS' . date('ymd') . sprintf('%04d', $nomor);
}

$message_error = $this->session->flashData('message');

$dataKelas = $data['kelas'];

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h3"></h1> -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pengguna</li>
                <li class="breadcrumb-item"><a href="<?= base_url('listTeacher') ?>">Data Murid</a></li>
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
                <form action="<?= base_url('ControllerUser/insertDataUser') ?>" method="POST" enctype="multipart/form-data" >
                    <div class="row m-2">
                        <?php if ($message_error) : ?>
                            <span class="alert alert-danger" id="flashData">
                                <?= $message_error ?>
                            </span>
                        <?php endif; ?>
                        <div class="col-md-8">
                            <div class="col mb-2">
                                <label for="nomor">No. Identitas</label>
                                <input type="text" id="nomor" name="nomor" class="form-control" value="<?= $nomor ?>" readonly>
                                <input type="hidden" name="type" value="murid">
                            </div>
                            <div class="col mb-2">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama lengkap anda..." required>
                            </div>
                            <div class="col mb-2">
                                <label for="jns_kel">Jenis Kelamin</label>
                                <select id="jns_kel" name="jns_kel" class="form-select">
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="nama@gmail.com" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <img src="<?= base_url('assets/img/user/default.png') ?>" alt="imgDef" style="width: 90%; margin: 0 5% -5px; padding: 0;" class="previewImg">
                            <input type="file" id="uploadedImage" name="gambar" class="form-control mt-3" style="width: 100%;">
                        </div>
                        <br>
                        <hr>
                        <div class="col-md-4 mb-3">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="no_telp">No. Telp / HP</label>
                            <input type="no_telp" id="no_telp" name="no_telp" class="form-control" placeholder="08XXXXXXXXXX">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat lengkap anda. ....">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="agama">Agama</label>
                            <input type="text" id="agama" name="agama" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="kelas_id">Kelas</label>
                            <select id="kelas_id" name="kelas_id" class="form-select">
                                <option value="">- Pilih Kelas -</option>
                                <?php foreach ($dataKelas as $kls) { ?>
                                    <option value="<?= $kls['id'] ?>"><?= $kls['kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="col-md-8 mb-3"></div>
                        <div class="col-md-4 mb-3">
                            <label>&nbsp;</label> 
                            <button type="submit" class="btn btn-success mx-3" style="float:right">Simpan Data</button> &nbsp; 
                            <a href="<?= base_url('listStudent') ?>" class="btn btn-dark" style="float:right">Batal </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>

<?php unset($_SESSION['message']); ?>