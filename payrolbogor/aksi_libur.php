<?php

  // Set timezone
  date_default_timezone_set('UTC');



session_start();
include "koneksi/koneksi.php";
// if(!isset($_SESSION['username'])){
//   header('location:login.php');
// }
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){

	$namalibur = $_POST['namalibur'];
	$tanggallibur = $_POST['tanggallibur'];
	$tanggalakhirlibur = $_POST['tanggalakhirlibur'];
	if($namalibur==''||$tanggallibur==''||$tanggalakhirlibur==''){
		header('location:libur.php?view=tambah&e=bl');
	}else{

	 $simpan = mysqli_query($konek,"insert into libur1(namal,tanggal,akhir) values('$namalibur','$tanggallibur','$tanggalakhirlibur')");
while (strtotime($tanggallibur) <= strtotime($tanggalakhirlibur)) {
             
		 mysqli_query($konek,"insert into libur(namalibur,tanggallibur,tanggalakhirlibur) values ('$namalibur','$tanggallibur','$tanggalakhirlibur')");

                $tanggallibur = date ("Y-m-d", strtotime("+1 day", strtotime($tanggallibur)));

	  }
		if($simpan){
			header('location:libur.php?e=sukses');
		}else{
			
		// echo var_dump($simpan);die();
			header('location:libur.php?e=gagal');
		}
	
}
}
else if ($_GET['act']=='update'){
		$id = $_POST['id'];

	$namalibur = $_POST['namalibur'];
	$tanggallibur = $_POST['tanggallibur'];
	$tanggalakhirlibur = $_POST['tanggalakhirlibur'];
	if($namalibur==''||$tanggallibur==''||$tanggalakhirlibur==''){
	
		header('location:libur.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update libur set namalibur='$namalibur',tanggallibur='$tanggallibur',tanggalakhirlibur='$tanggalakhirlibur' where id='$id'");
		if($update){
			header('location:libur.php?e=sukses');
		}else{
			header('location:libur.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from libur1 where namal = '$_GET[namal]'");
	if($hapus){
		 mysqli_query($konek,"delete from libur where namalibur = '$_GET[namal]'");
		header('location:libur.php?e=sukses');
	}else{
		// echo var_dump("delete from kasbons where idKaryawan = '$_GET[id]'");die();
		header('location:libur.php?e=gagal');
	}
}else if ($_GET['act'] == 'ajukan'){
	$update = mysqli_query($konek,"update lainlains set status='true' where  id='$_GET[id]'");
		if($update){
			header('location:libur.php?e=sukses');
		}else{
			header('location:libur.php?e=gagal');
		}
}
}
?>