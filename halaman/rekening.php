<div class="column_center">
  <div class="container">
	
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	    
       <?php 
       	 $query= mysqli_query($koneksi,"SELECT * FROM tbl_rekening Where id_rekening='$_GET[idbnk]'");
       	 $data=mysqli_fetch_array($query);
       ?>
	   <div class="col-md-12">
		   	<div class="single_top">
		      <h3>Data Rekening <?php echo $data['bank']; ?></h3>
		      <div class="table-responsive">
		      	<table class="table">
		      		<tr>
		      			<th style="width: 150px">Nama Rekening</th><td style="width: 15px">:</td><td><?php echo $data['nama_rekening']; ?></td>
		      		</tr>
		      		<tr>
		      			<th>Nomor Rekening</th><td>:</td><td><?php echo $data['no_rekening']; ?></td>
		      		</tr>
		      		<tr><td></td><td></td><td></td></tr>
		      	</table>
		      </div>
	          	<div class="clearfix"></div>
	        </div>
     		
     		

	    </div> 
	   </div>
    </div>
</div> 
