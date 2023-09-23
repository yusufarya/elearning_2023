<?php
$data = json_decode(json_encode($pageInfo), True);

$me = $data['me'];

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3"><?= $data['title'] ?></h1>
  </div>

  <div class="container-fluid ">
    <div class="row mt-5">
      <div class="col-md-4">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title"> <?= $me['nomor_identitas'] ?> </h5>
            <table class="table">
              <tr>
                <th>Nama</th>
                <td><?= $me['nama'] ?> </td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td><?= $me['jenis_kel'] == "L" ? "Laki-laki" : "Perempuan" ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?= $me['email'] ?> </td>
              </tr>
              <tr>
                <th>Role</th>
                <td><?= $me['rolename'] ?> </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title ms-2"> Jumlah Murid </h5>
            <table class="table">
              <tr>
                <th>Kelas 10</th>
                <td><?= $data['jumlah_kelas10']; ?> </td>
              </tr>
              <tr>
                <th>Kelas 11</th>
                <td><?= $data['jumlah_kelas11']; ?> </td>
              </tr>
              <tr>
                <th>Kelas 12</th>
                <td><?= $data['jumlah_kelas12']; ?> </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title ms-2"> Jumlah Guru </h5>
            <table class="table">
              <tr>
                <th>Total Jumlah guru</th>
                <td><?= $data['jumlah_guru']; ?> </td>
              </tr>
              <tr>
                <th>Laki-laki</th>
                <td><?= $data['jumlah_gurulk']; ?> </td>
              </tr>
              <tr>
                <th>Perempuan</th>
                <td><?= $data['jumlah_gurupr']; ?> </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

</main>