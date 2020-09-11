<?php

session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$nama = $_POST['nama'];
	$zakat = $_POST['gapok'];
	$idPinjaman = $_POST['sisaPinjaman'];
	$idKasbon = $_POST['jumlahKasbon'];
	$idLainlain = $_POST['jumlah'];
	$makan = $_POST['makan'];
	$bpjsKes = $_POST['bpjsKes'];
	$idKaryawan = $_POST['idKaryawan'];
	$bpjsKet = $_POST['bpjsKet'];
	$tanggalPotongan = $_POST['tanggalPotongan'];
	$lembur = $_POST['lembur'];

	if( $zakat==''||$idPinjaman==''||$idKasbon==''||$idLainlain==''||$makan==''||$bpjsKes==''||$bpjsKet==''){
		
		header('location:potongan.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into potongans(zakat,Pinjaman,Kasbon,Lainlain,makan,bpjsKes,bpjsKet,tanggal_p,namaKaryawan) values ('$zakat','$idPinjaman','$idKasbon','$idLainlain','$makan','$bpjsKes','$bpjsKet','$tanggalPotongan','$nama')");
		if($simpan){
			header('location:potongan.php?e=sukses'); 
		}else{
			echo var_dump("insert into potongans(zakat,Pinjaman,Kasbon,Lainlain,makan,bpjsKes,bpjsKet,tanggal_p,namaKaryawan) values ('$zakat','$idPinjaman','$idKasbon','$idLainlain','$makan','$bpjsKes','$bpjsKet','$tanggalPotongan','$nama')");die();
			header('location:potongan.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
$id = $_POST['id'];
	$zakat = $_POST['zakat'];
	$makan = $_POST['makan'];
	$transport = $_POST['transport'];
	$bpjskeslembaga = $_POST['bpjskeslembaga'];
	$bpjsketlembaga = $_POST['bpjsketlembaga'];
	$bpjskeskaryawan = $_POST['bpjskeskaryawan'];
	$bpjsketkaryawan = $_POST['bpjsketkaryawan'];
	$bolos = $_POST['bolos'];
	$UMK = $_POST['UMK'];
	$keluarga = $_POST['Keluarga'];

	$pinjaman = $_POST['pinjaman'];
	$lembur = $_POST['lembur'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	if( $zakat==''||$makan==''||$transport==''||$bolos==''){
		header('location:setting.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update setting set zakat='$zakat',transport='$transport',makan='$makan',bpjsketlembaga='$bpjsketlembaga',bpjskeslembaga='$bpjskeslembaga',bpjskeskaryawan='$bpjskeskaryawan',bpjsketkaryawan='$bpjsketkaryawan',bolos='$bolos',keluarga='$keluarga',UMK='$UMK',lemburumum='$lembur',pinjaman='$pinjaman',email='$email',password='$password' where id='$id'");
		if($update){
			header('location:setting.php?e=sukses');
		}else{
		
			header('location:setting.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from potongans where id = '$_GET[id]'");
	if($hapus){
		header('location:setting.php?e=sukses');
	}else{
		header('location:setting.php?e=gagal');
	}
}
}
?>