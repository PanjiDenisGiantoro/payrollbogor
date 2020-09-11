<?php

session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$namaa = $_POST['namaa'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$level = $_POST['level'];
	$email = $_POST['email'];
	if( $namaa==''||$password==''||$username==''||$level==''){
		header('location:adduser.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into admin(username,password,namalengkap,level,email) values ('$username','$password','$namaa','$level','$email')");
		if($simpan){
			header('location:adduser.php?e=sukses');
		}else{
			header('location:adduser.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
$id = $_POST['id'];
	$namaa = $_POST['namaa'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$level = $_POST['level'];
	$email = $_POST['email'];
	if( $namaa==''||$password==''||$username==''||$level==''){
		header('location:adduser.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update admin set username='$username',password='$password',namalengkap='$namaa',level='$level',email='$email' where idadmin='$id'");
		if($update){
			header('location:adduser.php?e=sukses');
		}else{
			header('location:adduser.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from admin where idadmin = '$_GET[idadmin]'");
	if($hapus){
		
		header('location:adduser.php?e=sukses');
	}else{
		header('location:adduser.php?e=gagal');
	}
}
}
?>