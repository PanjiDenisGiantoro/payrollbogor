
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
            <h1> absensi </h1>
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
              <h3 class="card-title">Data Absensi Karyawan SIIHA</h3>
          
            </div>

            <table >
              <tr>
                <td>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Add Data</h5>
              </div>
              <div class="card-body">
              <a href="absensi.php?view=tambah" class="btn btn-primary" >Tambah Data Absensi Karyawan</a>


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
              <h3 class="card-title">Data  Absensi  SIIHA</h3>
          
            </div>
          <br>
            <!-- /.card-header -->
          
        
             
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th align='center'>No</th>
                    <th align='center'>Nama Karyawan</th>
                    <th align='center'>tanggal </th>
                    <th align='center'>Keterangan</th>
                    <th align='center'>Gambar</th>
                    <th align='center'>Status</th>
                    <th align='center' style="width: 140px;">Aksi</th>  
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"SELECT * from absens");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[nama]</td>
<td align='center'>$d[tglAbsen]</td>
<td align='center'>$d[keterangan]</td>
<td align ='center'><img src='img/".$d['Gambar']."' width='100' height='100'></td>

<td align='center'>$d[ket]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fas fa-pencil-alt' href='absensi.php?view=edit&id=$d[id]' >edit</a>
<a class='btn btn-danger btn-sm fas fa-trash' href='aksi_absensi.php?act=del&id=$d[id]'>hapus</a>


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

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>data absensi</h1>
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
              <h3 class="card-title">Tambah Data absensi </h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Sakit</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Izin</button>
</div>

<div id="London" class="tabcontent">
  <h3>Sakit</h3>
   
  <form method="post"  action="aksi_absensi.php?act=insert"  enctype="multipart/form-data" class="form-horizontal">
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
                     <label for="tgl" class=" form-control-label">Tanggal </label>
        <input type="date"name="tgl" id="tgl" class="form-control" style="width: 300px"/>

                      </div>
                
                  </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="foto" class=" form-control-label">Upload Gambar Obat</label>
      <input type="file" name="foto" id="foto" class="form-control"/>
   
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label for="keterangan" class="form-control-label">Keterangan</label>
              <textarea rows="2" class="form-control" id="keterangan" name="keterangan" >
              </textarea>
                      </div>
                    </div>
                        <div class="col-sm-6">
                      <div class="form-group">
            <input  name="status" id="status" class="form-control" value="sakit" hidden="true" />
                      </div>
                    </div>
                </div>

         <input type="submit" class="btn btn-primary"name="tombol"/>
       </form>
</div>

<div id="Paris" class="tabcontent">
  <h3>Izin</h3>

     <form method="post"  action="aksi_absensi.php?act=insert"  enctype="multipart/form-data" class="form-horizontal">
          <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="nama" class=" form-control-label">Nama Karyawan</label>
                         <input  name="nama" id="nama1" class="form-control"/></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="tgl" class=" form-control-label">Tanggal </label>
        <input type="date"name="tgl" id="tgl"  class="form-control" style="width: 300px"/>

                      </div>
                
                  </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="foto" class=" form-control-label">Upload Gambar Obat</label>
      <input type="file" name="foto" id="foto" class="form-control"/>
   
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label for="keterangan" class="form-control-label">Keterangan</label>
              <textarea rows="2" class="form-control" id="keterangan" name="keterangan" >
              </textarea>
                      </div>
                    </div>
                        <div class="col-sm-6">
                      <div class="form-group">
            <input  name="status" id="status" class="form-control" value="izin" hidden="true" />
                      </div>
                    </div>
                </div>

         <input type="submit" class="btn btn-primary"name="tombol"/>
       </form>
</div>
       <script>
$(function() {
  $( "#nama" ).autocomplete({
    source: 'aa.php'
  });
   $( "#nama1" ).autocomplete({
    source: 'aa.php'
  });
});

</script>
<div id="Tokyo" class="tabcontent">
  <h3>Alfa</h3>

    <form method="post"  action="aksi_absensi.php?act=insert1"  enctype="multipart/form-data" class="form-horizontal">
        <table>
          <tr>
            <td>
               <div class="form-group">
             <label for="idKaryawan" class=" form-control-label">Id Karyawan</label>
            <select name="idKaryawan" id="idKaryawan" class=" form-control" onchange="changeValue(this.value)" style="width: 400px" >
        <option value=0>-Pilih-</option>
         <?php
         $konek = mysqli_connect("localhost","root","","payrol");
    $result = mysqli_query($konek,"SELECT * from karyawans");   
    $jsArray = "var dtMhs = new Array();\n";       
    while ($row = mysqli_fetch_array($result)) {   
        echo '<option value="'.$row['id'].'">'.$row['id'].'</option>';   
        $jsArray .= "dtMhs['".$row['id']."'] = {nama:'".addslashes($row['nama'])."'};\n";   
    }     
    ?>   
        </select>
              </td>
              <td>
                    <div class="form-group">
  <label for="id" class=" form-control-label">Nama Karyawan</label>
      <input type="text" name="nama" id="nama" class="form-control"style="width: 300px"/>
    </div>
          </td>
          </tr>
            <tr>
               <td>
               <div class="form-group">
        <label for="tgl" class=" form-control-label">Tanggal Kasbon</label>
        <input type="date"name="tgl" id="tgl" value="<?php echo date('Y-m-d') ?>" class="form-control" style="width: 300px"/>
      </div>
               </td>
               <td>
                 <div class="form-group">
  <label for="foto" class=" form-control-label">Upload Gambar</label>
      <input type="file" name="foto" id="foto" class="form-control"style="width: 300px"/>
    </div>
               </td>
            </tr>
            <tr>
                <td>   <div class="form-group">
              <label for="Keterangan" class=" form-control-label">Keterangan</label>
              <textarea rows="text"name="Keterangan" id="Keterangan"  class="form-control" style="width: 300px"></textarea> 
              </td>
              </textarea></td>
            </tr>
               </div>
        </table>
         <td><input type="submit" class="btn btn-primary"name="tombol"/></td>
        </form>
</div>
         
          <script>
$(function() {
  $( "#nama" ).autocomplete({
    source: 'aa.php'
  });
});
</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
   <?php echo $jsArray; ?> 
    function changeValue(id){ 
    document.getElementById('nama').value = dtMhs[id].nama;
    }; 
</script>
<?php
break;
case "edit";
$sqlEdit = mysqli_query($konek,"select * from lainlains where id='$_GET[id]'");
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
             <form action="aksi_lain.php?act=update" method="post" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                 <label for="id" class=" form-control-label">Nama Karyawan</label>
             <input type="text" name="nama" id="nama" value="<?php echo $e['namaKaryawan']?>" class="form-control" readonly />
                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                   <label for="jumlah" class=" form-control-label">jumlah Potongan Lain lain</label>
      <input type="number" name="jumlah" id="jumlah" value="<?php echo $e['jumlah']?>"  class="form-control"/>
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="tgl" class=" form-control-label">Tanggal Potongan Lain lain</label>
        <input type="date"name="tgl" id="tgl" value="<?php echo $e['tgl']?>" class="form-control" />
 					 </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      < <label for="keterangan" class="form-control-label">Keterangan</label>
              <textarea rows="2" class="form-control" id="keterangan" name="keterangan" ><?php echo $e['keterangan']?>
              </textarea>

              <input class="form-control" id="id" name="id" value="<?php echo $e['id']?>" hidden="true"/>
                      </div>
                    </div>
                   
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="pinjaman.php">kembali</a> 
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
