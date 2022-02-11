 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 <a href="" style="font-size: 14px;"></a>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $query= mysqli_query($koneksi,"SELECT COUNT(id_penjualan) as juml FROM tbl_penjualan WHERE keterangan='Belum diproses'");
                  $data=mysqli_fetch_array($query);
                ?>
                <h3><?php echo $data['juml'];?></h3>
                <p>Data Pesanan Belum diproses</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="?hal=pesanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                  $query1= mysqli_query($koneksi,"SELECT COUNT(id_barang) as juml FROM tbl_barang");
                  $data1=mysqli_fetch_array($query1);
                ?>
                <h3><?php echo $data1['juml'];?></h3>
                <p>Total Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?hal=barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                  $query2= mysqli_query($koneksi,"SELECT COUNT(id_kategori) as juml FROM tbl_kategori");
                  $data2=mysqli_fetch_array($query2);
                ?>
                <h3><?php echo $data2['juml'];?></h3>
                <p>Total Kategori</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="?hal=kategori" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-lightblue">
              <div class="inner">
              <?php
                  $query2= mysqli_query($koneksi,"SELECT COUNT(id_penjualan) as juml FROM tbl_penjualan");
                  $data2=mysqli_fetch_array($query2);
                ?>
                <h3><?php echo $data2['juml'];?></h3>
                <p>Total Pesanan</p>
              </div>
              <div class="icon">
            
                <i class="far fa-sun"></i>
              </div>
              <a href="?hal=pesanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->