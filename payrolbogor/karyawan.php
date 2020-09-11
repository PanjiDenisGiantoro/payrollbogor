
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

  <section class="content">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Karyawan SIIHA</h3>
          
            </div>

            <table >
              <tr>
                <td>

        </td>
        <td>
            <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Import Data</h5>
              </div>
              <div class="card-body">
                 <div class="custom-file">
               
                <?php 
              include 'koneksi/koneksi.php';
              ?>
               
              <form method="post" enctype="multipart/form-data" action="upload_aksi.php">
                Pilih File: 
                <input name="filepegawai" type="file" required="required"> 
                <input name="upload" type="submit" value="Import">
              </form>

             </div>
             </form>

           </div>
              </div>
          </div>
          </td>
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
              <h3 class="card-title">Data Karyawan SIIHA</h3>
          
            </div>
          <br>

  <?php 
        if (isset($_POST['search'])) {
            $bagian = $_POST['bagian'];
        }
  ?>
          <div class="card" style="width: 50%">
             <div class="col-md-6">
            <!-- general form elements -->
              <div class="card-header">
                <h3 class="card-title">Filter Per bagian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
  <form method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="bagian">Email address</label>
                    <select name="bagian"  class="form-control-sm form-control">
                        <option value="" selected="selected">-</option>
                        <?php
                        // query untuk menampilkan semua mata pelajaran dari tabel 
                        $query = "SELECT DISTINCT departemen as departemen FROM karyawans";
                        $hasil = mysqli_query($konek,$query);
                        while ($data = mysqli_fetch_array($hasil))
                        {
                        echo "<option value='".$data['departemen']."'>".$data['departemen']."</option>";
                        }
                        ?>
                         </select>
                  </div>
             
           
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                 <button id="search" name="search" class="btn btn-primary"  >Submit</button>
               </div>
              </form>
            </div>
            </div>
            <!-- /.card-header -->
          
        
             
      <div class="col-12 table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th align='center'>No</th>
                    <th align='center'>no akun</th>
                    <th align='center'>nama</th>
                    <th align='center'>kelamin</th>
                    <th align='center'>gelar</th>
                    <th align='center'>no ponsel</th>
                    <th align='center'>tanggal lahir</th>
                    <th align='center'>tanggal bekerja</th>
                    <th align='center'>alamat rumah</th>
                    <th align='center'>departemen</th>
                    <th align='center'>keluarga</th>
                    <th align='center'>status</th>
                    <th align='center'>lama kerja</th>

                    <th align='center'>BPJS kesehatan (karyawan)</th>
                    <th align='center'>BPJS Kesehatan (lembaga)</th>
                    <th align='center'>BPJS ketenagakerjaan (karyawan)</th>
                    <th align='center'>BPJS Ketenagakerjaan (lembaga)</th>
                    <th align='center' colspan="3" style="width: auto;">Aksi</th>
                </tr>
                </thead>
                <tbody>
              
<?php

