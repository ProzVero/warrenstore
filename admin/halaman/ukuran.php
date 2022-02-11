<?php 
       $q=mysqli_query($koneksi,"SELECT * FROM tbl_barang Where id_barang='$_GET[id]'");
        $d=mysqli_fetch_array($q);
    if (empty($_GET['act'])) {
    
?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Ukuran</li>
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
                                <h3 class="card-title">Ukuran <?php echo $d['merek_barang']; ?></h3>
                                <a href="?hal=ukuran&act=tambah&id=<?php echo $_GET['id'] ?>" class="btn btn-info btn-sm float-right""> <i class="fa fa-plus"></i> Tambah ukuran</a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ukuran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        $query= mysqli_query($koneksi,"SELECT * FROM tbl_ukuran where id_barang='$_GET[id]'");
                                            while ($data=mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                
                                                <td><?php echo $no++;?> </td>
                                                <td><?php echo $data['ukuran'];?></td>
                                             
                                             
                                                <td>
                                                     <a href="?hal=ukuran&act=edit&idu=<?php echo $data['id_ukuran'];?>&id=<?php echo $_GET['id'] ?>" class="btn btn-warning btn-xs"> <i class="fas fa-edit"></i> Edit</a>
                                                    
                                                    <a href="?hal=ukuran&hapus=<?php echo $data['id_ukuran'];?>&id=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin Data Akan Dihapus');"> <i class="fas fa-trash"></i> Hapus</a>
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

            $simp=mysqli_query($koneksi,"INSERT INTO tbl_ukuran (id_barang, ukuran) VALUES('$_POST[id]', '$_POST[uk]')");
            if ($simp) {
                echo "<script>window.alert('Data Sukses Tersimpan');
                       window.location=('?hal=ukuran&id=$_POST[id]')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Tersimpan')</script>";
            }
        }

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Ukuran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=ukuran">Data Ukuran</a></li>
                    <li class="breadcrumb-item active">Input Ukuran</li>
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
                            <h3 class="card-title">Input Data Ukuran</h3>
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ukuran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="uk"  placeholder="Ukuran" required>
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
         
            $simp=mysqli_query($koneksi,"UPDATE tbl_ukuran SET ukuran='$_POST[uk]' WHERE id_ukuran='$_POST[idu]'");
            if ($simp) {
                echo "<script>window.alert('Data Sukses Tersimpan');
                       window.location=('?hal=ukuran&id=$_POST[id]')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Tersimpan');</script>";
            }
        }
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_ukuran  Where id_ukuran='$_GET[idu]'");
        $d=mysqli_fetch_array($q);

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Ukuran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=ukuran">Data v</a></li>
                    <li class="breadcrumb-item active">Edit Ukuran</li>
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
                            <h3 class="card-title">Edit Data Ukuran</h3>
                        
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $d['id_barang'];?>">
                        <input type="hidden" name="idu" value="<?php echo $d['id_ukuran'];?>">

                            <div class="card-body">
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ukuran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="uk"  placeholder="Ukuran" value="<?php echo $d['ukuran'];?>" required>
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
            $q=mysqli_query($koneksi,"DELETE FROM tbl_ukuran Where id_ukuran='$_GET[hapus]'");
            if ($q) {
                echo "<script>window.alert('Data Berhasil Dihapus');
                           window.location=('?hal=ukuran&id=$_GET[id]')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Dihapus')</script>";
            }
        }
            
        

        ?>