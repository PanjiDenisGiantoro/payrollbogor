<?php session_start();?>
 <?php  include "halaman/admin/header.php";?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
  <?php
  if(!defined('inde')){
if(!isset($_SESSION['username']) && $_SESSION['password']){
  header('location:login.php');
}}
include "koneksi/koneksi.php";
     $tanggal = date('Ymd');
                      $sub1=substr($tanggal, 0,4);

                      $sub2=substr($tanggal, 4,2);

$bulan3 = ''."$sub1".'-'."$sub2".'-%';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="asset/AdminLTE-3.0.2/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SMA SIIHA BOGOR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="asset/AdminLTE-3.0.2/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
                  <p><font color='#fffff'><?php echo $_SESSION['username']; ?></font></p>
                    <a href="logout.php">Log out</a>  
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
       
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HOME</p>
                </a>
              </li>
            
            </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-person-add"></i>
              <p>
                Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="karyawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>data karyawan</p>
                </a>
              </li>
                  <li class="nav-item">
                <a href="karyawansecurity.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>karyawan Security</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="jabatan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jabatan</p>
                </a>
              </li>
             
            </ul>
          </li> -->
        </ul>
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-clipboard mr-1"></i>
              <p>
                Kehadiran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kehadiran.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>data kehadiran</p>
                </a>
              </li>
                  <li class="nav-item">
                <a href="kehadiransecurity.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>kehadiran Security</p>
                </a>
              </li>
             
            
            </ul>
          </li>
        </ul>
           <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th mr-1"></i>
              <p>
                data potongan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kasbon.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>kasbon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pinjaman.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>pinjaman</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="lain.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>pinjaman lain lain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="potongan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>potongan</p>
                </a>
              </li>
            </ul>
          </li> -->
        <!-- </ul> -->
           <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book mr-1"></i>
              <p>
                data tunjangan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tunjangan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>tunjangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tuntam.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>tunjangan tambahan</p>
                </a>
              </li>
            
            </ul>
          </li> -->
        <!-- </ul> -->
               <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <!--    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file-alt mr-1"></i>
              <p>
               hitung Gaji
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="gaji.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>gaji</p>
                </a>
              </li>
               -->
            
            <!-- </ul> -->
          <!-- </li> -->
        <!-- </ul> -->
                     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Absensi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="absensi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>absensi</p>
                </a>
              </li>
              
            
            </ul>
          </li>
        </ul>
              <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
       <!--   <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-pie-graph"></i>
              <p>
               setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="setting.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>setting dll</p>
                </a>
              </li>
              
            
            </ul>
          </li> -->
        <!-- </ul> -->
                   <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-stats-bars""></i>
              <p>
               lembur
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lemburumum.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>lembur umum</p>
                </a>
              </li>
                    <li class="nav-item">
                <a href="lemburkhusus.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>lembur khusus</p>
                </a>
              </li>
              
            
            </ul>
          </li> -->
        <!-- </ul> -->
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
               Resume Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="resume.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resume Umum</p>
                </a>
              </li>
                  <li class="nav-item">
                <a href="resumesecurity.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resume Security</p>
                </a>
              </li>
           <!--     <li class="nav-item">
                <a href="resumebagian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resume Perbagian</p>
                </a>
              </li> -->
            
              
            
            </ul>
          </li>
        </ul>
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-stats-bars"></i>
              <p>
               lembur
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lemburumum.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>lembur umum</p>
                </a>
              </li>
                    <li class="nav-item">
                <a href="lemburkhusus.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>lembur khusus</p>
                </a>
              </li>
              
            
            </ul>
          </li>
        </ul>
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-android-arrow-down"></i>
              <p>
              Add User 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="adduser.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            
              
            
            </ul>
          </li>
        </ul>
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-android-arrow-down"></i>
              <p>
              Pengaturan hari libur
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="libur.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hari libur</p>
                </a>
              </li>
            
              
            
            </ul>
          </li>
        </ul>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon ion ion-android-arrow-down"></i>
              <p>
              Document karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="document.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>document</p>
                </a>
              </li>
            
              
            
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->

        </div><!-- /.row -->

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

                include "koneksi/koneksi.php";
                $jumlah = mysqli_fetch_array(mysqli_query($konek,"select count(nama) as karyawan from karyawans"));
                $jumlah1 = mysqli_fetch_array(mysqli_query($konek,"select count(nama) as karyawan from karyawans where status='KONTRAK' "));

                $jumlah2 = mysqli_fetch_array(mysqli_query($konek,"select count(nama) as karyawan from karyawans where status='TETAP' "));
                ?>
                <h3><?php  echo $jumlah['karyawan'];?> orang</h3>

                <p>Karyawan TETAP (<b><?php echo $jumlah2['karyawan'];?></b>)</p>
                <p>Karyawan kontrak (<b><?php echo $jumlah1['karyawan'];?></b>)</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="karyawan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                   <?php

                include "koneksi/koneksi.php";
                $jumlah1 = mysqli_num_rows(mysqli_query($konek," SELECT DISTINCT departemen FROM karyawans"));
                ?>
                <h3><?php  echo $jumlah1;?> divisi</h3>

                <p>Jabatan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                   <?php

                include "koneksi/koneksi.php";
                $jumlah2 = mysqli_fetch_array(mysqli_query($konek,"select count(username) as username from admin where level='HRD'"));
                ?>
                <h3><?php  echo $jumlah2['username'];?> orang</h3>

                <p>HRD</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="adduser.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

         </section>
        </div>

        <div class="row">
             <section class="col-lg-6 connectedSortable">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">

                  <i class="ion ion-person-add"></i>
                  Selamat Datang 
                </h3>
                     <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
               <div class="card-body">
                <blockquote>
                  <p>Sekolah kflksfjklsjfskfjskdfjdkfjkj</p>
                  <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                </blockquote>
              </div>
              <!-- /.card-body -->
            </div>
          </section>
            <!-- /.card -->
        
                <section class="col-lg-6 connectedSortable">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">

                  <i class="ion ion-person-add"></i>
                  Jumlah Absensi bulan <?php echo $sub2?>
                </h3>
                     <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
               <div class="card-body">
                
