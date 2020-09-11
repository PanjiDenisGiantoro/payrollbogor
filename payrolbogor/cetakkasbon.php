
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
          <center><i class="fas fa-globe"></i> STRUK KASBON KARYAWAN SEKOLAH ISLAM IBNU HAJAR</center>
          <small class="float-right">Date: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

      <!-- /.col -->
      <div class="col-12 invoice-col">
       <?php

                 $konek = mysqli_connect("localhost","root","","payrol");


            $r=mysqli_fetch_array($result);
            $namaa = $r['nama'];
            $bpjskes1=mysqli_fetch_array(mysqli_query($konek,"select * from setting"));
            $bpjsket1=mysqli_fetch_array(mysqli_query($konek,"select * from setting"));
            
$bulan1 = date('Y-m-%');
            $sakit=mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(ket) as sakit FROM absens a JOIN karyawans b ON b.nama = a.nama WHERE a.ket='sakit' AND b.nama =  '$namaa'and tanggal like '$bulan1'"));

            $izin=mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(ket) as izin FROM absens a JOIN karyawans b ON b.nama = a.nama WHERE a.ket='izin' AND b.nama =  '$namaa'and tanggal like '$bulan1'"));

            $alfa=mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(bolos) as bolos FROM kehadirans a JOIN karyawans b ON b.nama = a.nama WHERE a.bolos='true' AND b.nama =  '$namaa' and tanggal like '$bulan1'"));


            $pot=  $r['zakat'] +  $r['Kasbon'] + $r['Pinjaman'] + $r['makan'] +$r['lembur']+  $r['bpjsKetlembaga']+ $r['bpjsKeslembaga']+ $r['bpjsKetkaryawan']+ $r['bpjsKeskaryawan']+$alfa['bolos'];

?>
 <?php
 function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " triliun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}
 $tot = $r['total'] - $pot;
function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     
    return $hasil;
}

$angka = $tot;
?>
 
        <center>
          <strong>Slip Gaji</strong><br>
          Bulan : <?php echo $tanggal;?><br>
          Nama :<?php echo $r['nama'];?> <br>
          Jabatan :<?php echo $r['namajabatan'];?> <br>
        </center>
      </div>
      <!-- /.col -->
 
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class=" table-bordered" align="center">
          <thead>
            <tr>
              <center><b>Rincian Gaji</b></center>
            </tr>
          <tr>
            <th colspan="3">Gaji pokok</th>
            <th colspan="3">Potongan</th>
          </tr>
          </thead>
          <tbody>

          <tr>
            <td></td>
            <td>fungsional</td>
            <td>Rp <?php echo $r['fungsional'];?></td>
            <td>zakat</td>
                 <td></td>
            <td>Rp <?php echo $r['zakat'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>keluarga</td>
            <td>Rp <?php echo $r['keluarga'];?></td>
            <td>kasbon</td>
                 <td></td>
            <td>Rp <?php echo $r['Kasbon'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>transport</td>
            <td>Rp <?php echo $r['transport'];?></td>
            <td>pinjaman</td>
                 <td></td>
            <td>Rp <?php echo $r['Pinjaman'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>BPJS Kesehatan</td>
            <td>Rp <?php echo $r['bpjsKeskaryawan'];?></td>
            <td>Makan (Fasilitas)</td>
                 <td></td>
            <td>Rp <?php echo $r['makan'];?></td>
          </tr>
             <tr>
            <td></td>
            <td>makan ( fasilitas )</td>
            <td>Rp <?php echo $r['makanFas'];?></td>
            <td>Lembur umum</td>
                 <td></td>
            <td>Rp <?php echo $r['lembur'];?></td>
          </tr>
             <tr>
            <td></td>
            <td>Tunjangan Tambahan</td>
            <td>Rp <?php echo $r['lainlain'];?></td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
             <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>BPJS Ketenagakerjaan</td>
            <td>lembaga</td>
             <td>Rp <?php echo $r['bpjsKetlembaga'];?></td>
          </tr>
              <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Karyawan</td>
             <td>Rp <?php echo $r['bpjsKetkaryawan'];?></td>
          </tr>
              <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>BPJS Kesehatan</td>
            <td>lembaga</td>
             <td>Rp <?php echo $r['bpjsKeslembaga'];?></td>
          </tr>
            
                  <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Karyawan</td>
             <td>Rp <?php echo $r['bpjsKeskaryawan'];?></td>
          </tr>
  
                    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Absensi</td>
            <td>-sakit</td>
             <td><?php echo $sakit['sakit'];?></td>
          </tr>
                    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>-izin</td>
             <td><?php echo $izin['izin'];?></td>
          </tr>
                    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>-tanpa keterangan</td>
             <td><?php echo $alfa['bolos'];?></td>
          </tr>
                     <tr>
            <td>jumlah gaji</td>
            <td></td>
            <td>Rp <?php echo $r['total'];?></td>
            <td>jumlah Potongan</td>
            <td></td>
             <td>Rp <?php echo $r['zakat'] +  $r['Kasbon'] + $r['Pinjaman'] + $r['makan'] +$r['lembur']+  $r['bpjsKetlembaga']+ $r['bpjsKeslembaga']+ $r['bpjsKetkaryawan']+ $r['bpjsKeskaryawan']+$alfa['bolos'];?></td>
          </tr>
                           <tr>
            <td>Total Yang dibayarkan</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td>Rp <?php echo $r['total'] - $pot;?></td>
          </tr>
                   <tr>
            <td>Terbilang</td>
            <td colspan="5"><?php echo  terbilang($angka)?></td>
            
          </tr>

          </tbody>
        </table>
          <br>
          <table>
            <center>
              <input type="button" value="PRINT" onClick="window.print()">
            </center>
          </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  
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
