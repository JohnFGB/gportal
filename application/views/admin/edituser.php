<div class="container-fluid mt-5">
    <h3 class="text-center"><i class="fas fa-edit"></i> Edit User</h3>
    <?php foreach($users as $usr) : ?>
        <form action="<?= base_url() . 'admin/datauser/update'; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="hidden" name="id" class="form-control" value="<?= $usr->id; ?>">
                <input type="text" name="name" class="form-control" value="<?= $usr->name; ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="<?= $usr->email; ?>">
            </div>
            <div class="form-group">
                <label for="">Nomor Whatsapp</label>
                <input type="text" name="no_wa" class="form-control" value="<?= $usr->no_wa; ?>">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">PIN</label>
                <input type="password" name="pin" class="form-control">
            </div>
            <br>
            <a href="<?= base_url('admin/datauser'); ?>" class="btn btn-primary" type="submit">Back</a>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
        <br>
    <?php endforeach; ?>
</div>