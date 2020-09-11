
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
  <script type="text/javascript" src="dist/Chart.js"></script>
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
  <section class="content">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Resume Bagian SIIHA</h3>
          
            </div>

            <table >
              <tr>
                <td>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Filter date</h5>
              </div>


  <form method="POST" action="cetakresumebagian.php">
        <div class="card-body">
           
                 <div class="form-group row">
                    <label for="namajabatan" class="col-sm-1 col-form-label">jabatan</label>
                    <div class="col-sm-10">
                       <select name="namajabatan"  class="form-control-sm form-control"  style="width: 20%">
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
                                 <div class="form-group row">
                    <label for="bulan" class="col-sm-1 col-form-label">Bulan</label>
                    <div class="col-sm-10">
                                         <select name="bulan" class="form-control-sm form-control"style="width: 10%;">
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
                       <select name="tahun"  class="form-control-sm form-control"  style="width: 10%">
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
          </form>

                      <div class="card-footer">
                   <center> <a href='cetakresume.php' id="search" name="search" class="btn btn-danger">cetak resume</a></center>
                  </div>
                  </div>
         
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
          
$(function() {
  $( "#nama" ).autocomplete({
    source: 'aa.php'
  });

});

</script>

        </td>
     <!--    <td>
            <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Cetak Data</h5>
              </div>
              <div class="card-body">
                  <a href="laporankasbonall.php" class="btn btn-success" target="_blank" >cetak tunjangan tambahan keseluruhan</a>

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

  <div class="row">
    <section class="col-lg-6 connectedSortable">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Karyawan SIIHA</h3>
          
            </div>

           <br>
            
            <!-- /.card-header -->
          
        
             
              
      <div class="col-12 table-responsive">
               <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
					 <th align='center'>TGL</th>
					<th align='center'>Jam masuk(Ket)</th>
          <th align='center'>Telat</th>
          <th align='center' width="50px">Nilai</th>
					<th align='center'>Jam Keluar(Ket)</th>
          <th align='center'>Estimasi waktu</th>  
          <th align='center'>Bolos</th>  
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"SELECT *,day(tanggal) as tanggal1,akhirtugas,awaltugas,masuk,keluar,telat,tanggal,nama,bolos FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%')");

$sql1 = mysqli_fetch_array(mysqli_query($konek,"SELECT count(telat) as NI FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND telat !='00:00:00'"));
$sql12 = mysqli_fetch_array(mysqli_query($konek,"SELECT count(masuk = awaltugas) as good FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND masuk !='00:00:00'AND masuk = awaltugas"));
$sql123 = mysqli_fetch_array(mysqli_query($konek,"SELECT count(masuk < awaltugas) as Very FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND masuk !='00:00:00'"));
$sql1234 = mysqli_fetch_array(mysqli_query($konek,"SELECT count(bolos) as boloss FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND bolos ='true'"));
$set=mysqli_fetch_array(mysqli_query($konek,"select tanggallibur,tanggalakhirlibur from libur"));
$aw= $set['tanggallibur'];
$ak= $set['tanggalakhirlibur'];
$libur = mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(nama) FROM kehadirans WHERE tanggal BETWEEN '$aw' AND '$ak' AND nama='$nama' AND tanggal LIKE ('$tahun-$bulan-%')"));

