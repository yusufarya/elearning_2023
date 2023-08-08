<?php
$data = json_decode(json_encode($pageInfo), True);

$me = $data['me']; 
?>

<div class="container-fluid mt-5" style="min-height: 100vh;">
    <br>
    <h4 class="p-3 text-center shadow-sm rounded"><?= $data['title'] ?></h4>
    <hr class="mx-3">

    <div class="row justify-content-center mx-5">
        <div class="col-md-7">

            <table class="table table-sm table-striped">
                <tr>
                    <th style="width: 30%;"> &nbsp;Nama Lengkap</th>
                    <td>: &nbsp;<?= $me['nama'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;"> &nbsp;Jenis Kelamin</th>
                    <td>: &nbsp;<?= $me['jenis_kel'] == 'L' ? "Laki-laki" : "Perempuan" ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;"> &nbsp;Kelas</th>
                    <td>: &nbsp;<?= $me['kelass'] ?></td>
                </tr>
                </tr>
                <tr>
                    <th style="width: 30%;"> &nbsp;Tempat Lahir</th>
                    <td>: &nbsp;<?= $me['tempat_lahir'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;"> &nbsp;Tanggal Lahir</th>
                    <td>: &nbsp;<?= $me['tgl_lahir'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;"> &nbsp;Tempat Lahir</th>
                    <td>: &nbsp;<?= $me['tempat_lahir'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;"> &nbsp;ALamat Lengkap</th>
                    <td>: &nbsp;<?= $me['alamat'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;"> &nbsp;No. Telp</th>
                    <td>: &nbsp;<?= $me['no_telp'] ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;"> &nbsp;Email</th>
                    <td>: &nbsp;<?= $me['email'] ?></td>
                </tr>
            </table>

        </div>

        <div class="col-md-4">
            <?php if($me['gambar'] == '') { ?>
                <img src="<?= base_url('assets/img/user/default.jpg') ?>" alt="profile" style="width: 350px; margin: -15px auto 10px">
            <?php } else { ?>
                    <img src="<?= base_url('assets/img/user/').$me['gambar'] ?>" alt="profile" style="width: 350px; margin: 5px auto">
            <?php } ?>
        </div>
    </div> 
</div>