<div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="ion ion-ios-refresh-empty"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <!-- <i class="ion ion-android-arrow-up text-success"></i> --> <?php 

                      $i = mysqli_fetch_array(mysqli_query($konek,"SELECT count(ket) as sakit from absens where ket='sakit' and tglAbsen  like '$bulan3'"));
                        echo $i['sakit'];
                      ?>
                    </span>
                    <span class="text-muted">Sakit</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <!-- <i class="ion ion-android-arrow-up text-warning"></i> --> <?php $k = mysqli_fetch_array(mysqli_query($konek,"SELECT count(ket) as izin from absens where ket='izin'and tglAbsen  like '$bulan3'"));
                        echo $k['izin'];
                      ?>
                    </span>
                    <span class="text-muted">Izin</span>
                  </p>
                </div>
                <!-- /.d-flex -->
      

              </div>
              <!-- /.card-body -->
            </div>
          </section>
            </div>
                    <div class="row">
             <section class="col-lg-6 connectedSortable">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">

                  <i class="ion ion-person-add"></i>
                  Libur bulan <?php echo $sub2?>
                </h3>
                     <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                       <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th align='center'>No</th>
                    <th align='center'>nama libur</th>
                    <th align='center'>awal libur </th>
                    <th align='center'>akhir libur</th>
                    <th align='center'>lama libur</th>
                </tr>
                </thead>
                <tbody>

<?php

$sql = mysqli_query($konek,"select  * from libur1 where tanggal like '$bulan3'");
$no=1;
while($d= mysqli_fetch_array($sql)){

$tgl1 = new DateTime("$d[tanggal]");
  $tgl2 = new DateTime("$d[akhir]");
  $d2 = $tgl2->diff($tgl1)->days+1;

  // echo var_dump($d2);die();
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[namal]</td>
<td align='center'>$d[tanggal]</td>
<td align='center'>$d[akhir]</td>
<td align='center'>$d2 Hari</td>
</tr>";
$no++;
}
?>
               
               
                </tfoot>
              </table>
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
              </div>
              <!-- /.card-body -->
            </div>
          </section>
            <!-- /.card -->
        
                <section class="col-lg-6 connectedSortable">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">

                  <i class="ion ion-person-add"></i>
                  Jumlah Absensi bulan <?php echo $sub2?>
                </h3>
                     <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>

  <?php 
        $tahun="";
        if (isset($_POST['search'])) {
            $tahun = $_POST['tahun'];
        }
  ?>

<form method="POST" action="">
              <div class="card-body">
              <div class="row">

                     <label for="tahun" class="form-label">Tahun</label>
                  
                       <select name="tahun"  class="form-control-sm form-control" style="width: auto;">
                        <option value="" selected="selected">-</option>
                        <?php
                        // query untuk menampilkan semua mata pelajaran dari tabel 
                        $query = "SELECT DISTINCT YEAR(tanggal) as tanggal FROM kehadirans";
                        $hasil = mysqli_query($konek,$query);
                        while ($data = mysqli_fetch_array($hasil))
                        {

                        echo "<option value='".$data['tanggal']."'>".$data['tanggal']."</option>";
                        }
                        ?>
                         </select>
                       <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                    <button id="search" name="search" class="btn btn-success"  >Cetak</button>
                </form>
              </div>
              </div>
            </div></div>
                       
            <div>
    <canvas id="myChart" class="chart" style="height: 30%;"></canvas>
</div>
<?php

$bulan3 = ''."$tahun".'-%-%';
    $conn = new mysqli('localhost', 'root', '', 'payrol');
    $sql = " SELECT DISTINCT MONTH(tanggal) as tag,COUNT(nama) as nama FROM kehadirans WHERE bolos=''AND tanggal LIKE '$bulan3' GROUP BY MONTH(tanggal)";

    $nama_pekerjaan = $conn->query($sql);
    $jumlah = $conn->query($sql);
?>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',        //Tipe tampilan grafik, sobat bisa menggunakan tampilan bar, pie, line, radar dan sebagainya
    data: {
        labels: [<?php while($b = mysqli_fetch_array($nama_pekerjaan)) { echo '"bulan ' . $b['tag'] . '",'; } ?>], //keterangan nama-nama label
        datasets: [{
            label: 'GRAFIK KEHADIRAN', //Judul Grafik
            data: [<?php while($a = mysqli_fetch_array($jumlah)) { echo $a['nama'] . ', '; } ?>], //Data Grafik
            backgroundColor: [
                'silver',  //Warna Background
                'purple', //Warna Background
                'green', //Warna Background
                'silver', //Warna Background
                'black', //Warna Background
                'yellow', //Warna Background
                'purple', //Warna Background
                'red', //Warna Background
                'black', //Warna Background
                'yellow', //Warna Background
                'blue', //Warna Background
                'brown' //Warna Background
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
              <!-- /.card-body -->
            </div>
          </section>
            </div>
          </div>


          <!-- ./col -->
  


</div>

</div>

 <?php  include "halaman/admin/footer.php";?>
 