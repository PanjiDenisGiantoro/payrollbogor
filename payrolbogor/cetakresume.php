
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cetak Gaji</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
  <script type="text/javascript" src="dist/Chart.js"></script>
</head>
<body>

<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <?php $tanggal = date('l, d-m-Y');?>
      <div class="col-12">
        <h2 class="page-header">
          <center><i class="fas fa-globe"></i> RESUME KARYAWAN SIIHA</center>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

      <!-- /.col -->
      <div class="col-12 invoice-col">
       <?php

            $nama = $_POST['nama1'];
            $namajabatan = $_POST['namajabatan1'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
             $nama1 = $_POST['nama1'];
            $namajabatan1 = $_POST['namajabatan1'];
            $bulan1 = $_POST['bulan'];
            $tahun1 = $_POST['tahun'];
                 $konek = mysqli_connect("localhost","root","","payrol");
  
?>

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
}
?>
        <table align="center">
          <tr>
            <td width="180px">
        <img src="images/siiha2.png"></td>
            <td style="text-align: center;">
              <strong>Slip Gaji</strong>
            </td>
            <td><img src="images/siiha.png"></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          Bulan : <?php echo $tanggal;?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          Nama :<?php echo $nama;?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          Jabatan :<?php echo  $namajabatan;?> 
            </td>
            <td></td>
          </tr>
        </table>
        <br>
      </div>
      <!-- /.col -->
 
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <center> 
   <table border="0" align="center">
     <tr>
        <td>
         <center> <b>Resume Penilaian</b></center>
        </td>
        <td>
            <center> <b>Chart Resume Kehadiran</b></center>
        </td>
      </tr>
      <tr>
      <tr>
        <td>

    <?php 
  include 'koneksi/koneksi.php';
  ?>
 
  <div style="width: 500px;margin: auto;">
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
        labels: ["Need Improvement(%)","Good(%)","Very Good(%)"],
        datasets: [{
          label: '%',
          data: [
       
        
          <?php 
          $jumlah_laki1 = mysqli_fetch_array(mysqli_query($konek,"SELECT count(telat) as NI FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND telat !='00:00:00'"));
            $boloss = mysqli_fetch_array(mysqli_query($konek,"SELECT count(bolos) as boloss FROM kehadirans WHERE nama = '$nama' and tanggal like ('$tahun-$bulan-%') AND bolos ='true'"));
          echo $jumlah_laki1['NI']+$boloss['boloss'] / $persen['namaa'] * 100  ; 
          $teee = $jumlah_laki1['NI']+$boloss['boloss'] / $persen['namaa'] * 100;
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

           'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)'
          ],
          borderColor: [

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

          
                    
        </td>
        <td>
           </div>
  <?php 
  include 'koneksi/koneksi.php';
  ?>

  <div style="width: 500px;margin: auto;">
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
        </td>
      </tr>
     <table border="0" width="500px">
      <tr>
        <td><center><b>Chart Resume Penilaian</b></center></td>
      </tr>
       <tr>
         <td>
   <table width="100%" border="1" >    
                         <thead>
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
        <table width="100%"  border="1" >
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



         </td>
       </tr>
       <tr>
         <td align="center">
           <button  onClick="window.print();">Print</button>
         </td>
       </tr>
     </table>
    </table>

</center>
  </table>

    <!-- Table row -->
   

  
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

</body>
</html>
