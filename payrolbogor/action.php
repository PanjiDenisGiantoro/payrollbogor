<?php
 
error_reporting(E_ALL);
require 'PHPMailer/src/PHPMailer.php' ;
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
$mail =  new PHPMailer\PHPMailer\PHPMailer();
 
// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'panjidenisgiantoroo@gmail.com';
$mail->Password = 'warung03';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
 
$mail->setFrom('panjidenisgiantoroo@gmail.com', 'Usernamemu');
//$mail->addReplyTo('info@contoh.com', 'Usernamemu');
 
// Menambahkan penerima
$mail->addAddress($mail);
 
// Menambahkan cc atau bcc 
//$mail->addCC('cc@contoh.com');
//$mail->addBCC('bcc@contoh.com');
$pesan="Pesan ini dikirim dari aplikasi testing";
 
// Subjek email
$mail->Subject = "Email baru dar Usernamemu";
 
// Mengatur format email ke HTML
$mail->isHTML(true);
 
$mailContent="Email baru dar Usernamemu";
"<p>server SMTP dengan PHPMailer.</p>";
$mail->Body = $mailContent;
 
// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}   
 
?>