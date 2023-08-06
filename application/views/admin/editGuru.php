<?php
$data = json_decode(json_encode($pageInfo), True);


$message_error = $this->session->flashData('message');

$dataEdit = $data['dataEdit'];

$nomor = $dataEdit['nomor_identitas'];

$gambar = $dataEdit['gambar'] ? $dataEdit['gambar'] : 'default.png';

$dataMapel = $this->Master_model->getMapelAndKelas();

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h3"></h1> -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Data Pengguna</li>
                <li class="breadcrumb-item"><a href="<?= base_url('listTeacher') ?>">Data Guru</a></li>
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
                <form action="<?= base_url('ControllerUser/updateDataUser') ?>" method="POST" enctype="multipart/form-data">
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
                                <input type="hidden" name="type" value="guru">
                            </div>
                            <div class="col mb-2">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama lengkap anda..." value="<?= $dataEdit['nama'] ?>">
                            </div>
                            <div class="col mb-2">
                                <label for="jns_kel">Jenis Kelamin</label>
                                <select id="jns_kel" name="jns_kel" class="form-select">
                                    <option value="">- Pilih -</option>
                                    <option value="L" <?= $dataEdit['jenis_kel'] == 'L' ? "selected" : "" ?>>Laki-laki</option>
                                    <option value="P" <?= $dataEdit['jenis_kel'] == 'P' ? "selected" : "" ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="nama@gmail.com" value=" <?= $dataEdit['email'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <img src="<?= base_url('assets/img/user/') . $gambar ?>" alt="imgDef" style="width: 90%; margin: 0 5% -5px; padding: 0;" class="previewImg">
                            <input type="file" id="uploadedImage" name="gambar" class="form-control mt-3" style="width: 100%;">
                        </div>
                        <br>
                        <hr>
                        <div class="col-md-4 mb-3">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="<?= $dataEdit['tempat_lahir'] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" value="<?= date('Y-m-d', strtotime($dataEdit['tgl_lahir'])) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="no_telp">No. Telp / HP</label>
                            <input type="no_telp" id="no_telp" name="no_telp" class="form-control" placeholder="08XXXXXXXXXX" value="<?= $dataEdit['no_telp'] ?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat lengkap anda. ...." value="<?= $dataEdit['alamat'] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="agama">Agama</label>
                            <input type="text" id="agama" name="agama" class="form-control" value="<?= $dataEdit['agama'] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="mapel_id">Mata Pelajaran</label>
                            <select id="mapel_id" name="mapel_id" class="form-select">
                                <option value="">- Pilih -</option>
                                <?php foreach ($dataMapel as $mp) { ?>
                                    <option value="<?= $mp['kode'] ?>" <?= $dataEdit['mapel_id'] == $mp['kode'] ? 'selected' : '' ?>>
                                        <?= $mp['kelass'] . ' - ' . $mp['pelajaran'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-md-8 mb-3"></div>
                        <div class="col-md-4 mb-3">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success" style="float:right">Simpan Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>

<?php unset($_SESSION['message']); ?>