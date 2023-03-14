<div class="container-fluid">
    <h4 class="text-center">Invoice Pemesanan Produk</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID INVOICE</th>
            <th>NAMA PEMESAN</th>
            <th>ID GAME</th>
            <th>TANGGAL PEMESANAN</th>
            <th>BATAS PEMBAYARAN</th>
            <th>AKSI</th>
        </tr>
        <?php foreach($invoice as $inv) : ?>
        <tr>
            <td><?= $inv->id_invoice; ?></td>
            <td><?= $inv->nama; ?></td>
            <td><?= $inv->id_game; ?></td>
            <td><?= $inv->tgl_pesan; ?></td>
            <td><?= $inv->batas_bayar; ?></td>
            <td><?= anchor('admin/invoice/detail/' . $inv->id_invoice, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>