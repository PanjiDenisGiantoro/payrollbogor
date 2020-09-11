
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
            <h1> Add User </h1>
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
              <h3 class="card-title">Data  User SIIHA</h3>
          
            </div>

            <table >
              <tr>
                <td>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Add User</h5>
              </div>
              <div class="card-body">
              <a href="adduser.php?view=tambah" class="btn btn-primary" >Tambah Data User Karyawan</a>


              </div>
            </div>
        </td>
       <!--  <td>
            <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Cetak Data</h5>
              </div>
              <div class="card-body">
                  <a href="laporankasbonall.php" class="btn btn-success" target="_blank" >cetak  pinjaman Lain lain  keseluruhan</a>

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
              <h3 class="card-title">Data  User SIIHA</h3>
          
            </div>
          <br>
            <!-- /.card-header -->
          
        
             
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th align='center'>No</th>
                    <th align='center'>UserName</th>
                    <th align='center'>Password</th>
                    <th align='center'>Nama Lengkap</th>
                    <th align='center'>Status</th>
                    <th align='center'>Email</th>
                    <th align='center' style="width: 100px;">Aksi</th>  
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"select * from admin");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[username]</td>
<td align='center'>$d[password]</td>
<td align='center'>$d[namalengkap]</td>
<td align='center'>$d[level]</td>
<td align='center'>$d[email]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fa fa-edit' href='adduser.php?view=edit&idadmin=$d[idadmin]' ></a>
<a class='btn btn-danger btn-sm fa fa fa-eraser' href='aksi_adduser.php?act=del&idadmin=$d[idadmin]'></a>
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
            <h1>data user</h1>
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
              <h3 class="card-title">Tambah Data user </h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
<form method="post" action="aksi_adduser.php?act=insert" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="username" class=" form-control-label">Username</label>
                         <input  name="username" id="username" class="form-control"/></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="password" class=" form-control-label">Password</label>
        <input type="text"name="password" id="password"  class="form-control" />
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="namaa" class=" form-control-label">Nama Lengkap</label>
                       <input type="text" name="namaa" id="namaa" class="form-control"/>
   
                      </div>
                    </div>
                        <div class="col-sm-6">
                                           <div class="form-group ">
                    <label for="level" class=" form-control-label">level</label>
                
                                         <select name="level" class="form-control"style="width: 60%;">
                      <option selected="selected">-pilih-</option>
                      <option value='HRD'> HRD </option>
                      <option value='Keuangan'> keuangan </option>
                      <option value='karyawan'> karyawan </option>
                      </select>
                    </div>
                  </div>
                        <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="email" class=" form-control-label">Email</label>
                       <input type="email" name="email" id="email" class="form-control"/>
   
                      </div>
                    </div>
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="adduser.php">kembali</a> 
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
$sqlEdit = mysqli_query($konek,"select * from admin where idadmin='$_GET[idadmin]'");
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
            <h1>user</h1>
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
              <h3 class="card-title">edit Data user</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
           <form method="post" action="aksi_adduser.php?act=update" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="username" class=" form-control-label">Username</label>
                         <input  name="username" id="username" class="form-control" value="<?php echo $e['username']; ?>"/></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="password" class=" form-control-label">Password</label>
        <input type="text"name="password" id="password"  class="form-control"  value="<?php echo $e['password']; ?>"/>
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="namaa" class=" form-control-label">Nama Lengkap</label>
                       <input type="text" name="namaa" id="namaa" class="form-control" value="<?php echo $e['namalengkap']; ?>"/>
   
                      </div>
                    </div>
                        <div class="col-sm-6">
                                           <div class="form-group ">
                    <label for="level" class="form-control-label">level</label>
                
                                         <select name="level" class="form-control"style="width: 60%;">
                            
                              <option value="HRD" <?php if($e['level']=='HRD'){echo "selected";} ?>  >HRD</option>
                              <option value="Keuangan" <?php if($e['level']=='Keuangan'){echo "selected";} ?>  >Keuangan</option>
                              <option value="karyawan" <?php if($e['level']=='karyawan'){echo "selected";} ?>  >karyawan</option>
                      </select>

                    </div>
                     <input type="text" name="id" id="id" class="form-control" value="<?php echo $e['idadmin']; ?>"hidden="true"/>
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="email" class=" form-control-label">Email</label>
                       <input type="text" name="email" id="email" class="form-control" value="<?php echo $e['email']; ?>"/>
   
                      </div>
                    </div>
                   
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="adduser.php">kembali</a> 
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
