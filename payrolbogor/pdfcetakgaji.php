<?php
session_start();
include "koneksi/koneksi.php";
include"dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$date = date('d-m-Y');
$query = mysqli_query($konek,"select * from head_gajis where id='$_GET[id]'");
// echo var_dump("select * from head_gajis where id='$_GET[id]'");die();

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
// $quer = mysqli_query($konek,"select * from potongan ");
// $html = '<center><h3>SLIP GAJI KARYAWAN SEKOLAH ISLAM IBNU HAJAR</h3></center><hr/><br/>';

      $tanggal = date('l, d-m-Y');
$html = '<br/>';

$html .= " <table align='center'>
          <tr>
            <td width='180px'>
        <img src='images/siiha2.png'></td>
            <td style='text-align: center;'>
              <strong>Slip Gaji</strong>
            </td>
            <td><img src='images/siiha.png'></td>
          </tr>
          <tr>
            <td></td>
            <td style='text-align: center;'>
              
          Bulan : ".$tanggal."
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td style='text-align: center;'>
              
          Nama : ".$result112['nama']."
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td style='text-align: center;'>
              
          Jabatan :".$result112['departemen']." 
            </td>
            <td></td>
          </tr>
        </table>
        <br>";
$html .= '<table  width="100%">';


$no = 1;
$row = mysqli_fetch_array($query);

 $html .= "
              <tr>

            <th colspan='6'align='center'>Rincian Gaji</th>
            </tr>
          <tr>
            <th colspan='1'align='left'>Gaji pokok</th>
            <th colspan='1'></th>
            <td colspan='1'>Rp ".$gajipokok['idGapok']."</td>
            <th colspan='1' align='left'>Potongan</th>
            <th colspan='1'></th>
            <th colspan='1'></th>
          </tr>
          <tr>
            <td></td>
            <td>fungsional</td>
            <td>Rp ".$fungsional['fungsional']."</td>
            <td>zakat</td>
                 <td></td>
            <td>Rp ".$result113['zakat']."</td>
          </tr>
          <tr>
            <td></td>
            <td>keluarga</td>
            <td>Rp ".$result11['keluarga']."&</td>
            <td>kasbon</td>
                 <td></td>
            <td>Rp ".$result113['Kasbon']."</td>
          </tr>
          <tr>
            <td></td>
            <td>transport</td>
            <td>Rp ".$result11['transport']."</td>
            <td>pinjaman Angsuran</td>
                 <td></td>
            <td>Rp ".$result113['Pinjaman']."</td>
          </tr>
          <tr>
            <td></td>
            <td>BPJS Ketenagakerjaan</td>
            <td>Rp ".$result11['bpjsKetkaryawan']."</td>
            <td>Makan (Fasilitas)</td>
                 <td></td>
            <td>Rp ".$result113['makan']."</td>
          </tr>
              <tr>
            <td></td>
            <td>BPJS Kesehatan</td>
            <td>Rp ".$result11['bpjsKeskaryawan']."</td>
            <td>Potongan Lain lainlain</td>
                 <td></td>
            <td>Rp ".$result113['Lainlain']."</td>
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
            <td>Rp ".$result11['idTunjangan']."</td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
              <tr>
            <td></td>
            <td>Lembur Umum</td>
            <td>Rp ".$lemburumum['lembur']."</td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
               <tr>
            <td></td>
            <td>Lembur Khusus</td>
            <td>Rp ".$lemburkhusus['lemburkhusus']."</td>
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
             <td>Rp ".$result113['bpjsKetlembaga']."</td>
          </tr>
              <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Karyawan</td>
             <td>Rp ".$result113['bpjsKetkaryawan']."</td>
          </tr>
              <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>BPJS Kesehatan</td>
            <td>lembaga</td>
             <td>Rp ".$result113['bpjsKeslembaga']."</td>
          </tr>
            
                  <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Karyawan</td>
             <td>Rp ".$result113['bpjsKeskaryawan']."</td>
          </tr>
  
                    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Absensi</td>
            <td>-sakit</td>
             <td>".$sakit['sakit']."</td>
          </tr>
                    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>-izin</td>
             <td>".$izin['izin']."</td>
          </tr>
                    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>-tanpa keterangan</td>
             <td>".$alfa['bolos']."</td>
         
            </tr>
                <tr>
            <td>jumlah gaji</td>
            <td></td>
            <td>Rp ".$totalgaji."</td>
            <td>jumlah Potongan</td>
            <td></td>
             <td>Rp ".$potongannn."</td>
          </tr>
                           <tr>
            <td>Total Yang dibayarkan</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td>Rp ".$totall."</td>
          </tr>
                   <tr>
            <td>Terbilang</td>
            <td colspan='5'>".terbilang($angka)." ribu rupiah</td>
            
          </tr>
 ";
 $no++;


$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf

$dompdf->stream('laporan_gaji.pdf');
?>