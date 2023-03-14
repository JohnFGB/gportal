<!-- ======= Topline ============ -->
<header id="topline" class="fixed-top">
    <h1></h1>
</header>
<!-- ======= End Topline ======= -->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container" data-aos="fade-up" data-aos-delay="200">
        <ol>
            <li><a href="<?= base_url('user/index'); ?>">Home</a></li>
            <li>Detail</li>
        </ol>
        <h2>Detail Item</h2>
    </div>
</section>
<!-- End Breadcrumbs -->

<div class="container">
    <br>
    <div class="card">
        <div class="card-body">
            <?php foreach($barang as $brg) : ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url('img/'). $brg->gambar; ?>" alt="" class="card-img-top">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td><strong><?= $brg->nama_barang; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Deskripsi Produk</td>
                            <td><strong><?= $brg->deskripsi; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Kategori Produk</td>
                            <td><strong><?= $brg->kategori; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><strong><?= $brg->stok; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>
                                <strong>
                                    Rp.<?= number_format($brg->harga,0,',','.'); ?>
                                </strong>
                            </td>
                        </tr>
                    </table>
                    <?= anchor('dashboard', '<div class="btn btn-sm btn-primary">Kembali</div>'); ?>
                    <?= anchor('dashboard/addtocart/' .$brg->id, '<div class="btn btn-sm btn-success">Beli</div>'); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>