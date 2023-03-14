<div class="container-fluid mt-5">
    <h3 class="text-center"><i class="fas fa-edit"></i> Edit Barang</h3>
    <?php foreach($barang as $brg) : ?>
        <form action="<?= base_url() . 'admin/databarang/update'; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="<?= $brg->nama_barang; ?>">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="hidden" name="id" class="form-control" value="<?= $brg->id; ?>">
                <input type="text" name="deskripsi" class="form-control" value="<?= $brg->deskripsi; ?>">
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?= $brg->kategori; ?>">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" class="form-control" value="<?= $brg->harga; ?>">
            </div>
            <div class="form-group">
                <label for="">Stok</label>
                <input type="text" name="stok" class="form-control" value="<?= $brg->stok; ?>">
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            <img src="<?= base_url('img/'). $brg->gambar; ?>" alt="" width="100px" class="img-fluid mb-3">
            <br>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    <?php endforeach; ?>
</div>