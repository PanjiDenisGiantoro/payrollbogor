 <?php  include "halaman/HRD/header.php";?>
 <?php
session_start();

include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="themes/default/easyui.css"/>
        <link rel="stylesheet" type="text/css" href="themes/icon.css"/>
        <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="js/datagrid-filter.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
  <script type="text/javascript" src="dist/Chart.js"></script>
  <!-- Font Awesome -->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

 <?php  include "halaman/HRD/content.php";?>


<?php 
$view =isset($_GET['view']) ? $_GET['view'] :null;
switch ($view) {
default:
?>
 <?php
if(isset($_GET['e']) && $_GET['e']=='sukses'){
?>
<div class="alert alert-success" role="alert" style="margin-top: 30px">

   <button type="button" class="btn btn-success swalDefaultSuccess">
                  Launch Success Toast
                </button>
Selamat <strong>Proses Berhasil</strong>
</div>

<?php
}else if(isset($_GET['e']) && $_GET['e']=='gagal'){
?>
<div class="alert alert-danger" role="alert"  style="margin-top: 30px">
Error <strong>Proses Gagal</strong>
</div>

<?php
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Resume Bagian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <div class="card card-info" >
              <div class="card-header">
                <h3 class="card-title">Gaji Keseluruhan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="cetakgajikeseluruhan.php" >
                <div class="card-body" align="center">
                  <div class="form-group">
                                      <label for="bulan" class="col-sm-2 col-form-label">bulan</label>
                    <div class="col-sm-10">
                    	                  <select name="bulan" class="form-control" style="width: auto;">
                      <option selected="selected">-pilih-</option>
                      <option value='01'> Januari </option>
                      <option value='02'> Februari </option>
                      <option value='03'> Maret </option>
                      <option value='04'> April </option>
                      <option value='05'> Mei </option>
                        <option value='06'> Juni </option>
                      <option value='07'> Juli </option>
                      <option value='08'> Agustus </option>
                      <option value='09'> September </option>
                      <option value='10'> Oktober </option>
                      <option value='11'> November </option>
                      <option value='12'> Desember </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="tahun" class="col-sm-2 col-form-label">tahun</label>
                    <div class="col-sm-10">
                    <select name="tahun"  class="form-control-sm form-control"  style="width:auto">
                        <option value="" selected="selected">-</option>
                        <?php
                        // query untuk menampilkan semua mata pelajaran dari tabel 
                        $query = "SELECT DISTINCT YEAR(tglBuat) as tanggal FROM head_gajis";
                        $hasil = mysqli_query($konek,$query);
                        while ($data = mysqli_fetch_array($hasil))
                        {
                        echo "<option value='".$data['tanggal']."'>".$data['tanggal']."</option>";
                        }
                        ?>
                         </select>
                    </div>
                  </div>
           
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                 <center> <button type="submit"  id="search" name="search" class="btn btn-info"  >cetak</button></center>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>


<?php
break;
}
?>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 <?php  include "halaman/HRD/footer.php";?>

</body>
</html>
