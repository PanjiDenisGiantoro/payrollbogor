
<?php session_start(); ?>
 <?php  include "halaman/HRD/header.php";?>
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
					<th align='center'>Tanggal kasbon</th>
          <th align='center'>Jumlah Kasbon</th>
          <th align='center'>Keterangan</th>
          <th align='center'>Status</th>
          <th align='center'>alasan</th>
					<th align='center' style="width: 100px;">Aksi</th>  
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"select * from kasbons ");
$no=1;
while($d= mysqli_fetch_array($sql)){
  if($d['status'] == 'false'){
    $stat= "belum disetujui";
  }else if($d['status'] == 'true'){
    $stat = "sudah disetujui";
  }else{
    $stat = "tidak disetujui";
  }
    if($d['status'] == 'tidak disetujui'){
    $stat1= $d['alasan'];
  }else if($d['status'] == 'true'){
    $stat1 = "OK";
  }else if($d['status'] == 'false'){
    $stat1 = "Tunggu";
}
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[namaKaryawan]</td>
<td align='center'>$d[tgl]</td>
<td align='center'>$d[jumlahKasbon]</td>
<td align='center'>$d[keterangan]</td>
<td align='center'>$stat</td>
<td align='center'>$stat1</td>
<td width='180px' align='center'>
<a class='btn btn-success btn-sm btn-sm' href='aksi_kasbon.php?act=ajukan&id=$d[id]'>disetujui</a>
<a class='btn btn-warning btn-sm btn-sm ' href='kasbon.php?view=edit&id=$d[id]'>tidak disetujui</a>


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
$sqlEdit = mysqli_query($konek,"select * from kasbons where id='$_GET[id]'");
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
<form action="aksi_kasbon.php?act=update" method="post" >
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      	 <label for="nama" class=" form-control-label">Nama Karyawan</label>
           				   <input type="text"name="nama" id="nama" value="<?php echo $e['namaKaryawan'] ?>" class="form-control" readonly/>
                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                      <label for="TanggalKasbon" class=" form-control-label">Tanggal Kasbon</label>
      				  <input type="date"name="TanggalKasbon" id="TanggalKasbon" value="<?php echo date('Y-m-d') ?>" class="form-control"readonly/>
                      </div>
                
                  </div>
                </div>
                       <div class="row">
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="jumlahKasbon" class=" form-control-label">jumlah Kasbon</label>
    			  <input type="number" name="jumlahKasbon" id="jumlahKasbon"value="<?php echo $e['jumlahKasbon'] ?>" class="form-control"readonly/>
 				
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="keterangan" class="form-control-label">Keterangan</label>
                  <textarea rows="2" class="form-control" id="keterangan" name="keterangan" readonly><?php echo $e['keterangan'] ?>

                  </textarea>
                      </div>
                    </div>
                   </div>

                  
              <input class="form-control" id="status" name="status" value="Tidak disetujui" hidden="true"/>
              <input class="form-control" id="id" name="id" value="<?php echo $e['id']?>"hidden="true"/>
                       <div class="row">
                          <div class="col-sm-6">
                      <div class="form-group">
                       <label for="alasan" class="form-control-label">Tidak Disetujui</label>
                  <textarea rows="2" class="form-control" id="alasan" name="alasan"><?php echo $e['alasan'] ?>
                  </textarea>
                </div>
              </div>
            </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('are you sure ?')">Submit</button>
              
                    <a class="btn btn-danger" href="kasbon.php">kembali</a> 
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
 <?php  include "halaman/HRD/footer.php";?>


</body>
</html>
