
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
            <h1> Setting  </h1>
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
              <h3 class="card-title">Data  setting  SIIHA</h3>
          
            </div>
          <br>
            <!-- /.card-header -->
          
        
             
      <div class="col-12 table-responsive">
               <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th align='center'>No</th>
                    <th align='center'>zakat</th>
                    <th align='center'>makan</th>
                    <th align='center'>transport</th>
                    <th align='center'>bpjs kesehatan(lembaga)</th>
                    <th align='center'>bpjs kesehatan(karyawan)</th>
                    <th align='center'>bpjs ketenagakerjaan(lembaga)</th>
                    <th align='center'>bpjs ketenagakerjaan(karyawan)</th>
                    <th align='center'>keluarga</th>
                    <th align='center'>bolos</th>
                     <th align='center'>UMK</th>
                     <th align='center'>lembur umum</th>
                     <th align='center'>Pinjaman</th>
                     <th align='center'>email</th>
                     <th align='center'>password</th>
                    <th align='center' style="width: 100px;">Aksi</th>  
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"SELECT * from setting");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[zakat]</td>
<td align='center'>$d[makan]</td>
<td align='center'>$d[transport]</td>
<td align='center'>$d[bpjskeslembaga]</td>
<td align='center'>$d[bpjskeskaryawan]</td>
<td align='center'>$d[bpjsketlembaga]</td>
<td align='center'>$d[bpjsketkaryawan]</td>
<td align='center'>$d[keluarga]</td>
<td align='center'>$d[bolos]</td>
<td align='center'>$d[UMK]</td>
<td align='center'>$d[lemburumum]</td>
<td align='center'>$d[pinjaman]</td>
<td align='center'>$d[email]</td>
<td align='center'>$d[password]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fas fa-pencil-alt' href='setting.php?view=edit&id=$d[id]' >edit</a>
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
                
<form method="post" action="aksi_lain.php?act=insert" class="form-horizontal">
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
                     <label for="tgl" class=" form-control-label">Tanggal Potongan lain lain</label>
        <input type="date"name="tgl" id="tgl"  class="form-control"  value="<?php echo date('Y-m-d') ?>"/>

                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="jumlah" class=" form-control-label">jumlah Potongan lain lain</label>
                       <input type="number" name="jumlah" id="jumlah" class="form-control"/>
   
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label for="keterangan" class="form-control-label">Keterangan</label>
              <textarea rows="2" class="form-control" id="keterangan" name="keterangan" >
              </textarea>
                      </div>
                    </div>
                   
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="pinjaman.php">kembali</a> 
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
$sqlEdit = mysqli_query($konek,"select * from setting where id='$_GET[id]'");
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
            <h1>Setting</h1>
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
              <h3 class="card-title">edit Data Setting</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
            
<form method="post" action="aksi_setting.php?act=update" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="zakat" class=" form-control-label">zakat</label>
                         <input type="number" name="zakat" id="zakat" class="form-control" value="<?php echo $e['zakat']?>" /></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="makan" class=" form-control-label">makan</label>
        <input type="number"name="makan" id="makan"  class="form-control" value="<?php echo $e['makan']?>"/>

                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="bolos" class=" form-control-label">bolos</label>
                       <input type="number" name="bolos" id="bolos" class="form-control"value="<?php echo $e['bolos']?>"/>
                      </div>
                    </div>
                  

                <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="transport" class=" form-control-label">transport</label>
                       <input type="number" name="transport" id="transport" class="form-control"value="<?php echo $e['transport']?>"/>
   
                      </div>
                    </div>
              
                           <div class="col-sm-6">
                      <div class="form-group">
                     <label for="Keluarga" class=" form-control-label">Keluarga</label>
        <input type="number"name="Keluarga" id="Keluarga"  class="form-control" value="<?php echo $e['keluarga']?>"/>

                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="UMK" class=" form-control-label">UMK</label>
                       <input type="number" name="UMK" id="UMK" class="form-control"value="<?php echo $e['UMK']?>"/>
                      </div>
                    </div>
                         <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="lembur" class=" form-control-label">lembur</label>
                       <input type="number" name="lembur" id="lembur" class="form-control"value="<?php echo $e['lemburumum']?>"/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="bpjskeskaryawan" class=" form-control-label">BPJS KESEHATAN (Karyawan)</label>
        <input type="text"name="bpjskeskaryawan" id="bpjskeskaryawan"  class="form-control" value="<?php echo $e['bpjskeskaryawan']?>"/>

                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="bpjskeslembaga" class=" form-control-label">BPJS KESEHATAN (lembaga)</label>
                       <input type="text" name="bpjskeslembaga" id="bpjskeslembaga" class="form-control"value="<?php echo $e['bpjskeslembaga']?>"/>
                      </div>
                    </div>
                  
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="bpjsketkaryawan" class=" form-control-label">BPJS KETENAGAKERJAAN (Karyawan)</label>
        <input type="text"name="bpjsketkaryawan" id="bpjsketkaryawan"  class="form-control" value="<?php echo $e['bpjsketkaryawan']?>"/>

                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="bpjsketlembaga" class=" form-control-label">BPJS KETENAGAKERJAAN (lembaga)</label>
                       <input type="text" name="bpjsketlembaga" id="bpjsketlembaga" class="form-control"value="<?php echo $e['bpjsketlembaga']?>"/>
                      </div>

                       <input type="text" name="id" id="id" class="form-control"value="<?php echo $e['id']?>" hidden="true"/>
                    </div>
                             <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        
                      <label for="pinjaman" class=" form-control-label">Pinjaman</label>
                       <input type="text" name="pinjaman" id="pinjaman" class="form-control"value="<?php echo $e['pinjaman']?>"/>
                      </div>

                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        
                      <label for="email" class=" form-control-label">email</label>
                       <input type="email" name="email" id="email" class="form-control"value="<?php echo $e['email']?>"/>
                      </div>

                    </div>
                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        
                      <label for="password" class=" form-control-label">password</label>
                       <input type="text" name="password" id="password" class="form-control"value="<?php echo $e['password']?>"/>
                      </div>

                    </div>

                         
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="setting.php">kembali</a> 
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
