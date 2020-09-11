<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that


session_start();

include "koneksi/koneksi.php";

$email = mysqli_fetch_array(mysqli_query($konek,"SELECT a.namaKaryawan,b.email,a.id FROM head_gajis a JOIN admin b ON a.namaKaryawan = b.namalengkap WHERE a.id = '$_GET[id]'"));
	$email1= $email['email'];
	$email2= $email['namaKaryawan'];
    $id= $email['id'];


$pass = mysqli_fetch_array(mysqli_query($konek,"SELECT password,email FROM setting"));
	$us= $pass['email'];
		$pas= $pass['password'];
date_default_timezone_set('Etc/UTC');

$date=date('D-M-Y');
  $konek = mysqli_connect("localhost","root","","payrol");
            $result = mysqli_query($konek,"     SELECT a.namaKaryawan AS nama,f.fungsional,f.namajabatan,f.gapok,g.fungsional,g.keluarga,
        g.transport,g.idTunjangan AS lainlain, g.makanFas,b.zakat,b.Pinjaman,b.Kasbon,b.Lainlain,b.bpjsKetlembaga,b.bpjsKeslembaga,b.bpjsKetkaryawan,b.bpjsKeskaryawan,
        b.makan,a.idPotongan,a.idGapok,a.idTunjangan,g.bpjsKetlembaga,g.bpjsKeslembaga,g.bpjsKetkaryawan,g.bpjsKeskaryawan,
         (g.fungsional+g.keluarga+g.transport+g.idTunjangan+g.makanFas+g.bpjsKeskaryawan) AS total,h.lembur
          FROM head_gajis a
          JOIN potongans b ON a.namaKaryawan = b.namaKaryawan 
         JOIN karyawans c ON a.namaKaryawan = c.nama
        JOIN jabatan f ON c.departemen = f.namajabatan
        JOIN tunjangans g ON g.namaKaryawan = a.namaKaryawan
        join lemburs h on h.namaKaryawan = a.namaKaryawan
         WHERE a.id = '$_GET[id]'
        ");   


                     $gajipokok = mysqli_fetch_array(mysqli_query($konek,"SELECT idGapok as idGapok FROM head_gajis  WHERE id = '$_GET[id]'"));

                     $lemburkhusus = mysqli_fetch_array(mysqli_query($konek,"
SELECT a.lembur as lemburkhusus FROM lemburkhusus  a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan WHERE b.id = '$_GET[id]'"));

                     $lemburumum = mysqli_fetch_array(mysqli_query($konek,"
SELECT a.lembur as lembur FROM lemburs  a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan WHERE b.id = '$_GET[id]'"));


            $result11 = mysqli_fetch_array(mysqli_query($konek,"SELECT  (a.fungsional+a.keluarga+a.transport+a.idTunjangan+a.makanFas+a.bpjsKeskaryawan) AS total,
a.fungsional,a.keluarga,a.transport,a.idTunjangan , a.makanFas,a.namaKaryawan,a.bpjsKeskaryawan,a.bpjsKetkaryawan FROM tunjangans a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan    WHERE b.id = '$_GET[id]'"));

            $result112 = mysqli_fetch_array(mysqli_query($konek,"
SELECT a.nama,a.departemen FROM karyawans a JOIN head_gajis b ON a.nama = b.namaKaryawan WHERE b.id = '$_GET[id]'"));


            $result113 = mysqli_fetch_array(mysqli_query($konek,"SELECT b.zakat,b.Pinjaman,b.Kasbon,b.Lainlain,b.bpjsKetlembaga,b.bpjsKeslembaga,b.bpjsKetkaryawan,b.bpjsKeskaryawan,b.makan FROM potongans b JOIN head_gajis c ON b.namaKaryawan = c.namaKaryawan WHERE c.id = '$_GET[id]'"));


            $result114 = mysqli_fetch_array(mysqli_query($konek,"
        SELECT a.lembur FROM lemburs a JOIN head_gajis b ON a.namaKaryawan = b.namaKaryawan  WHERE b.id = '$_GET[id]'"));


            $r=mysqli_fetch_array($result);
            $namaa = $r['nama'];
            $bpjskes1=mysqli_fetch_array(mysqli_query($konek,"select * from setting"));
            $bpjsket1=mysqli_fetch_array(mysqli_query($konek,"select * from setting"));

            $sakit=mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(ket) as sakit FROM absens a JOIN karyawans b ON b.nama = a.nama WHERE a.ket='sakit' AND b.nama =  '$namaa'"));

            $izin=mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(ket) as izin FROM absens a JOIN karyawans b ON b.nama = a.nama WHERE a.ket='izin' AND b.nama =  '$namaa'"));

            $alfa=mysqli_fetch_array(mysqli_query($konek,"SELECT COUNT(bolos) as bolos FROM kehadirans a JOIN karyawans b ON b.nama = a.nama WHERE a.bolos='true' AND b.nama =  '$namaa'"));


            $pot=  $r['zakat'] +  $r['Kasbon'] + $r['Pinjaman'] + $r['makan'] +$r['lembur']+  $r['bpjsKetlembaga']+ $r['bpjsKeslembaga']+ $r['bpjsKetkaryawan']+ $r['bpjsKeskaryawan']+$alfa['bolos'];

 
          $totalgaji =$result11['fungsional']+$result11['keluarga']+$result11['transport']+ $result11['bpjsKetkaryawan']+$result11['bpjsKeskaryawan']+$result11['makanFas']+$result11['idTunjangan']+$lemburumum['lembur']+$lemburkhusus['lemburkhusus']+$gajipokok['idGapok'];

          $pott =$alfa['bolos'] *$bpjsket1['bolos'];

          $potongannn = $result113['zakat'] +  $result113['Kasbon'] + $result113['Pinjaman'] + $result113['makan']+  $result113['bpjsKetlembaga']+ $result113['bpjsKeslembaga']+ $result113['bpjsKetkaryawan']+ $result113['bpjsKeskaryawan']+$result113['Lainlain']+$pott;


          $totall = $totalgaji - $potongannn;
          ?>
          <?php
 function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " triliun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     
    return $hasil;
}

$angka = $totall;


require 'PHPMailer-5.2.28/PHPMailerAutoload.php';

$mail      = new PHPMailer(true); //New instance, with exceptions enabled

$body     =   '<html>

<head>

</head>

<body>

<h2 align="center"><font face="Bradley Hand ITC">Selamat Mendapatkan Gaji<br />

'.($email2).' –

'.($result112['departemen']).'

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
              <center><b>Rincian Gaji</b></center>
            </tr>
          <tr>
            <th colspan="1"align="left">Gaji pokok</th>
            <th colspan="1"></th>
            <td colspan="1">Rp  '.$gajipokok['idGapok'].'</td>
            <th colspan="1" align="left">Potongan</th>
            <th colspan="1"></th>
            <th colspan="1"></th>
          </tr>
          </thead>
          <tbody>

          <tr>
            <td></td>
            <td>fungsional</td>
            <td>Rp <?php '. $result11['fungsional'].' &nbsp;</td>
            <td>zakat</td>
                 <td></td>
            <td>Rp '.$result113['zakat'].'</td>
          </tr>
          <tr>
            <td></td>
            <td>keluarga</td>
            <td>Rp '.$result11['keluarga'].' &nbsp;</td>
            <td>kasbon</td>
                 <td></td>
            <td>Rp '. $result113['Kasbon'].'</td>
          </tr>
          <tr>
            <td></td>
            <td>transport</td>
            <td>Rp '.$result11['transport'].'</td>
            <td>pinjaman Angsuran</td>
                 <td></td>
            <td>Rp '.$result113['Pinjaman'].'</td>
          </tr>
          <tr>
            <td></td>
            <td>BPJS Ketenagakerjaan</td>
            <td>Rp '.$result11['bpjsKetkaryawan'].'</td>
            <td>Makan (Fasilitas)</td>
                 <td></td>
            <td>Rp '.$result113['makan'].'</td>
          </tr>
              <tr>
            <td></td>
            <td>BPJS Kesehatan</td>
            <td>Rp '.$result11['bpjsKeskaryawan'].'</td>
            <td>Potongan Lain lainlain</td>
                 <td></td>
            <td>Rp '.$result113['Lainlain'].'</td>
          </tr>
             <tr>
            <td></td>
            <td>makan ( fasilitas )</td>
            <td>Rp '.$result11['makanFas'].'</td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
             <tr>
            <td></td>
            <td>Tunjangan Tambahan</td>
            <td>Rp '.$result11['idTunjangan'].'</td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
              <tr>
            <td></td>
            <td>Lembur Umum</td>
            <td>Rp '.$lemburumum['lembur'].'</td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
               <tr>
            <td></td>
            <td>Lembur Khusus</td>
            <td>Rp '.$lemburkhusus['lemburkhusus'].'</td>
            <td></td>
                 <td></td>
            <td></td>
          </tr>
             <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>BPJS Ketenagakerjaan</td>
            <td>lembaga</td>
             <td>Rp '.$result113['bpjsKetlembaga'].'</td>
          </tr>
              <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Karyawan</td>
             <td>Rp '.$result113['bpjsKetkaryawan'].'</td>
          </tr>
              <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>BPJS Kesehatan</td>
            <td>lembaga</td>
             <td>Rp '.$result113['bpjsKeslembaga'].'</td>
          </tr>
            
                  <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Karyawan</td>
             <td>Rp '.$result113['bpjsKeskaryawan'].'</td>
          </tr>
  
                    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Absensi</td>
            <td>-sakit</td>
             <td>'.$sakit['sakit'].'</td>
          </tr>
                    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>-izin</td>
             <td>'.$izin['izin'].'</td>
          </tr>
                    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>-tanpa keterangan</td>
             <td>'.$alfa['bolos'].'</td>
             <?php 
             ?>
          </tr>
         
 

                     <tr>
            <td>jumlah gaji</td>
            <td></td>
            <td>Rp '. $totalgaji.'</td>
            <td>jumlah Potongan</td>
            <td></td>
             <td>Rp '. $potongannn  .'</td>
          </tr>
                           <tr>
            <td>Total Yang dibayarkan</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td>Rp '. $totall.'</td>
          </tr>
                   <tr>
            <td>Terbilang</td>
            <td colspan="5">'.terbilang($angka) .' ribu rupiah</td>
            
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
$mail->AltBody = 'Selamat Anda Mendapatkan Gaji ';

//Attach an image file
// $mail->addAttachment('PHPMailer-5.2.28/examples/images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    // echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    header('location:gaji.php?e=sukses');
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