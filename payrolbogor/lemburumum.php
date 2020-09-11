
 <?php  include "halaman/admin/header.php";?>
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
  <!-- Font Awesome -->
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/toastr/toastr.min.css">
  <!-- Font Awesome -->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

 <?php  include "halaman/admin/content.php";?>


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
            <h1>Lembur umum </h1>
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

  <section class="content">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Lembur umum Karyawan SIIHA</h3>
          
            </div>

            <table >
              <tr>
                <td>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Add Data</h5>
              </div>
              <div class="card-body">
              <a href="lemburumum.php?view=tambah" class="btn btn-primary" >Tambah Data Lembur umum Karyawan</a>


              </div>
            </div>
        </td>
      <!--   <td>
            <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Cetak Data</h5>
              </div>
              <div class="card-body">
                  <a href="laporankasbonall.php" class="btn btn-success" target="_blank" >cetak  Lembur umum keseluruhan</a>

             </div>
             </form>

           </div>
              </div>
          </div>
          </td> -->
          </tr>
          </table>
        </div>
      </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data  Lembur umum  SIIHA</h3>
          
            </div>
          <br>
            <!-- /.card-header -->
          
        
             
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th align='center'>No</th>
                    <th align='center'>Nama Karyawan</th>
                    <th align='center'>tglLembur</th>
                    <th align='center'>timeIn</th>
                    <th align='center'>timeOut</th>
                    <th align='center'>makan</th>
                    <th align='center'>keterangan</th>
                    <th align='center' style="width: 140px;">Aksi</th>  
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"SELECT * from lemburs");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[namaKaryawan]</td>
<td align='center'>$d[tglLembur]</td>
<td align='center'>$d[timeIn]</td>
<td align='center'>$d[timeOut]</td>
<td align='center'>$d[makan]</td>
<td align='center'>$d[keterangan]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fas fa-pencil-alt' href='lemburumum.php?view=edit&id=$d[id]' >edit</a>
<a class='btn btn-danger btn-sm fas fa-trash' href='aksi_lemburumum.php?act=del&id=$d[id]'>hapus</a>
</td>
</tr>";
$no++;
}
?>
               
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
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

  <?php
break;
case "tambah";  

$query = "SELECT max(id) as id FROM karyawans";
$hasil = mysqli_query($konek,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['id'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "K";
$kodeBarang = $char . sprintf("%03s", $noUrut);
?>
<?php
if(isset($_GET['e']) && $_GET['e']=='bl'){
 ?>
<div class="alert alert-danger" role="alert">
Peringatan<strong>Form Belum Lengkap</strong>
</div>


 <?php

}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>data lembur umum</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-10">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data lembur umum </h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
<form method="post" action="aksi_lemburumum.php?act=insert" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="nama" class=" form-control-label">Nama Karyawan</label>
                         <input  name="nama" id="nama" class="form-control"/></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="tgl" class=" form-control-label">Tanggal lembur umum</label>
        <input type="date"name="tgl" id="tgl"  class="form-control"  value="<?php echo date('Y-m-d') ?>"/>

                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="jammasuk" class=" form-control-label">jam masuk</label>
                       <input type="time" name="jammasuk" id="jammasuk" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label for="jamkeluar" class="form-control-label">jam keluar</label>
                       <input type="time" name="jamkeluar" id="jamkeluar" class="form-control"/>
                      </div>
                    </div>
                          <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="keterangan" class=" form-control-label">keterangan</label>
                     <textarea rows="2" class="form-control" id="keterangan" name="keterangan" >
              </textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <?php 
                           $bpjs = mysqli_query($konek,"select * from setting limit 1");
                      $bpjs1 =mysqli_fetch_array($bpjs);
                      $mkaan=$bpjs1['makan']; 

                        ?>
                         <label for="makan" class="form-control-label">makan</label>
                       <input type="text" name="makan" id="makan" class="form-control" value="<?php echo $mkaan;?>" />
                      </div>
                    </div>
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="lemburumum.php">kembali</a> 
                  </div>
                </form>
         
         
          <script>
$(function() {
  $( "#nama" ).autocomplete({
    source: 'aa.php'
  });
});
</script>

<?php
break;
case "edit";
$sqlEdit = mysqli_query($konek,"select * from lemburs where id='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
$query = "SELECT max(id) as id FROM karyawans";
$hasil = mysqli_query($konek,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['id'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "K";
$kodeBarang = $char . sprintf("%03s", $noUrut);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>pinjaman lain lain</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-10">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">edit Data pinjaman lain lain</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
         <form method="post" action="aksi_lemburumum.php?act=update" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="nama" class=" form-control-label">Nama Karyawan</label>
                         <input  name="nama" id="nama" class="form-control" value="<?php echo $e['namaKaryawan'];?>" /></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="tgl" class=" form-control-label">Tanggal lembur umum</label>
        <input type="date"name="tgl" id="tgl"  class="form-control"  value="<?php echo $e['tglLembur'] ?>"/>

                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="jammasuk" class=" form-control-label">jam masuk</label>
                       <input type="time" name="jammasuk" id="jammasuk" class="form-control" value="<?php echo $e['jammasuk'];?>"/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label for="jamkeluar" class="form-control-label">jam keluar</label>
                       <input type="time" name="jamkeluar" id="jamkeluar" class="form-control" value="<?php echo $e['jamkeluar'];?>"/>
                      </div>
                    </div>
                          <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="keterangan" class=" form-control-label">keterangan</label>
                     <textarea rows="2" class="form-control" id="keterangan" name="keterangan" ><?php echo $e['keterangan'];?>
              </textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label for="makan" class="form-control-label">makan</label>
                       <input type="text" name="makan" id="makan" class="form-control"value="<?php echo $e['makan'];?>"/>

                       <input type="text" name="makan" id="id" class="form-control"value="<?php echo $e['id'];?>" hidden="true"/>
                      </div>
                    </div>
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="lemburumum.php">kembali</a> 
                  </div>
                </form>
         
         
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
 <?php  include "halaman/admin/footer.php";?>

</body>
</html>
