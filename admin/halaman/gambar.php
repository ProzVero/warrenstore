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
                    <li class="breadcrumb-item active">Gambar</li>
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
                                <h3 class="card-title">Gambar <?php echo $d['merek_barang']; ?></h3>
                                <a href="?hal=gambar&act=tambah&id=<?php echo $_GET['id'] ?>" class="btn btn-info btn-sm float-right""> <i class="fa fa-plus"></i> Tambah Gambar</a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        $query= mysqli_query($koneksi,"SELECT * FROM tbl_gambar_barang where id_barang='$_GET[id]'");
                                            while ($data=mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                
                                                <td><?php echo $no++;?> </td>
                                                <td><img src="assets/gambar_barang/<?php echo $data['gambar'];?>" style="width: 120px; height: 150px"></td>
                                             
                                             
                                                <td>
                                                     <a href="?hal=gambar&act=edit&idu=<?php echo $data['id_gambar_barang'];?>&id=<?php echo $_GET['id'] ?>" class="btn btn-warning btn-xs"> <i class="fas fa-edit"></i> Edit</a>
                                                    
                                                    <a href="?hal=gambar&hapus=<?php echo $data['id_gambar_barang'];?>&id=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin Data Akan Dihapus');"> <i class="fas fa-trash"></i> Hapus</a>
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
            $dir_gambar = 'assets/gambar_barang/';
            $filename = basename($_FILES['gambar']['name']);
            $filenamee = date("YmdHis").'-'.basename($_FILES['gambar']['name']);
            $uploadfile = $dir_gambar . $filenamee;
            if ($filename != ''){      
              if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
                   $simp=mysqli_query($koneksi,"INSERT INTO tbl_gambar_barang (id_barang, gambar) VALUES('$_POST[id]', '$filenamee')");
                    if ($simp) {
                        echo "<script>window.alert('Data Sukses Tersimpan');
                               window.location=('?hal=gambar&id=$_POST[id]')</script>";
                    }else{
                        echo "<script>window.alert('Data Gagal Tersimpan')</script>";
                    }
              }
            }
            
            
        }

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Gambar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=gambar">Data Gambar</a></li>
                    <li class="breadcrumb-item active">Input Gambar</li>
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
                            <h3 class="card-title">Input Data Gambar</h3>
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="gambar" required>
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
            
            $dir_gambar = 'assets/gambar_barang/';
            $filename = basename($_FILES['gambar']['name']);
            $filenamee = date("YmdHis").'-'.basename($_FILES['gambar']['name']);
            $uploadfile = $dir_gambar . $filenamee;
            if ($filename != ''){      
              if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
                  $simp=mysqli_query($koneksi,"UPDATE tbl_gambar_barang SET gambar='$filenamee' WHERE id_gambar_barang='$_POST[idu]'");
                    if ($simp) {
                        echo "<script>window.alert('Data Sukses Tersimpan');
                               window.location=('?hal=gambar&id=$_POST[id]')</script>";
                    }else{
                        echo "<script>window.alert('Data Gagal Tersimpan');</script>";
                    }
              }
            }


           
        }
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_gambar_barang  Where id_gambar_barang='$_GET[idu]'");
        $d=mysqli_fetch_array($q);

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Gambar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=gambar">Data v</a></li>
                    <li class="breadcrumb-item active">Edit Gambar</li>
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
                            <h3 class="card-title">Edit Data Gambar</h3>
                        
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $d['id_barang'];?>">
                        <input type="hidden" name="idu" value="<?php echo $d['id_gambar_barang'];?>">

                            <div class="card-body">
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar Barang</label>
                                    <div class="col-sm-9">
                                        <img src="assets/gambar_barang/<?php echo $d['gambar'] ?>" style="width: 120px; height: 150px">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ganti Gambar</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="gambar" class="form-control"  required="">
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
            $q=mysqli_query($koneksi,"DELETE FROM tbl_gambar_barang Where id_gambar_barang='$_GET[hapus]'");
            if ($q) {
                echo "<script>window.alert('Data Berhasil Dihapus');
                           window.location=('?hal=gambar&id=$_GET[id]')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Dihapus')</script>";
            }
        }
            
        

        ?>