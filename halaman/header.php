<div class="header">
	<div class="header_top">
		<div class="container">
			<div class="logo">
				<a href="index.php"><h3>Warren Store</h3></a>
			</div>
			<ul class="shopping_grid">
			      
			      <?php if (empty($id_konusmen)) {
			      ?>
			      	<a href="?hal=login"><li>Login</li></a>
			      <?php
			      } else {
			      ?>
			      	<a href="halaman/logout.php"><li>Logout</li></a>
			      	
			      	<a href="#"><li><?php echo $namakon; ?></li></a>
			      <?php			      
			  		}
			  		$q=mysqli_query($koneksi,"SELECT count(id_keranjang) as jml FROM tbl_keranjang Where id_konsumen='$id_konusmen'");
						$d=mysqli_fetch_array($q);
			       ?>
			      <a href="?hal=keranjang"><li><span class="m_1">Keranjang</span>&nbsp;&nbsp;<?php echo $d['jml']; ?> &nbsp;<img src="assets/images/bag.png" alt=""/></li></a>
			      <div class="clearfix"> </div>
			</ul>
		    <div class="clearfix"> </div>
		</div>
	</div>
	<div class="h_menu4"><!-- start h_menu4 -->
		<div class="container">
				<div class="menu-wrapper">
				<button class="menu-toggle">Menu</button>
					<div class="multi-level-responsive-menu">
						<ul class="menu1">
					       <li class="active"><a href="index.php" >Beranda</a></li>
					       <li><a href="#">Kategori</a>
					            <ul>
					            <?php 
		                            $no=1;
		                            $query= mysqli_query($koneksi,"SELECT * FROM tbl_kategori Order by nama_kategori ASC");
		                                while ($data=mysqli_fetch_array($query)) {
		                        ?>
									<li><a href="?hal=kategori&idkate=<?php echo $data['id_kategori'] ?>"><?php echo $data['nama_kategori']; ?></a></li>
								<?php } ?>
					            </ul>
					       </li>
					        <li><a href="?hal=pesanan-anda" >Pesanan Anda</a></li>
					       	
						</ul>
					</div>
				</div>
	      </div><!-- end h_menu4 -->
     </div>
</div>
