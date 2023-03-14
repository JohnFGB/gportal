<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <?= $this->session->flashdata('failed'); ?>
                                <?= $this->session->flashdata('success'); ?>
                                <img src="<?= base_url('components/'); ?>img/apple-touch-icon.png" alt="">
                                <div class="text-center">
                                    <h1 class="h4 mb4">Login</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            value="<?= set_value('email'); ?>" id="email" placeholder="Email"
                                            name="email">
                                        <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            placeholder="Password" name="password">
                                        <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    </center>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Daftar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>