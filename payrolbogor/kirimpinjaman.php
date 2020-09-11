<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that


session_start();

include "koneksi/koneksi.php";

$email = mysqli_fetch_array(mysqli_query($konek,"SELECT a.namaKaryawan,b.email,a.id FROM pinjamen a JOIN admin b ON a.namaKaryawan = b.namalengkap WHERE a.id = '$_GET[id]'"));
	$email1= $email['email'];
	$email2= $email['namaKaryawan'];
    $id= $email['id'];

$pass = mysqli_fetch_array(mysqli_query($konek,"SELECT password,email FROM setting"));
	$us= $pass['email'];
		$pas= $pass['password'];


$depar = mysqli_fetch_array(mysqli_query($konek,"SELECT b.departemen,a.jumlahPinjam,a.tgl,a.waktu,a.bayar,a.status FROM pinjamen a JOIN karyawans b ON a.namaKaryawan = b.nama WHERE a.id = '$_GET[id]'"));
$departemen = $depar['departemen'];
$jumlahPinjam = $depar['jumlahPinjam'];
$tgl = $depar['tgl'];
$waktu = $depar['waktu'];
$bayar = $depar['bayar'];

    if($depar['status'] == 'false'){
    $stat= "belum disetujui";
  }else{
    $stat = "sudah disetujui";
  }
    
$date=date('D-M-Y');
require 'PHPMailer-5.2.28/PHPMailerAutoload.php';

$mail      = new PHPMailer(true); //New instance, with exceptions enabled

$body     =   '<html>

<head>

</head>

<body>

<h2 align="center"><font face="Bradley Hand ITC">Pengajuan Pinjaman karyawan<br />

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
              <center><b>Pengajuan Pinjaman</b></center></th>
            </tr>
          <tr>
            <th colspan="1">Nama</th>
            <th colspan="1">Jabatan</th>
            <th colspan="1">jumlah Pinjaman</th>
            <th colspan="1">tanggal Pengajuan</th>
            <th colspan="1">Jenjang waktu</th>
            <th colspan="1"> bayar perbulan</th>
            <th colspan="1">status</th>
          </tr>
          </thead>
        	<tr>
        		<td>'.($email2).'</td>
        		<td>'.($departemen).'</td>
        		<td>'.($jumlahPinjam).'</td>
        		<td>'.($tgl).'</td>
        		<td>'.($waktu).'</td>
        		<td>'.($bayar).'</td>
        		<td>'.($stat).'</td>
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
//Replace the plain text body with one created manually
$mail->AltBody = 'Selamat Anda disetujui dalam Pengajuan pinjaman ';

//Attach an image file
// $mail->addAttachment('PHPMailer-5.2.28/examples/images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    // echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    header('location:pinjaman.php?e=sukses');
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;

}