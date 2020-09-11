<?php

include "koneksi/koneksi.php";

require 'PHPMailer-5.2.28/PHPMailerAutoload.php';
if(isset($_GET['act'])){

if($_GET['act'] =='insert'){
	$nama = $_POST['nama'];
	$jumlahKasbon = $_POST['jumlahKasbon'];
	$tglKasbon = $_POST['TanggalKasbon'];
	$keterangan = $_POST['keterangan'];
	if($nama==''||$keterangan==''||$tglKasbon==''||$jumlahKasbon==''){
		echo var_dump("insert into kasbons(namaKaryawan,jumlahKasbon,keterangan,tgl) values ('$nama','$jumlahKasbon','$keterangan','$tglKasbon')");die();
		header('location:kasbon.php?view=tambah&e=bl');
	}else{
		$simpan = mysqli_query($konek,"insert into kasbons(namaKaryawan,jumlahKasbon,keterangan,tgl) values ('$nama','$jumlahKasbon','$keterangan','$tglKasbon')");
		if($simpan){
			header('location:kasbon.php?e=sukses');
		}else{
			header('location:kasbon.php?e=gagal');
		}
	}
}
else if ($_GET['act']=='update'){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$jumlahKasbon = $_POST['jumlahKasbon'];
	$tglKasbon = $_POST['TanggalKasbon'];
	$keterangan = $_POST['keterangan'];
	$alasan = $_POST['alasan'];

	$status = $_POST['status'];
	if($nama==''||$keterangan==''||$tglKasbon==''||$jumlahKasbon==''){
		
		header('location:kasbon.php?view=tambah&e=bl');
	}else{


$email = mysqli_fetch_array(mysqli_query($konek,"SELECT a.namaKaryawan,b.email,a.id FROM kasbons a JOIN admin b ON a.namaKaryawan = b.namalengkap WHERE a.id = '$id'"));
	$email1= $email['email'];
	$email2= $email['namaKaryawan'];
    $id= $email['id'];

$pass = mysqli_fetch_array(mysqli_query($konek,"SELECT password,email FROM setting"));
	$us= $pass['email'];
		$pas= $pass['password'];


$depar = mysqli_fetch_array(mysqli_query($konek,"SELECT b.departemen,a.jumlahKasbon,a.tgl,a.keterangan,a.status,a.alasan FROM kasbons a JOIN karyawans b ON a.namaKaryawan = b.nama WHERE a.id = '$id'"));
$departemen = $depar['departemen'];
$jumlahPinjam = $depar['jumlahKasbon'];
$tgl = $depar['tgl'];
$waktu = $depar['keterangan'];

    if($depar['status'] == 'false'){
    $stat= "belum disetujui";
  }else{
    $stat = "sudah disetujui";
  }
    

			$date=date('D-M-Y');

$mail      = new PHPMailer(true); //New instance, with exceptions enabled

$body     =   '<html>

<head>

</head>

<body>

<h2 align="center"><font face="Bradley Hand ITC">Pengajuan Kasbon karyawan<br />

'.($email2).' 

<br />

'.($date).'

</h2></font>



<h2 align="center"><font face="verdana"><b>



Yayasan SIIHA<br />

 <div class="row">
      <div class="col-12 table-responsive">
       <center> <table class=" table-bordered" border="1">
          <thead>
            <tr>
            <th colspan=7>
              <center><b>Pengajuan kasbon</b></center></th>
            </tr>
          <tr>
            <th colspan="1">Nama</th>
            <th colspan="1">Jabatan</th>
            <th colspan="1">jumlah kasbon</th>
            <th colspan="1">tanggal Pengajuan</th>
            <th colspan="1">Keterangan</th>
            <th colspan="1">status</th>
            <th colspan="1">alasan</th>
          </tr>
          </thead>
        	<tr>
        		<td>'.($email2).'</td>
        		<td>'.($departemen).'</td>
        		<td>'.($jumlahPinjam).'</td>
        		<td>'.($tgl).'</td>
        		<td>'.($waktu).'</td>
        		<td>tidak disetujui</td>
        		<td>'.($alasan).'</td>
        	</tr>
          </tbody>
          </table></center>



</font></h2>

</body></html>';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "$us";

//Password to use for SMTP authentication
$mail->Password = "$pas";

//Set who the message is to be sent from
$mail->setFrom("$us", 'Yayasan Sekolah SIIHA');

//Set an alternative reply-to address
$mail->addReplyTo("$us", 'Yayasan Sekolah SIIHA');

//Set who the message is to be sent to
$mail->addAddress("$email1", "$email2");

//Set the subject line
$mail->Subject = 'SLIP GAJI Yayasan SIIHA';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->MsgHTML($body);
$mail->AltBody = 'Selamat Anda disetujui dalam Pengajuan kasbon ';

//Attach an image file
// $mail->addAttachment('PHPMailer-5.2.28/examples/images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    // header('location:kasbon.php?e=gagal');
} else {
    echo "Message sent!";
    header('location:kasbon.php?e=sukses');
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;

}	
	$update = mysqli_query($konek,"update kasbons set status='tidak disetujui',alasan='$alasan' where  id='$id'");
		if($update){
		
			header('location:kasbon.php?e=sukses');
		}else{
			header('location:kasbon.php?e=gagal');
		}
	}
}
else if ($_GET['act'] == 'del'){
	$hapus = mysqli_query($konek,"delete from kasbons where id = '$_GET[id]'");
	if($hapus){
		
		header('location:kasbon.php?e=sukses');
	}else{
		header('location:kasbon.php?e=gagal');
	}
}else if ($_GET['act'] == 'ajukan'){

$email = mysqli_fetch_array(mysqli_query($konek,"SELECT a.namaKaryawan,b.email,a.id FROM kasbons a JOIN admin b ON a.namaKaryawan = b.namalengkap WHERE a.id = '$_GET[id]'"));
	$email1= $email['email'];
	$email2= $email['namaKaryawan'];
    $id= $email['id'];

$pass = mysqli_fetch_array(mysqli_query($konek,"SELECT password,email FROM setting"));
	$us= $pass['email'];
		$pas= $pass['password'];


$depar = mysqli_fetch_array(mysqli_query($konek,"SELECT b.departemen,a.jumlahKasbon,a.tgl,a.keterangan,a.status FROM kasbons a JOIN karyawans b ON a.namaKaryawan = b.nama WHERE a.id = '$_GET[id]'"));
$departemen = $depar['departemen'];
$jumlahPinjam = $depar['jumlahKasbon'];
$tgl = $depar['tgl'];
$waktu = $depar['keterangan'];

    if($depar['status'] == 'false'){
    $stat= "belum disetujui";
  }else{
    $stat = "sudah disetujui";
  }
    

	$update = mysqli_query($konek,"update kasbons set status='true' where  id='$_GET[id]'");
		if($update){
			$date=date('D-M-Y');

$mail      = new PHPMailer(true); //New instance, with exceptions enabled

$body     =   '<html>

<head>

</head>

<body>

<h2 align="center"><font face="Bradley Hand ITC">Pengajuan Kasbon karyawan<br />

'.($email2).' 

<br />

'.($date).'

</h2></font>



<h2 align="center"><font face="verdana"><b>



Yayasan SIIHA<br />

 <div class="row">
      <div class="col-12 table-responsive">
       <center> <table class=" table-bordered" border="1">
          <thead>
            <tr>
            <th colspan=7>
              <center><b>Pengajuan kasbon</b></center></th>
            </tr>
          <tr>
            <th colspan="1">Nama</th>
            <th colspan="1">Jabatan</th>
            <th colspan="1">jumlah kasbon</th>
            <th colspan="1">tanggal Pengajuan</th>
            <th colspan="1">Keterangan</th>
            <th colspan="1">status</th>
          </tr>
          </thead>
        	<tr>
        		<td>'.($email2).'</td>
        		<td>'.($departemen).'</td>
        		<td>'.($jumlahPinjam).'</td>
        		<td>'.($tgl).'</td>
        		<td>'.($waktu).'</td>
        		<td>disetujui</td>
        	</tr>
          </tbody>
          </table></center>



</font></h2>

</body></html>';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "$us";

//Password to use for SMTP authentication
$mail->Password = "$pas";

//Set who the message is to be sent from
$mail->setFrom("$us", 'Yayasan Sekolah SIIHA');

//Set an alternative reply-to address
$mail->addReplyTo("$us", 'Yayasan Sekolah SIIHA');

//Set who the message is to be sent to
$mail->addAddress("$email1", "$email2");

//Set the subject line
$mail->Subject = 'SLIP GAJI Yayasan SIIHA';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->MsgHTML($body);
$mail->AltBody = 'Selamat Anda disetujui dalam Pengajuan kasbon ';

//Attach an image file
// $mail->addAttachment('PHPMailer-5.2.28/examples/images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    // header('location:kasbon.php?e=gagal');
} else {
    echo "Message sent!";
    header('location:kasbon.php?e=sukses');
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;

}

			header('location:kasbon.php?e=sukses');
		}else{
			header('location:kasbon.php?e=gagal');
		}
}
}
?>