<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "payrol");
$potongannn=0;
$lain['tunjangan']=0;

//variabel nim yang dikirimkan form.php
$nim = $_GET['nama'];
//mengambil data
$query = mysqli_query($koneksi, "select (zakat+Pinjaman+Kasbon+Lainlain+makan) AS potongan from potongans where namaKaryawan='$nim'");
$mahasiswa = mysqli_fetch_array($query);
$lain = mysqli_fetch_array(mysqli_query($koneksi,"select (fungsional+keluarga+transport+idTunjangan+bpjsKetkaryawan+bpjsKeskaryawan) AS tunjangan from tunjangans where namaKaryawan='$nim'"));
$kasbon = mysqli_fetch_array(mysqli_query($koneksi,"select a.gapok as gapok from jabatan a join karyawans b on b.departemen = a.namajabatan where b.nama='$nim'"));
$tota = $mahasiswa['potongan'] + $lain['tunjangan']+$kasbon['gapok'];
     $result1 = mysqli_fetch_array(mysqli_query($koneksi,"select * from setting"));
     $mak= $result1['makan'];

            $result11 = mysqli_fetch_array(mysqli_query($koneksi,"SELECT  (a.fungsional+a.keluarga+a.transport+a.idTunjangan+a.makanFas+a.bpjsKeskaryawan) AS total,
a.fungsional,a.keluarga,a.transport,a.idTunjangan AS lainlain, a.makanFas,a.namaKaryawan,a.bpjsKeskaryawan FROM tunjangans a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan    WHERE a.namaKaryawan='$nim'"));

            $result113 = mysqli_fetch_array(mysqli_query($koneksi,"SELECT  zakat,Pinjaman,Kasbon,Lainlain,bpjsKetlembaga,bpjsKeslembaga,bpjsKetkaryawan,bpjsKeskaryawan,makan FROM potongans WHERE namaKaryawan ='$nim'"));

            $result114 = mysqli_fetch_array(mysqli_query($koneksi,"
        SELECT a.lembur FROM lemburs a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan  WHERE b.namaKaryawan='$nim'"));

$bulan1 = date('Y-m-%');
            $alfa=mysqli_fetch_array(mysqli_query($koneksi,"SELECT COUNT(bolos) as bolos FROM kehadirans a JOIN karyawans b ON b.nama = a.nama WHERE a.bolos='true' AND b.nama =  '$nim' and tanggal like '$bulan1'"));

            $bpjskes1=mysqli_fetch_array(mysqli_query($koneksi,"select * from setting"));

 $pott =$alfa['bolos'] * $bpjskes1['bolos'];

$potongannn = $result113['zakat'] +  $result113['Kasbon'] + $result113['Pinjaman'] + $result113['makan'] + $result113['bpjsKetlembaga']+ $result113['bpjsKeslembaga']+ $result113['bpjsKetkaryawan']+ $result113['bpjsKeskaryawan']+ $result113['Lainlain']+$pott;
$pott=$lain['tunjangan'];
$tota = $pott-$potongannn; 



  $konek = mysqli_connect("localhost","root","","payrol");


                     $gajipokok = mysqli_fetch_array(mysqli_query($koneksi,"SELECT gajipokok as gajipokok FROM karyawans  WHERE nama ='$nim'"));

                     $lemburkhusus = mysqli_fetch_array(mysqli_query($koneksi,"
SELECT a.lembur as lemburkhusus FROM lemburkhusus  a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan WHERE b.namaKaryawan ='$nim'"));

                     $lemburumum = mysqli_fetch_array(mysqli_query($koneksi,"
SELECT a.lembur as lembur FROM lemburs  a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan WHERE b.namaKaryawan ='$nim'"));


            $result11 = mysqli_fetch_array(mysqli_query($koneksi,"SELECT  (a.fungsional+a.keluarga+a.transport+a.idTunjangan+a.makanFas+a.bpjsKeskaryawan) AS total,
a.fungsional,a.keluarga,a.transport,a.idTunjangan , a.makanFas,a.namaKaryawan,a.bpjsKeskaryawan,a.bpjsKetkaryawan FROM tunjangans a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan    WHERE b.namaKaryawan ='$nim'"));


            $result114 = mysqli_fetch_array(mysqli_query($koneksi,"
        SELECT a.lembur FROM lemburs a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan  WHERE b.namaKaryawan ='$nim'"));

             $bpjskes1=mysqli_fetch_array(mysqli_query($koneksi,"select * from setting"));
            $bpjsket1=mysqli_fetch_array(mysqli_query($koneksi,"select * from setting"));

            $sakit=mysqli_fetch_array(mysqli_query($koneksi,"SELECT COUNT(ket) as sakit FROM absens a JOIN karyawans b ON b.nama = a.nama WHERE a.ket='sakit' AND b.nama =  '$nim'"));

            $izin=mysqli_fetch_array(mysqli_query($koneksi,"SELECT COUNT(ket) as izin FROM absens a JOIN karyawans b ON b.nama = a.nama WHERE a.ket='izin' AND b.nama =  '$nim'"));

            $alfa=mysqli_fetch_array(mysqli_query($koneksi,"SELECT COUNT(bolos) as bolos FROM kehadirans a JOIN karyawans b ON b.nama = a.nama WHERE a.bolos='true' AND b.nama =  '$nim'"));

 $totalgaji =$result11['fungsional']+$result11['keluarga']+$result11['transport']+ $result11['bpjsKetkaryawan']+$result11['bpjsKeskaryawan']+$result11['makanFas']+$result11['idTunjangan']+$lemburumum['lembur']+$lemburkhusus['lemburkhusus']+$gajipokok['gajipokok'];

          $pott =$alfa['bolos'] *$bpjsket1['bolos'];

          $potongannn = $result113['zakat'] +  $result113['Kasbon'] + $result113['Pinjaman'] + $result113['makan']+  $result113['bpjsKetlembaga']+ $result113['bpjsKeslembaga']+ $result113['bpjsKetkaryawan']+ $result113['bpjsKeskaryawan']+$result113['Lainlain']+$pott;


          $totall = $totalgaji - $potongannn;
          $o =  $lain['tunjangan'] +  $gajipokok['gajipokok'];
          $ok = $o - $potongannn;
$data = array(
            'potongan'      =>  $potongannn,
            'tunjangan'      =>  $lain['tunjangan']+$lemburumum['lembur']+$lemburkhusus['lemburkhusus'],
            'gaji'      =>  $gajipokok['gajipokok'],

            'tot'      => $ok ,
        );

//tampil data
echo json_encode($data);
?>
