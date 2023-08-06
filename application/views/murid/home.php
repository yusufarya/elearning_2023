<!-- Content -->
<style>
    .home-banner {
        /* The image used */
        background-image: url("<?= base_url('assets/img/bg-school.JPG') ?>");

        /* Set a specific height */
        min-height: 400px;

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
$this->db->select("jp.*, mp.pelajaran AS mapel, kls.kelas AS kelass");
$this->db->from("jadwal_pelajaran jp");
$this->db->join("mata_pelajaran AS mp", "mp.kode = jp.kode_pelajaran");
$this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
// $this->db->where('jp.hari', getCurrentDay(date('l')));
$this->db->where('jp.hari', 'Senin');
$this->db->where('semester', '01');
$this->db->order_by('jp.id');
$dataJadwal = $this->db->get()->result_array();

?>

<div class="container-fluid" style="height: 150vh;">
    <section>
        <div class="home-banner" style="width: 100%;"></div>
        <div class="nav-home">
            <h6 class="pt-2 mx-3"><?= getCurrentDay(date('l')); ?></h6>
        </div>
    </section>
    <section>
        <br>
        <hr>
        <?php if (!$cekLogin) { ?>
            <div class="alert alert-danger text-center" style="width: 50%; margin: 10px auto;">Anda Belum login, <a href="<?= base_url('login') ?>"> Login disini</a></div>
        <?php } else { ?>
            <div class="mx-5 px-2 mt-2">
                <h5>Jadwal Hari Ini</h5>
                <table class="table table-responsive">
                    <tr>
                        <th>No.</th>
                        <th>Pelajaran</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th class="text-center">Aksi</th>
                    </tr>

                    <?php foreach ($dataJadwal as $row) { ?>
                        <tr>
                            <td>1</td>
                            <td><?= $row['mapel'] ?></td>
                            <td><?= substr($row['jam_mulai'], 0, 5) ?></td>
                            <td><?= substr($row['jam_selesai'], 0, 5) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('detailJadwal'); ?>">
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