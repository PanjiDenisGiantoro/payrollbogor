<?php

  session_start();
    if(!defined('ook')){
  if(!isset($_SESSION['username'])){
  header('location:login.php');
}}
?>

 <?php  include "halaman/karyawan/header.php";?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="ok.php" class="brand-link">
      <img src="asset/AdminLTE-3.0.2/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SMA STIFFIN BOGOR</span>
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
          <?php
                                    include "koneksi/koneksi.php";


         ?>

                  <p><font color='#fffff'><?php echo $_SESSION['username']; ?></font></p>
                    <a href="logout.php">Log out</a>  
                     
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Pengajuan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kasbonkaryawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>kasbon</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="pinjamankaryawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pinjaman</p>
                </a>
              </li>
                  <li class="nav-item">
                <a href="lainkaryawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pinjaman lain lain</p>
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
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Lihat Gaji
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="gajikaryawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gaji</p>
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
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Document 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="gajikaryawan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan BPJS</p>
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
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="asset/AdminLTE-3.0.2/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                <?php 
                $ko = mysqli_fetch_array(mysqli_query($konek,"select * from admin a join karyawans b on a.namalengkap = b.nama where a.username='$_SESSION[username]'"));

                ?>
                <h3 class="profile-username text-center"><?php echo $ko['namalengkap'];?></h3>

                <p class="text-muted text-center"><?php echo $ko['departemen'];?></p>

         
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Yayasan SIIHA</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                  <li class="nav-item"><a class="nav-link" href="#settings" >Saran</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

              
  <form method="post"  action="aksi_saran.php?act=insert"  enctype="multipart/form-data" class="form-horizontal">
                      <div class="form-group row">
                        <label for="namaa" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <?php 
                            $d = mysqli_fetch_array(mysqli_query($konek,"select namalengkap from admin where username='$_SESSION[username]'"));
                            $nama= mysqli_fetch_array(mysqli_query($konek,"select namaKaryawan from pinjamen where namaKaryawan='$d[namalengkap]'"));
                            ?>
                      <input  name="namaa" id="namaa" class="form-control"value="<?php echo $d['namalengkap'];?>"  readonly/></td>
                        </div>
                      </div>
                   
                      <div class="form-group row">
                        <label for="saran" class="col-sm-2 col-form-label">Saran</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="saran" id="saran"  placeholder="saran"></textarea>
                        </div>
                      </div>
                  
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>

 <?php  include "halaman/karyawan/footer.php";?>