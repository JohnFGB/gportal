<header id="topline" class="fixed-top">
    <h1></h1>
</header>
<!-- ======= End Topline ======= -->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container" data-aos="fade-up" data-aos-delay="200">
        <ol>
            <li><a href="<?= base_url('user/index'); ?>">Home</a></li>
            <li>Pembayaran</li>
        </ol>
        <h2>Pembayaran Top Up</h2>
    </div>
</section>
<!-- End Breadcrumbs -->

<div class="container text-white">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-success disabled" style="display: flex; justify-content: center; margin-top: 40px;">
                <?php 
                    $total = 0;
                    if ($cart = $this->cart->contents()) {
                        foreach ($cart as $item) {
                            $total = $total + $item['subtotal'];
                        }
                        echo "Total Belanja Anda : Rp. ". number_format($total,0,',','.');
                    
                ?>
            </div>
            <br>
            <h3 class="text-center">Pembayaran</h3>
            <form action="<?= base_url('dashboard/prosespesanan'); ?>" method="post">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>ID Game</label>
                    <input type="text" name="idgame" placeholder="ID Game" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>ID Server</label>
                    <input type="text" name="idgame" placeholder="ID Server" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select name="" id="" class="form-control" required>
                        <option value="">Pilih Pembayaran</option>
                        <option value="">BCA - 231564978</option>
                        <option value="">GOPAY - 0812341235678</option>
                        <option value="">OVO - 0812341235678</option>
                    </select>
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-success d-flex mt-3 px-4 py-2 justify">Pesan</button>
                </div>
                <br>

            </form>
            <?php } else {
                echo "<a href='../dashboard'  style='display: flex; justify-content: center; text-decoration: none; color: white;'>Keranjang belanja anda masih kosong</a>";
                echo "<br>";
            }?>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>