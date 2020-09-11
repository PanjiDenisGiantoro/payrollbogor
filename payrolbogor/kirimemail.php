<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SLIP GAJI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
      <?php $tanggal = date('l, d-m-Y');?>
<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
  <h1>SLIP GAJI KARYAWAN SIIHA </h1>
  <div align="center">
    <a href="https://github.com/PHPMailer/PHPMailer/"><img src="images/phpmailer.png" height="90" width="340" alt="PHPMailer rocks"></a>
  </div>
  <?php echo $tanggal
 	session_start();
include "koneksi/koneksi.php";

$email = mysqli_fetch_array(mysqli_query($konek,"SELECT a.namaKaryawan,b.email FROM head_gajis a JOIN admin b ON a.namaKaryawan = b.namalengkap WHERE a.id = '$_GET[id]'"));
	echo $email1= $email['email'];die();
	$email2= $email['namaKaryawan'];
$pass = mysqli_fetch_array(mysqli_query($konek,"SELECT password,email FROM setting"));
	echo $us= $pass['email'];
	echo $pas= $pass['password'];
  ?>
  <span style="font-size: 48px">😂 🦄 💥 📤 📧</span>
</div>
</body>
</html>
