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
    <br>
    <br>
<div class="container">
    <table class="table table-bordered text-center">
        <tr style='background: white;'>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
        </tr>
        <?php 
            $no = 1
        ?>
        <?php foreach($pesanan as $psn) : ?>
        <tr class='text-white'>
            <td><?= $no++ ?></td>
            <td><?= $psn->nama_barang; ?></td>
            <td><?= $psn->harga; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="row">
        <div class="col">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
</section>

