<?php
session_start();
include "koneksi/koneksi.php";
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
if(isset($_GET['act'])){
if($_GET['act'] =='insert'){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	// $CardNumber = $_POST['CardNumber'];
	$jabatan = $_POST['jabatan'];
	$status = $_POST['status'];
	$tempatJabatan = $_POST['tempatJabatan'];
	$tglMasuk = $_POST['tglMasuk'];
	$fungsional = $_POST['fungsional'];


	
	if( $nama==''||$jabatan==''||$status==''||$tempatJabatan==''){
		header('location:karyawansecurity.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into karyawans(id,nama,CardNumber,jabatan,status,tempatJabatan,tglMasuk,tglKeluar) values ('$id','$nama','$CardNumber','$jabatan','$status','$tempatJabatan','$tglMasuk','$tglKeluar')");
		if($simpan){
			header('location:karyawansecurity.php?e=sukses');
		}else{
			header('location:karyawansecurity.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$CardNumber = $_POST['CardNumber'];
	$jabatan = $_POST['jabatan'];
	$status = $_POST['status'];
	$tempatJabatan = $_POST['tempatJabatan'];
	$tglMasuk = $_POST['tglMasuk'];
	$tglKeluar = $_POST['tglKeluar'];
	
	if($id==''|| $nama==''||$CardNumber==''||$jabatan==''||$status==''||$tempatJabatan==''||$tglMasuk==''||$bpjsKes==''||$bpjsKet==''){
		// $update = ("update karyawans set nama='$nama',CardNumber='$CardNumber',jabatan='$jabatan',status='$status',tempatJabatan='$tempatJabatan',tglMasuk='$tglMasuk',tglKeluar='$tglKeluar',bpjsKes='$bpjsKes',bpjsKet='$bpjsKet' where id='$id '");
		// echo var_dump("update karyawans set nama='$nama',CardNumber='$CardNumber',jabatan='$jabatan',status='$status',tempatJabatan='$tempatJabatan',tglMasuk='$tglMasuk',tglKeluar='$tglKeluar',bpjsKes='$bpjsKes',bpjsKet='$bpjsKet' where id='$id '");die();
		header('location:karyawansecurity.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update karyawans set nama='$nama',CardNumber='$CardNumber',jabatan='$jabatan',status='$status',tempatJabatan='$tempatJabatan',tglMasuk='$tglMasuk',tglKeluar='$tglKeluar' where id='$id '");
		if($update){
			header('location:karyawansecurity.php?e=sukses');
		}else{
			header('location:karyawansecurity.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from karyawans where id = '$_GET[id]'");
	if($hapus){
		header('location:karyawansecurity.php?e=sukses');
	}else{
		header('location:karyawansecurity.php?e=gagal');
	}
}
else if($_GET['act'] == 'resign'){
	$id = $_POST['id'];
	$tglKeluar = $_POST['tglKeluar'];
	if($id==''||$tglKeluar==''){
		header('location:karyawansecurity.php?view=tambah&e=bl');
	}else{
		$resign = mysqli_query($konek,"update karyawans set tglKeluar='$tglKeluar' where id='$id'");
		if($resign){
			header('location:karyawansecurity.php?e=sukses');
		}else{
			header('location:karyawansecurity.php?e=gagal');
		}
	}
}
else if($_GET['act'] == 'kel'){
	$nama = $_POST['nama'];

	$id = $_POST['id'];
	$keluarga = $_POST['Keluarga'];
	$kelamin = $_POST['kelamin'];
	$Jabatan = $_POST['Jabatan'];
	$nomor = $_POST['nomor'];
	$notelp = $_POST['notelp'];
	$bekerja = $_POST['bekerja'];
	$alamat = $_POST['alamat'];
	$status = $_POST['status'];
	$bpjskeslembaga = $_POST['bpjskeslembaga'];
	$bpjsketlembaga = $_POST['bpjsketlembaga'];
	$bpjskeskaryawan = $_POST['bpjskeskaryawan'];
	$bpjsketkaryawan = $_POST['bpjsketkaryawan'];
		$resign = mysqli_query($konek,"update karyawans set keluarga='$keluarga',gelar='$Jabatan',no_ponsel='$nomor',tanggallahir='$notelp',mulai_bekerja='$bekerja',alamat_rumah='$alamat',status='$status',bpjsKetlembaga='$bpjsketlembaga',bpjsKetkaryawan='$bpjsketkaryawan',bpjsKeslembaga='$bpjskeslembaga',bpjsKeskaryawan='$bpjskeskaryawan'  where id='$id'");
		if($resign){
			// echo var_dump("update karyawans set keluarga='$keluarga' where nama='$nama'");die();
			header('location:karyawansecurity.php?e=sukses');
		}else{
			header('location:karyawansecurity.php?e=gagal');
		}
	
}
}
?>