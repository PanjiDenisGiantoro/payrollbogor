

<?php 
// menghubungkan dengan koneksi
include 'koneksi/koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>
<?php
// menghubungkan dengan koneksi

// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
            $ada = mysqli_num_rows(mysqli_query($konek,"select nama from karyawans"));
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$akun     = $data->val($i, 1);
		$nama = $data->val($i, 3);
		$kelamin =$data->val($i, 4);
		$Gelar =$data->val($i, 5);
		$nomer = $data->val($i, 6);
		$tgllahir = $data->val($i, 7);
		$tglbekerja = $data->val($i, 8);
		$alamat = $data->val($i, 9);
		$Dept = $data->val($i, 11);

			mysqli_query($konek,"INSERT into karyawans(noakun,nama,kelamin,gelar,no_ponsel,tanggallahir,mulai_bekerja,alamat_rumah,departemen) values('$akun','$nama','$kelamin','$Gelar','$nomer','$tgllahir','$tglbekerja','$alamat','$Dept')");


		$berhasil++;	
	}



// 		$ada2=mysqli_num_rows(mysqli_query($konek,"SELECT DISTINCT departemen FROM karyawans"));
// 		if($ada2 >1){
			
// header('location:karyawan.php?e=gagal');
// 		}else{

// 		mysqli_query($konek,"INSERT INTO jabatan(namajabatan)SELECT DISTINCT departemen FROM karyawans");	
// 		}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);


		header('location:karyawan.php?e=sukses');
 
?>

