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
            <li>Keranjang</li>
        </ol>
        <h2>Keranjang Belanja</h2>
    </div>
</section>
<!-- End Breadcrumbs -->

<div class="container text-white">
    <div class="col-lg-12">
        <div class="cartTable">
            <table class="table table-bordered table-stried table-hover text-white">
                <tr class="text-center text-white">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>

                <?php 
                $no = 1;
                foreach ($this->cart->contents() as $items) :?>

                <tr class="text-center text-white">
                    <td><?= $no++; ?></td>
                    <td><?= $items['name']; ?></td>
                    <td><?= $items['qty']; ?></td>
                    <td>Rp. <?= number_format($items['price'], 0,',','.'); ?></td>
                    <td>Rp. <?= number_format($items['subtotal'], 0,',','.'); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="text-center text-white">
                    <td colspan="4">Total</td>
                    <td>Rp. <?= number_format($this->cart->total(), 0,',','.'); ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div align="right" style="color: white;">
        <a href="<?= base_url('dashboard/deletecart'); ?>">
            <div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>
        </a>
        <a href="<?= base_url('dashboard/pembayaran'); ?>">
            <div class="btn btn-sm btn-success py-14"><i class="fas fa-fw fa-money-bill"></i></div>
        </a>
    </div>
</div>