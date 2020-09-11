
 <?php  include "halaman/HRD/header.php";?>
  <?php
session_start();
  if(!defined('inde1')){
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
}
include "koneksi/koneksi.php";
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index1.php" class="brand-link">
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
                <a href="index1.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HOME</p>
                </a>
              </li>
            
            </ul>
        <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     <!--     <li class="nav-item has-treeview">
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
                <a href="jabatan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jabatan</p>
                </a>
              </li>
             
            </ul>
          </li> -->
        <!-- </ul> -->
         <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  <!--        <li class="nav-item has-treeview">
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
             
             -->
            <!-- </ul> -->
          <!-- </li> -->
        <!-- </ul> -->
       
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
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
          </li>
        </ul>
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
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
          </li>
        </ul>
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
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
              <li class="nav-item">
                <a href="gajikeseluruhan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>gaji keseluruhan</p>
                </a>
              </li>
            
            </ul>
          </li>
        </ul>
                     <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     <!--     <li class="nav-item has-treeview">
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
          </li> -->
        <!-- </ul> -->
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
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
          </li>
        </ul>
            
                        <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <!--    <li class="nav-item has-treeview">
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
                  <p>Resume Perorang</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="resume.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resume Perbagian</p>
                </a>
              </li>
             -->
              
            
            <!-- </ul> -->
          <!-- </li> -->
        <!-- </ul> -->
             <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
       <!--   <li class="nav-item has-treeview">
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
          </li> -->
        <!-- </ul> -->
           <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <!--    <li class="nav-item has-treeview">
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
            
              
             -->
            <!-- </ul> -->
          <!-- </li> -->
        <!-- </ul> -->
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
                $jumlah = mysqli_fetch_array(mysqli_query($konek,"select UMK as karyawan from setting"));
                ?>
                <h3><?php  echo $jumlah['karyawan'];?> </h3>

                <p>UMK</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="setting.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                   <?php

                include "koneksi/koneksi.php";
               $jumlah1 = mysqli_fetch_array(mysqli_query($konek," SELECT email FROM setting"));
                ?>
                <h5><?php  echo $jumlah1['email'];?> </h5>

                <p>email</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
          
          </div>
          <!-- ./col -->
       <!--  -->
          <section class="col-lg-6 connectedSortable">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-person-add"></i>
                  Pengajuan Karyawan
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
               <div class="info-box mb-3 bg-purple" style="width: 90%;">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                  <?php

                include "koneksi/koneksi.php";
                $kasbon = mysqli_fetch_array(mysqli_query($konek,"select count(namaKaryawan) as karyawan from kasbons where status='false'"));
                ?>
                <span class="info-box-text">Pengajuan Kasbon (belum disetujui)</span>
                <span class="info-box-number"><?php  echo $kasbon['karyawan'];?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success" style="width: 90%;">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>
  <?php

                include "koneksi/koneksi.php";
                $pinjam = mysqli_fetch_array(mysqli_query($konek,"select count(namaKaryawan) as karyawan from pinjamen where status='false'"));
                ?>
              <div class="info-box-content">
                <span class="info-box-text">Pengajuan pinjaman (belum disetujui)</span>
                <span class="info-box-number"><?php  echo $pinjam['karyawan'];?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info" style="width: 90%;">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>
               <?php

                include "koneksi/koneksi.php";
                $lain = mysqli_fetch_array(mysqli_query($konek,"select count(namaKaryawan) as karyawan from lainlains where status='false'"));
                ?>
              <div class="info-box-content">
                <span class="info-box-text">Pengajuan pinjaman (belum disetujui)</span>
                <span class="info-box-number"><?php  echo $lain['karyawan'];?> </span>
              </div>
            </div>
            
          </section>

           <section class="col-lg-6 connectedSortable">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">BPJS </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                    </div>
                    <div class="product-info">
                           <?php

                include "koneksi/koneksi.php";
                $kasbon23 = mysqli_fetch_array(mysqli_query($konek,"select *  from setting "));
                ?>
                      <a href="javascript:void(0)" class="product-title">BPJS Kesehatan (karyawan)
                        <span class="badge badge-warning float-right"><?php echo $kasbon23['bpjskeskaryawan'];?> %</span></a>
                      <span class="product-description">
                        <?php echo $kasbon23['bpjskeskaryawan'] *  $kasbon23['UMK'];?>
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">BPJS Kesehatan (lembaga)
                        <span class="badge badge-info float-right"><?php echo $kasbon23['bpjskeslembaga'];?>%</span></a>
                      <span class="product-description">
                        <?php echo $kasbon23['bpjskeslembaga'] *  $kasbon23['UMK'];?>
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">
                        BPJS Ketenagakerjaan (lembaga) <span class="badge badge-danger float-right">
                        <?php echo $kasbon23['bpjsketlembaga'];?>%
                      </span>
                      </a>
                      <span class="product-description">
                        <?php echo $kasbon23['bpjsketlembaga'] *  $kasbon23['UMK'];?>
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">   BPJS Ketenagakerjaan (karyawan)
                        <span class="badge badge-success float-right"><?php echo $kasbon23['bpjsketkaryawan'];?>%</span></a>
                      <span class="product-description">

                        <?php echo $kasbon23['bpjsketkaryawan'] *  $kasbon23['UMK'];?>
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                </ul>
              </div>

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
            <!-- /.card -->
          </section>
          

        </div>


          <!-- ./col -->
        </div>

      </div><!-- /.container-fluid -->


    </div>


</div>
</section>

</div>

 <?php  include "halaman/HRD/footer.php";?>
 