$no=1;
while($d= mysqli_fetch_array($sql)){
  if($d['masuk'] == $d['awaltugas']){
    $good = "G";
  }else if($d['masuk'] == "00:00:00"){
    $good = "tidak hadir";
  }else if($d['masuk'] < $d['awaltugas']){
    $good = "VG";
    $goo = count($d['masuk'] < $d['awaltugas']);
  }else if($d['masuk'] > $d['awaltugas']){
    $good = "NI";
  }


  if($d['telat'] != "00:00:00"){
    $tela =$d['telat'];
  }else if ($d['telat'] == "00:00:00"){
    $tela="-";
  }

  $awal  = date_create($d['masuk']);
$akhir = date_create($d['awaltugas']); // waktu sekarang
$diff  = date_diff( $awal, $akhir );

  $masuk  = date_create($d['masuk']);
$keluar = date_create($d['keluar']); // waktu sekarang
$diff1  = date_diff( $masuk, $keluar );


// echo $diff->y . ' tahun, ';
// echo $diff->m . ' bulan, ';
// echo $diff->d . ' hari, ';
// echo $diff->h . ' jam, ';
// echo $diff->i . ' menit, ';
// echo $diff->s . ' detik, ';
// // Output: Selisih waktu: 28 tahun, 5 bulan, 9 hari, 13 jam, 7 menit, 7 detik

// echo 'Total selisih hari : ' . $diff->days;

$jam = $diff->h;
$i = $diff->i;
$jam1 = $diff1->h;
$i1 = $diff1->i;

echo 
"<tr>
<td align='center'>$d[tanggal1]</td>
<td align='center'>$d[masuk] ($good) </td>
<td align='center'>$tela</td>
<td align='center' width='50px'> $jam H $i M </td>
<td align='center'>$d[keluar]</td>
<td align='center'> $jam1 H $i1 M </td>
<td align='center'>$d[bolos] </td>

</tr>";
$no++;
}
?>
               
               
                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      <!-- /.row -->
    </section>
    <!-- /.content -->

   <section class="col-lg-6 connectedSortable">
      <div class="row">
        <div class="col-12">
            <!-- Map card -->
            <div class="card card-primary">
              <div class="card-header ">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  chart
                </h3>

              </div>
            </div>
  <?php 
  include 'koneksi/koneksi.php';
  ?>
 
  <div style="width: auto;margin: auto;">
    <canvas id="myChart"></canvas>
  </div>
 
  <?php 
   $persen1 = mysqli_fetch_array(mysqli_query($konek,"select count(nama) as namaa from kehadirans where nama= '$nama' and tanggal like ('$tahun-$bulan-%')"));
 ?>

  <script>

    var nim = $("#nama").val(); 
    var bulan = $("#bulan").val(); 
    var tahun = $("#tahun").val();   
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Hadir (%)", "Bolos(%)","sakit(%)","izin(%)"],
        datasets: [{
          label: '%',
          data: [
       
     
              <?php 
          $jumlah_laki = mysqli_fetch_array(mysqli_query($konek,"SELECT count(nama) as namaa FROM kehadirans WHERE  nama='$nama1' AND bolos='' and tanggal like ('$tahun1-$bulan1-%')"));
          echo $jumlah_laki['namaa'] / $persen1['namaa'] * 100;
          $jj = $jumlah_laki['namaa'] ;
          ?>, 
          <?php 
          $jumlah_perempuan =  mysqli_fetch_array(mysqli_query($konek,"SELECT count(nama) as nam FROM kehadirans WHERE  nama='$nama1' AND bolos='true'and tanggal like ('$tahun1-$bulan1-%')"));

          echo $jumlah_perempuan['nam'] / $persen1['namaa'] * 100;
          $jj1 = $jumlah_perempuan['nam'];
          ?>,
               <?php 
          $sakit =  mysqli_fetch_array(mysqli_query($konek,"SELECT count(nama) as a FROM absens WHERE nama ='$nama1' AND ket = 'sakit'and tglAbsen like ('$tahun1-$bulan1-%')"));
          echo  $sakit['a'] / $persen1['namaa'] * 100;


          $jj2 = $sakit['a'] ;
          ?>,
                 <?php 
          $izin =  mysqli_fetch_array(mysqli_query($konek,"SELECT count(nama) as b FROM absens WHERE nama ='$nama1' AND ket = 'izin'and tglAbsen like ('$tahun1-$bulan1-%')"));
          echo $izin['b'] / $persen1['namaa'] * 100;

          $jj3 =  $izin['b'] ;

             $lembur = mysqli_fetch_array(mysqli_query($konek,"SELECT count(jumlahjam) as jumlahjam FROM lemburs WHERE namaKaryawan ='$nama1' and tglLembur like ('$tahun1-$bulan1-%')"));

          ?>
          ],
          backgroundColor: [   
           'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 2
        }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero:true
                    }
                  }]
                }
              }
            });
          </script>
              </div>
            </div>

          </section>
           <section class="col-lg-6 connectedSortable">
      <div class="row">
        <div class="col-12">
            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Info
                </h3>

              </div>
            </div>
              <div class="col-12 table-responsive">
        <table id="example2"class="table table-bordered table-striped" width="40%" >      <thead>
          <tr>
             <th align='center'>Hadir</th>
          <th align='center'>Izin</th>
          <th align='center'>sakit</th>
          <th align='center'>alpa</th>
          <th align='center'>Lembur</th> 
          </tr>
        </thead>
        <tbody>

<?php

    echo 
"<tr>
<td align='center'>$jj</td>
<td align='center'>$jj2</td>
<td align='center'>$jj3</td>
<td align='center'>$jj1</td>
<td align='center'>$lembur[jumlahjam]</td>

</tr>";

?>
    </tfoot>
       </table>
<?php
$o = $sql1['NI'] +$sql1234['boloss'];
?>
              <div class="col-12 table-responsive">
        <table id="example2"class="table table-bordered table-striped" width="40%" >
            <thead>
          <tr>
                      <th align='center'>very good</th>
          <th align='center'>good</th>
          <th align='center'>need Improvement</th>
          </tr>   
            </thead>
        <tbody>

<?php
echo 
"<tr>
<td align='center'>$sql123[Very]</td>
<td align='center'>$sql12[good]</td>
<td align='center'>$o</td>

