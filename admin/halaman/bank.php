<?php 
    if (empty($_GET['act'])) {
    
?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Data Bank</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"> Bank</li>
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
                                <a href="?hal=daftar_bank&act=tambah" class="btn btn-info btn-xs"> <i class="fa fa-plus"></i> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Bank</th>
                                            <th>Nama Rekening</th>
                                            <th>No. Rekening</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        $query= mysqli_query($koneksi,"SELECT * FROM tbl_rekening Order by id_rekening DESC");
                                            while ($data=mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                
                                                <td><?php echo $no++;?> </td>
                                                <td><?php echo $data['bank'];?></td>
                                                <td><?php echo $data['nama_rekening'];?></td>
                                                <td><?php echo $data['no_rekening'];?></td>
                                                <td><img src="../assets/rekening/<?php echo $data['gambar'] ?>" style="width: 150px; height: 120px"></td>
                                             
                                                <td>
                                                     <a href="?hal=daftar_bank&act=edit&id=<?php echo $data['id_rekening'];?>" class="btn btn-warning btn-xs"> <i class="fas fa-edit"></i> Edit</a>
                                                    <a href="?hal=daftar_bank&hapus=<?php echo $data['id_rekening'];?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin Data Akan Dihapus');"> <i class="fas fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
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
            $dir_gambar = '../assets/rekening/';
            $filename = basename($_FILES['gambar']['name']);
            $filenamee = date("YmdHis").'-'.basename($_FILES['gambar']['name']);
            $uploadfile = $dir_gambar . $filenamee;
            if ($filename != ''){      
              if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
                    $simp=mysqli_query($koneksi,"INSERT INTO tbl_rekening (bank, nama_rekening,no_rekening,gambar,id_login) VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$filenamee','$iduser')");
                    if ($simp) {
                        echo "<script>window.alert('Data Sukses Tersimpan');
                               window.location=('?hal=daftar_bank')</script>";
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
                    <h1>Input Bank</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=daftar_bank">Data Bank</a></li>
                    <li class="breadcrumb-item active">Input Bank</li>
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
                            <h3 class="card-title">Input Data Bank</h3>
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Bank</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="a"  placeholder="Nama Bank" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Rekening</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="b"  placeholder="Nama Rekening" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nomor Rekening</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="c"  placeholder="Nomor Rekening" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar</label>
                                    <div class="col-sm-9">
                                         <input type="file" name="gambar" required="" class="form-control">
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
            $dir_gambar = '../assets/rekening/';
            $filename = basename($_FILES['gambar']['name']);
            $filenamee = date("YmdHis").'-'.basename($_FILES['gambar']['name']);
            $uploadfile = $dir_gambar . $filenamee;
            if ($filename != ''){      
              if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
                    $simp=mysqli_query($koneksi,"UPDATE tbl_rekening SET bank='$_POST[a]',nama_rekening='$_POST[b]', no_rekening='$_POST[c]', gambar= '$filenamee' WHERE id_rekening='$_POST[id]'");
                        if ($simp) {
                            echo "<script>window.alert('Data Sukses Tersimpan');
                                   window.location=('?hal=daftar_bank')</script>";
                        }else{
                            echo "<script>window.alert('Data Gagal Tersimpan');</script>";
                        }
              }
              }else{
                  $simp=mysqli_query($koneksi,"UPDATE tbl_rekening SET bank='$_POST[a]',nama_rekening='$_POST[b]', no_rekening='$_POST[c]' WHERE id_rekening='$_POST[id]'");
                    if ($simp) {
                        echo "<script>window.alert('Data Sukses Tersimpan');
                               window.location=('?hal=daftar_bank')</script>";
                    }else{
                        echo "<script>window.alert('Data Gagal Tersimpan');</script>";
                    }
            }
            
        }
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_rekening Where id_rekening='$_GET[id]'");
        $d=mysqli_fetch_array($q);

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Bank</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=daftar_bank">Data Bank</a></li>
                    <li class="breadcrumb-item active">Edit Bank</li>
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
                            <h3 class="card-title">Edit Data Bank</h3>
                        
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $d['id_rekening'];?>">
                            <div class="card-body">
                               <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Bank</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="a"  placeholder="Nama Bank" required value="<?php echo $d['bank'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Rekening</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="b"  placeholder="Nama Rekening" required value="<?php echo $d['nama_rekening'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nomor Rekening</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control" name="c"  placeholder="Nomor Rekening" required value="<?php echo $d['no_rekening'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar</label>
                                    <div class="col-sm-9">
                                         <img src="../assets/rekening/<?php echo $d['gambar'] ?>" style="width: 170px; height: 100px">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar</label>
                                    <div class="col-sm-9">
                                         <input type="file" name="gambar" class="form-control">
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
            $q=mysqli_query($koneksi,"DELETE FROM tbl_rekening Where id_rekening='$_GET[hapus]'");
            if ($q) {
                echo "<script>window.alert('Data Berhasil Dihapus');
                           window.location=('index.php?hal=daftar_bank')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Dihapus')</script>";
            }
        }
            
            
        ?>