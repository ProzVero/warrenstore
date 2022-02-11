
<div class="about">
  <div class="container">
      <div class="register">
		  	<form action="" method="post"> 
				<div class="register-top-grid">
					<h3>Register Biodata</h3>
						 <div>
							<span>Nama Lengkap<label>*</label></span>
							<input class="mb-4" type="text" name="a" placeholder="Isi dengan nama lengkap anda" required> 
						 </div>
						 <div>
							<span>Alamat Lengkap<label>*</label></span>
							<input class="mb-4" type="text" name="b" placeholder="Isi dengan alamat lengkap" required>
						 </div>
					 	<div>
							 <span>Kota<label>*</label></span>
							 <select id="kota_asal" name="c" class="form-control" style="margin-bottom: 30px" required>
	                         </select>
					 	</div>
					 	<div>
							 <span>No Telp<label>*</label></span>
							<input class="mb-4" type="text" name="d" placeholder="Isi dengan No Telp" required minlength="12">
					 	</div>
					 	
						<div class="clearfix"> </div>

					</div>
				<div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							 <div>
								<span>User Name<label>*</label></span>
								<input type="text" name="e" required minlength="5">
							 </div>
							 <div>
								<span>Password<label>*</label></span>
								<input type="text" name="f" required minlength="6">
							 </div>
							 <div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
				<div class="register-but">
				 
					   <input type="submit" name="register"class="btn btn-danger" value="submit">
					   <div class="clearfix"> </div>
				</div>
				</form>
		   </div>
	</div>
</div>
<?php
    if (isset($_POST['register'])){
      $pass=md5($_POST['f']);
        $simp=mysqli_query($koneksi,"INSERT INTO tbl_konsumen (nama_konsumen,alamat, kota,tlp, username,password) VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$pass')");
      if ($simp) {
        echo "<script>window.alert('Data Sukses Tersimpan, Silahkan Login');
                 window.location=('index?hal=login')</script>";
      }else{
        echo "<script>window.alert('Data Gagal Tersimpan')</script>";
      }
    }
?>
