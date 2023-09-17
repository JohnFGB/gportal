<div class="container">
    <center>
    <?php if($this->session->flashdata('success')){?>
   <div class="alert alert-success">      
    <?php echo $this->session->flashdata('success')?>
 </div>
 <?php } ?>
    <div class="form-group">
        <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']?>" width='100'>
    </div>
    </center>
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama_barang" class="form-control" value='<?= $user['name']; ?>' disabled>
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="deskripsi" class="form-control" value='<?= $user['email']; ?>' disabled>
    </div>
        <form action="<?= base_url(). 'admin/dashboard/simpan'; ?>" method="post" enctype="multipart/form-data">
        <!-- <div class="form-group">
            <label for="">Password Lama</label>
            <input type="password" name="password" class="form-control">
        </div> -->
        <div class="form-group">
            <label for="">Password Baru</label>
            <input type="password" name="newpassword" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="confpassword" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
</div>
