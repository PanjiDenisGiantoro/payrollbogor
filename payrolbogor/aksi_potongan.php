<?php

session_start();
include "koneksi/koneksi.php";

if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$nama = $_POST['nama'];
	$zakat = $_POST['zakat'];
	$idPinjaman = $_POST['sisaPinjaman'];
	$idKasbon = $_POST['jumlahKasbon'];
	$idLainlain = $_POST['jumlah'];
	$makan = $_POST['masuk'];
	$bpjsKes = $_POST['bpjsKes'];
	$idKaryawan = $_POST['idKaryawan'];
	$bpjsKet = $_POST['bpjsKet'];
	$tanggalPotongan = $_POST['tanggalPotongan'];

	$bpjskeslembaga = $_POST['bpjskeslembaga'];
	$bpjsketlembaga = $_POST['bpjsketlembaga'];
	$bpjskeskaryawan = $_POST['bpjskeskaryawan'];
	$bpjsketkaryawan = $_POST['bpjsketkaryawan'];
	$p = mysqli_fetch_array(mysqli_query($konek,"select sisaPinjaman from pinjamen where namaKaryawan='$nama'"));
	$po = $p['sisaPinjaman'] - $_POST['sisaPinjaman'];

	if( $nama==''){
		
		header('location:potongan.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into potongans(zakat,Pinjaman,Kasbon,Lainlain,makan,bpjsKeslembaga,bpjsKeskaryawan,bpjsKetlembaga,bpjsKetkaryawan,tanggal_p,namaKaryawan) values ('$zakat','$idPinjaman','$idKasbon','$idLainlain','$makan','$bpjskeslembaga','$bpjskeskaryawan','$bpjsketlembaga','$bpjsketkaryawan','$tanggalPotongan','$nama')");

		mysqli_query($konek,"update pinjamen set sisaPinjaman='$po' where namaKaryawan='$nama'");
		if($simpan){
			header('location:potongan.php?e=sukses'); 
		}else{
			header('location:potongan.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
$id = $_POST['id'];
	$nama = $_POST['nama'];
	$zakat = $_POST['zakat'];
	$idPinjaman = $_POST['sisaPinjaman'];
	$idKasbon = $_POST['jumlahKasbon'];
	$idLainlain = $_POST['jumlah'];
	$makan = $_POST['masuk'];
	$bpjsKes = $_POST['bpjsKes'];
	$bpjsKet = $_POST['bpjsKet'];
	$tanggalPotongan = $_POST['tanggalPotongan'];

	$bpjskeslembaga = $_POST['bpjskeslembaga'];
	$bpjsketlembaga = $_POST['bpjsketlembaga'];
	$bpjskeskaryawan = $_POST['bpjskeskaryawan'];
	$bpjsketkaryawan = $_POST['bpjsketkaryawan'];
	if( $nama==''){
		header('location:potongan.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update potongans set zakat='$zakat',Pinjaman='$idPinjaman',Kasbon='$idKasbon',Lainlain='$idLainlain',makan='$makan',tanggal_p = '$tanggalPotongan',bpjsKetlembaga='$bpjskeslembaga',bpjsKetkaryawan='$bpjsketkaryawan',bpjsKeslembaga='$bpjskeslembaga',bpjsKeskaryawan='$bpjskeskaryawan' where id='$id'");
		if($update){
			header('location:potongan.php?e=sukses');
		}else{
		
			header('location:potongan.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from potongans where id = '$_GET[id]'");
	if($hapus){
		header('location:potongan.php?e=sukses');
	}else{
		header('location:potongan.php?e=gagal');
	}
}
}
?>