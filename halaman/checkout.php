<?php 
  $ko=mysqli_query($koneksi,"SELECT * FROM tbl_konsumen where id_konsumen = '$_SESSION[id_ko]'");
  $kon=mysqli_fetch_array($ko);
?>
<div class="column_center">
  <div class="container">
	
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	  <div class="col-md-12">
        <div class="single_top">
           <h3 >Alamat Pengiriman</h3>
           <div class="row">
              <div class="col-md-3">
                <h4><?php echo $kon['nama_konsumen']; ?></h4>
              </div>
              <div class="col-md-9">
                <p><?php echo $kon['alamat']; ?></p>
              </div>
           </div>
            
            
        </div>
        <hr>
    </div>
    <hr>
	   <div class="col-md-12">
		   	<div class="single_top">
		      <h3>Produk Di Pesan</h3>
		      <div class="table-responsive">
		      <table class="table table-bordered" id="tablenya">
		      	<thead >
		      		<tr>
		      			<th>No</th>
		      			<th>Merek Barang</th>
		      			<th>Harga</th>
		      			<th>Jumlah</th>
		      			<th>Subtotal</th>
              
		      	
		      		</tr>
		      	</thead>
		      	<tbody>
		      		 <?php 
                        $no=1;
                        $query= mysqli_query($koneksi,"SELECT * FROM tbl_keranjang a LEFT JOIN tbl_barang b ON a.id_barang=b.id_barang Where id_konsumen='$id_konusmen' Order by id_keranjang DESC");
                            while ($data=mysqli_fetch_array($query)) {
                            	$subtot=$data['jumlah']*$data['harga'];
                        ?>
                            <tr>
                                
                                <td><?php echo $no++;?> </td>
                                <td><?php echo $data['merek_barang'];?></td>
                                <td><?php echo $data['harga'];?></td>
                                <td><?php echo $data['jumlah'];?></td>
                                <td><?php echo $subtot; ?></td>
                               
                             
                            </tr>
                        <?php
                            }
                        ?>
		      	</tbody>
		      </table>
          <div class="row">
            <div class="col-sm-6">
              <div class="panel">
                <div class="panel-body">
                  <div class="form-check"> <label><input class="form-check-input" type="radio" name="p1" id="p1" value="p1" onclick="cwo()"> Kurir/COD</label></div>
                  <div class="form-check"> <label ><input class="form-check-input" type="radio" name="p2" id="p2" value="p2" onclick="cwe()"> Jasa Pengiriman</label></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                  <?php 
                      $carisub= mysqli_query($koneksi,"SELECT sum(a.jumlah*b.harga) as ttl FROM tbl_keranjang a LEFT JOIN tbl_barang b ON a.id_barang=b.id_barang Where id_konsumen='$id_konusmen'");
                            $cs=mysqli_fetch_array($carisub);
                  ?>
                   <form class="form-horizontal" method="POST" action="">
                      <input type="hidden" name="nama_kurir" id="nama_kurir">
                      <input type="hidden" name="sub_harga" id="sub_harga" value="<?php echo $cs['ttl'] ?>">
                      <input type="hidden" name="hari" id="hari">
                      <input type="hidden" name="tarif" id="tarif">
                      <input type="hidden" name="lay" id="lay">
                      <div class="total col-md-12">
                        <h3>Total Bayar</h3>
                        <input type="text" class="ttl_byr" name="total_bayar" id="total_bayar" disabled="">
                        <button style="display:none" id="sembunyi" type="submit" class="btn btn2 pull-right" name="bayar_ki"><i class="fa fa-credit-card" disabled=""></i> Buat Pesanan</button>
                       
                    </div>
                  </form>
                </div>
          </div>
          <div class="col-md-12">
            <div class="single_top">
              <div class="row">
                <div class="col-md-6 single" id="single" style="display:none">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Jasa Pengiriman</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="kurir" name="kurir" required="" onchange="tampilkan()">
                              <option value="">-belum ada pilihan-</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS INDONESIA</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                          <input type="hidden" name="asal" id="asal" value="328">
                          <input type="hidden" name="tujuan" id="tujuan" value="<?php echo $kon['kota'] ?>">
                         <button type="button" class="btn btn-warning" id="cek">Cek</button>
                        </div>
                      </div>
                    </form>
                    <div id="response_ongkir">  
                    </div>
                </div>
      
                    
                </div>
              </div>
                
            </div>
          </div>
		      </div>
	          	<div class="clearfix"></div>
	        </div>
     	
     	
     		

	    </div> 
	   </div>
    </div>
</div> 
<?php 
  if (isset($_POST['bayar_ki'])) {
    //buat nomor order otommatis

      $today = date("Ymd");
      $q=mysqli_query($koneksi,"SELECT max(no_penjualan) as nopel FROM tbl_penjualan");
      $qrow= mysqli_fetch_array($q);
      $nom=$qrow['nopel'];
      $urt = (int) substr($nom, 12, 4);
      $urt++;
      $nobaru = $today .sprintf('%04s', $urt);
      $iniurut='NOP-'.$nobaru.'';
      $tgl= date('Y-m-d');
      $ket='Belum diproses';
      mysqli_query($koneksi,"INSERT INTO tbl_penjualan (no_penjualan,tgl_penjualan,id_konsumen, keterangan,kurir, layanan, tarif,hari,total_harga)VALUES('$iniurut','$tgl','$id_konusmen','$ket','$_POST[nama_kurir]','$_POST[lay]','$_POST[tarif]','$_POST[hari]','$_POST[sub_harga]')");
        $q=mysqli_query($koneksi,"SELECT * FROM tbl_keranjang  Where id_konsumen='$id_konusmen'");
        while ($d= mysqli_fetch_array($q)) {
         mysqli_query($koneksi,"INSERT INTO tbl_detail_penjualan (no_penjualan,id_barang,id_konsumen,ukuran,jumlah,warna) VALUES('$iniurut','$d[id_barang]','$d[id_konsumen]','$d[ukuran]','$d[jumlah]','$d[warna]')");
          mysqli_query($koneksi,"UPDATE tbl_barang set stok=stok-'$d[jumlah]' wHERE id_barang='$d[id_barang]'");
          mysqli_query($koneksi,"DELETE FROM tbl_keranjang Where id_konsumen='$id_konusmen'");
        }
           echo "<script>window.location=('?hal=pesanan-anda')</script>"; 
  }

?>