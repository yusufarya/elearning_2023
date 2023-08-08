<div class="b-example-divider"></div>

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">&copy; Elearning <?= date('Y') ?> Company, Inc</span>
        </div>
        <!-- 
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#twitter" />
                        </svg></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram" />
                        </svg></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#facebook" />
                        </svg></a></li>
            </ul> -->
    </footer>
</div>


<!-- modalLogoout -->

<div class="modal fade" id="modalLogoout" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header my-0 py-2 bg-info text-white">
        <h5 class="modal-title my-0">Anda yakin ingin logout ?</h5> 
      </div>
      <!-- <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div> -->
      <div class="modal-footer">
        <form action="<?= base_url('logout_m') ?>" method="post">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-info">&nbsp;Ya&nbsp;</button>
        </form>
      </div>
    </div>
  </div>
</div>
