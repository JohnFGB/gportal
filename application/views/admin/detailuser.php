<div class="container-fluid">
    <h4 class="text-center">Detail User</h4>
    <table class="table table=bordered table-hover table-striped">
        <tr class="text-center">
            <th>ID User</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Nomor Whatsapp</th>
            <th>Image</th>
            <th>Date Created</th>
        </tr>

        <?php 
        $no = 1;
        foreach ($users as $user)  :
        ?>
        <tr class="text-center">
            <td><?= $user->id; ?></td>
            <td><?= $user->name; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->no_wa; ?></td>
            <td><img src="<?= base_url('assets/img/profile/' . $user->image); ?>" width='50' alt=""></td>
            <td><?= date('d-M-Y', $user->date_created); ?></td>
        </tr>
        <?php endforeach; ?>
        </tr>
    </table>
    <a href="<?= base_url('admin/datauser'); ?>" class="btn btn-primary">Back</a>
</div>