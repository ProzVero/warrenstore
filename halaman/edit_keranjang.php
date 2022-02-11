 <?php 
    $no=1;
    $qbrg= mysqli_query($koneksi,"SELECT * FROM tbl_keranjang a LEFT JOIN tbl_barang b ON a.id_barang=b.id_barang LEFT JOIN tbl_kategori c ON b.id_kategori=c.id_kategori Where id_keranjang='$_GET[id]'");
	$brg=mysqli_fetch_array($qbrg);
    ?>
<div class="column_center">
  <div class="container">
	<div class="search">
	  <div class="stay">Search Product</div>
	  <form action="?hal=pencarian" method="POST">
		  <div class="stay_right">
			  <input type="text" name="kunci" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
			  <input type="submit" value="" name="cari">
		  </div>
	  </form>
	  <div class="clearfix"> </div>
	</div>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	   <div class="col-md-3 sidebar_box">
	   	<?php include 'halaman/kanan.php'; ?>
	   </div> 
	   <div class="col-md-9 single_right">
		   	<div class="single_top">
		       	<div class="single_grid">
					<div class="grid images_3_of_2">
							<ul id="etalage">
								<?php 
                                	$no=0;
                                	$qgbr= mysqli_query($koneksi,"SELECT * FROM tbl_gambar_barang where id_barang='$brg[id_barang]'");
                                    while ($dgbr=mysqli_fetch_array($qgbr)) {
                                    	$nn=$no++;
                                    if ($nn==1) {
                                    ?>
                                    	<li>
											<a href="optionallink.html">
												<img class="etalage_thumb_image" src="admin/assets/gambar_barang/<?php echo $dgbr['gambar'] ?>" class="img-responsive" />
												<img class="etalage_source_image" src="admin/assets/gambar_barang/<?php echo $dgbr['gambar'] ?>" class="img-responsive" title="" />
											</a>
										</li>

                                    <?php
                                    } else {
                                    ?>
                                    	<li>
											<img class="etalage_thumb_image" src="admin/assets/gambar_barang/<?php echo $dgbr['gambar'] ?>" class="img-responsive" />
											<img class="etalage_source_image" src="admin/assets/gambar_barang/<?php echo $dgbr['gambar'] ?>" class="img-responsive" title="" />
										</li>
                                    <?php
                                    }
                                    }
                                ?>
							</ul>
							 <div class="clearfix"></div>		
					</div> 
					<form action="" method="post">
					<div class="desc1 span_3_of_2">
						<input type="hidden" name="id" value="<?php echo  $brg['id_keranjang'] ?>">
					  	<h1> <?php echo $brg['merek_barang']; ?></h1>
						<p class="availability">STOK : <span class="color"><?php echo $brg['stok']; ?></span></p>
					    <div class="price_single">
							<span class="actual">Rp. <?php echo number_format($brg['harga'],0,',','.'); ?></span>
						</div>
						<ul class="size">
							<h3>Ukuran :</h3>
							<select style="padding: 10px 3px; width: 100px" name="ukuran" required="">
							<?php 
								$no=1;
                                    $quku= mysqli_query($koneksi,"SELECT * FROM tbl_ukuran where id_barang='$brg[id_barang]'");
                                        while ($quk=mysqli_fetch_array($quku)) {
                                    ?>
                                    	<option> <?php echo $quk['ukuran']; ?></option>
							<?php  }

							?>
							</select>
						</ul>
						<div class="quantity_box">
							<ul class="product-qty">
							   <span>Jumlah Pesanan:</span>
							  <input type="text" name="jml" style="padding: 5px 1px; width: 100px; text-align: center; font-size: 20px; font-weight: bold" required="">
						    </ul>
						    <ul class="single_social">
								<li><a href="#"><i class="fb1"> </i> </a></li>
								<li><a href="#"><i class="tw1"> </i> </a></li>
								<li><a href="#"><i class="g1"> </i> </a></li>
								<li><a href="#"><i class="linked"> </i> </a></li>
				   		    </ul>
			   		    	<div class="clearfix"></div>
		   		    	</div>
		   		    	<input type="hidden" name="idbrg" value="<?php echo $brg['id_barang'] ?>">
		   		    	<button class="btn bt1 btn-primary btn-normal btn-inline" target="_self" name="simpan" style="padding: 15px 20px"> Ubah Pesanan</button>
				    
					</div>
					</form>
			    	<div class="clearfix"> </div>
				</div>
	          	<div class="clearfix"></div>
	        </div>
          	<div class="sap_tabs">	
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						<ul class="resp-tabs-list">
					  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
						
						  <div class="clear"></div>
					  	</ul>				  	 
						<div class="resp-tabs-container">
						    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
								<div class="facts">
								  <ul class="tab_list">
								  	<li><?php echo $brg['deskripsi']; ?></li>
								  </ul>           
						        </div>
						    </div>		
						</div>
				</div>
			</div>
		
	    </div> 
	   </div>
    </div>
</div> 
<?php 
	 if (isset($_POST['simpan'])){
	 	if (empty($id_konusmen)) {
	 		 echo "<script>window.alert('Anda Belum Login, Silahkan Login Terlebih Dahulu');
                              window.location=('login.php')</script>"; 
	 	}else{
   		$simp=mysqli_query($koneksi,"UPDATE tbl_keranjang SET ukuran='$_POST[ukuran]',jumlah='$_POST[jml]' WHERE  id_keranjang='$_POST[id]'");
   	

        echo "<script>window.alert('Data Berhasil diubah');
                               window.location=('?hal=keranjang')</script>";
      	}
     } 

?>