<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "payrol");

//variabel nim yang dikirimkan form.php
$nim = $_GET['nama'];

//mengambil data
$query = mysqli_query($koneksi, "select departemen from karyawans where nama='$nim'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'departemen'      =>  $mahasiswa['departemen'],
        );

//tampil data
echo json_encode($data);
?>
