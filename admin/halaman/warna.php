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
                    <li class="breadcrumb-item active">Warna</li>
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
                                <h3 class="card-title">Data Warna <?php echo $d['merek_barang']; ?></h3>
                                <a href="?hal=data_warna&act=tambah&id=<?php echo $_GET['id'] ?>" class="btn btn-info btn-sm float-right""> <i class="fa fa-plus"></i> Tambah Warna</a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warna Baju</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        $query= mysqli_query($koneksi,"SELECT * FROM tbl_warna where id_barang='$_GET[id]'");
                                            while ($data=mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                
                                                <td><?php echo $no++;?> </td>
                                                <td>  <?php echo $data['warna'] ?></p>
                                                </td>
                                             
                                             
                                                <td>
                                                     <a href="?hal=data_warna&act=edit&idu=<?php echo $data['id_warna'];?>&id=<?php echo $_GET['id'] ?>" class="btn btn-warning btn-xs"> <i class="fas fa-edit"></i> Edit</a>
                                                    
                                                    <a href="?hal=data_warna&hapus=<?php echo $data['id_warna'];?>&id=<?php echo $_GET['id'] ?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin Data Akan Dihapus');"> <i class="fas fa-trash"></i> Hapus</a>
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

            $simp=mysqli_query($koneksi,"INSERT INTO tbl_warna (warna, id_barang) VALUES('$_POST[wr]', '$_POST[id]')");
            if ($simp) {
                echo "<script>window.alert('Data Sukses Tersimpan');
                       window.location=('?hal=data_warna&id=$_POST[id]')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Tersimpan')</script>";
            }
        }

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Warna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=data_warna">Data Warna</a></li>
                    <li class="breadcrumb-item active">Input Warna</li>
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
                            <h3 class="card-title">Input Data Warna</h3>
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="card-body">
                                
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Warna</label>
                                    <div class="col-sm-9">
                                    <div class="demo">
                                        
                                          <input name="wr" class="form-control" type="text" placeholder="Masukkan Warna"  />
                                      </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-sm" name="simpan" > Simpan</button>
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
         
            $simp=mysqli_query($koneksi,"UPDATE tbl_warna SET warna='$_POST[wr]' WHERE id_warna='$_POST[idu]'");
            if ($simp) {
                echo "<script>window.alert('Data Sukses Tersimpan');
                       window.location=('?hal=data_warna&id=$_POST[id]')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Tersimpan');</script>";
            }
        }
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_warna  Where id_warna='$_GET[idu]'");
        $d=mysqli_fetch_array($q);

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Warna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=data_warna">Data v</a></li>
                    <li class="breadcrumb-item active">Edit Warna</li>
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
                            <h3 class="card-title">Edit Data Warna</h3>
                        
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $d['id_barang'];?>">
                        <input type="hidden" name="idu" value="<?php echo $d['id_warna'];?>">

                            <div class="card-body">
                                
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ganti Warna</label>
                                    <div class="col-sm-9">
                                    <!--<div class="demo">
                                          <input id="demo-input" name="wr" type="text" value="<?php echo $d['warna'] ?>," />
                                      </div>-->
                                      <input  name="wr" class="form-control" type="text" value="<?php echo $d['warna'] ?>," />
                                    </div>
                                </div>
                               <!-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Warna Baju</label>
                                    <div class="col-sm-9">
                                        <p style="background-color: <?php //echo $d['warna'] ?>; width: 60px; height: 30px; border: 1px solid rgb(47, 46, 45); border-radius: 9px"></p>
                                    </div>
                                </div>-->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-sm" name="update" > Simpan</button>
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
            $q=mysqli_query($koneksi,"DELETE FROM tbl_warna Where id_warna='$_GET[hapus]'");
            if ($q) {
                echo "<script>window.alert('Data Berhasil Dihapus');
                           window.location=('?hal=data_warna&id=$_GET[id]')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Dihapus')</script>";
            }
        }
            
        

        ?>