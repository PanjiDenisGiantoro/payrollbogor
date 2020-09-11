<?php

session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){

	$jumlah = $_POST['jumlah'];
	$nama = $_POST['nama'];
	$tgl = $_POST['tgl'];
	$keterangan = $_POST['keterangan'];
	$status = $_POST['status'];
	if($keterangan==''||$tgl==''||$jumlah==''){
		header('location:lainkaryawan.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into lainlains(namaKaryawan,jumlah,keterangan,tgl,status) values ('$nama','$jumlah','$keterangan','$tgl','$status')");
		if($simpan){
			header('location:lainkaryawan.php?e=sukses');
		}else{
			
		// echo var_dump($simpan);die();
			header('location:lainkaryawan.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
		$id = $_POST['id'];
	$jumlah = $_POST['jumlah'];
	$tgl = $_POST['tgl'];
	$nama = $_POST['nama'];
	$keterangan = $_POST['keterangan'];	
	$status = $_POST['status'];
	if($keterangan==''||$tgl==''||$jumlah==''){
	
		header('location:lainkaryawan.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update lainlains set jumlah='$jumlah',keterangan='$keterangan',tgl='$tgl',namaKaryawan='$nama',satus='$status' where id='$id'");
		if($update){
			header('location:lainkaryawan.php?e=sukses');
		}else{
			header('location:lainkaryawan.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from lainlains where id = '$_GET[id]'");
	if($hapus){
		
		header('location:lainkaryawan.php?e=sukses');
	}else{
		// echo var_dump("delete from kasbons where idKaryawan = '$_GET[id]'");die();
		header('location:lainkaryawan.php?e=gagal');
	}
}
}
?>