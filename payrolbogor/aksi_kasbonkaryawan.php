<?php

session_start();
include "koneksi/koneksi.php";
include"dompdf/autoload.inc.php";
use Dompdf\Dompdf;
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$nama = $_POST['nama'];
	$jumlahKasbon = $_POST['jumlahKasbon'];
	$tglKasbon = $_POST['TanggalKasbon'];
	$keterangan = $_POST['keterangan'];
	$status = $_POST['status'];
	if($nama==''||$keterangan==''||$tglKasbon==''||$jumlahKasbon==''){
		echo var_dump("insert into kasbons(namaKaryawan,jumlahKasbon,keterangan,tgl,status) values ('$nama','$jumlahKasbon','$keterangan','$tglKasbon')");die();
		header('location:kasbonkaryawan.php?view=tambah&e=bl');
	}else{

		$simpan = mysqli_query($konek,"insert into kasbons(namaKaryawan,jumlahKasbon,keterangan,tgl,status) values ('$nama','$jumlahKasbon','$keterangan','$tglKasbon','$status')");
		if($simpan){
			header('location:kasbonkaryawan.php?e=sukses');
		}else{
			header('location:kasbonkaryawan.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$jumlahKasbon = $_POST['jumlahKasbon'];
	$tglKasbon = $_POST['TanggalKasbon'];
	$keterangan = $_POST['keterangan'];
	$status = $_POST['status'];
	if($nama==''||$keterangan==''||$tglKasbon==''||$jumlahKasbon==''){
		
		header('location:kasbonkaryawan.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update kasbons set namaKaryawan='$nama',jumlahKasbon='$jumlahKasbon',keterangan='$keterangan',tgl='$tglKasbon',status='$status' where  id='$id'");
		if($update){
		
			header('location:kasbonkaryawan.php?e=sukses');
		}else{
			header('location:kasbonkaryawan.php?e=gagal');
		}
	}
}else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from kasbons where id = '$_GET[id]'");
	if($hapus){
		
		header('location:kasbonkaryawan.php?e=sukses');
	}else{
		header('location:kasbonkaryawan.php?e=gagal');
	}
}

}
?>