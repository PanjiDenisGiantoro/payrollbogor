 
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
       <!--        <li class="nav-item">
                <a href="jabatan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jabatan</p>
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
            </ul> -->
          <!-- </li> -->
        <!-- </ul> -->
           <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true"> -->
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   <!--       <li class="nav-item has-treeview">
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
            
            </ul> -->
          <!-- </li> -->
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
              
            
            </ul>
          </li> -->
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
        <!--  <li class="nav-item has-treeview">
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
     <!--     <li class="nav-item has-treeview">
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
               Resume Perorang
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
        <!--        <li class="nav-item">
                <a href="resumebagian.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resume Perbagian</p>
                </a>
              </li>
             -->
              
            
            </ul>
          </li>
        </ul>
                     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview">
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
  