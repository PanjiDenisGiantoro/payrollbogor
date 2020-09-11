<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi/koneksi.php';

	// membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
$nama_file = $_FILES['gambar']['name'];

$nama_file1 = $_FILES['gambar1']['name'];

$nama_file2 = $_FILES['gambar2']['name'];

$nama_file3 = $_FILES['gambar3']['name'];
$tmp_file3 = $_FILES['gambar3']['tmp_name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($nama_file != ""||$nama_file1 != ""||$nama_file2 != ""||$nama_file3 != "") {

$tmp_file = $_FILES['gambar']['tmp_name'];
$tmp_file1 = $_FILES['gambar1']['tmp_name'];
$tmp_file2 = $_FILES['gambar2']['tmp_name'];
$tmp_file3 = $_FILES['gambar3']['tmp_name'];//menggabungkan angka acak dengan nama file sebenarnya
   
$path = "uploaddocumen/".$nama_file;
$path1 = "uploaddocumen/".$nama_file1;
$path2 = "uploaddocumen/".$nama_file2;
$path3 = "uploaddocumen/".$nama_file3;

move_uploaded_file($tmp_file, $path);
move_uploaded_file($tmp_file1, $path1);
move_uploaded_file($tmp_file2, $path2);
move_uploaded_file($tmp_file3, $path3);
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE documentkaryawan SET KK = '$nama_file', KTP = '$nama_file1', foto = '$nama_file3', tabungan = '$nama_file2'";

                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($konek, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($konek).
                             " - ".mysqli_error($konek));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      // echo "<script>alert('Data berhasil diubah.');window.location='documentkaryawan.php';</script>";
                    }
              } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
          $query  = "UPDATE documentkaryawan SET KK = '$nama_file', KTP = '$nama_file1', foto = '$nama_file3', tabungan = '$nama_file2'";
              echo var_dump("UPDATE documentkaryawan SET KK = '$nama_file', KTP = '$nama_file1', foto = '$nama_file3', tabungan = '$nama_file2'");
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($konek, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($konek).
                             " - ".mysqli_error($konek));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        // //silahkan ganti index.php sesuai halaman yang akan dituju
        //   echo "<script>alert('Data berhasil diubah.');window.location='documentkaryawan.php';</script>";
      }
    }
?>