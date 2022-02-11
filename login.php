

<div class="about">
  <div class="container">
         <div class="register">
			   <div class="col-md-6 login-left">
			  	 <h3>NEW CUSTOMERS</h3>
				
				 <a class="acount-btn" href="?hal=register">Create an Account</a>
			   </div>
			   <div class="col-md-6 login-right">
			  	<h3>Silhakan Login</h3>
			
				<form action="" method="POST">
				  <div>
					<span>User Name<label>*</label></span>
					<input type="text" name="u" placeholder="isi user name" required>
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					 <input type="password" name="p" placeholder="isi password" required>
				  </div>
				
				  <input type="submit" name="login" value="Login">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		</div>
	</div>
</div>

<?php 

	if (isset($_POST['login'])){
 
        $data=md5($_POST['p']);
       
        $admin = mysqli_query($koneksi,"SELECT * FROM tbl_konsumen WHERE username='$_POST[u]' AND password='$data'");
       
        
        $hitungadmin = mysqli_num_rows($admin);
        if ($hitungadmin >= 1){
           $r = mysqli_fetch_array($admin);
           $_SESSION['id_ko']     = $r['id_konsumen'];
           echo "<script type='text/javascript'>document.location='index.php';</script>";
           
        }else{
           echo "<script>window.alert('User name atau password salah ');
                       window.location='index.php?hal=login'</script>";
        }
       }
?>