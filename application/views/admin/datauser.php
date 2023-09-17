<div class="container-fluid">

<?php if($this->session->flashdata('success')){?>
   <div class="alert alert-success">      
    <?php echo $this->session->flashdata('success')?>
 </div>
 <?php } ?>
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambahUser" type="submit"><i
            class="fas fa-plus fa-sm"></i>Tambah User</button>
    <table class="table table-bordered text-center table-striped">
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Date Created</th>
 
            <th colspan="3">Aksi</th>
        </tr>
        <?php 
        
        foreach ($users as $usr) : ?>
        <tr>
            <td><?= ++$start; ?></td>
            <td><?= $usr->name; ?></td>
            <td><?= $usr->email; ?></td>
            <td><?= date('d-M-Y', $usr->date_created); ?></td>
            <td><?= anchor('admin/datauser/edit/' . $usr->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>  Edit</div>'); ?>
            </td>
            <td><?= anchor('admin/datauser/detail/' . $usr->id,'<div class="btn btn-success btn-sm"><i class="fas fa-search"></i>  Detail</div>'); ?>
            </td>
            <td><?= anchor('admin/datauser/delete/' . $usr->id,'<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>  Delete</div>'); ?>
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
<div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url(). 'admin/datauser/tambahAksi'; ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No Whatsapp</label>
                        <input type="text" name="no_wa" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Pin Keamanan</label>
                        <input type="password" name="pin" class="form-control">
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