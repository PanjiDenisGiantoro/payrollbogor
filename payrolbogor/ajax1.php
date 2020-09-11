<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "payrol");

//variabel nim yang dikirimkan form.php
$nim = $_GET['nama'];

$bulan2 = $_GET['bulan'];

$tahun = $_GET['tahun'];

$bulan3 = ''."$tahun".'-'."$bulan2".'-%';
$lain['fungsional']=0;
 $kasbon['keluarga']=0;

$masuk['masuk']=0;
 $masuk1['masuk']=0;
$tunjangan['jumlah']=0;
             $bpjskeskar['bpjsKeskaryawan']=0;
             $bpjsKetkaryawan['bpjsKetkaryawan']=0;
             $bpjsKeslembaga['bpjsKeslembaga']=0;
            $bpjsKetlembaga['bpjsKetlembaga']=0;


//mengambil data
$query = mysqli_query($koneksi, "select departemen from karyawans where nama='$nim'");
$mahasiswa = mysqli_fetch_array($query);
$lain = mysqli_fetch_array(mysqli_query($koneksi,"select fungsional from karyawans where nama='$nim'"));
$kasbon = mysqli_fetch_array(mysqli_query($koneksi,"select keluarga from karyawans where nama='$nim'"));

$tunjangan = mysqli_fetch_array(mysqli_query($koneksi,"select sum(jumlah) as jumlah from tuntams where namaKaryawan='$nim'"));

$bulan1 = date('Y-m-%');
$masuk = mysqli_fetch_array(mysqli_query($koneksi,"select COUNT(masuk) as masuk from kehadirans where nama='$nim' and masuk != '00:00:00' and tanggal like '$bulan3'"));

$masuk1 = mysqli_fetch_array(mysqli_query($koneksi,"select COUNT(masuk) as masuk from kehadirans where nama='$nim' and masuk != '00:00:00' and tanggal like '$bulan3'"));
     $result1 = mysqli_fetch_array(mysqli_query($koneksi,"select * from setting"));
     $mak= $result1['makan'];
     

$bpjskeskar = mysqli_fetch_array(mysqli_query($koneksi,"select bpjsKeskaryawan  from karyawans where nama='$nim'"));
$bpjsKetkaryawan = mysqli_fetch_array(mysqli_query($koneksi,"select bpjsKetkaryawan  from karyawans where nama='$nim'"));
$bpjsKeslembaga = mysqli_fetch_array(mysqli_query($koneksi,"select bpjsKeslembaga  from karyawans where nama='$nim'"));
$bpjsKetlembaga = mysqli_fetch_array(mysqli_query($koneksi,"select bpjsKetlembaga  from karyawans where nama='$nim'"));
$data = array(
            'namajabatan'      =>  $mahasiswa['departemen'],
            'fungsional'      =>  $lain['fungsional'],
            'keluarga'      =>  $kasbon['keluarga'] * $result1['keluarga'],
            'transport'      =>  $masuk['masuk'] * $result1['transport'],
            // 'makan'      =>  $masuk1['masuk'] * $result1['makan'],
            'tunjangan'      =>  $tunjangan['jumlah'],
            'bpjsKeskaryawan'      =>  $bpjskeskar['bpjsKeskaryawan'],
            'bpjsKetkaryawan'      =>  $bpjsKetkaryawan['bpjsKetkaryawan'],
            'bpjsKeslembaga'      =>  $bpjsKeslembaga['bpjsKeslembaga'],
            'bpjsKetlembaga'      =>  $bpjsKetlembaga['bpjsKetlembaga'],

        );

//tampil data
echo json_encode($data);
?>
