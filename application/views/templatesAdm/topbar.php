<?php
$kodesemester = $this->session->userdata('semester');
$dataSmstr = $this->db->get_where('semester', ['kode' => $this->session->userdata('semester')])->row_array();
$semester = $dataSmstr['nama'];
?>
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="<?= base_url('dashboard') ?>">
    Elearning <?= date("Y") ?>
  </a>
  <span class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white">
    <span>SEMESTER &nbsp; : &nbsp;</span>
    <select name="semester" id="semester" style="border: none;">
      <option value="<?= $kodesemester ?>">
        <?= $semester ?>
      </option>
    </select>
  </span>

  <ul class=" navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
        <svg class="bi">
          <use xlink:href="#search" />
        </svg>
      </button>
    </li>
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="bi">
          <use xlink:href="#list" />
        </svg>
      </button>
    </li>
  </ul>

  <div id="navbarSearch" class="navbar-search w-100 collapse">
    <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  </div>
</header>