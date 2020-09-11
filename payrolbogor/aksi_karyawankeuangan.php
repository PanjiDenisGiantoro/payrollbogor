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
		header('location:karyawan.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into karyawans(id,nama,CardNumber,jabatan,status,tempatJabatan,tglMasuk,tglKeluar) values ('$id','$nama','$CardNumber','$jabatan','$status','$tempatJabatan','$tglMasuk','$tglKeluar')");
		if($simpan){
			header('location:karyawankeuangan.php?e=sukses');
		}else{
			header('location:karyawankeuangan.php?e=gagal');
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
		header('location:karyawankeuangan.php?view=tambah&e=bl');
	}else{
		$update = mysqli_query($konek,"update karyawans set nama='$nama',CardNumber='$CardNumber',jabatan='$jabatan',status='$status',tempatJabatan='$tempatJabatan',tglMasuk='$tglMasuk',tglKeluar='$tglKeluar' where id='$id '");
		if($update){
			header('location:karyawankeuangan.php?e=sukses');
		}else{
			header('location:karyawankeuangan.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from karyawans where id = '$_GET[id]'");
	if($hapus){
		header('location:karyawankeuangan.php?e=sukses');
	}else{
		header('location:karyawankeuangan.php?e=gagal');
	}
}
else if($_GET['act'] == 'resign'){
	$id = $_POST['id'];
	$tglKeluar = $_POST['tglKeluar'];
	if($id==''||$tglKeluar==''){
		header('location:karyawankeuangan.php?view=tambah&e=bl');
	}else{
		$resign = mysqli_query($konek,"update karyawans set tglKeluar='$tglKeluar' where id='$id'");
		if($resign){
			header('location:karyawankeuangan.php?e=sukses');
		}else{
			header('location:karyawankeuangan.php?e=gagal');
		}
	}
}
else if($_GET['act'] == 'kel'){
	$nama = $_POST['nama'];

	$id = $_POST['id'];
	$fungsional = $_POST['fungsional'];
	$gajipokok = $_POST['gajipokok'];
	$bpjskeslembaga = $_POST['bpjskeslembaga'];
	$bpjsketlembaga = $_POST['bpjsketlembaga'];
	$bpjskeskaryawan = $_POST['bpjskeskaryawan'];
	$bpjsketkaryawan = $_POST['bpjsketkaryawan'];
		$resign = mysqli_query($konek,"update karyawans set fungsional='$fungsional',bpjsKetlembaga='$bpjsketlembaga',bpjsKetkaryawan='$bpjsketkaryawan',bpjsKeslembaga='$bpjskeslembaga',bpjsKeskaryawan='$bpjskeskaryawan',gajipokok='$gajipokok'   where id='$id'");
		if($resign){
			// echo var_dump("update karyawans set keluarga='$keluarga' where nama='$nama'");die();
			header('location:karyawankeuangan.php?e=sukses');
		}else{
			
			header('location:karyawankeuangan.php?e=gagal');
		}
	
}
}
?>