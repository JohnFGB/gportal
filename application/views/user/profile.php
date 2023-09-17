<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto">
            <a href="index.html">
                <img src="<?= base_url('components'); ?>/img/logo-gportal.png" alt="" />
            </a>
        </h1>
        <!-- Ini Logo Gportal -->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="<?= base_url('dashboard'); ?>">Home</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('dashboard'); ?>">Topup</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('dashboard'); ?>">About</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('dashboard'); ?>">News</a></li>
                
                <div class="dropdown show">
                <a class="nav-link scrollto dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class='fas fa-user'></i></a>
                </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a href="<?= base_url('auth/profile'); ?>" class="dropdown-item" style='color: #000814;' href="#">Profile</a>
    <a href="<?= base_url('dashboard/riwayat'); ?>" class="dropdown-item" style='color: #000814;' href="#">Riwayat Belanja</a>
    <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item" style='color: #000814;' href="#">Logout</a>
  </div>
</div>
                
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>


<section>
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Profile</h2>
            </div>

            <div class="container" style='color: white;'>
    <center>
    <?php if($this->session->flashdata('success')){?>
   <div class="alert alert-success">      
    <?php echo $this->session->flashdata('success')?>
 </div>
 <?php } ?>
    <?php if($this->session->flashdata('gagal')){?>
   <div class="alert alert-danger">      
    <?php echo $this->session->flashdata('gagal')?>
 </div>
 <?php } ?>
    <div class="form-group">
        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']?>" width='100'>
    </div>
    </center>
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" class="form-control" value='<?= $user['name']; ?>' disabled>
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" value='<?= $user['email']; ?>' disabled>
    </div>
        <form action="<?= base_url(). 'auth/save'; ?>" method="post" enctype="multipart/form-data">
        <!-- <div class="form-group">
            <label for="">Password Lama</label>
            <input type="password" name="password" class="form-control">
        </div> -->
        <div class="form-group">
            <label for="">Password Baru</label>
            <input type="password" name="newpassword" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="confpassword" class="form-control">
        </div>
        <div class="d-flex justify-content-center">
            <button type='submit' class="btn btn-primary mt-3">Submit</button>
        </div>
        </form>
</div>

    </section>

    