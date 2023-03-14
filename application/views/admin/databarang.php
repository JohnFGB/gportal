<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahBarang" type="submit"><i
            class="fas fa-plus fa-sm"></i>Tambah Barang</button>
    <table class="table table-bordered text-center table-striped">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="3">Aksi</th>
        </tr>
        <?php 
        
        foreach ($barang as $brg) : ?>
        <tr>
            <td><?= ++$start; ?></td>
            <td><?= $brg->nama_barang; ?></td>
            <td><?= $brg->deskripsi; ?></td>
            <td><?= $brg->kategori; ?></td>
            <td>Rp. <?= number_format($brg->harga,0,',','.'); ?></td>
            <td><?= $brg->stok; ?></td>
            <td><?= anchor('admin/databarang/edit/' . $brg->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'); ?>
            </td>
            <td><?= anchor('admin/databarang/delete/' . $brg->id,'<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>'); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="row">
        <div class="col">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(). 'admin/databarang/tambahAksi'; ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input type="text" name="kategori" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>