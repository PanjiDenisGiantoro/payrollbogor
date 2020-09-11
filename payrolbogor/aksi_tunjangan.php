<?php

session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$idKaryawan = $_POST['nama'];
	$id_jabatan = $_POST['departemen'];
	$fungsional = $_POST['fungsional'];
	$keluarga = $_POST['keluarga'];
	$transport = $_POST['Transport'];
		$idTunjangan = $_POST['jumlah'];
	$makanFas = $_POST['makanFas'];

	$bpjskeslembaga = $_POST['bpjskeslembaga'];
	$bpjsketlembaga = $_POST['bpjsketlembaga'];
	$bpjskeskaryawan = $_POST['bpjskeskaryawan'];
	$bpjsketkaryawan = $_POST['bpjsketkaryawan'];
		$simpan = mysqli_query($konek,"insert into tunjangans(jabatan,fungsional,keluarga,transport,idTunjangan,makanFas,namaKaryawan,bpjsKeslembaga,bpjsKeskaryawan,bpjsKetlembaga,bpjsKetkaryawan) values ('$id_jabatan','$fungsional','$keluarga','$transport','$idTunjangan','$makanFas','$idKaryawan','$bpjskeslembaga','$bpjskeskaryawan','$bpjsketlembaga','$bpjsketkaryawan')");
		if($simpan){
			header('location:tunjangan.php?e=sukses');
		}else{	
			header('location:tunjangan.php?e=gagal');
		}
	}

else if ($_GET['act']=='update'){
	$id = $_POST['id'];
	$idKaryawan = $_POST['nama'];
	$id_jabatan = $_POST['departemen'];
	$fungsional = $_POST['fungsional'];
	$keluarga = $_POST['keluarga'];
	$transport = $_POST['Transport'];
		$idTunjangan = $_POST['jumlah'];
	$makanFas = $_POST['makanFas'];
	$bpjskeslembaga = $_POST['bpjskeslembaga'];
	$bpjsketlembaga = $_POST['bpjsketlembaga'];
	$bpjskeskaryawan = $_POST['bpjskeskaryawan'];
	$bpjsketkaryawan = $_POST['bpjsketkaryawan'];
	if( $id_jabatan==''||$fungsional==''||$keluarga==''||$transport==''){
		
		header('location:tunjangan.php?view=tambah&e=bl');
	}else{

		$update = mysqli_query($konek,"update tunjangans set namaKaryawan='$idKaryawan',jabatan='$id_jabatan',fungsional='$fungsional',keluarga='$keluarga',transport='$transport',idTunjangan='$idTunjangan',makanFas='$makanFas',bpjsKetlembaga='$bpjskeslembaga',bpjsKetkaryawan='$bpjsketkaryawan',bpjsKeslembaga='$bpjskeslembaga',bpjsKeskaryawan='$bpjskeskaryawan' where id='$id'");
		if($update){
			header('location:tunjangan.php?e=sukses');
		}else{			
			header('location:tunjangan.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from tunjangans where id = '$_GET[id]'");
	if($hapus){
		header('location:tunjangan.php?e=sukses');
	}else{
		header('location:tunjangan.php?e=gagal');
	}
}
}
?>