if(isset($_POST['search'])){

$sql = mysqli_query($konek,"select * from karyawans where departemen = '$bagian'");
}else{
  $sql = mysqli_query($konek,"select * from karyawans");
}
$no=1;
$da = date('Y')+1;
$tang= date('Y-m-d');
function datediff($tgl1, $tgl2){
$tgl1 = strtotime($tgl1);
$tgl2 = strtotime($tgl2);
$diff_secs = abs($tgl1 - $tgl2);
$base_year = min(date("Y", $tgl1), date("Y", $tgl2));
$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
}
while($d= mysqli_fetch_array($sql)){


$tang= date('Y-m-d');
 $bulan=substr($d['mulai_bekerja'],-5,-3);
 $tanggal=substr($d['mulai_bekerja'],8,2);

$datee= ''."$da".'-'."$bulan".'-'."$tanggal".'';

$tgl1 = $d['mulai_bekerja'];
$tgl2 = date("Y/m/d/ h:m:s");
$a = datediff($tgl1, $tgl2);
if($d['status']=='KONTRAK'){
  $lama="$a[months] bulan ($datee)"  ;
}else if($d['status']=='TETAP'){
$lama =  $datee;
}else if($d['status']==''){
$lama = "";
}
echo 
"<tr>
          <td width='40px' align='center'>$no</td>
          <td align='center'>$d[noakun]</td>
          <td align='center'>$d[nama]</td>
          <td align='center'>$d[kelamin]</td>
          <td align='center'>$d[gelar]</td>
          <td align='center'>$d[no_ponsel]</td>
          <td align='center'>$d[tanggallahir]</td>
          <td align='center'>$d[mulai_bekerja]</td>
          <td align='center'>$d[alamat_rumah]</td>
          <td align='center'>$d[departemen]</td>
          <td align='center'>$d[keluarga]</td>
          <td align='center'>$d[status]</td>
          <td align='center'>$lama  </td>
          <td align='center'>$d[bpjsKeslembaga]</td>
          <td align='center'>$d[bpjsKeskaryawan]</td>
          <td align='center'>$d[bpjsKetlembaga]</td>
          <td align='center'>$d[bpjsKetkaryawan]</td>
          <td width='2px'align='center'>
<a class='btn btn-warning btn-sm fas fa-pencil-alt' href='karyawan.php?view=edit&id=$d[id]'>edit</a></td>
<td width='2px' ><a class='btn btn-danger btn-sm fas fa-trash' href='aksi_karyawan.php?act=del&id=$d[id]'>hapus</a></td>

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
        <div class="col-10">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Karyawan</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" name="nama" placeholder="Masukkan Nama Karyawan"  class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>kelamin</label>

                    <input type="number" name="kelamin" placeholder="Masukkan kelamin"  class="form-control">
                    
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Jabatan</label>
                    
                   <input type="number" name="Jabatan" placeholder="Masukkan Jabatan"  class="form-control">
                    
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>nomor telepon</label>
                       
                        <input type="number" name="nomor" placeholder="Masukkan no telp"  class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tanggal Lahir</label>

                      <input type="date" name="notelp" placeholder="Masukkan no telp"  class="form-control">
                     
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                        <label>Tanggal Masuk</label>
                
                        <input type="date" name="tglMasuk"  placeholder="Masukkan Tanggal Masuk Anda" class="form-control float-right" >
                      </div>
                
                  </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                        <label>Tanggal bekerja</label>
                
                        <input type="text" name="bekerja"  placeholder="Masukkan bekerja" class="form-control float-right" >
                      </div>
                
                  </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                        <label>Alamat Rumah</label>
                
                        <input type="text" name="alamat"  placeholder="Masukkan alamat" class="form-control float-right" >
                      </div>
                
                  </div>
                     <div class="col-sm-6">
                      <div class="form-group">


                        <label>Tanggal Masuk</label>
                
                        <input type="date" name="tglMasuk"  placeholder="Masukkan Tanggal Masuk Anda" class="form-control float-right" >
                      </div>
                
                  </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                        <label>Departemen</label>
                
                        <input type="text" name="tglMasuk"  placeholder="Masukkan Tanggal Masuk Anda" class="form-control float-right" >
                      </div>
                
                  </div>
                </div>

                <br>
                  <div class="col-sm-6">
                      <div class="form-group">

                        <label>Keluarga</label>
                
                        <input type="number" name="Keluarga"  placeholder="Masukkan Keluarga" class="form-control float-right" >
                      </div>
                
                  </div>
                 
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="karyawan.php">kembali</a> 
                  </div>
                </form>
         
         
          
<?php
break;
case "edit";
$sqlEdit = mysqli_query($konek,"select * from karyawans where id='$_GET[id]'");
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
        <div class="col-10">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Karyawan</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <form action="aksi_karyawan.php?act=kel" method="post" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" name="nama" placeholder="Masukkan Nama Karyawan"  class="form-control" value="<?php echo $e['nama'];?>"readonly>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>kelamin</label>

                   <select name="kelamin"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
                     <option value="pria">pria</option>
                     <option value="wanita">wanita</option>
                      </select>     </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>gelar</label>
                    
                   <input type="text" name="Jabatan" placeholder="Masukkan Jabatan"  class="form-control"value="<?php echo $e['gelar'];?>">
                    
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>nomor telepon</label>
                       
                        <input type="number" name="nomor" placeholder="Masukkan no telp"  class="form-control"value="<?php echo $e['no_ponsel'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tanggal Lahir</label>

                      <input type="date" name="notelp" placeholder="Masukkan no telp"  class="form-control"value="<?php echo $e['tanggallahir'];?>">
                     
                      </div>
                    </div>
               
                    <div class="col-sm-6">
                      <div class="form-group">

                        <label>Tanggal bekerja</label>
                
                        <input type="date" name="bekerja"  placeholder="Masukkan bekerja" class="form-control float-right" value="<?php echo $e['mulai_bekerja'];?>">
                      </div>
                
                  </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                        <label>Alamat Rumah</label>
                
                        <input type="text" name="alamat"  placeholder="Masukkan alamat" class="form-control float-right" value="<?php echo $e['alamat_rumah'];?>">
                      </div>
                
                  </div>
            
                    <div class="col-sm-6">
                      <div class="form-group">

                        <label>Departemen</label>
                
                        <input type="text" name="tglMasuk"  placeholder="Masukkan Tanggal Masuk Anda" class="form-control float-right" value="<?php echo $e['departemen'];?> "readonly>
                      </div>
                
                  </div>
                </div>

                <br>
                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">

                        <label>Keluarga</label>
                        <input type="number" name="Keluarga"id="Keluarga"  placeholder="Masukkan Keluarga" class="form-control float-right"  value="<?php echo $e['keluarga'];?>" >
                     
                      </div>
                
                  </div>
                         <div class="col-sm-6">
                      <div class="form-group">

                        <label>status</label>
                                    <select name="status"id="status" class=" form-control">

                              <option value="TETAP" <?php if($e['status']=='TETAP'){echo "selected";} ?>  >Tetap</option>
                              <option value="KONTRAK" <?php if($e['status']=='KONTRAK'){echo "selected";} ?>  >Kontrak</option>
                 
                      </select>
                     
                      </div>
                
                        <input type="text" name="id"id="id"  placeholder="Masukkan bekerja" class="form-control float-right" value="<?php echo $e['id'];?>" hidden="true">
                  </div>
                    
                </div>
                  <div class="row">
                            <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsketlembaga" class="form-control-label">BPJS Ketenagakerjaan(lembaga)</label>
                      <?php
                      $bpjs = mysqli_query($konek,"select * from setting limit 1");
                      $bpjs1 =mysqli_fetch_array($bpjs);
                      $bpjskes=$bpjs1['bpjsketlembaga'] * $bpjs1['UMK']; 
                      ?>
                 <select name="bpjsketlembaga"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
                     <option value="<?php echo $bpjskes ?>" <?php if($e['bpjsKetlembaga']==$bpjskes){echo "selected";} ?>  >YA</option>
                              <option value="0" <?php if($e['bpjsKetlembaga']=='0'){echo "selected";} ?>  >Tidak</option>
                    </select>
                      </div>
                    </div>
                        <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsKetkaryawan" class="form-control-label">BPJS Ketenagakerjaan(karyawan)</label>
                      <?php
                      $bpjs11 = mysqli_query($konek,"select *from setting limit 1");
                      $bpjs1 =mysqli_fetch_array($bpjs11);
                      $bpjskes1=$bpjs1['bpjsketkaryawan'] * $bpjs1['UMK']; 
                      ?>
                 <select name="bpjsketkaryawan"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
    <option value="<?php echo $bpjskes1?>" <?php if($e['bpjsKetkaryawan']==$bpjskes1){echo "selected";} ?>  >YA</option>
                              <option value="0" <?php if($e['bpjsKetkaryawan']=='0'){echo "selected";} ?>  >Tidak</option>
        
                      </select>
                      </div>
                    </div>
                </div>
                     <div class="row">
                         <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjskeslembaga" class="form-control-label">BPJS Kesehatan(lembaga)</label>


                    <?php
            $bpjs2 = mysqli_query($konek,"select *from setting limit 1");
            $bpjs12 =mysqli_fetch_array($bpjs2);
                      $bpjskes13=$bpjs1['bpjskeslembaga'] * $bpjs1['UMK']; 
            ?>
                 <select name="bpjskeslembaga"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
    <option value="<?php echo $bpjskes13?>" <?php if($e['bpjsKeslembaga']==$bpjskes13){echo "selected";} ?>  >YA</option>
                              <option value="0" <?php if($e['bpjsKeslembaga']=='0'){echo "selected";} ?>  >Tidak</option>
                      </select>
                      </div>
                    </div>
               <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjskeskaryawan" class="form-control-label">BPJS Kesehatan(karyawan)</label>

                    <?php
            $bpjs3 = mysqli_query($konek,"select *from setting limit 1");
            $bpjs13 =mysqli_fetch_array($bpjs3);
                      $bpjskes112=$bpjs1['bpjskeskaryawan'] * $bpjs1['UMK']; 
            ?>
                 <select name="bpjskeskaryawan"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
                   <option value="<?php echo $bpjskes112 ?>" <?php if($e['bpjsKeskaryawan']==$bpjskes112){echo "selected";} ?>  >YA</option>
                              <option value="0" <?php if($e['bpjsKeskaryawan']=='0'){echo "selected";} ?>  >Tidak</option>
                       </select>
                      </div>
                    </div>
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="karyawan.php">kembali</a> 
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
