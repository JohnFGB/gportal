<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<!-- /.container-fluid -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-center font-weight-bold text-primary text-uppercase mb-1">
                                Stok Item</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?php 
                                $where = ['stok != 0'];
                                $totalstok = $this->ModelBarang->total('stok',$where);
                                echo $totalstok;
                                ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gem fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-center font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?php 
                                $where = ['jumlah != 0'];
                                $totalstok = $this->ModelBarang->totalPesanan('jumlah',$where);
                                echo $totalstok;
                                ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-center font-weight-bold text-success text-uppercase mb-1">
                                Total Pendapatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">Rp. <?php 
                                $where = ['harga != 0'];
                                $totalstok = $this->ModelBarang->totalPesanan('harga',$where);
                                echo number_format($totalstok,0,',','.');
                                ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
</div>
</div>
<!-- End of Main Content -->