<?php
$this->db->select('users.*, role.role AS rolename');
$this->db->from('users');
$this->db->join('role', 'role.id = users.role_id');
$this->db->where('users.email', $this->session->userdata('email'));
$this->db->where('users.role_id', '3');
$cekLogin = $this->db->get()->row_array();

$current_uri = $this->uri->segment(1);

?>
<!-- Topbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> 
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 24px;">Elearning</a> |
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
            
                <?php if ($current_uri != "login") { ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_uri == 'home' ? 'text-dark' : '' ?>" href="<?= base_url('home') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_uri == 'jadwal_pelajaran' ? 'text-dark' : '' ?>" href="<?= base_url('jadwal_pelajaran') ?>">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_uri == 'penilaian_tugas' ? 'text-dark' : '' ?>" href="<?= base_url('penilaian_tugas') ?>">Tugas & Penilaian</a>
                    </li>
                <?php } ?>
            </ul>
            <div class="d-flex">
                <?php if ($current_uri === "login") { ?>
                <?php } else { ?>
                    <?php if ($cekLogin) { ?>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>
                                            Profile &nbsp;
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 20">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Logout</a></li>
                                    </ul>
                                </li>
                            </ul> &nbsp;&nbsp;&nbsp;
                    <?php } else { ?>
                            <a href="<?= base_url('login'); ?>" class="btn btn-outline-success" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                                Masuk &nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
 
            </div>
        </div>
</nav>
<!-- End Topbar -->