
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
<div class="alert alert-success" role="alert">

   <button type="button" class="btn btn-success swalDefaultSuccess">
                  Launch Success Toast
                </button>
Selamat <strong>Proses Berhasil</strong>
</div>

<?php
}else if(isset($_GET['e']) && $_GET['e']=='gagal'){
?>
<div class="alert alert-danger" role="alert"  >
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
            <h1>Kehadiran</h1>
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
              <h3 class="card-title">Data Kehadiran SIIHA</h3>
          
            </div>

            <table >
              <tr>
              
        <td>
            <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Import Data Kehadiran</h5>
              </div>
              <div class="card-body">
                 <div class="custom-file">
               
                <?php 
              include 'koneksi/koneksi.php';
              ?>
               
              <form method="post" enctype="multipart/form-data" action="upload_kehadiran.php">
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
        $nama="";
        $namajabatan="";
        $bulan="";
        $tahun="";
        if (isset($_POST['search'])) {
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
        }
  ?>
  <form method="POST" action="">
        <div class="card-body">
      
                                 <div class="form-group row">
                    <label for="bulan" class="col-sm-1 col-form-label">Bulan</label>
                    <div class="col-sm-10">
                                         <select name="bulan" class="form-control-sm form-control"style="width: 7%;">
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
                 <div class="form-group row">
                    <label for="tahun" class="col-sm-1 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                       <select name="tahun"  class="form-control-sm form-control"  style="width: 7%">
                        <option value="" selected="selected">-</option>
                        <?php
                        // query untuk menampilkan semua mata pelajaran dari tabel 
                        $query = "SELECT DISTINCT YEAR(tanggal) as tanggal FROM kehadirans";
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
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                    <button id="search" name="search" class="btn btn-primary"  >Submit</button>
              
              </div>

            </div>
            
            <!-- /.card-header -->
          
        
             
      <div class="col-12 table-responsive">
               <table id="editable_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th align='center'>No</th>
                 <th align='center' style="display: none;">id</th>
                    <th align='center'>no akun</th>
                    <th align='center'>nama</th>
                    <th align='center'>tanggal</th>
                    <th align='center'>masuk</th>
                    <th align='center'>keluar</th>
                    <th align='center'>telat</th>
                    <th align='center'>bolos</th>
                    <th align='center'>waktukerja</th>
                    <th align='center'>departemen</th>
                    <th align='center'>Keterangan</th>
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"select * from kehadirans where departemen != 'Security' and tanggal like ('$tahun-$bulan-%')");
$no=1;
while($d= mysqli_fetch_array($sql)){
     $sub=substr($d['keluar'], -8);
  $sub1=substr($d['masuk'], -8);
  $sub2=substr($d['telat'], -8);
    if($sub=="00:00:00"){
      $dmasuk="";
    }else{
      $dmasuk=$d['keluar'];
    }
    if($sub1=="00:00:00"){
      $kerlua="";
    }else{
      $kerlua=$d['masuk'];
    }
    if($sub2=="00:00:00"){
      $telatt="";
    }else{
      $telatt=$d['telat'];
    }
echo 
"<tr>
          <td width='40px' align='center'>$no</td>

          <td width='40px' align='center' style='display: none;'>$d[id]</td>
          <td align='center'>$d[noakun]</td>
          <td align='center'>$d[nama]</td>
          <td align='center'>$d[tanggal]</td>
          <td align='center'>$kerlua</td>
          <td align='center'>$dmasuk</td>
          <td align='center'>$telatt</td>
          <td align='center'>$d[bolos]</td>
          <td align='center'>$d[waktukerja]</td>
          <td align='center'>$d[departemen]</td>
          <td align='center'>$d[ket]</td>
          <td width='2px'>
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

          </form>
    </section>
    <!-- /.content -->
  </div>
<script>
 $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
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
                        <label>Card Id</label>
                        <input type="text" name="CardNumber"  placeholder="Masukkan Card Id Anda"  class="form-control" >
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Jabatan</label>
                      <select name="jabatan"  class="custom-select">
                            <option value="" selected="selected">-</option>
                            <?php
                            // query untuk menampilkan semua mata pelajaran dari tabel 
                            $query = "SELECT * FROM jabatan";
                            $hasil = mysqli_query($konek,$query);
                            while ($data = mysqli_fetch_array($hasil))
                            {
                            echo "<option value='".$data['id']."'>".$data['namajabatan']."</option>";
                            }
                            ?>
                             </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status"  class="custom-select">
                         <option value="0">Please select</option>
                         <option value="TETAP">TETAP</option>
                         <option value="KONTRAK">KONTRAK</option>
                     </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tempat Jabatan</label>
                       <select name="tempatJabatan"  class="custom-select" >
                         <option value="0">Please select</option>
                         <option value="SD">SD</option>
                         <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                     </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                        <label>Tanggal Masuk</label>
                         <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                        <input type="date" name="tglMasuk"  placeholder="Masukkan Tanggal Masuk Anda" class="form-control float-right" >
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
                        <label>Card Id</label>
                        <input type="text" name="CardNumber"  placeholder="Masukkan Card Id Anda"  class="form-control" >
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Jabatan</label>
                      <select name="jabatan"  class="custom-select">
                            <option value="" selected="selected">-</option>
                            <?php
                            // query untuk menampilkan semua mata pelajaran dari tabel 
                            $query = "SELECT * FROM jabatan";
                            $hasil = mysqli_query($konek,$query);
                            while ($data = mysqli_fetch_array($hasil))
                            {
                            echo "<option value='".$data['id']."'>".$data['namajabatan']."</option>";
                            }
                            ?>
                             </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status"  class="custom-select">
                         <option value="0">Please select</option>
                         <option value="TETAP">TETAP</option>
                         <option value="KONTRAK">KONTRAK</option>
                     </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tempat Jabatan</label>
                       <select name="tempatJabatan"  class="custom-select" >
                         <option value="0">Please select</option>
                         <option value="SD">SD</option>
                         <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                     </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">

                        <label>Tanggal Masuk</label>
                         <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                        <input type="date" name="tglMasuk"  placeholder="Masukkan Tanggal Masuk Anda" class="form-control float-right" >
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>             
    <script src="tabledit/jquery.tabledit.min.js"></script>
    <script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'actionkehadiransecurity.php',
      columns:{
       identifier:[1, "id"],
       editable:[[5, 'masuk'],[6, 'keluar'],]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  
 </script>

</body>
</html>
