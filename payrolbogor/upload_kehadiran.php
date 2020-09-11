

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
 $tanggal = date_format('Y-m-d');
// jumlah default data yang berhasil di import
$berhasil = 0;	
for ($i=2; $i<=$jumlah_baris; $i++){
$akun     = $data->val($i, 2);
		$nama = $data->val($i, 4);
		$tanggal = $data->val($i, 6);
		$jamkerja = $data->val($i, 7);
		$awaltugas = $data->val($i, 8);
		$akhirtugas = $data->val($i, 9);
		// echo $tanggal;die();
		$tahun = substr ($tanggal,6);
		 $tan = substr ($tanggal,0,-8);
				$bulan = substr ($tanggal,3,-5);
				 $result = $tahun . "-" . $bulan . "-". $tan;
		$masuk =$data->val($i, 10);
		$keluar = $data->val($i, 11);
		$telat = $data->val($i, 14);
		$bolos = $data->val($i, 16);
		$waktukerja = $data->val($i, 18);
		$departemen = $data->val($i, 22);
$ada = mysqli_num_rows(mysqli_query($konek,"select nama,tanggal from kehadirans where nama='$nama' and tanggal='$result'"));
// echo "select * from kehadirans where nama='$nama' and tanggal='$result'";die();
if($ada > 1){

header('location:kehadiran.php?e=gagal');
}else{
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	
 	
		// input data ke database (table data_pegawai)
		set_time_limit(300);
		mysqli_query($konek,"INSERT into kehadirans(noakun,nama,tanggal,masuk,keluar,telat,bolos,waktukerja,departemen,awaltugas,akhirtugas,jamkerja) values('$akun','$nama','$result','$masuk','$keluar','$telat','$bolos','$waktukerja','$departemen','$awaltugas','$akhirtugas','$jamkerja')");  
		$berhasil++;
}

header('location:kehadiran.php?e=sukses');
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);
 
// alihkan halaman ke index.php
?>

