<div style="background-image: url('<?= base_url('assets/img/bg-grey.JPG') ?>'); width: 100%; min-height: 80vh;">
    <hr><br>
    <main class="form-signin m-auto mt-5" style="width: 40%; ">
        <form action="<?= base_url('LoginMurid') ?>" method="POST">
            <!-- <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h1 class="h3 mb-3 fw-normal">Please Log In</h1>
            <div id="flashData">
                <?= $this->session->flashData('message') ?>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="form-floating">
                <select name="semester" id="semesster" class="form-select">
                    <option value="01">GANJIL</option>
                    <option value="02">GENAP</option>
                </select>
                <label for="semester">Semester</label>
            </div>

            <div class="form-check text-start my-1">
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        </form>
    </main>
</div>
<br>