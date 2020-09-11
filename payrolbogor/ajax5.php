<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "payrol");

//variabel nim yang dikirimkan form.php
$nama = $_GET['nama'];
$bulan1 = $_GET['bulan'];
//mengambil data

$bulan = date('%-$bulan1-%');
$masuk12 = mysqli_fetch_array(mysqli_query($koneksi,"select COUNT(masuk) as masuk from kehadirans where nama='$nama' and masuk != '00:00:00' and tanggal like '$bulan'"));
$masuk1 = mysqli_fetch_array(mysqli_query($koneksi,"select COUNT(bolos) as bolos from kehadirans where nama='$nama' and bolos ='true'"));
     $result1 = mysqli_fetch_array(mysqli_query($koneksi,"select * from setting"));
     $mak= $result1['makan'];
$data = array(
      
            'masuk'      =>  $masuk12['masuk'] * $mak,
            'bolos'      =>  $masuk1['bolos'] * $result1['bolos'],
        );

//tampil data
echo json_encode($data);
?>
