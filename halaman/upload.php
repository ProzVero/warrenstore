<div class="column_center">
  <div class="container">
	
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	  	<?php 
    	
        	$query= mysqli_query($koneksi,"SELECT * FROM tbl_penjualan WHERE id_penjualan ='$_GET[id]'");
            $data=mysqli_fetch_array($query);
   	
    	?>
	   <div class="col-md-12">
		   	<div class="single_top">
		   		<div class="subjdl"><h3>Upload Bukti  Transfer</h3> </div>
		      	<div class="row geser">
			      	<div class="card" style="background-color: #fff;" >
                        <div class="card-body">
                        	<div class="row">
                        		<div class="col-md-7">
                        			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                        				<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            			<div class="form-group row">
		                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pengirim</label>
		                                    <div class="col-sm-9">
		                                        <input type="text" class="form-control" name="pengirim" placeholder="Nama Pengirim di Rekening" value="<?php echo $data['pengirim'];?>" required>
		                                    </div>
		                                </div>
		                                <div class="form-group row">
		                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bank Pengiriman</label>
		                                    <div class="col-sm-9">
		                                        <input type="text" class="form-control" name="bank" placeholder="bank tempat mengirim" required value="<?php echo $data['bank_pengirim'];?>">
		                                    </div>
		                                </div>
		                                <div class="form-group row">
		                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bank Tujuan</label>
		                                    <div class="col-sm-9">
		                                        <input type="text" class="form-control" name="bank1" placeholder="Bank Tujuan" required value="<?php echo $data['bank_tujuan'];?>">
		                                    </div>
		                                </div>
		                                <div class="form-group row">
		                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bukti Transfer</label>
		                                    <div class="col-sm-9">
		                                    	<?php 
		                                    		if (empty($data['upload_bukti'])) {
		                                    	?>
		                                    	 	<img src="assets/no image.jpg" id="gambar" style="width: 250px; height: 270px">
		                                    	<?php
		                                    		} else {
		                                    	?>
		                                    	 	<a href="assets/bukti/<?php echo $data['upload_bukti'] ?>" target="_blank"><img src="assets/bukti/<?php echo $data['upload_bukti'] ?>" style="width: 260px; height: 280px"></a>
		                                    	<?php
		                                    		}
		                                    		
		                                    	?>

		                                      
		                                    </div>
		                                </div>
		                                <div class="form-group row">
		                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Gambar</label>
		                                    <div class="col-sm-9">
		                                    	 <input type="file" name="files" id="file" style="display: none;">
            									<button id="pilih" class="btn-primary">Pilih file</button>
		                                        
		                                    </div>
		                                </div>
		                                <button type="submit" class="btn btn-info btn-xs" name="simpan" > Simpan</button>
	                                 </form>	
                        		</div>
                        		<div class="col-md-5">
                        			<h3 style="text-align: center">Daftar Nomor Rekening</h3>
                        			<hr>
                        			 <?php 
							            $no=1;
							            $bank= mysqli_query($koneksi,"SELECT * FROM tbl_rekening Order by bank ASC");
							                while ($bk=mysqli_fetch_array($bank)) {
							            ?>
										<div class="row">
											<div class="col-md-4">
												<img src="assets/rekening/<?php echo $bk['gambar'] ?>" style="width: 100%;height: 80px">
											</div>
											<div class="col-md-8">
												<p>Nama Rekening : <b><?php echo $bk['nama_rekening']; ?></b></p>
												<p>Nomor Rekening : <b><?php echo $bk['no_rekening']; ?></b></p>
											</div>
										</div>
										<hr>
										<?php } ?>
									
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
	if (isset($_POST['simpan'])){
		
			$dir_gambar = 'assets/bukti/';
            $filename = basename($_FILES['files']['name']);
            $filenamee = date("YmdHis").'-'.basename($_FILES['files']['name']);
            $uploadfile = $dir_gambar . $filenamee;
            if ($filename != ''){      
              if (move_uploaded_file($_FILES['files']['tmp_name'], $uploadfile)) {
                   $simp=mysqli_query($koneksi,"UPDATE tbl_penjualan SET upload_bukti='$filenamee',pengirim='$_POST[pengirim]',bank_pengirim='$_POST[bank]',bank_tujuan='$_POST[bank1]' WHERE id_penjualan='$_POST[id]'");
                    if ($simp) {
                        echo "<script>window.alert('Data Sukses Tersimpan');
                               window.location=('?hal=pesanan-anda')</script>";
                    }else{
                        echo "<script>window.alert('Data Gagal Tersimpan')</script>";
                    }
              }
            }		
    } 

?>
<script type="text/javascript">
        var tm_pilih = document.getElementById('pilih');
        var file = document.getElementById('file');
        tm_pilih.addEventListener('click', function () {
            file.click();
        })
        file.addEventListener('change', function () {
            gambar(this);
        })
        function gambar(a) {
            if (a.files && a.files[0]) {     
                 var reader = new FileReader();    
                 reader.onload = function (e) {
                     document.getElementById('gambar').src=e.target.result;
                 }    
                 reader.readAsDataURL(a.files[0]);
            }

        }
    </script>