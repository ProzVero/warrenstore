<?php 
  session_start();
  //error_reporting(0) ;
  include'../config/koneksi.php';
  include'../config/fungsi_tgl.php';
if (isset($_SESSION['id'])){
  $user=mysqli_query($koneksi,"SELECT * FROM tbl_admin where id_admin='$_SESSION[id]'");
    $dt=mysqli_fetch_array($user);
    $nama =  $dt['nama_admin'];
    $iduser=$dt['id_admin'];
  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator||warren store</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
   <link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

   <?php include 'halaman/nav.php'; ?>
  <!-- Main Sidebar Container -->
 <?php include 'halaman/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php 
        if (empty($_GET['hal'])) {
          include 'halaman/dashboard.php';
        } elseif($_GET['hal']=='barang') {
          include 'halaman/barang.php';        
        }elseif($_GET['hal']=='kategori') {
          include 'halaman/kategori.php';        
        }elseif($_GET['hal']=='ukuran') {
          include 'halaman/ukuran.php';        
        }elseif($_GET['hal']=='gambar') {
          include 'halaman/gambar.php';        
        }elseif($_GET['hal']=='pesanan') {
          include 'halaman/penjualan.php';        
        }elseif($_GET['hal']=='daftar_bank') {
          include 'halaman/bank.php';        
        }elseif($_GET['hal']=='data_warna') {
          include 'halaman/warna.php';        
        }
        
        
        
        
        

      ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-rc.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

 <script>
    $(function () {
      // Basic instantiation:
      $('#demo-input').colorpicker();
      
      $('#demo-input').on('colorpickerChange', 
    function(event) {
        $('#demo').css('background-color', event.color.toString());
      });
    });
  </script> 
</body>
</html>
<?php
}else{
  include'login_admin.php';
}
?>