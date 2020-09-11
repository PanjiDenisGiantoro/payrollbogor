<?php

session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){

	$nama = $_POST['nama'];
	$tgl = $_POST['tgl'];
	$keterangan = $_POST['keterangan'];
	$jammasuk = $_POST['jammasuk'];
	$jamkeluar = $_POST['jamkeluar'];
	$makan = $_POST['makan'];

	$jamkeluar1 = intval($jamkeluar) - intval($jammasuk);

	 $bpjs = mysqli_query($konek,"select * from setting limit 1");
                      $bpjs1 =mysqli_fetch_array($bpjs);
                      $mkaan=$bpjs1['lemburumum']; 
                      $lem = $jamkeluar1 * $mkaan+ $makan;
	if($tgl==''){
		header('location:lemburkhusus.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into lemburkhusus(namaKaryawan,tglLembur,timeIn,timeOut,makan,keterangan,jumlahjam,lembur) values ('$nama','$tgl','$jammasuk','$jamkeluar','$makan','$keterangan','$jamkeluar1','$lem')");
		if($simpan){
			header('location:lemburkhusus.php?e=sukses');
		}else{
			
		// echo var_dump($simpan);die();
			header('location:lemburkhusus.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$tgl = $_POST['tgl'];
	$keterangan = $_POST['keterangan'];
	$jammasuk = $_POST['jammasuk'];
	$jamkeluar = $_POST['jamkeluar'];
	$makan = $_POST['makan'];
	$jamkeluar1 = intval($jamkeluar) - intval($jammasuk);

	 $bpjs = mysqli_query($konek,"select * from setting limit 1");
                      $bpjs1 =mysqli_fetch_array($bpjs);
                      $mkaan=$bpjs1['lemburumum']; 
                      $lem = $jamkeluar1 * $mkaan+ $makan;
	if($tgl==''){
	
		header('location:lemburkhusus.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update lemburkhusus set namaKaryawan='$nama',tglLembur='$tgl',keterangan='$keterangan',timeIn='$jammasuk',timeOut='$jamkeluar',makan='$makan',jumlahjam='$jamkeluar1',lembur='$lem' where id='$id'");
		if($update){
			header('location:lemburkhusus.php?e=sukses');
		}else{
			header('location:lemburkhusus.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from lemburs where id = '$_GET[id]'");
	if($hapus){
		
		header('location:lemburkhusus.php?e=sukses');
	}else{
		// echo var_dump("delete from kasbons where idKaryawan = '$_GET[id]'");die();
		header('location:lemburkhusus.php?e=gagal');
	}
}
}
?>