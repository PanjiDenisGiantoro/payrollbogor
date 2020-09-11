
 <?php  include "halaman/karyawan/header.php";?>
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

 <?php  include "halaman/karyawan/content.php";?>


<?php 
$view =isset($_GET['view']) ? $_GET['view'] :null;
switch ($view) {
default:
?>
 <?php
if(isset($_GET['e']) && $_GET['e']=='sukses'){
?>
<div class="alert alert-success" role="alert" style="margin-top: 30px">
Selamat <strong>Proses Berhasil</strong>
</div>
<?php 
}else if(isset($_GET['e']) && $_GET['e']=='hutang'){
?>
<div class="alert alert-danger" role="alert"  style="margin-top: 30px">
Error <strong>Belum Lunas</strong>
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
              <h3 class="card-title">Data pinjaman Karyawan STIFFIN</h3>
          
            </div>

            <table >
              <tr>
                <td>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Add Data</h5>
              </div>
              <div class="card-body">
                <a href="pinjamankaryawan.php?view=tambah" class="btn btn-primary">Tambah Data Pinjaman Karyawan</a>


              </div>
            </div>
        </td>
    <!--     <td>
            <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Cetak Data</h5>
              </div>
              <div class="card-body">
                  <a href="laporankasbonall.php" class="btn btn-success" target="_blank" >cetak pinjaman keseluruhan</a>

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
              <h3 class="card-title">Data Karyawan STIFFIN</h3>
          
            </div>
           <br>
            
            <!-- /.card-header -->
          
        
             
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th align='center'>No</th>
                  <th align='center'>Nama Karyawan</th>
                  <th align='center'>Jumlah Pinjaman</th>
                  <th align='center'>Tanggal Pinjam</th>
                  <th align='center'>jenjang waktu</th>
                  <th align='center'>bayar</th>
                  <th align='center'>sisa Pinjaman</th>
                  <th align='center'>keterangan</th>
                  <th align='center'>Status</th>
                  <th align='center' style="width: 100px;">Aksi</th>  
                </tr>
                </thead>
                <tbody>
              
<?php

$sql1 = mysqli_fetch_array(mysqli_query($konek,"select namalengkap from admin where username = '$_SESSION[username]'
"));
$sq = $sql1['namalengkap'];
$sql = mysqli_query($konek,"SELECT * from pinjamen where namaKaryawan='$sq'");

$no=1;
while($d= mysqli_fetch_array($sql)){
		if($d['status'] == 'false'){
		$stat= "belum disetujui";
	}else{
		$stat = "sudah disetujui";
	}
    if($d['sisaPinjaman'] == '0'){
    $stat1= "lunas";
  }else{
    $stat1 = "belum lunas";
  }
  $ju =  number_format($d['jumlahPinjam'],2,',','.');
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[namaKaryawan]</td>
<td align='center'>$ju</td>
<td align='center'>$d[tgl]</td>
<td align='center'>$d[waktu]</td>
<td align='center'>$d[bayar]</td>
<td align='center'>$stat1-($d[sisaPinjaman])</td>
<td align='center'>$d[opsibayar]</td>
<td align='center'>$stat</td>
<td width='40px' align='center'>
<a class='btn btn-danger btn-sm fa fa fa-eraser' href='aksi_pinjamankaryawan.php?act=del&id=$d[id]'></a>
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
  background-color: #007bff;
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
            <h1>data pinjaman</h1>
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
              <h3 class="card-title">Tambah Data pinjaman </h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>

              <!-- /.card-header -->
              <div class="card-body">

  <h3>Cicil Pinjaman</h3>

                <form method="post" action="aksi_pinjamankaryawan.php?act=insert2"  enctype="multipart/form-data" name="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="ui-widget">
                        <label>Nama Karyawan</label>
                          <?php 
                            $d = mysqli_fetch_array(mysqli_query($konek,"select namalengkap from admin where username='$_SESSION[username]'"));
                            $nama= mysqli_fetch_array(mysqli_query($konek,"select namaKaryawan from pinjamen where namaKaryawan='$d[namalengkap]'"));
                            ?>
                      <input  name="nama" id="nama" class="form-control"value="<?php echo $d['namalengkap'];?>"  readonly/></td>

                             
                      </div>
 
                </div>
                 <div class="col-sm-6">
                      <div class="form-group">
                         <label for="tgl" class="form-control-label">Tanggal Pinjam</label>
                  <input name="tgl" type="date" class="form-control" id="tgl"  />

            <input type="text" name="status" id="status" class="form-control" value="false" hidden="true" />
                      </div>
                    </div>
                   </div>

                    <div class="row">
                   <!-- <div class="col-sm-6"> -->
                      <!-- text input -->
                      <!-- <div class="form-group"> -->
                       <!-- <label for="jumlahKasbon" class=" form-control-label">sisa pinjam</label> -->
            <!-- <input type="number" name="jumlahKasbon" id="jumlahKasbon" class="form-control"/></td> -->
                      <!-- </div> -->
                    <!-- </div> -->
                   
                
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="jumlahPinjam" class=" form-control-label">jumlah pinjam</label>
               <input type="number" name="jumlahPinjam" id="jumlahPinjam" class="form-control"/></td>

                      </div>
                
                  </div>

            <input type="text" name="opsibayar" id="opsibayar" class="form-control" value="cicil" hidden="true" />
                 <div class="col-sm-6">
                      <div class="form-group">
                         <label for="waktu" class="form-control-label">Jenjang Waktu</label>
                                            <select name="waktu" class="form-control-sm form-control"style="width: 60%;" onclick="bagi()">
                      <option selected="selected">-pilih-</option>
                      <option value='1'> 1 bulan </option>
                      <option value='2'> 2 bulan </option>
                      <option value='3'> 3 bulan </option>
                      <option value='4'> 4 bulan </option>
                      <option value='5'>5 bulan </option>
                        <option value='6'> 6 bulan </option>
                      <option value='7'> 7 bulan </option>
                      <option value='8'> 8 bulan </option>
                      <option value='9'> 9 bulan </option>
                      <option value='10'> 10 bulan </option>
                      <option value='11'> 11 bulan </option>
                      <option value='12'> 12 bulan </option>
                      </select>

                      </div>
                    </div>
                  </div>
                       <div class="row">
                   
                
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="bayar" class=" form-control-label">Bayar pinjaman</label>
               <input type="number" name="bayar" id="bayar" class="form-control"/></td>

                      </div>
                
                  </div>
                </div>

                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="pinjamankaryawan.php">kembali</a> 
                  </div>
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

</script>
<script type="text/javascript">
   function bagi() {
 a=eval(form.jumlahPinjam.value);
 b=eval(form.waktu.value);
 c=a/b
 form.bayar.value = c;
 }
</script>
<?php
break;
case "edit";
$sqlEdit = mysqli_query($konek,"select * from pinjamen where id='$_GET[id]'");
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
            <h1>pinjaman</h1>
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
              <h3 class="card-title">edit Data pinjaman</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form action="aksi_pinjaman.php?act=update" method="post" >
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
                    <label for="jumlahPinjam" class=" form-control-label">jumlah Pinjam</label>
                  <input type="number" name="jumlahPinjam" id="jumlahPinjam" value="<?php echo $e['jumlahPinjam']?>"  class="form-control"/></td>
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="sisaPinjaman" class=" form-control-label">Sisa Pinjam</label>
        <input type="number"name="sisaPinjaman" id="sisaPinjaman" value="<?php echo $e['sisaPinjaman']?>" class="form-control"/>
 					 </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="tgl" class="form-control-label">Tanggal Pinjam</label>
              <input class="form-control" id="tgl" name="tgl" value="<?php echo $e['tgl']?>"/>
              <input class="form-control" id="id" name="id" value="<?php echo $e['id']?>" hidden="true"/>
              
    			  <input type="text" name="status" id="status" class="form-control" value="false" hidden="true" />
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


 <?php  include "halaman/karyawan/footer.php";?>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
</body>
</html>
