<?php 
    if (empty($_GET['act'])) {
    
?>
<section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Data Pembelian dan Pemesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"> Data Pembelian dan Pemesanan</li>
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
                                <h3 class="card-title">Data Pemesanan</h3>  
                               
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Tranasaksi</th>
                                            <th>Tgl. Transaksi</th>
                                            <th>Nama Konsumen</th>
                                            <th>Pengantaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        $query= mysqli_query($koneksi,"SELECT * FROM tbl_penjualan a LEFT JOIN tbl_konsumen b ON a.id_konsumen=b.id_konsumen  Order by id_penjualan DESC");
                                            while ($data=mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++;?> </td>
                                                <td><?php echo $data['no_penjualan'];?></td>
                                                <td><?php echo $data['tgl_penjualan'];?></td>
                                                <td><?php echo $data['nama_konsumen'];?></td>
                                                <td><?php echo $data['kurir'];?>, <?php echo $data['layanan'] ?></td>
                                                <td><?php echo $data['keterangan'];?></td>
                                             
                                                <td>
                                                    <a href="?hal=pesanan&act=keterangan&id=<?php echo $data['id_penjualan'];?>" class="btn btn-info btn-xs" title="Ubah Status Pemesanan" > <i class="fas fa-edit"></i> Ubah Status</a>
                                                    <?php
                                                    if ( $data['kurir']=='Kurir') {
                                                ?>
                                                    <a href="?hal=pesanan&act=input_kirim&id=<?php echo $data['id_penjualan'];?>" class="btn btn-primary btn-xs" title="Ubah Status Pemesanan" > <i class="fas fa-image"></i> Input Ongkir</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="?hal=pesanan&act=bukti&id=<?php echo $data['id_penjualan'];?>" class="btn btn-primary btn-xs" title="Ubah Status Pemesanan" > <i class="fas fa-image"></i> Bukti Transfer</a>
                                                <?php
                                                }
                                                
                                            ?>
                                                    
                                                    <a href="?hal=pesanan&act=detail&id=<?php echo $data['id_penjualan'];?>" class="btn btn-primary btn-xs" title="Ubah Status Pemesanan" > <i class="fas fa-search"></i> Detail</a>
                                                    <!--<a href="?view=pengantar_ktp&hapus=<?php //echo $data['id_belum_nikah'];?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin Data Akan Dihapus');"> <i class="fas fa-trash"></i></a>-->
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
}elseif($_GET['act']=='keterangan'){
        if (isset($_POST['simpan'])){
             $simp=mysqli_query($koneksi,"UPDATE tbl_penjualan SET keterangan='$_POST[a]',resi='$_POST[resi]' WHERE id_penjualan='$_POST[id]'");

            if ($simp) {
                echo "<script>window.alert('Data Sukses Tersimpan');
                       window.location=('?hal=pesanan')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Tersimpan')</script>";
            }
        }
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_penjualan Where id_penjualan='$_GET[id]'");
        $d=mysqli_fetch_array($q);

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Status</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=pesanan">Data Pembelian dan Pemesanan</a></li>
                    <li class="breadcrumb-item active">Ubah Status</li>
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
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Status </label>
                                    <div class="col-sm-9">
                                        <select name="a" class="form-control" onchange="tampil(this.value)">
                                            <option value="">-Belum ada pilihan-</option>
                                            <option value="Sedang Dikemas">Sedang Dikemas</option>
                                            <option value="Telah Dikirim">Telah Dikirim</option>
                                            <option value="Telah Sampai">Telah Sampai</option>
                                        </select>
                                    </div>
                                </div>
                                <?php if ($d['kurir']!="Kurir") :?>
                                    <div class="form-group row" >
                                        <label class="col-sm-3 col-form-label" id="input_resi" style="display: none">Input Resi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="resi" class="form-control" id="input_resi2" style="display: none" required value="<?php echo $d['resi'];?>">
                                        </div>
                                    </div>
                                <?php endif ?>
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
    }elseif($_GET['act']=='bukti'){
        
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_penjualan Where id_penjualan='$_GET[id]'");
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
                    <li class="breadcrumb-item"><a href="?hal=barang">Data Pembelian dan Pemesanan</a></li>
                    <li class="breadcrumb-item active">Bukti Transfer</li>
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
                            <h3 class="card-title">Bukti Transfer</h3>
                        
                        </div>
                      
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pengirim Rekening</label>
                                    <div class="col-sm-9">
                                        <?php echo $d['pengirim']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bank Pengirim </label>
                                    <div class="col-sm-9">
                                        <?php echo $d['bank_pengirim']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bank Tujuan</label>
                                    <div class="col-sm-9">
                                       <?php echo $d['bank_tujuan']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bukti Transfer</label>
                                    <div class="col-sm-9">
                                       <a href="../assets/bukti/<?php echo $d['upload_bukti'] ?>" target="_blank"><img src="../assets/bukti/<?php echo $d['upload_bukti'] ?>" style="width: 400px; height: 450px"></a>
                                    </div>
                                </div>
                              
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
    }elseif($_GET['act']=='detail'){
        
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_penjualan a LEFT JOIN tbl_konsumen b ON a.id_konsumen=b.id_konsumen Where id_penjualan='$_GET[id]'");
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
                    <li class="breadcrumb-item"><a href="?hal=barang">Data Pembelian dan Pemesanan</a></li>
                    <li class="breadcrumb-item active">Bukti Transfer</li>
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
                            <h3 class="card-title">Detail Pemesanan</h3>
                        
                        </div>
                      
                            <div class="card-body">
                                
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>No. Transaksi : <b><?php echo $d['no_penjualan']; ?></b></p>
                                            <p>Tanggal Transaksi : <b><?php echo $d['tgl_penjualan']; ?></b></p>
                                            <p>Nama Konsumen : <b><?php echo $d['nama_konsumen']; ?></b></p>
                                            <p>Nomer Resi : <b><?php echo $d['resi']; ?></b></p>

                                        </div>
                                        <div class="col-sm-6">
                                            <p>Kurir : <b><?php echo $d['kurir']; ?>, <?php echo $d['layanan']; ?></b></p>
                                             <p>Biaya kirim & Estimasi Hari : <b><?php echo "Rp " .number_format("$d[tarif]", 0, ",", "."); ?>, <?php echo $d['hari']; ?></b></p>
                                             <p>Total Pembayaran : <b><?php echo "Rp " .number_format("$d[total_harga]", 0, ",", "."); ?></b></p>
                                        </div>
                                    </div>
                                    <hr>
                                <table class="table" id="tablenya">
                                    <thead >
                                        <tr>
                                            <th>No</th>
                                            <th>Merek Barang</th>
                                            <th>Ukuran</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                                            $no=1;
                                            $q= mysqli_query($koneksi,"SELECT * FROM tbl_detail_penjualan a LEFT JOIN tbl_barang b ON a.id_barang=b.id_barang Where no_penjualan='$d[no_penjualan]' Order by id_detail_keranjang DESC");
                                               while ($dt=mysqli_fetch_array($q)) {
                                                $subtot=$dt['jumlah']*$dt['harga'];
                                            ?>
                                                <tr>
                                                    
                                                    <td><?php echo $no++;?> </td>
                                                    <td><?php echo $dt['merek_barang'];?></td>
                                                    <td><?php echo $dt['ukuran'];?></td>
                                                    <td><?php echo "Rp " .number_format("$dt[harga]", 0, ",", ".");?></td>
                                                    <td><?php echo $dt['jumlah'];?></td>

                                                    <td><?php echo "Rp " .number_format("$subtot", 0, ",", "."); ?></td>
                                                   
                                                 
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
    }elseif($_GET['act']=='input_kirim'){
        if (isset($_POST['simpan'])){
             $simp=mysqli_query($koneksi,"UPDATE tbl_penjualan SET tarif='$_POST[a]' WHERE id_penjualan='$_POST[id]'");

            if ($simp) {
                echo "<script>window.alert('Data Sukses Tersimpan');
                       window.location=('?hal=pesanan')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Tersimpan')</script>";
            }
        }

?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Ongkir COD</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="?hal=pesanan">Data Pembelian dan Pemesanan</a></li>
                    <li class="breadcrumb-item active">Tambah Ongkir COD</li>
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
                            <h3 class="card-title">Input Ongkir COD</h3>
                        </div>
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Ongkos Kirim </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="a" class="form-control">
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
?>
<script type="text/javascript">
    $( document ).ready(function() {

        document.getElementById("input_resi").style.display = "none";
    });

	function tampil(proses)
	{
		var status="";
		switch(proses)
		{
			case "Telah Dikirim" : {
				status = "block";
			}
			break;
			default :status ="none";
			}
			document.getElementById("input_resi").style.display = status;
			document.getElementById("input_resi2").style.display = status;
		}
</script>