
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
              <i class="nav-icon fas fa-th mr-1"></i>
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
                <a href="documentkaryawan.php" class="nav-link">
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