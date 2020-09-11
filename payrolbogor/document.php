
<?php session_start(); ?>
 <?php  include "halaman/admin/header.php";?>
 <?php include "koneksi/koneksi.php";
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
            <h1>Karyawan</h1>
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
        <div class="col-12">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Karyawan SIIHA</h3>
          
            </div>
           <br>
            
            <!-- /.card-header -->
          
        
             
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th align='center'>No</th>
					<th align='center'>Nama Karyawan</th>
					<th align='center'>KK</th>
          <th align='center'>KTP</th>
          <th align='center'>Foto Diri</th>
          <th align='center'>Tabungan ATM</th>
					<th align='center' style="width: 180px;">Aksi</th>  
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"select * from documentkaryawan ");
$no=1;
while($d= mysqli_fetch_array($sql)){

echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[namaKaryawan]</td>
<td align='center'><img src='uploaddocumen/".$d['KK']."' width='100' height='100'></td>
<td align='center'><img src='uploaddocumen/".$d['KTP']."' width='100' height='100'></td>
<td align='center'><img src='uploaddocumen/".$d['foto']."' width='100' height='100'></td>
<td align='center'><img src='uploaddocumen/".$d['tabungan']."' width='100' height='100'></td>
<td width='180px' align='center'>
<a class='btn btn-warning btn-sm btn-sm ' href='document.php?view=edit&id=$d[id]'>Lihat</a>
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
            <h1>data kasbon</h1>
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
              <h3 class="card-title">Tambah Data kasbon </h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="aksi_kasbon.php?act=insert">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                            <label>Nama Karyawan</label>
                      <input  name="nama" id="nama" class="form-control"/></td>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                      <label for="TanggalKasbon" class=" form-control-label">Tanggal Kasbon</label>
      				  <input type="date"name="TanggalKasbon" id="TanggalKasbon" value="<?php echo date('Y-m-d') ?>" class="form-control"/>
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="jumlahKasbon" class=" form-control-label">jumlah Kasbon</label>
    			  <input type="number" name="jumlahKasbon" id="jumlahKasbon" class="form-control"/></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="keterangan" class="form-control-label">Keterangan</label>
                  <textarea rows="2" class="form-control" id="keterangan" name="keterangan" style="width: 400px">
                  </textarea>
                      </div>
                    </div>
                   
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="kasbon.php">kembali</a> 

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
$sqlEdit = mysqli_query($konek,"select * from documentkaryawan where id='$_GET[id]'");
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
            <h1>kasbon</h1>
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
              <h3 class="card-title">edit Data kasbon</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<form action="editgalery.php" method="post">  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                                 <div class="row">
                    <div class="col-sm-6">
                  <div class="form-group ">
                    <label for="nama" >nama</label>
             
                      <input type="text" class="form-control"name="nama" id="nama" placeholder="nama"  value="<?php echo $e['namaKaryawan'];?>" readonly>
                    </div>
                  </div>
                    <div class="col-sm-6">
                 <div class="form-group ">
                 <!--    <label for="namajabatan">jabatan</label>
                      <input type="text" class="form-control"name="namajabatan" id="namajabatan" placeholder="namajabatan"  > -->
                    </div>
                  </div>
                </div>
              <table border="1" class="table table-bordered table-striped">
                  <tr>
                    <td>KK</td>
                    <td>KTP</td>
                  </tr>
                  <tr>
                    <td>
                       <img src="uploaddocumen/<?php echo $e['KK']; ?>" style="width: 250px">
                    </td>
                    <td>
                       <img src="uploaddocumen/<?php echo $e['KTP']; ?>" style="width: 250px">
                    </td>
                  </tr>
                  <tr>
                  <td>foto diri</td>
                  <td>Tabungan ATM</td>
                  </tr>
                    <tr>
                    <td>
                       <img src="uploaddocumen/<?php echo $e['foto']; ?>" style="width: 250px">
                    </td>
                    <td>
                       <img src="uploaddocumen/<?php echo $e['tabungan']; ?>" style="width: 250px">
                    </td>
                  </tr>
              </table>
                  </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                    <!-- <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-primary"/> -->
                    <a class="btn btn-danger" href="document.php">kembali</a> 
              
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
