<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "payrol");

//variabel nim yang dikirimkan form.php
$nim = $_GET['nama'];

$tahun = $_GET['tahun'];

$bulan2 = $_GET['bulan'];
//mengambil data
$bulan3 = ''."$tahun".'-'."$bulan2".'-%';
// $bpjskeskar['bpjsKeskaryawan'] = 0;
//               $bpjsKetkaryawan['bpjsKetkaryawan']=0;
//             $bpjsKeslembaga['bpjsKeslembaga']=0;
//               $bpjsKetlembaga['bpjsKetlembaga']=0;

// echo $bulan3;
//mengambil data
$query = mysqli_query($koneksi, "select sum(bayar) as sisaPinjaman from pinjamen where namaKaryawan='$nim'and status='true' and opsibayar !='cicil'");
$mahasiswa = mysqli_fetch_array($query);
if($mahasiswa['sisaPinjaman'] == 0){
	$mah="0";
}else{
	$mah = $mahasiswa['sisaPinjaman'];
}
$lain = mysqli_fetch_array(mysqli_query($koneksi,"select sum(jumlah) as jumlah from lainlains where namaKaryawan='$nim'and status='true'"));
$kasbon = mysqli_fetch_array(mysqli_query($koneksi,"select sum(jumlahKasbon)  as jumlahKasbon from kasbons where namaKaryawan='$nim' and status='true'"));
$bulan = date('Y-m-%');
$masuk = mysqli_fetch_array(mysqli_query($koneksi,"select COUNT(masuk) as masuk from kehadirans where nama='$nim' and masuk != '00:00:00' and tanggal like '$bulan2'"));

$masuk1 = mysqli_fetch_array(mysqli_query($koneksi,"select COUNT(bolos) as bolos from kehadirans where nama='$nim' and bolos ='true'"));
     $result1 = mysqli_fetch_array(mysqli_query($koneksi,"select * from setting"));
     $mak= $result1['makan'];

     $masuk12 = mysqli_fetch_array(mysqli_query($koneksi,"select COUNT(masuk) as masuk from kehadirans where nama='$nim' and masuk != '00:00:00' and tanggal like '$bulan3'"));
$masuk11 = mysqli_fetch_array(mysqli_query($koneksi,"select COUNT(bolos) as bolos from kehadirans where nama='$nim' and bolos ='true'"));

$bpjskeskar = mysqli_fetch_array(mysqli_query($koneksi,"select bpjsKeskaryawan  from karyawans where nama='$nim'"));
$bpjsKetkaryawan = mysqli_fetch_array(mysqli_query($koneksi,"select bpjsKetkaryawan  from karyawans where nama='$nim'"));
$bpjsKeslembaga = mysqli_fetch_array(mysqli_query($koneksi,"select bpjsKeslembaga  from karyawans where nama='$nim'"));
$bpjsKetlembaga = mysqli_fetch_array(mysqli_query($koneksi,"select bpjsKetlembaga  from karyawans where nama='$nim'"));
$data = array(
            'sisaPinjaman'      =>  $mah,
            'jumlah'      =>  $lain['jumlah'],
            'jumlahKasbon'      =>  $kasbon['jumlahKasbon'],
            'masuk'      =>  $masuk12['masuk'] * $mak,
            'bolos'      =>  $masuk11['bolos'] * $result1['bolos'],
            'bpjsKeskaryawan'      =>  $bpjskeskar['bpjsKeskaryawan'],
            'bpjsKetkaryawan'      =>  $bpjsKetkaryawan['bpjsKetkaryawan'],
            'bpjsKeslembaga'      =>  $bpjsKeslembaga['bpjsKeslembaga'],
            'bpjsKetlembaga'      =>  $bpjsKetlembaga['bpjsKetlembaga'],

            'zakat'      =>  0,

        );

//tampil data
echo json_encode($data);
?>
