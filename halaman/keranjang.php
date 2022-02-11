<div class="column_center">
  <div class="container">
	
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	    
       
	   <div class="col-md-12">
		   	<div class="single_top">
		      <h3>Keranjang Anda</h3>
		      <div class="table-responsive">
		      <table class="table table-bordered">
		      	<thead >
		      		<tr>
		      			<th>No</th>
		      			<th>Merek Barang</th>
		      			<th>Harga</th>
		      			<th>Jumlah</th>
		      			<th>Subtotal</th>
		      			<th>Aksi</th>
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
                             
                                <td>
                                
                                     <a href="?hal=edit_keranjang&id=<?php echo $data['id_keranjang'];?>" class="btn btn-warning btn-xs"> <i class="fas fa-edit"></i> Edit</a>
                                  
                                    <a href="?hal=keranjang&hapus=<?php echo $data['id_keranjang'];?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin Data Akan Dihapus');"> <i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
		      	</tbody>
		      </table>
		      </div>
	          	<div class="clearfix"></div>
	        </div>
     		<a href="index.php" class=" btn btn1 pull-left"><i class="fas fa-back"></i>Kembali Belanja</a>
     		<a href="?hal=checkout" class=" btn btn2 pull-right"><i class="fa fa-credit-card"></i> Checkout</a>
     		

	    </div> 
	   </div>
    </div>
</div> 
<?php 
  if(isset($_GET['hapus'])){
            $q=mysqli_query($koneksi,"DELETE FROM tbl_keranjang Where id_keranjang='$_GET[hapus]'");
            if ($q) {
                echo "<script>window.alert('Data Berhasil Dihapus');
                           window.location=('index.php?hal=keranjang')</script>";
            }else{
                echo "<script>window.alert('Data Gagal Dihapus')</script>";
            }
        }
?>