</tr>";

?>
    </tfoot>
       </table>
     </div>

          </div>
        </div>
      </section>
       <section class="col-lg-6 connectedSortable">
      <div class="row">
        <div class="col-12">
            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  chart
                </h3>

              </div>
            </div>
  <?php 
  include 'koneksi/koneksi.php';
  ?>
 
  <div style="width: auto;margin: auto;">
    <canvas id="myChart1"></canvas>
  </div>
 
 <?php 
   $persen = mysqli_fetch_array(mysqli_query($konek,"select count(nama) as namaa from kehadirans where nama= '$nama' and tanggal like ('$tahun-$bulan-%')"));
 ?>
  <script>

var kalimat = "%";
    var ctx = document.getElementById("myChart1").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: [ "Bad (%)","Need Improvement(%)","Good(%)","Very Good(%)"],
        datasets: [{
          label: '%',
          data: [
       
              <?php 
           
          $boloss = mysqli_fetch_array(mysqli_query($konek,"SELECT count(bolos) as boloss FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND bolos ='true'"));
          echo $boloss['boloss'] / $persen['namaa'] * 100  ; 
          $boloss1 = $boloss['boloss'] / $persen['namaa'] * 100 ;

          ?>, 
          <?php 
          $jumlah_laki1 = mysqli_fetch_array(mysqli_query($konek,"SELECT count(telat) as NI FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND telat !='00:00:00'"));
          echo $jumlah_laki1['NI'] / $persen['namaa'] * 100  ; 
          $teee = $jumlah_laki1['NI'] / $persen['namaa'] * 100;
          ?>, 
          <?php 
          $jumlah_perempuan1 = mysqli_fetch_array(mysqli_query($konek,"SELECT count(masuk = awaltugas) as good FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND masuk !='00:00:00'AND masuk = awaltugas"));

          echo $jumlah_perempuan1['good'] / $persen['namaa'] * 100  ; 
          $gooo =  $jumlah_perempuan1['good'] / $persen['namaa'] * 100 ;
          ?>,
               <?php 
          $sakit1 = mysqli_fetch_array(mysqli_query($konek,"SELECT count(masuk < awaltugas) as Very FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND masuk !='00:00:00'"));
          echo $sakit1['Very'] / $persen['namaa'] * 100  ; 

          $ver = $sakit1['Very'] / $persen['namaa'] * 100  ; 
          ?>
      
          ],
          backgroundColor: [   

        'rgba(75, 192, 192, 0.2)',
           'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)'
          ],
          borderColor: [

        'rgba(75, 192, 192, 1)',
          'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)'
          ],
          borderWidth: 2
        }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero:true
                    }
                  }]
                }
              }
            });
          </script>
              </div>
            </div>
          </section>
      </div>
<script>
 $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "lengthChange": false,
      "searching": false,
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
            <h1>data tunjangan tambahan</h1>
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
              <h3 class="card-title">Tambah Data tunjangan tambahan </h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<form method="post" action="aksi_tuntam.php?act=insert" class="form-horizontal">
                  <div class="row">
                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                     <label for="nama" class=" form-control-label">nama</label>
        <input type="text"name="nama" id="nama"  class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                     <label for="tanggal" class=" form-control-label">Tanggal Kasbon</label>
        <input type="date"name="tanggal" id="tanggal" value="<?php echo date('Y-m-d') ?>" class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                    <label for="jumlah" class=" form-control-label">jumlah Tunjangan Tambahan</label>
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
$sqlEdit = mysqli_query($konek,"select * from tuntams where id='$_GET[id]'");
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
            <h1>tunjangan tambhan</h1>
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
              <h3 class="card-title">edit Data tunjangan tambhan</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<form action="aksi_tuntam.php?act=update" method="post" >
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="id" class=" form-control-label">Nama Karyawan</label>
      <input type="text" name="nama" id="nama" value="<?php echo $e['namaKaryawan']?>" class="form-control" readonly/>
                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                      <label for="tanggal" class=" form-control-label">Tanggal </label>
        <input type="date"name="tanggal" id="tanggal" value="<?php echo $e['tanggal']?>" class="form-control"/>
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="jumlah" class=" form-control-label">jumlah Tunjangan Tambahan</label>
      <input type="number" name="jumlah" id="jumlah" value="<?php echo $e['jumlah']?>"  class="form-control"/>
 					 </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="keterangan" class="form-control-label">Keterangan</label>
              <textarea rows="5" class="form-control" id="keterangan" name="keterangan"><?php echo $e['keterangan']?>
              </textarea>

              <input class="form-control" id="id" name="id" value="<?php echo $e['id']?>" hidden="true"/>
                      </div>
                    </div>
                   
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="tuntam.php">kembali</a> 
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
