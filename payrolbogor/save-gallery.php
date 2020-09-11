<?php
// Load file koneksi.php
include "koneksi/koneksi.php";

// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$nama_file1 = $_FILES['gambar1']['name'];
$tmp_file1 = $_FILES['gambar1']['tmp_name'];

$nama_file2 = $_FILES['gambar2']['name'];
$tmp_file2 = $_FILES['gambar2']['tmp_name'];

$nama_file3 = $_FILES['gambar3']['name'];
$tmp_file3 = $_FILES['gambar3']['tmp_name'];
// Set path folder tempat menyimpan gambarnya

$path = "uploaddocumen/".$nama_file;
$path1 = "uploaddocumen/".$nama_file1;
$path2 = "uploaddocumen/".$nama_file2;
$path3 = "uploaddocumen/".$nama_file3;

  $nama = $_POST['nama'];
 // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
    // Proses upload
    if(move_uploaded_file($tmp_file, $path)){
    if(move_uploaded_file($tmp_file1, $path1)){
        if(move_uploaded_file($tmp_file2, $path2)){
            if(move_uploaded_file($tmp_file3, $path3)){
    // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :	
      // Proses simpan ke Database
      $query = "INSERT INTO documentkaryawan(namaKaryawan,KK,KTP,foto,tabungan) VALUES('".$nama."','".$nama_file."','".$nama_file1."','".$nama_file3."','".$nama_file2."')";
      $sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: documentkaryawan.php"); // Redirectke halaman index.php
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='documentkaryawan.php'>Kembali Ke Form</a>";
      }
    }
     }}}else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, Gambar gagal untuk diupload.";
      echo "<br><a href='documentkaryawan.php'>Kembali Ke Form</a>";
    }
  

?>