<div class="sidebar">
	<div class="menu_box">
    	<h3 class="menu_head">Kategori </h3>
	  	<ul class="menu">
	  	 <?php 
            $no=1;
            $kategori= mysqli_query($koneksi,"SELECT * FROM tbl_kategori Order by nama_kategori ASC");
                while ($kat=mysqli_fetch_array($kategori)) {
            ?>
				<li class="item1"><a href="?hal=kategori&idkate=<?php echo $kat['id_kategori'] ?>"><img class="arrow-img" src="assets/images/f_menu.png" alt=""/> <?php echo $kat['nama_kategori']; ?></a>
				</li>
			<?php } ?>
		
		</ul>
	</div>

</div> 
<hr>
	<div class="sidebar">
	<div class="menu_box">
    	<h3 class="menu_head">Daftar Rekening </h3>
	  	<ul class="menu">
	  	 <?php 
            $no=1;
            $bank= mysqli_query($koneksi,"SELECT * FROM tbl_rekening Order by bank ASC");
                while ($bk=mysqli_fetch_array($bank)) {
            ?>
				<li class="item1"><a href="?hal=bank&idbnk=<?php echo $bk['id_rekening'] ?>"><img class="arrow-img" src="assets/images/f_menu.png" alt=""/> <?php echo $bk['bank']; ?></a>
				</li>
			<?php } ?>
		
		</ul>
	</div>
		<!--initiate accordion-->
	
	</div>