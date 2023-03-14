<header id="topline" class="fixed-top">
    <h1></h1>
</header>
<!-- ======= End Topline ======= -->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container" data-aos="fade-up" data-aos-delay="200">
        <ol>
            <li><a href="<?= base_url('user/index'); ?>">Home</a></li>
            <li>Top Up</li>
        </ol>
        <h2>Top Up Mobile Legends</h2>
    </div>
</section>
<!-- End Breadcrumbs -->

<!-- Top Up Section -->
<div id="topup">
    <div class="container" data-aos="fade-up">
        <center>
            <img src="<?= base_url('components'); ?>/img/info/info-pubg.png"
                class=" info img-fluid w-30 justify-content-center" alt="">
        </center>
        <div class="row justify-content-center">
            <?php foreach ($pubg as $brg) : ?>
            <div class="box col-lg-3 col-md-3 card text-center d-flex justify-content-around m-2">
                <div class="card-body w-60">
                    <img src="<?= base_url('img/'). $brg->gambar; ?>" class="card-img-top" alt="...">
                    <h5><?= $brg->deskripsi; ?></h5>
                    <span class="badge rounded-pill p-4">Rp.
                        <?= number_format($brg->harga, 0,',','.'); ?></span>
                    <br>
                    <?= anchor('dashboard/detail/' .$brg->id, '<div class="btn btn-sm">Detail</div>'); ?>
                    <?= anchor('dashboard/addtocart/' .$brg->id, '<div class="add btn btn-sm ">Bayar</div>'); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- End Top Up Section -->

<div class="row">

</div>
</section>