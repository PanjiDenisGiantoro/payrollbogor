
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cetak Gaji</title>
</head>
<body>
  <style type="text/css">
 body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }

  </style>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <?php $tanggal = date('l, d-m-Y');?>
      <div class="col-12">
        <h2 class="page-header">
          <center><i class="fas fa-globe"></i> SLIP GAJI KARYAWAN SIIHA</center>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

      <!-- /.col -->
      <div class="col-12 invoice-col">
       <?php

                 $konek = mysqli_connect("localhost","root","","payrol");
            $result = mysqli_query($konek," SELECT namaKaryawan AS nama from head_gajis   
         WHERE id = '$_GET[id]'
        ");   
                     $gajipokok = mysqli_fetch_array(mysqli_query($konek,"SELECT idGapok as idGapok FROM head_gajis  WHERE id = '$_GET[id]'"));

                     $lemburkhusus = mysqli_fetch_array(mysqli_query($konek,"
SELECT a.lembur as lemburkhusus FROM lemburkhusus  a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan WHERE b.id = '$_GET[id]'"));

                     $lemburumum = mysqli_fetch_array(mysqli_query($konek,"
SELECT a.lembur as lembur FROM lemburs  a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan WHERE b.id = '$_GET[id]'"));

                                          $fungsional = mysqli_fetch_array(mysqli_query($konek,"
SELECT a.fungsional as fungsional FROM karyawans  a JOIN head_gajis b ON a.nama = b.namaKaryawan WHERE b.id = '$_GET[id]'"));

            $result11 = mysqli_fetch_array(mysqli_query($konek,"SELECT  (a.keluarga+a.transport+a.idTunjangan+a.makanFas+a.bpjsKeskaryawan) AS total,
a.fungsional,a.keluarga,a.transport,a.idTunjangan , a.makanFas,a.namaKaryawan,a.bpjsKeskaryawan,a.bpjsKetkaryawan FROM tunjangans a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan    WHERE b.id = '$_GET[id]'"));

            $result112 = mysqli_fetch_array(mysqli_query($konek,"
SELECT a.nama,a.departemen FROM karyawans a JOIN head_gajis b ON a.nama = b.namaKaryawan WHERE b.id = '$_GET[id]'"));


            $result113 = mysqli_fetch_array(mysqli_query($konek,"SELECT b.zakat,b.Pinjaman,b.Kasbon,b.Lainlain,b.bpjsKetlembaga,b.bpjsKeslembaga,b.bpjsKetkaryawan,b.bpjsKeskaryawan,b.makan FROM potongans b JOIN head_gajis c ON b.namaKaryawan = c.namaKaryawan WHERE c.id = '$_GET[id]'"));

            $result114 = mysqli_fetch_array(mysqli_query($konek,"
        SELECT a.lembur FROM lemburs a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan  WHERE b.id = '$_GET[id]'"));


            $r=mysqli_fetch_array($result);
            // $namaa = $r['nama'];
            $bpjskes1=mysqli_fetch_array(mysqli_query($konek,"select * from setting"));
            $bpjsket1=mysqli_fetch_array(mysqli_query($konek,"select * from setting"));

            $sakit=mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(ket) as sakit FROM kehadirans WHERE ket='sakit' AND nama = '$result112[nama]'"));
            $izin=mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(ket) as izin FROM kehadirans  WHERE ket='izin' AND nama =  '$result112[nama]'"));

            $alfa=mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(bolos) as bolos FROM kehadirans WHERE bolos='true' AND nama ='$result112[nama]'"));



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
              
          Nama :<?php echo $result112['nama'];?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          Jabatan :<?php echo $result112['departemen'];?> 
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

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class=" table-bordered" align="center">
          <thead>
            <tr>
              <center><b>Rincian Gaji</b></center>
            </tr>
          <tr>
            <th colspan="1"align="left">Gaji pokok</th>
            <th colspan="1"></th>
            <td colspan="1">Rp <?php echo $gajipokok['idGapok'];?></td>
            <th colspan="1" align="left">Potongan</th>
            <th colspan="1"></th>
            <th colspan="1"></th>
          </tr>
          </thead>
          <tbody>

          <tr>
            <td></td>
            <td>fungsional</td>
            <td>Rp <?php echo $fungsional['fungsional'];?> &nbsp;</td>
            <td>zakat</td>
                 <td></td>
            <td>Rp <?php echo $result113['zakat'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>keluarga</td>
            <td>Rp <?php echo $result11['keluarga'];?>&nbsp;</td>
            <td>kasbon</td>
                 <td></td>
            <td>Rp <?php echo $result113['Kasbon'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>transport</td>
            <td>Rp <?php echo $result11['transport'];?></td>
            <td>pinjaman Angsuran</td>
                 <td></td>
            <td>Rp <?php echo $result113['Pinjaman'];?></td>
          </tr>
          <tr>
            <td></td>
            <td>BPJS Ketenagakerjaan</td>
            <td>Rp <?php echo $result11['bpjsKetkaryawan'];?></td>
            <td>Makan (Fasilitas)</td>
                 <td></td>
            <td>Rp <?php echo $result113['makan'];?></td>
          </tr>
              <tr>
            <td></td>
            <td>BPJS Kesehatan</td>
            <td>Rp <?php echo $result11['bpjsKeskaryawan'];?></td>
            <td>Potongan Lain lainlain</td>
                 <td></td>
            <td>Rp <?php echo $result113['Lainlain'];?></td>
          </tr>
             <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
             <tr>
            <td></td>
            <td>Tunjangan Tambahan</td>
            <td>Rp <?php echo $result11['idTunjangan'];?></td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
              <tr>
            <td></td>
            <td>Lembur Umum</td>
            <td>Rp <?php echo $lemburumum['lembur'];?></td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
               <tr>
            <td></td>
            <td>Lembur Khusus</td>
            <td>Rp <?php echo $lemburkhusus['lemburkhusus'];?></td>
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
             <td>Rp <?php echo $result113['bpjsKetlembaga'];?></td>
          </tr>
              <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Karyawan</td>
             <td>Rp <?php echo $result113['bpjsKetkaryawan'];?></td>
          </tr>
              <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>BPJS Kesehatan</td>
            <td>lembaga</td>
             <td>Rp <?php echo $result113['bpjsKeslembaga'];?></td>
          </tr>
            
                  <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Karyawan</td>
             <td>Rp <?php echo $result113['bpjsKeskaryawan'];?></td>
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
             <?php 
             $bol = $alfa['bolos'] ;
             ?>
          </tr>
          <?php 
          $totalgaji =$result11['fungsional']+$result11['keluarga']+$result11['transport']+ $result11['bpjsKetkaryawan']+$result11['bpjsKeskaryawan']+$result11['idTunjangan']+$lemburumum['lembur']+$lemburkhusus['lemburkhusus']+$gajipokok['idGapok'];

          $pott =$alfa['bolos'] *$bpjsket1['bolos'];

          $potongannn = $result113['zakat'] +  $result113['Kasbon'] + $result113['Pinjaman'] + $result113['makan']+  $result113['bpjsKetlembaga']+ $result113['bpjsKeslembaga']+ $result113['bpjsKetkaryawan']+ $result113['bpjsKeskaryawan']+$result113['Lainlain']+$pott;


          $totall = $totalgaji - $potongannn;
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

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     
    return $hasil;
}

$angka = $totall;
?>
 

                     <tr>
            <td>jumlah gaji</td>
            <td></td>
            <td>Rp <?php echo $totalgaji;?></td>
            <td>jumlah Potongan</td>
            <td></td>
             <td>Rp <?php echo $potongannn;  ?></td>
          </tr>
                           <tr>
            <td>Total Yang dibayarkan</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td>Rp <?php echo $totall;?></td>
          </tr>
                   <tr>
            <td>Terbilang</td>
            <td colspan="5"><?php echo  terbilang($angka) ?> ribu rupiah</td>
            
          </tr>

          </tbody>

          <table align="center" >
            <tr>
              <td width="400px" align="center">
                
              </td>
              <td width="400px"align="center">
                <?php
                echo date('d M Y');
                ?>
              </td>
            </tr>
          </table>
        </table>
          <table align="center" border="1">
            <tr>
              <td width="400px" align="center">
                keuangan
              </td>
              <td width="400px"align="center">
                penerima
              </td>
            </tr>
            <tr height="100px">
              <td width="400px"></td>
              <td width="400px"></td>
              
            </tr>
            <tr>
                <td width="400px" align="center">
                Nuryatmi
              </td>
                <td width="400px" align="center">
                wkwkk
              </td>
            </tr>
           
          </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
<script type="text/javascript">
  window.print();
</script>
  
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
