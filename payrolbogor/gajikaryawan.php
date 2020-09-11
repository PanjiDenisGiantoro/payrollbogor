<?php

  session_start();
?>
 <?php

include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/toastr/toastr.min.css">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->

  <link rel="stylesheet" href="asset/AdminLTE-3.0.2/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome -->
  <!-- Font Awesome -->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

 <?php  include "halaman/karyawan/content.php";?>


<?php 
$view =isset($_GET['view']) ? $_GET['view'] :null;
switch ($view) {
default:
?>
 <?php
if(isset($_GET['e']) && $_GET['e']=='sukses'){
?>
<div class="alert alert-success" role="alert" style="margin-top: 30px">

   <button type="button" class="btn btn-success swalDefaultSuccess">
                  Launch Success Toast
                </button>
Selamat <strong>Proses Berhasil</strong>
</div>

<?php
}else if(isset($_GET['e']) && $_GET['e']=='gagal'){
?>
<div class="alert alert-danger" role="alert"  style="margin-top: 30px">
Error <strong>Proses Gagal</strong>
</div>

<?php
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> data gaji</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Karyawan STIFFIN</h3>
          
            </div>
      <br>
            
            <!-- /.card-header -->
          
        
             
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th align='center'>No</th>
				<th align='center'>Id Karyawan</th>
				<th align='center'>Tanggal Buat</th>
				<th align='center'>Potongan</th>
				<th align='center'>Gaji Pokok</th>
				<th align='center'>Tunjangan</th>
				<th align='center'>Total</th>
				<th align='center' style="width: 100px;">Aksi</th>       
                </tr>
                </thead>
                <tbody>
              
<?php
$sql1 = mysqli_fetch_array(mysqli_query($konek,"select namalengkap from admin where username = '$_SESSION[username]'
"));


$sql = mysqli_query($konek,"select * from head_gajis where namaKaryawan = '$sql1[namalengkap]'
");

$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[namaKaryawan]</td>
<td align='center'>$d[tglBuat]</td>
<td align='center'>$d[idPotongan]</td>
<td align='center'>$d[idGapok]</td>
<td align='center'>$d[idTunjangan]</td>
<td align='center'>$d[total]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fa fa fa-eraser' href='pdfcetakgaji.php?id=$d[id]'>c</a>

</td>
</tr>";
$no++;
}
?>
               
               
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script>
 $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

  <?php
break;
case "tambah";  

$query = "SELECT max(id) as id FROM karyawans";
$hasil = mysqli_query($konek,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['id'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "K";
$kodeBarang = $char . sprintf("%03s", $noUrut);
?>
<?php
if(isset($_GET['e']) && $_GET['e']=='bl'){
 ?>
<div class="alert alert-danger" role="alert">
Peringatan<strong>Form Belum Lengkap</strong>
</div>


 <?php

}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>data potongan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-10">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data potongan </h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="aksi_gaji.php?act=insert" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                    <label for="nama" class=" form-control-label">Nama Karyawan</label>

                      <input  name="nama" id="nama" class="form-control" onkeyup="isi_otomatis()" />
                
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                      <label for="tglBuat" class=" form-control-label">Tanggal Buat</label>
      <input type="text" name="tglBuat" id="tglBuat" value="<?php echo date('Y-m-d') ?>"  class="form-control"/>
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="idPotongan" class=" form-control-label">Potongan</label>
      <input type="number" name="idPotongan" id="idPotongan" class="form-control"/></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                      <label for="idGapok" class=" form-control-label">Gaji Pokok</label>
        <input type="number"name="idGapok" id="idGapok"  class="form-control" />
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="idTunjangan" class=" form-control-label">Tunjangan</label>
      <input type="number" name="idTunjangan" id="idTunjangan" class="form-control"/></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                      <label for="total" class=" form-control-label">total </label>
        <input type="number"name="zakat" id="zakat"  class="form-control"  hidden="true" />

        <input type="number"name="makanFas" id="makanFas"  class="form-control" hidden="true"/>


        <input type="number"name="transport" id="transport"  class="form-control" hidden="true"/>

        <input type="number"name="fungsional" id="fungsional"  class="form-control"  hidden="true" />
        <input type="number"name="tunjlain" id="tunjlain"  class="form-control"  hidden="true" />

        <input type="number"name="keluarga" id="keluarga"  class="form-control" hidden="true"/>


        <input type="number"name="transport" id="transport"  class="form-control" hidden="true"/>

        <input type="number"name="Pinjaman" id="Pinjaman"  class="form-control" hidden="true"/>

        <input type="number"name="Kasbon" id="Kasbon"  class="form-control" hidden="true"/>
        <input type="number"name="Lainlain" id="Lainlain"  class="form-control" hidden="true"/>

        <input type="number"name="makan" id="makan"  class="form-control" hidden="true"/>

        <input type="number"name="total" id="total"  class="form-control" />
                      </div>
                    </div>
                    
              	</div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="gaji.php">kembali</a> 
                  </div>
                </form>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var nim = $("#nama").val();
                $.ajax({
                    url: 'ajax2.php',
                    data:"nama="+nim ,
                success:function (data) {
                    var json = data
                    obj = JSON.parse(json);
                    $('#idPotongan').val(obj.potongan)
                    $('#idTunjangan').val(obj.tunjangan)
                    $('#idGapok').val(obj.gapok)
                    $('#total').val(obj.tota);
                },
                error:function(error){
                  console.log(error);
                }
              });
            }

$(function() {
  $( "#nama" ).autocomplete({
    source: 'aa.php'
  });
});
</script>
          
<?php
break;
case "edit";
$sqlEdit = mysqli_query($konek,"select * from potongans where id='$_GET[id]'");
$e = mysqli_fetch_array($sqlEdit);
$query = "SELECT max(id) as id FROM karyawans";
$hasil = mysqli_query($konek,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['id'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "K";
$kodeBarang = $char . sprintf("%03s", $noUrut);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>potongan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-10">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">edit Data potongan</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<form action="aksi_potongan.php?act=update" method="post" class="form-horizontal">
                                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="nama" class=" form-control-label">Nama Karyawan</label>
       <input type="text" name="nama" id="nama"value="<?php echo $e['namaKaryawan']?>" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
              <label for="tanggalPotongan" class=" form-control-label">Tanggal Potongan</label>
      <input type="date" name="tanggalPotongan" id="tanggalPotongan"  value="<?php echo date('Y-m-d') ?>" class="form-control"/>
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="zakat" class=" form-control-label">Zakat</label>
        <input type="number"name="zakat" id="zakat" value="<?php echo $e['zakat']?>" class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="makan" class="form-control-label">makan</label>
                  <input type="number"name="makan" id="makan" value="<?php echo $e['makan']?>" class="form-control" />
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="sisaPinjaman" class="form-control-label">Biaya Pinjaman</label>
                  <input type="number"name="sisaPinjaman" id="sisaPinjaman" value="<?php echo $e['Pinjaman']?>" class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsKes" class="form-control-label">BPJS Kesehatan</label>

                    <?php
            $bpjs = mysqli_query($konek,"select *from bpjs_kes limit 1");
            $bpjs1 =mysqli_fetch_array($bpjs);
            $bpjskes=$bpjs1['angkaKaryawan']; 
            ?>
                 <select name="bpjsKes"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
                     <option value=<?php echo $bpjskes; ?>>YA</option>
                     <option value="0">TIDAK</option>
                      </select>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsKet" class="form-control-label">BPJS Ketenagakerjaan</label>
					            <?php
					            $bpjs = mysqli_query($konek,"select *from bpjs_kets limit 1");
					            $bpjs1 =mysqli_fetch_array($bpjs);
					            $bpjskes=$bpjs1['angkaKaryawan']; 
					            ?>
                 <select name="bpjsKet"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
                     <option value=<?php echo $bpjskes; ?>>YA</option>
                     <option value="0">TIDAK</option>
                      </select>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="jumlahKasbon" class="form-control-label">biaya Kasbon</label>
                  <input type="number"name="jumlahKasbon" id="jumlahKasbon" value="<?php echo $e['Kasbon']?>" class="form-control" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="jumlah" class="form-control-label">Pinjaman Lain lain</label>
                  <input type="number"name="jumlah" id="jumlah" value="<?php echo $e['Lainlain']?>" class="form-control" />
                      </div>
                    </div>
              	</div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="kasbon.php">kembali</a> 
                  </div>
                </form>
         

<?php
break;
}
?>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 <?php  include "halaman/admin/footer.php";?>
<!-- Bootstrap 4 -->
<!-- Select2 -->
<script src="asset/AdminLTE-3.0.2/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<!-- Page script -->
<script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>
</body>
</html>
