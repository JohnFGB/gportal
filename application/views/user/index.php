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
                <li><a class="nav-link scrollto" href="#hero">Home</a></li>
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

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>Portal Topup Game Online Ternama</h1>
                <h6>Buat game kamu lebih memukau dan dengan Topup diportal kami</h6>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= base_url('components'); ?>/img/hero-img.png" class="img-fluid animated" alt="" />
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

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
                <div class="col-xl-3 col-md-3 d-flex align-items-center justify-content-center" data-aos="zoom-in"
                    data-aos-delay="100">
                    <a href="<?= base_url('kategori/mobilelegend'); ?>" class="details-link" title="Top up">
                        <img src="<?= base_url('components'); ?>/img/cart/cart-ml.png" class="img-fluid" alt="" />
                    </a>
                </div>

                <div class="col-xl-3 col-md-3 d-flex align-items-center justify-content-center mt-4 mt-md-0"
                    data-aos="zoom-in" data-aos-delay="200">
                    <a href="<?= base_url('kategori/pubg'); ?>" class="details-link" title="Top up">
                        <img src="<?= base_url('components'); ?>/img/cart/cart-pubg.png" class="img-fluid" alt="" />
                    </a>
                </div>

                <div class="col-xl-3 col-md-3 d-flex align-items-center justify-content-center mt-4 mt-xl-0"
                    data-aos="zoom-in" data-aos-delay="300">
                    <a href="<?= base_url('kategori/freefire'); ?>" class="details-link" title="Top up">
                        <img src="<?= base_url('components'); ?>/img/cart/cart-ff.png" class="img-fluid" alt="" />
                    </a>
                </div>

                <div class="col-xl-3 col-md-3 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                    data-aos-delay="400"></div>
            </div>
        </div>
    </section>
    <!-- End Top Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="col-lg-3 col-md-12 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url('components'); ?>/img/gport-about.png" class="img-fluid" alt="" />
                </div>
                <div class="col-lg-9 text-center text-lg-start">
                    <h3>About Us</h3>
                    <p>
                        Gportal adalah portal game online terpercaya dan terbaik di Indonesia. Kami menyediakan layanan
                        Top up game seperti Diamond, UC, dll. Untuk mempermudah pembayaran anda dapat melakukan
                        pembayaran melalui Dompet Digital dan Bank. Selain itu anda juga dapat melihat berita serta
                        update seputar Gportal maupun game yang sedang populer dan terbaru.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End about Section -->

    <!-- ======= News Section ======= -->
    <section id="news" class="news">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>News and Updates</h2>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-8 d-flex align-items-center justify-content-center" data-aos="zoom-in"
                    data-aos-delay="100">
                    <a href="<?= base_url('user/news1'); ?>" class="details-link" title="News">
                        <img src="<?= base_url('components'); ?>/img/news/news-1.png" class="img-fluid" alt="" />
                    </a>
                </div>

                <div class="col-xl-4 col-md-8 d-flex align-items-center justify-content-center mt-4 mt-md-0"
                    data-aos="zoom-in" data-aos-delay="200">
                    <a href="<?= base_url('user/news2'); ?>" class="details-link" title="Top up">
                        <img src="<?= base_url('components'); ?>/img/news/news-2.png" class="img-fluid" alt="" />
                    </a>
                </div>

                <div class="col-xl-4 col-md-8 d-flex align-items-center justify-content-center mt-4 mt-xl-0"
                    data-aos="zoom-in" data-aos-delay="300">
                    <img src="" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End News Section -->