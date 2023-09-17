<div class="container-fluid mt-2">
    <h4 class="text-center">Detail Pesanan</h4>
    <div class="btn btn-sm btn-success mb-3">No Invoice : <?= $invoice->id_invoice; ?></div>
    <table class="table table=bordered table-hover table-striped">
        <tr class="text-center">
            <th>ID Barang</th>
            <th>Nama Produk</th>
            <th>Jumlah Pesanan</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php 
        $total = 0;
        foreach ($pesanan as $psn) :
                $subtotal = $psn->jumlah * $psn->harga;
                $total += $subtotal;      
        ?>
        <tr class="text-center">
            <td><?= $psn->id; ?></td>
            <td><?= $psn->nama_barang; ?></td>
            <td><?= $psn->jumlah; ?></td>
            <td>Rp. <?= number_format($psn->harga,0,',','.'); ?></td>
            <td>Rp. <?= number_format($subtotal,0,',','.'); ?></td>
            <?php 
            if ($psn->status == 0) {
                echo "<td><button class='btn btn-danger'>Pending</button></td>";
            } else {
                echo "<td><button class='btn btn-success'>Success</button></td>";
            }
            ?>
            
            <td><a href='<?= base_url('admin/invoice/status_verifikasi/'. $psn->id_pesanan);?>'  class='btn btn-primary'><i class='fas fa-check'></i> Konfirmasi</a></td>
        </tr>
        <?php endforeach; ?>

            <td colspan="6" align="right" class="text-center">Total</td>
            <td align="right" class="text-center">Rp. <?= number_format($total,0,',','.') ?></td>
        </tr>
    </table>
    <a href="<?= base_url('admin/invoice'); ?>" class="btn btn-primary">Back</a>
</div>