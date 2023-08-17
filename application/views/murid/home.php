<!-- Content -->
<style>
    .home-banner {
        /* The image used */
        background-image: url("<?= base_url('assets/img/bg-home.JPG') ?>");

        /* Set a specific height */
        min-height: 440px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        filter: blur(1px);
        filter: grayscale(10%);
    }

    .nav-home {
        position: relative;
        z-index: 1;
        height: 150px;
        width: 70%;
        border-radius: 9px;
        margin: -40px auto 10px;
        box-shadow: 1px 2px 9px darkolivegreen;
        background-color: whitesmoke;
    }
</style>

<?php
$this->db->select('users.*, role.role AS rolename, kls.kelas as kelass');
$this->db->from('users');
$this->db->join('role', 'role.id = users.role_id');
$this->db->join("kelas AS kls", "kls.id = users.kelas_id");
$this->db->where('users.email', $this->session->userdata('email'));
$me = $this->db->get()->row_array();

$this->db->select("jp.*, mp.pelajaran AS mapel, kls.kelas AS kelass");
$this->db->from("jadwal_pelajaran jp");
$this->db->join("mata_pelajaran AS mp", "mp.kode = jp.kode_pelajaran");
$this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
$this->db->where('jp.hari', getCurrentDay(date('l')));
$this->db->where('mp.kelas_id', $me['kelas_id']);
$this->db->where('jp.semester', $this->session->userdata('semester'));
$this->db->order_by('jp.id');
$dataJadwal = $this->db->get()->result_array();
// pre($this->db->last_query());

?>

<div class="container-fluid" style="height: 150vh;">
    <section>
        <div class="home-banner" style="width: 100%;"></div>
        <div class="nav-home">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-6">
                    <h6 class="pt-3"><?= getCurrentDay(date('l')) . ', ' . date('d/m/Y'); ?></h6>
                </div>
                <div class="col-md-5 col-sm-5 mr-3">
                    <h6 style="float: right;" class="pt-3"><?= $cekLogin != '' ? 'Kelas &nbsp; ' . $me['kelass'] : '' ?></h6>
                </div>
            </div>
            <div class="row justify-content-center">
                <h4 class="alert alert-info text-center" style="width: 93%;">
                    Hallo,👋 <?= $cekLogin != '' ? $me['nama'] : ' Selamat Datang' ?>
                </h4>
            </div>
        </div>
    </section>
    <section>
        <br>
        <hr>
        <?php if (!$cekLogin) { ?>
            <div class="alert alert-danger text-center" style="width: 50%; margin: 10px auto;">Anda Belum login, <a href="<?= base_url('login') ?>"> Login disini</a></div>
        <?php } else { ?>
            <div class="px-5 mt-2" style="width: 78%; margin: 10px auto;">
                <h5>Jadwal Hari Ini</h5>
                <button style="float: right; margin-top: -30px; margin-bottom: 10px;" class="btn btn-info btn-sm" id="semua_jadwal">Semua jadwal</button>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 4%;">ID</th>
                        <th>Pelajaran</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th class="text-center">Aksi</th>
                    </tr>

                    <?php foreach ($dataJadwal as $row) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['mapel'] ?></td>
                            <td><?= substr($row['jam_mulai'], 0, 5) ?></td>
                            <td><?= substr($row['jam_selesai'], 0, 5) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('detailJadwal/') . $row['kode_pelajaran'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square-fill" viewBox="0 0 16 16">
                                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>
    </section>
</div>

<?php

$this->db->select("jp.*, mp.pelajaran AS mapel, kls.kelas AS kelass");
$this->db->from("jadwal_pelajaran jp");
$this->db->join("mata_pelajaran AS mp", "mp.kode = jp.kode_pelajaran");
$this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
$this->db->where('jp.semester', $this->session->userdata('semester'));
$this->db->where('mp.kelas_id', $me['kelas_id']);
$this->db->order_by('jp.id');
$allJadwal = $this->db->get()->result_array();
?>

<div class="modal fade" id="data_jadwal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Pelajaran</h5>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 4%;">ID</th>
                        <th>Pelajaran</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th class="text-center">Aksi</th>
                    </tr>

                    <?php foreach ($allJadwal as $row) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['mapel'] ?></td>
                            <td><?= $row['hari'] ?></td>
                            <td><?= substr($row['jam_mulai'], 0, 5) ?></td>
                            <td><?= substr($row['jam_selesai'], 0, 5) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('detailJadwal/') . $row['kode_pelajaran'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square-fill" viewBox="0 0 16 16">
                                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php unset($_SESSION['message']); ?>