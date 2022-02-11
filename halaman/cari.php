<?php 
	$kata_kunci=$_POST['kunci'];
	
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
		   	<div class="col-md-9 content_right">
		   		<h3><?php echo $kate['nama_kategori']; ?></h3>
		    	<div class="top_grid2">
		    		<?php 
		            	$no=1;
		            	$query= mysqli_query($koneksi,"SELECT * FROM tbl_barang a LEFT JOIN tbl_kategori b ON a.id_kategori=b.id_kategori where merek_barang LIKE '%$kata_kunci%' OR nama_kategori like '%$kata_kunci%' Order by id_barang DESC");
		                while ($data=mysqli_fetch_array($query)) {
		                	$gbr=mysqli_query($koneksi,"SELECT * FROM tbl_gambar_barang Where id_barang='$data[id_barang]' limit 1");
		                	$g=mysqli_fetch_array($gbr);
		            ?>
			      	<div class="col-md-4 top_grid1-box1">
				      	<a href="?hal=detail-barang&idbrg=<?php echo $data['id_barang'] ?>">
					     	<div class="grid_1">
					     	  <div class="b-link-stroke b-animate-go  thickbox">
						        <img src="admin/assets/gambar_barang/<?php echo $g['gambar'] ?>" style="width: 100%; height: 250px" class="img-responsive" alt=""/> </div>
					     	  <div class="grid_2">
					     	  	<p><?php echo $data['merek_barang']; ?></p>
					     	  	<ul class="grid_2-bottom">
					     	  		<li class="grid_2-left"><p>Rp. <?php echo number_format($data['harga'],0,',','.'); ?></p></li>
					     	  		<li class="grid_2-right">
					     	  			<div class="btn btn-primary btn-normal btn-inline " target="_self" title="Detail Barang">View</div>
					     	  		</li>
					     	  		<div class="clearfix"> </div>
					     	  	</ul>
					     	  </div>
					     	</div>
				     	</a>
			 		</div>

			   
			    	<?php } ?>
		   		</div> 
	       	</div>
		</div>  	    
	</div>
</div>
