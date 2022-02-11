<?php
    if(empty($_GET['act'])){
?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Kategori</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kategori</h3>
                        <a href="?hal=kategori&act=tambah" class="btn btn-sm bg-maroon float-right"> <i class="fas fa-plus"></i> Tambah</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no=1;
                            $query= mysqli_query($koneksi,"SELECT * FROM tbl_kategori Order by id_kategori DESC");
                                while ($data=mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    
                                    <td><?php echo $no++;?> </td>
                                    <td><?php echo $data['nama_kategori'];?></td>
                                
                                    <td>
                                        <a href="?hal=kategori&act=edit&id=<?php echo $data['id_kategori'];?>" class="btn btn-warning btn-xs"> <i class="fas fa-edit"></i> Edit</a>
                                        <a href="?hal=kategori&hapus=<?php echo $data['id_kategori'];?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin Data Akan Dihapus');"> <i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        <!-- /.container-fluid -->
        </section>
<?php
    }elseif($_GET['act']=='tambah'){
        if (isset($_POST['simpan'])){
         
			$simp=mysqli_query($koneksi,"INSERT INTO tbl_kategori (nama_kategori, id_admin) VALUES('$_POST[a]','$iduser')");
			if ($simp) {
				echo "<script>window.alert('Data Sukses Tersimpan');
			           window.location=('?hal=kategori')</script>";
			}else{
				echo "<script>window.alert('Data Gagal Tersimpan')</script>";
			}
        }

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=kategori">Data Kategori</a></li>
                    <li class="breadcrumb-item active">Input Kategori</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Input Data Kategori</h3>
                        
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kategori</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="a" placeholder="Nomor Kategori" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-xs" name="simpan" > Simpan</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
<?php
    }elseif($_GET['act']=='edit'){
        if (isset($_POST['update'])) {
         
			$simp=mysqli_query($koneksi,"UPDATE tbl_kategori SET nama_kategori='$_POST[a]' WHERE id_kategori='$_POST[id]'");
			if ($simp) {
				echo "<script>window.alert('Data Sukses Tersimpan');
			           window.location=('?hal=kategori')</script>";
			}else{
				echo "<script>window.alert('Data Gagal Tersimpan');</script>";
			}
		}
		$q=mysqli_query($koneksi,"SELECT * FROM tbl_kategori Where id_kategori='$_GET[id]'");
		$d=mysqli_fetch_array($q);

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=kategori">Data Kategori</a></li>
                    <li class="breadcrumb-item active">Edit Kategori</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Kategori</h3>
                        
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $d['id_kategori'];?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama kategori</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="a" required value="<?php echo $d['nama_kategori'];?>">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-xs" name="update" > Simpan</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
<?php 
    }
    if(isset($_GET['hapus'])){
		$q=mysqli_query($koneksi,"DELETE FROM tbl_kategori Where id_kategori='$_GET[hapus]'");
		if ($q) {
			echo "<script>window.alert('Data Berhasil Dihapus');
			           window.location=('index.php?hal=kategori')</script>";
		}else{
			echo "<script>window.alert('Data Gagal Dihapus')</script>";
		}
	}
?>
<script>
 
    function hanyaAngka(evt) {
         var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))

           return false;
         return true;
       }
    function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script>