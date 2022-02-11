<?php 
 	session_start();
	include'config/koneksi.php';
  	include'config/fungsi_tgl.php';
  	error_reporting(0);
 
	$id_see=$_SESSION['id_ko'];
  $qkon = mysqli_query($koneksi,"SELECT * FROM tbl_konsumen WHERE id_konsumen='$id_see'");
  $dkon = mysqli_fetch_array($qkon);
  $id_konusmen= $dkon['id_konsumen'];
  $namakon=$dkon['nama_konsumen'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ware Store| Home :: E-Commerce</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashionpress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
 <link rel="stylesheet" href="admin/assets/plugins/fontawesome-free/css/all.min.css">
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="assets/js/hover_pack.js"></script>
<link rel="stylesheet" href="assets/css/etalage.css">
 <link rel="stylesheet" href="admin/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<script src="assets/js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<script src="assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
            </script>	
<script src="assets/js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
<script type="text/javascript" src="assets/js/hover_pack.js"></script>
</head>
<body>
<?php include 'halaman/header.php'; ?>
<?php 
	if (empty($_GET['hal'])) {
		include 'halaman/beranda.php';
	} elseif ($_GET['hal']=='kategori') {
		include 'halaman/kategori.php';
	} elseif ($_GET['hal']=='detail-barang') {
		include 'halaman/detail_barang.php';
	}elseif ($_GET['hal']=='keranjang') {
		include 'halaman/keranjang.php';
	}elseif ($_GET['hal']=='checkout') {
		include 'halaman/checkout.php';
	}elseif ($_GET['hal']=='pesanan-anda') {
		include 'halaman/pesanan.php';
	}elseif ($_GET['hal']=='login') {
		include 'login.php';
	}elseif ($_GET['hal']=='register') {
		include 'register.php';
	}elseif ($_GET['hal']=='bukti_upload') {
		include 'halaman/upload.php';
	}elseif ($_GET['hal']=='pencarian') {
		include 'halaman/cari.php';
	}elseif ($_GET['hal']=='bank') {
		include 'halaman/rekening.php';
	}elseif ($_GET['hal']=='edit_keranjang') {
		include 'halaman/edit_keranjang.php';
	}
	
	
	

?>

<div class="footer">
	<div class="container">
		<div class="col-md-4 f_grid1">
			<h3>About</h3>
			
			<p>Warren Store adalah Toko penjualan baju pria berkualitas dan bermerk, selain baju terdapat celanja pria yang kami jual</p>
		</div>
		<div class="col-md-4 f_grid1 f_grid1">
			<h3>Follow Us</h3>
			<ul class="social">
				<li><a href=""> <i class="fb"> </i><p class="m_3">Facebook</p><div class="clearfix"> </div></a></li>
			    <li><a href=""><i class="tw"> </i><p class="m_3">Twittter</p><div class="clearfix"> </div></a></li>
				<li><a href=""><i class="google"> </i><p class="m_3">Google</p><div class="clearfix"> </div></a></li>
				<li><a href=""><i class="instagram"> </i><p class="m_3">Instagram</p><div class="clearfix"> </div></a></li>
			</ul>
		</div>
		<div class="col-md-4 f_grid1">
			<h3>Contact Info</h3>
			<ul class="list">
				<li><p>Telp/WA: 085277777</p></li>
				<li><p>Alama : Jl. </p></li>
			</ul>
			
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="footer_bottom">
       	<div class="container">
       		<div class="cssmenu">
				<ul>
					<li class="active"><a href="login.html">Developer By Nurmanyanti Mahi</a></li> .
					
				</ul>
			</div>
			<div class="copy">
			    <p>&copy;  <?php echo date(Y); ?> Warren Store</p>
		    </div>
		    <div class="clearfix"> </div>
       	</div>
</div>
<script src="admin/assets/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {

		//document.getElementById('p2').checked=false;
		//document.getElementById("single").style.display = "none";
		//document.getElementById("sembunyi").style.display = "none";

   //$("#ongkir").submit(function(e) {
     // e.preventDefault();
      
 // });
   $('#cek').on('click',function(){
   	var asal=$('#asal').val();
   	var tujuan=$('#tujuan').val();
   	var kurir=$('#kurir').val();
   		$.ajax({
   			type : "POST",
	          url: 'halaman/cek_ongkir.php',
	          type: 'post',
	          data: {asal:asal , tujuan:tujuan, kurir:kurir},
	          success: function(data) {
	            console.log(data);
	            document.getElementById("response_ongkir").innerHTML = data;
          	}
      	});
   });
});
function tampilkan() {
		var tes = document.getElementById("kurir").value;
        document.getElementById("nama_kurir").value=tes;
}
</script>
<script type="text/javascript">
function cwo(){
		if(p1.checked){
			var tes='Kurir';
			var sub_harga= document.getElementById("sub_harga").value ;
		 	document.getElementById('p2').checked=false;
			document.getElementById("single").style.display = "none";
		 	document.getElementById("sembunyi").style.display = "block";
			 var bilangan = sub_harga;

		 var	number_string = bilangan.toString(),
			 sisa 	= number_string.length % 3,
			 rupiah 	= number_string.substr(0, sisa),
			 ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
				 
		 if (ribuan) {
			 separator = sisa ? '.' : '';
			 rupiah += separator + ribuan.join('.');
		 }
			 document.getElementById("nama_kurir").value=tes;
			 document.getElementById("lay").value = 'COD';	
			 document.getElementById("tarif").value = '0';	
			 document.getElementById("hari").value = '0-1';
				 document.getElementById("total_bayar").value = 'Rp. ' + rupiah;
				 
		}else{
		 document.getEelementById('p1').checked=true;
 		}
 }
 function cwe(){
		if(p2.checked){
		 document.getElementById('p1').checked=false;
		 document.getElementById("single").style.display = "block";
		}else{
		 document.getElementById('p2').checked=true;
		}
 }

	$(function(){
		$(document).on('click', '.control', function(){
		 	$set = $(this).attr('data-set');
		 	var sub_harga= document.getElementById("sub_harga").value ;
		 	if($set == 'lihat'){
			   // ambil isi attribute data-nama dan data-alamat pada class control
			   $lay = $(this).attr('data-layanan');
			   $hari = $(this).attr('data-hari');
			   $tarif = $(this).attr('data-tarif');
			   $total=parseInt($tarif) + parseInt(sub_harga);
			   var	number_string = $total.toString(),
					sisa 	= number_string.length % 3,
					rupiah 	= number_string.substr(0, sisa),
					ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
						
				if (ribuan) {
					separator = sisa ? '.' : '';
					rupiah += separator + ribuan.join('.');
				}
					document.getElementById("lay").value = $lay;
			  	document.getElementById("tarif").value = $tarif;
			  	document.getElementById("hari").value = $hari;
			  	document.getElementById("total_bayar").value ='Rp. ' + rupiah;
		 			document.getElementById("sembunyi").style.display = "block";
			  	
			  }
		//$(document).on('click', '.edit_data', function(){
		//	var Row = document.getElementById("tblrow");
			//var Cells = Row.getElementsByTagName("td");
   
		   // alert(Cells[0].innerText);
		 
   			
		}); 
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	});
</script>
<script>
  $( document ).ready(function() {
  $('#kota_asal').select2({
    theme: 'bootstrap4',
     placeholder: 'Pilih kota/kabupaten asal',
     language: "id"
  });



    $.ajax({
      type: "GET",
      dataType: "html",
      url: "halaman/data-kota.php?q=kotaasal",
      success: function(msg){
      $("#kota_asal").html(msg);                                                     
      }
    });    
 

});
</script>

</body>
</html>		