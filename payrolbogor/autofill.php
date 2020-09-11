<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "payrol");

//variabel nim yang dikirimkan form.php
$nim = $_GET['nama'];

//mengambil data
$query = mysqli_query($koneksi, "select * from pinjamen where nama='$nim'");
$mahasiswa = mysqli_fetch_assoc($query);
$data = array(
            'sisaPinjaman'      =>  $mahasiswa['sisaPinjaman'],);

//tampil data
echo json_encode($data);
?>
