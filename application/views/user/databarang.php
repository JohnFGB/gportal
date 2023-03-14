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
            <li><a class="nav-link scrollto" href=<?= base_url('dashboard'); ?>>Home</a></li>
            <li><a class="nav-link scrollto" href="#topup">Topup</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#news">News</a></li>
            <li><a class="getstarted scrollto" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->

    <section></section>
    <main id="main">
      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients section-bg">
        <div class="container">
          <div class="row" data-aos="zoom-in">
            <div class="col-lg-4 col-md-4 col-4 d-flex align-items-center justify-content-center">
              <img src="<?= base_url('components'); ?>/img/clients/client-1.png" class="img-fluid" alt="" />
            </div>

            <div class="col-lg-4 col-md-4 col-4 d-flex align-items-center justify-content-center">
              <img src="<?= base_url('components'); ?>/img/clients/client-2.png" class="img-fluid" alt="" />
            </div>

            <div class="col-lg-4 col-md-4 col-4 d-flex align-items-center justify-content-center">
              <img src="<?= base_url('components'); ?>/img/clients/client-3.png" class="img-fluid" alt="" />
            </div>
          </div>
        </div>
      </section>
      <!-- End Cliens Section -->

      <!-- ======= Topup Section ======= -->
      <section id="topup" class="topup">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Top up</h2>
          </div>

          <div class="row">
              <?php foreach ($barang as $brg) : ?>
                <div class="col-lg-3 col-md-3 col-3 card text-center" style="display: flex; justify-content: center;">
                <img src="<?= base_url('img/'). $brg->gambar; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $brg->nama_barang; ?></h5>
                    <small><?= $brg->deskripsi; ?></small>
                    <span class="badge rounded-pill text-bg-success my-3">Rp. <?= number_format($brg->harga, 0,',','.'); ?></span>
                    <br>
                    <?= anchor('dashboard/addtocart/' .$brg->id, '<div class="btn btn-sm btn-primary">Bayar</div>'); ?>
                    <?= anchor('dashboard/detail/' .$brg->id, '<div class="btn btn-sm btn-success">Detail</div>'); ?>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="col-xl-3 col-md-3 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400"></div>
          </div>
        </div>
      </section>