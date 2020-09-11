<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$nama = $_POST['nama'];
	$jumlah = $_POST['jumlah'];
	$tgl = $_POST['tanggal'];
	$keterangan = $_POST['keterangan'];
	if($keterangan==''||$tgl==''||$jumlah==''){
		header('location:tuntam.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into tuntams(namaKaryawan,jumlah,keterangan,tanggal) values ('$nama','$jumlah','$keterangan','$tgl')");
		if($simpan){
			header('location:tuntam.php?e=sukses');
		}else{
			
		// echo var_dump($simpan);die();
			header('location:tuntam.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$jumlah = $_POST['jumlah'];
	$tgl = $_POST['tanggal'];
	$keterangan = $_POST['keterangan'];
	if( $keterangan==''||$tgl==''||$jumlah==''){
	
		echo var_dump("update tuntams set namaKaryawan='$nama',jumlah='$jumlah',keterangan='$keterangan',tanggal='$tgl' where id='$id'");die();
		header('location:tuntam.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update tuntams set namaKaryawan='$nama',jumlah='$jumlah',keterangan='$keterangan',tanggal='$tgl' where id='$id'");
		if($update){
			header('location:tuntam.php?e=sukses');
		}else{
			header('location:tuntam.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from tuntams where id = '$_GET[id]'");
	if($hapus){
		
		header('location:tuntam.php?e=sukses');
	}else{
		// echo var_dump("delete from kasbons where idKaryawan = '$_GET[id]'");die();
		header('location:tuntam.php?e=gagal');
	}
}
}
?>