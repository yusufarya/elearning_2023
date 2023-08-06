<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script>

<!-- Bootbox Bootstrap -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script> -->
<script src="<?= base_url('assets/js/bootbox.min.js') ?>"></script>

<script src="<?= base_url('assets/js/jquery-3.7.0.js') ?>"></script>
<!-- <script src="<?= base_url('assets/dashboard/dashboard.js') ?>"></script> -->

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
        <svg class="bi" width="30" height="24">
          <use xlink:href="#bootstrap" />
        </svg>
      </a>
      <span class="mb-3 mb-md-0 text-body-secondary">&copy; Elearning - <?= date('Y') ?></span>
    </div>

    <!-- <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
      <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
    </ul> -->
  </footer>
</div>

<div class="modal fade" id="modal-logout" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header my-0 py-2 bg-dark text-white">
        <h5 class="modal-title my-0">Anda yakin ingin logout ?</h5> 
      </div>
      <!-- <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div> -->
      <div class="modal-footer">
        <form action="<?= base_url('logout') ?>" method="post">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-success">&nbsp;Ya&nbsp;</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $("#logoutAdmin").click( async () => {
      $('#modal-logout').modal('show')
   })
</script>