<?php

session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['username'])){
  header('location:login.php');
}

if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$nama = $_POST['nama'];
	$jumlahPinjam = $_POST['jumlahPinjam'];
	$tgl = $_POST['tgl'];

	$tanggalbayar = $_POST['tanggalbayar'];
	$status = $_POST['status'];
	$opsibayar = $_POST['opsibayar'];

	$waktu = $_POST['waktu'];
	$bayar = $_POST['bayar'];
	
	$query = "select sisaPinjaman from pinjamen where nama ='$nama'"; 
    $result = mysqli_query($konek, $query); 
    $row = mysqli_num_rows($result); 
          
	// $cek1 = $cek['sisaPinjaman'];
	if($nama==''){
		
		header('location:pinjamankaryawan.php?view=tambah&e=bl');
	}else if($row > 0 ){
				header('location:pinjamankaryawan.php?e=hutang');
	}else{
		$simpan = mysqli_query($konek,"insert into pinjamen(namaKaryawan,jumlahPinjam,tgl,status,opsibayar,tanggalbayar) values ('$nama','$jumlahPinjam','$tgl','$status','$opsibayar','$tanggalbayar')");
		if($simpan){
			header('location:pinjamankaryawan.php?e=sukses');
		}else {
			
			header('location:pinjamankaryawan.php?e=gagal');
		}
	}
		// echo var_dump("select sisaPinjaman from pinjamen where idKaryawan ='$idKaryawan' limit 1");die();
		// echo var_dump($cek);die();
	}


else if ($_GET['act']=='update'){
		$id = $_POST['id'];
	$nama = $_POST['nama'];
	$jumlahPinjam = $_POST['jumlahPinjam'];
	$sisaPinjaman = $_POST['sisaPinjaman'];
	$tgl = $_POST['tgl'];
	if($nama==''){
		header('location:pinjamankaryawan.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update pinjamen set namaKaryawan='$nama',jumlahPinjam='$jumlahPinjam',sisaPinjaman='$sisaPinjaman',tgl='$tgl' where id='$id'");
		if($update){
			header('location:pinjamankaryawan.php?e=sukses');
		}else{

			header('location:pinjamankaryawan.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){

	$hapus = mysqli_query($konek,"delete from pinjamen where id = '$_GET[id]'");
	if($hapus){
		header('location:pinjamankaryawan.php?e=sukses');
	}else{

		header('location:pinjamankaryawan.php?e=gagal');
	}
}else if ($_GET['act'] == 'ajukan'){
	$update = mysqli_query($konek,"update pinjamen set status='true' where  id='$_GET[id]'");
		if($update){
			header('location:kasbon.php?e=sukses');
		}else{
			header('location:kasbon.php?e=gagal');
		}
}else if($_GET['act'] =='insert2'){
	$nama = $_POST['nama'];
	$jumlahPinjam = $_POST['jumlahPinjam'];
	$tgl = $_POST['tgl'];

	$tanggalbayar = $_POST['tanggalbayar'];
	$status = $_POST['status'];
	$opsibayar = $_POST['opsibayar'];

	$waktu = $_POST['waktu'];
	$bayar = $_POST['bayar'];
	
	$query = "select sisaPinjaman from pinjamen where nama ='$nama'"; 
    $result = mysqli_query($konek, $query); 
    $row = mysqli_num_rows($result); 
          
	// $cek1 = $cek['sisaPinjaman'];
	if($nama==''){
		
		header('location:pinjamankaryawan.php?view=tambah&e=bl');
	}else if($row > 0 ){
				header('location:pinjamankaryawan.php?e=hutang');
	}else{
		$simpan = mysqli_query($konek,"insert into pinjamen(namaKaryawan,jumlahPinjam,tgl,status,opsibayar,waktu,bayar,sisaPinjaman) values ('$nama','$jumlahPinjam','$tgl','$status','$opsibayar','$waktu','$bayar','$jumlahPinjam')");
		if($simpan){
			header('location:pinjamankaryawan.php?e=sukses');
		}else {
			
			header('location:pinjamankaryawan.php?e=gagal');
		}
	}
		// echo var_dump("select sisaPinjaman from pinjamen where idKaryawan ='$idKaryawan' limit 1");die();
		// echo var_dump($cek);die();
	}

}
?>