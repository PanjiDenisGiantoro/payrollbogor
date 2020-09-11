<?php

session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$gapok = $_POST['idGapok'];
	$idPotongan = $_POST['idPotongan'];
	$idTunjangan = $_POST['idTunjangan'];
	$total = $_POST['total'];
	$tglBuat = $_POST['tglBuat'];
	$karyawan = $_POST['nama'];


	if( $tglBuat==''||$total==''||$idTunjangan==''||$idPotongan==''||$gapok==''){
		echo var_dump("insert into head_gajis(namaKaryawan,idGapok,idTunjangan,idPotongan,total,tglBuat) values ('$karyawan','$gapok','$idTunjangan','$idPotongan','$total','$tglBuat')");die();
		header('location:gaji.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into head_gajis(namaKaryawan,idGapok,idTunjangan,idPotongan,total,tglBuat) values ('$karyawan','$gapok','$idTunjangan','$idPotongan','$total','$tglBuat')");
		if($simpan){
			header('location:gaji.php?e=sukses');
		}else{
			header('location:gaji.php?e=gagal');
		}
	}
}

else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from head_gajis where id = '$_GET[id]'");
	if($hapus){
		header('location:gaji.php?e=sukses');
	}else{
		header('location:gaji.php?e=gagal');
	}
}
}
?>