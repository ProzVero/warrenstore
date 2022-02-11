<div class="column_center">
  <div class="container">
	
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	  
	   <div class="col-md-12">
		   	<div class="single_top">
		   		<div class="subjdl"><h3>Pesanan Anda</h3> </div>
		      	<div class="row geser">
		      		<?php 
                        $no=1;
                        $query= mysqli_query($koneksi,"SELECT * FROM tbl_penjualan WHERE id_konsumen ='$id_konusmen' Order by id_penjualan DESC");
                            while ($data=mysqli_fetch_array($query)) {
                            	$ttl=$data['total_harga']+$data['tarif'];
                            	
                            	
                            	
                    ?>
				      	<div class="card" style="background-color: #fff;" >
				      		<div class="card-header">
				      			<div class="row">
				      				<div class="col-md-7">
										  <h4>Pengiriman : <span class="text-transform: uppercase;">Kurir <?php 
										  	if ($data['kurir']!="Kurir") {
												echo $data['kurir']; 
											  } else {
												echo $data['layanan']; 
											  }
											  
										  ?></span> -> Ongkir: 
										  <?php 
										  	if ($data['tarif']!=0) {
												echo "Rp " .number_format("$data[tarif]", 0, ",", "."); 
											  } else {
												echo "-";
											  }

											if (($data['keterangan']=="Telah Dikirim" || $data['keterangan']=="Telah Sampai") && $data['resi']!="") {
												echo " (Resi : " .$data['resi']. ")";
											}
											  
										  ?> 
										  </h4>
				      					
				      				</div>
				      				<div class="col-md-5">
				      					<?php 
				      						if (empty($data['upload_bukti']) && $data['kurir']!="Kurir") {
			                            ?>
			                            	<a href="?hal=bukti_upload&id=<?php echo $data['id_penjualan'] ?>" class="float-right btn btn-info"> Uplod Bukti Transfer</a>
			                            <?php
			                            	}elseif ($data['kurir']!="Kurir"){
				      					?>
				      						<a href="" class="float-right btn btn-info">Lihat Bukti</a>
				      				<?php } ?>
				      				
				      					
				      				</div>
				      			</div>
				      		</div>
				      		<div class="card-body">
				      			<div class="table-responsive">
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
								            $q= mysqli_query($koneksi,"SELECT * FROM tbl_detail_penjualan a LEFT JOIN tbl_barang b ON a.id_barang=b.id_barang Where no_penjualan='$data[no_penjualan]' Order by id_detail_keranjang DESC");
								               while ($d=mysqli_fetch_array($q)) {
								               	$subtot=$d['jumlah']*$d['harga'];
								            ?>
								                <tr>
								                    
								                    <td><?php echo $no++;?> </td>
								                    <td><?php echo $d['merek_barang'];?></td>
								                    <td><?php echo $d['ukuran'];?></td>
								                    <td><?php echo "Rp " .number_format("$d[harga]", 0, ",", ".");?></td>
								                    <td><?php echo $d['jumlah'];?></td>

								                    <td><?php echo "Rp " .number_format("$subtot", 0, ",", "."); ?></td>
								                   
								                 
								                </tr>
								            <?php
								                }
								            ?>
								  	</tbody>
								  </table>
								</div>
				      		</div>
				      		<div class="card-footer">
					      		<div class="row">
					      			<div class="col-md-6">
					      				<p class="stts">Status: <b><?php echo $data['keterangan'] ?></b><p>
					      			</div>
					      			<div class="col-md-6">
					      				<h3 class="float-right">Total Bayar : <?php echo "Rp " .number_format("$ttl", 0, ",", "."); ?></h3>
					      			</div>
					      		</div>
				      		</div>
				      	</div>
				      	<hr>
				    <?php } ?>
		      			
		    	</div>
	          	<div class="clearfix"></div>
	        </div>
     	
	    </div> 
	   </div>
    </div>
</div> 
