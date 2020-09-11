    <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Yayasan SIIHA </title>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
            
    <div class="container-fluid bg-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 login-card">
                    <div class="row">
                        <div class="col-md-5 detail-part">
                            <h1>Yayasan SIIHA</h1>
                        </div>
                        
                        <div class="col-md-7 logn-part">
                          <div class="row">
                              <div class="col-lg-10 col-md-12 mx-auto">
                                  <div class="logo-cover">
                                       <center><img src="images/siiha.png" alt=""></center>
                                   </div>

      <form action="" method="post" role="form">
                                    <div class="form-cover">
                                        <h6>Login Here</h6>
                                             <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $user = $_POST['username'];
                                $pass = $_POST['password'];
                                $p = md5($pass);

                                    include "koneksi/koneksi.php";

                                    $sqllogin = mysqli_query($konek,"select * from admin where username='$user' and password='$pass'");

                                    $d=mysqli_fetch_array($sqllogin);
                                if($user == ''&& $pass==''){
                                    ?>
                                         <button type="button" class="btn btn-danger swalDefaultError">
                                         Warning
                                            <a href="#" class="alert-link">Password dan Username</a>belum diisi.
                                        </div>
                                    <?php
                                }else if($user != $d['username'] && $pass!=$d['password']){
                                    ?>
                                         <button type="button" class="btn btn-warning swalDefaultError">
                                         Warning
                                            <a href="#" class="alert-link">Password dan Username</a>salah
                                        </div>
                                    <?php
                                }else{
                                    $jml = mysqli_num_rows($sqllogin);

                                        session_start();
                                    if($jml > 0){
                                      
                                      if($d['level']=="HRD"){
                                         $_SESSION['id'] = $d['idadmin'];
                                        $_SESSION['username'] = $user;
                                        $_SESSION['namalengkap'] = $d['namalengkap'];
                                        $_SESSION['level'] =="admin";
                                        define('inde',TRUE);
                                        header("location:index.php");

                                      }else if($d['level'] == "karyawan"){
                                        
                                         $_SESSION['id'] = $d['idadmin'];
                                        $_SESSION['username'] =  $user;
                                        $_SESSION['namalengkap'] = $d['namalengkap'];
                                        define('ook',TRUE);
                                        header("location:ok.php");
                                         
                                      }else if($d['level'] == "Keuangan"){
                                        
                                         $_SESSION['id'] = $d['idadmin'];
                                        $_SESSION['username'] =  $user;
                                        $_SESSION['namalengkap'] = $d['namalengkap'];
                                        define('inde1',TRUE);
                                        header("location:index1.php");
                                         
                                      }else{
                                         ?>
                                         <button type="button" class="btn btn-warning swalDefaultWarning">
                                         Warning
                                            <a href="#" class="alert-link">Password dan Username</a> Salah.
                                        </div>

                                        <?php 
                                         header("Location: login.php");
                                      }
                                    }
                                  }
                                }



?>                     
             
                                         <input placeholder="Enter Username" type="text" class="form-control"name="username">
                                         <input Placeholder="Enter PAssword" type="password" class="form-control"name="password">
                                         <div class="row form-footer">
                                             <div class="col-md-6 forget-paswd">
                                                 <p>Jika lupa password, Hubungi Admin</p>    
                                             </div>
                                             <div class="col-md-6 button-div">
                                                 <button class="btn btn-primary">Login</button>
                                             </div>
                                         </div>
                                    </div>
                                </form>
                              </div>
                          </div>
                           
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</html>