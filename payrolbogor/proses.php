         <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $user = $_POST['username'];
                                $pass = $_POST['password'];
                                $p = md5($pass);

                                if($user == ''&& $pass==''){
                                    ?>
                                         <button type="button" class="btn btn-danger swalDefaultError">
                                         Warning
                                            <a href="#" class="alert-link">Password dan Username</a>belum diisi.
                                        </div>
                                    <?php
                                }else{
                                    include "koneksi/koneksi.php";
                                    $sqllogin = mysqli_query($konek,"select * from admin where username='$user' and password='$pass'");

                                    $jml = mysqli_num_rows($sqllogin);

                                    if($jml > 0){
                                    $d=mysqli_fetch_array($sqllogin);
                                      if($d['level']=="admin"){
                                      	session_start();
                                         $_SESSION['id'] = $d['idadmin'];
                                        $_SESSION['username'] = $user;
                                        $_SESSION['namalengkap'] = $d['namalengkap'];
                                        $_SESSION['level'] =="admin";
                                        header("location:index.php");

                                      }else if($d['level'] == "karyawan"){
                                      	
                                      	session_start();
                                         $_SESSION['id'] = $d['idadmin'];
                                        $_SESSION['username'] =  $user;
                                        $_SESSION['namalengkap'] = $d['namalengkap'];
                                        header("location:ok.php");
                                         
                                      }else{
                                         ?>
                                         <button type="button" class="btn btn-warning swalDefaultWarning">
                                         Warning
                                            <a href="#" class="alert-link">Password dan Username</a>Salah.
                                        </div>

                                        <?php 
                                      }
                                    }
                                  }
                                }



