<?php 
    if (empty($_GET['act'])) {
    
?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"> Barang</li>
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
                                <a href="?hal=barang&act=tambah" class="btn btn-info btn-xs"> <i class="fa fa-plus"></i> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        $query= mysqli_query($koneksi,"SELECT * FROM tbl_barang a LEFT JOIN tbl_kategori b ON a.id_kategori=b.id_kategori Order by id_barang DESC");
                                            while ($data=mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                
                                                <td><?php echo $no++;?> </td>
                                                <td><?php echo $data['merek_barang'];?></td>
                                                <td><?php echo $data['nama_kategori'];?></td>
                                                <td><?php echo $data['harga'];?></td>
                                                <td><?php echo $data['stok']; ?></td>
                                             
                                                <td style="text-align: right">
                                                    <a href="?hal=barang&act=tambah-stok&id=<?php echo $data['id_barang'];?>" class="btn btn-info btn-xs"> <i class="fas fa-plus"></i> Stok</a>
                                                     <a href="?hal=gambar&id=<?php echo $data['id_barang'];?>" class="btn bg-orange  btn-xs"> <i class="fas fa-image"></i> Gambar</a>
                                                     <a href="?hal=data_warna&&id=<?php echo $data['id_barang'];?>" class="btn bg-fuchsia btn-xs"> <i class="fas fa-palette"></i> Warna</a> <br>
                                                     <a href="?hal=barang&act=edit&id=<?php echo $data['id_barang'];?>" class="btn btn-warning btn-xs"> <i class="fas fa-edit"></i> Edit</a>
                                                     <a href="?hal=ukuran&&id=<?php echo $data['id_barang'];?>" class="btn bg-lime btn-xs"> <i class="fas fa-box"></i> Ukuran</a>
                                                    <a href="?hal=barang&hapus=<?php echo $data['id_barang'];?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin Data Akan Dihapus');"> <i class="fas fa-trash"></i> Hapus</a>
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

            $simp=mysqli_query($koneksi,"INSERT INTO tbl_barang (merek_barang, harga,deskripsi,stok,id_kategori,id_admin) VALUES('$_POST[merek]','$_POST[harga]','$_POST[desk]','$_POST[jml]','$_POST[kate]','$iduser')");
            if ($simp) {
                echo "<script>window.alert('Data Sukses Tersimpan');
                       window.location=('?hal=barang')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Tersimpan')</script>";
            }
        }

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=barang">Data Barang</a></li>
                    <li class="breadcrumb-item active">Input Barang</li>
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
                            <h3 class="card-title">Input Data Barang</h3>
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Merek Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="merek"  placeholder="Merek Barang" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Harga Barang (Rp)</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="harga"  onkeypress="return hanyaAngka(event)"  placeholder="Harga Barang" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi Barang</label>
                                    <div class="col-sm-9">
                                       <textarea class="form-control textarea" name="desk" id=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="jml"  onkeypress="return hanyaAngka(event)"  placeholder="Jumlah Barang" required>
                                    </div>
                                </div>
                                
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kategori Barang</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required="" name="kate">
                                            <option value="" selected="">--belum adaa pilihan --</option>
                                            <?php 
                                                $k= mysqli_query($koneksi,"SELECT * FROM tbl_kategori Order by id_kategori DESC");
                                                while ($kat=mysqli_fetch_array($k)) {
                                            ?>
                                                <option value="<?php echo $kat['id_kategori'] ?>"><?php echo $kat['nama_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
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
         
            $simp=mysqli_query($koneksi,"UPDATE tbl_barang SET merek_barang='$_POST[merek]',harga='$_POST[harga]', deskripsi='$_POST[desk]', id_kategori='$_POST[kate]' WHERE id_barang='$_POST[id]'");
            if ($simp) {
                echo "<script>window.alert('Data Sukses Tersimpan');
                       window.location=('?hal=barang')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Tersimpan');</script>";
            }
        }
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_barang Where id_barang='$_GET[id]'");
        $d=mysqli_fetch_array($q);

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=barang">Data v</a></li>
                    <li class="breadcrumb-item active">Edit Barang</li>
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
                            <h3 class="card-title">Edit Data Barang</h3>
                        
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $d['id_barang'];?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Merek Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="merek"  placeholder="Merek barang" value="<?php echo $d['merek_barang'];?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Harga Barang (Rp)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="harga"  onkeypress="return hanyaAngka(event)" value="<?php echo $d['harga'];?>"  placeholder="Harga Barang" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi Barang</label>
                                    <div class="col-sm-9">
                                       <textarea class="form-control textarea" name="desk" id=""><?php echo $d['deskripsi'];?></textarea>
                                    </div>
                                </div>
                                                               
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kategori Barang</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" required="" name="kate">
                                            <option value="" selected="">--belum adaa pilihan --</option>
                                            <?php 
                                                $k= mysqli_query($koneksi,"SELECT * FROM tbl_kategori Order by id_kategori DESC");
                                                while ($kat=mysqli_fetch_array($k)) {
                                                    if ($kat['id_kategori']==$d['id_kategori']) {
                                                    ?>
                                                        <option value="<?php echo $kat['id_kategori'] ?>" selected><?php echo $kat['nama_kategori']; ?></option>
                                                    <?php
                                                    } else {
                                                       ?>
                                                        <option value="<?php echo $kat['id_kategori'] ?>"><?php echo $kat['nama_kategori']; ?></option>
                                                    <?php
                                                    }
                                                    
                                            } ?>
                                        </select>
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
    }elseif($_GET['act']=='tambah-stok'){
        if (isset($_POST['simpan'])){

           $simp=mysqli_query($koneksi,"UPDATE tbl_barang SET stok= stok + '$_POST[a]' WHERE id_barang='$_POST[id]'");
            if ($simp) {
                echo "<script>window.alert('Data Sukses Tersimpan');
                       window.location=('?hal=barang')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Tersimpan');</script>";
            }
        }
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_barang Where id_barang='$_GET[id]'");
        $d=mysqli_fetch_array($q);

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=barang">Tambah Stok</a></li>
                    <li class="breadcrumb-item active">Tambah Stok</li>
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
                            <h3 class="card-title">Tambah Stok</h3>
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $d['id_barang'];?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="a" onkeypress="return hanyaAngka(event)" placeholder="jumlah barang masuk" required>
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
    }
    
        if(isset($_GET['hapus'])){
            $q=mysqli_query($koneksi,"DELETE FROM tbl_barang Where id_barang='$_GET[hapus]'");
            if ($q) {
                echo "<script>window.alert('Data Berhasil Dihapus');
                           window.location=('index.php?hal=barang')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Dihapus')</script>";
            }
        }
            if (isset($_POST['simpan'])){
                $cek = mysqli_fetch_array(mysqli_query($koneksi,"SELECT merek_baju FROM tbl_barang ORDER BY id_kelakuan_baik DESC LIMIT 1"));
                $ex = explode('/', $cek['merek_baju']);
                
                if (date('d')=='01'){ $b = '01'; }
                else{ $b = $ex[1]+1; }
            
                
                $a = '045.2';
                $c= 'SKBB/KCL';
                $d = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
                $e = date('Y');
                $merek_baju = $a.'/'.$b.'/'.$c.'/'.$d[date('n')].'/'.$e;

                $simp=mysqli_query($koneksi,"INSERT INTO tbl_barang (merek_baju, id_kategori) VALUES('$merek_baju','$iduser')");

                    echo "<script>window.alert('Permohonan Sukse tersimpan, Silahkan Cetak Surat Permohonan');window.location=('?view=permohonan_baik');window.open('page/cetak/kelakuan_baik.php?id=$merek_baju','_blank');</script>";
		
            }

        ?>