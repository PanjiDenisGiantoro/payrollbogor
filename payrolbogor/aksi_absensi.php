<?php

session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$idKaryawan = $_POST['nama'];
	$tglAbsen = $_POST['tgl'];
	$keterangan = $_POST['keterangan'];
	$status = $_POST['status'];
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];

	$fotobaru = date('dmYHis').$foto;
	$path = "img/".$fotobaru;
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	if( $idKaryawan==''||$tglAbsen==''||$keterangan==''){
	// echo var_dump("insert into absens(idKaryawan,tglAbsen,keterangan,Gambar) values ('$idKaryawan','$tglAbsen','$keterangan','$fotobaru')");die();

		header('location:absensi.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into absens(nama,tglAbsen,keterangan,Gambar,ket) values ('$idKaryawan','$tglAbsen','$keterangan','$fotobaru','$status')");
	
		mysqli_query($konek,"update kehadirans set bolos='$status',ket='$status' where nama='$idKaryawan' and tanggal='$tglAbsen'");
		if($simpan){
			header('location:absensi.php?e=sukses');
		}else{
			header('location:absensi.php?e=gagal');
		}
	}
}
}else if($_GET['act'] =='insert1'){
	$idKaryawan = $_POST['nama'];
	$tglAbsen = $_POST['tgl'];
	$keterangan = $_POST['keterangan'];
	$status = $_POST['status'];
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];

	$fotobaru = date('dmYHis').$foto;
	$path = "img/".$fotobaru;
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	if( $idKaryawan==''||$tglAbsen==''||$keterangan==''){
	// echo var_dump("insert into absens(idKaryawan,tglAbsen,keterangan,Gambar) values ('$idKaryawan','$tglAbsen','$keterangan','$fotobaru')");die();

		header('location:absensi.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into absens(nama,tglAbsen,keterangan,Gambar,ket) values ('$idKaryawan','$tglAbsen','$keterangan','$fotobaru','$status')");
	
		mysqli_query($konek,"update kehadirans set bolos='',ket='$status',masuk='',keluar='',telat='',awaltugas='',akhirtugas='' where nama='$idKaryawan' and tanggal='$tglAbsen'");
		if($simpan){
			header('location:absensi.php?e=sukses');
		}else{
			header('location:absensi.php?e=gagal');
		}
	}
}
}else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from absens where id = '$_GET[id]'");

	if($hapus){
		// echo var_dump("delete from absens where idKaryawan = '$_GET[id]'");die();

		header('location:absensi.php?e=sukses');
	}else{
		header('location:absensi.php?e=gagal');
	}
}
}


?>