
 <?php  include "halaman/HRD/header.php";?>
 <?php
session_start();

include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

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

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

 <?php  include "halaman/HRD/content.php";?>


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

  <section class="content">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data potongan SIIHA</h3>
          
            </div>

            <table >
              <tr>
                <td>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Add Data</h5>
              </div>
              <div class="card-body">
                <a href="potongan.php?view=tambah" class="btn btn-primary"  >Tambah Data potongan Karyawan</a>

              </div>
            </div>
        </td>
       <!--  <td>
            <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Cetak Data</h5>
              </div>
              <div class="card-body">
                  <a href="laporankasbonall.php" class="btn btn-success" target="_blank" >cetak kasbon keseluruhan</a>

             </div>
             </form>

           </div>
              </div>
          </div>
          </td> -->
          </tr>
          </table>
        </div>
      </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Karyawan SIIHA</h3>
          
            </div>
            <br>
            <!-- /.card-header -->
          
        
              
      <div class="col-12 table-responsive">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
               <th align='center'>No</th>
        <th align='center'>Nama Karyawan</th>
        <th align='center'>Tanggal Potongan</th>
        <th align='center'>Zakat</th>
        <th align='center'>Pinjaman</th>
        <th align='center'>Kasbon</th>
        <th align='center'>Pinjaman Lain Lain</th>
        <th align='center'>Makan</th>
<th align='center'>Bpjs Kesehatan (lembaga)</th>
<th align='center'>Bpjs Kesehatan (karyawan)</th>
<th align='center'>Bpjs Ketenagakerjaan(lembaga)</th>
<th align='center'>Bpjs Ketenagakerjaan(karyawan)</th>
        <th align='center' style="width: 100px;">Aksi</th> 
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"SELECT * FROM potongans");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[namaKaryawan]</td>
<td align='center'>$d[tanggal_p]</td>
<td align='center'>$d[zakat]</td>
<td align='center'>$d[Pinjaman]</td>
<td align='center'>$d[Kasbon]</td>
<td align='center'>$d[Lainlain]</td>
<td align='center'>$d[makan]</td>
<td align='center'>$d[bpjsKeslembaga]</td>
<td align='center'>$d[bpjsKeskaryawan]</td>
<td align='center'>$d[bpjsKetlembaga]</td>
<td align='center'>$d[bpjsKetkaryawan]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fa fa-edit' href='potongan.php?view=edit&id=$d[id]' ></a>
<a class='btn btn-danger btn-sm fa fa fa-eraser' href='aksi_potongan.php?act=del&id=$d[id]'></a>
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
        <div class="col-11">
        
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
                <form method="post" action="aksi_potongan.php?act=insert" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="nama" class=" form-control-label">Nama Karyawan</label>
            
                      <input  name="nama" id="nama" class="form-control" />
                      </div>
                    </div>
                  
                     <div class="row">
                  <div class="col-sm-4">
 <label for="tanggalPotongan" class=" form-control-label">Tanggal Potongan</label>
      <input type="date" name="tanggalPotongan" id="tanggalPotongan"  value="<?php echo date('Y-m-d') ?>" class="form-control"/>
                       
                   
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-sm-6 -->
                  <div class="col-sm-4">

                       <label for="bulan" class=" form-control-label">pilih Bulan</label>
                    <div class="form-group">
                        <!-- <span class="input-group-text"><input type="radio"></span> -->
                                 <select name="bulan"id="bulan" class=" form-control" onchange ="isi_otomatis()" >
                      <option selected="selected">-pilih-</option>
                      <option value='01'> Januari </option>
                      <option value='02'> Februari </option>
                      <option value='03'> Maret </option>
                      <option value='04'> April </option>
                      <option value='05'> Mei </option>
                        <option value='06'> Juni </option>
                      <option value='07'> Juli </option>
                      <option value='08'> Agustus </option>
                      <option value='09'> September </option>
                      <option value='10'> Oktober </option>
                      <option value='11'> November </option>
                      <option value='12'> Desember </option>
                      </select>
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                            <div class="col-sm-4">

                       <label for="tahun" class=" form-control-label">tahun</label>
                    <div class="form-group">
                        <!-- <span class="input-group-text"><input type="radio"></span> -->
                               <input type="text" name="tahun" id="tahun"value="<?php echo date('Y') ?>" class="form-control"/>
                    </div>
                    <!-- /input-group -->
                  </div>
                </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="masuk" class=" form-control-label">makan</label>
        <input type="number"name="masuk" id="masuk"  class="form-control" />
                      </div>

                    </div>



                    <div class="col-sm-6">
                      <div class="form-group">
                      <label for="zakat" class="form-control-label">zakat</label>
                  <input type="number"name="zakat" id="zakat"  class="form-control" />
                      </div>
                    </div>
            
                             <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="jumlahKasbon" class="form-control-label">biaya Kasbon</label>
                  <input type="number"name="jumlahKasbon" id="jumlahKasbon"  class="form-control"/>
                      </div>
                    </div>
                         <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="sisaPinjaman" class="form-control-label">Jumlah Pinjaman</label>
                  <input type="text"name="sisaPinjaman" id="sisaPinjaman"  class="form-control"/>
                      </div>
                    </div>

                          <div class="col-sm-6">
                      <div class="form-group">
                     <label for="jumlah" class="form-control-label">Pinjaman Lain lain</label>
                  <input type="number"name="jumlah" id="jumlah"  class="form-control" />
                  <input type="number"name="makan1" id="makan1"  class="form-control"  value="<?php echo $result1['makan'];?>" hidden="true"/>
                   <input type="number"name="zakat1" id="zakat1"  class="form-control"  value="<?php echo $result1['zakat'];?>" hidden="true"/>
                 
                      </div>
                    </div>
                 <div class="col-sm-6">
                      <div class="form-group">
                     <label for="bolos" class="form-control-label">bolos</label>
                  <input type="number"name="bolos" id="bolos"  class="form-control" />
                 
                      </div>
                    </div>

                   
                            <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsketlembaga" class="form-control-label">BPJS Ketenagakerjaan(lembaga)</label>
                
                  <input type="number"name="bpjsketlembaga" id="bpjsketlembaga"  class="form-control" readonly="true" />
                      </div>
                    </div>
                        <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsketkaryawan" class="form-control-label">BPJS Ketenagakerjaan(karyawan)</label>
                    <input type="number"name="bpjsketkaryawan" id="bpjsketkaryawan"  class="form-control" readonly="true" />
                 
                      </div>
                    </div>
                

                         <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjskeslembaga" class="form-control-label">BPJS Kesehatan(lembaga)</label>
             <input type="number"name="bpjskeslembaga" id="bpjskeslembaga"  class="form-control" readonly="true" />
                 
                      </div>
                    </div>
               <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjskeskaryawan" class="form-control-label">BPJS Kesehatan(karyawan)</label>
              <input type="number"name="bpjskeskaryawan" id="bpjskeskaryawan"  class="form-control" readonly="true" />
                 
            
                      </div>
                    </div>
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" onclick="return confirm('are you sure ?')">Submit</button>
              
                    <a class="btn btn-danger" href="potongan.php">kembali</a> 
                  </div>
                </form>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var nama = $("#nama").val();
                var bulan = $("#bulan").val();
                var tahun = $("#tahun").val();

                   var datas = 'nama='+ nama + '&bulan='+ bulan+ '&tahun=' +tahun;
                $.ajax({
                    url: 'ajax.php',
                    data:datas,
                success:function (data) {
                    var json = data
                    obj = JSON.parse(json);
                    $('#sisaPinjaman').val(obj.sisaPinjaman)
                    $('#jumlah').val(obj.jumlah)
                    $('#jumlahKasbon').val(obj.jumlahKasbon)
                    $('#bolos').val(obj.bolos)
                    $('#masuk').val(obj.masuk)
                    $('#zakat').val(obj.zakat)
                    $('#bpjskeskaryawan').val(obj.bpjsKeskaryawan)
                    $('#bpjskeslembaga').val(obj.bpjsKeslembaga)
                    $('#bpjsketkaryawan').val(obj.bpjsKetkaryawan)
                    $('#bpjsketlembaga').val(obj.bpjsKetlembaga);
                },
                error:function(error){
                  console.log(error);
                }
              });
                console.log(datas);
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
       <input type="text" name="nama" id="nama"value="<?php echo $e['namaKaryawan']?>" class="form-control" readonly/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
              <label for="tanggalPotongan" class=" form-control-label">Tanggal Potongan</label>
      <input type="date" name="tanggalPotongan" id="tanggalPotongan"  value="<?php echo date('Y-m-d') ?>" class="form-control"readonly/>
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="zakat" class=" form-control-label">Zakat</label>
        <input type="number"name="zakat" id="zakat" value="<?php echo $e['zakat']?>" class="form-control" readonly/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="masuk" class="form-control-label">makan</label>
                  <input type="number"name="masuk" id="masuk" value="<?php echo $e['makan']?>" class="form-control"readonly />

                  <input type="number"name="id" id="id" value="<?php echo $e['id']?>" class="form-control" hidden="true"/>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="sisaPinjaman" class="form-control-label">Biaya Pinjaman</label>
                  <input type="number"name="sisaPinjaman" id="sisaPinjaman" value="<?php echo $e['Pinjaman']?>" class="form-control" readonly/>
                      </div>
                    </div>
                           <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="jumlahKasbon" class="form-control-label">biaya Kasbon</label>
                  <input type="number"name="jumlahKasbon" id="jumlahKasbon" value="<?php echo $e['Kasbon']?>" class="form-control" readonly/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="jumlah" class="form-control-label">Pinjaman Lain lain</label>
                  <input type="number"name="jumlah" id="jumlah" value="<?php echo $e['Lainlain']?>" class="form-control" readonly/>

              <input class="form-control" id="id" name="id" value="<?php echo $e['id']?>" hidden="true"/>
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsketlembaga" class="form-control-label">BPJS Ketenagakerjaan (lembaga)</label>
                      <?php

                      $bpjs = mysqli_query($konek,"select *from bpjs_kets limit 1");
                      $bpjs12 =mysqli_fetch_array($bpjs);
                      $bpjskes1=$bpjs12['angkaKaryawan']; 
                      ?>
                 <select name="bpjsketlembaga"  class="form-control-sm form-control" >
                  
                     <option value="0">Please select</option>
                     <option value=<?php echo $bpjskes1; ?>>YA</option>
                     <option value="0">TIDAK</option>
                      </select>
                      </div>
                    </div>
           
                           
                        <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsketkaryawan" class="form-control-label">BPJS Ketenagakerjaan(karyawan)</label>
                      <?php
                      $bpjs11 = mysqli_query($konek,"select *from setting limit 1");
                      $bpjs1 =mysqli_fetch_array($bpjs11);
                      $bpjskes1=$bpjs1['bpjsketkaryawan'] * $bpjs1['UMK']; 
                      ?>
                 <select name="bpjsk etkaryawan"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
                     <option value=<?php echo $bpjskes1; ?>>YA</option>
                     <option value="0">TIDAK</option>
                      </select>
                      </div>
                    </div>
                

                         <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjskeslembaga" class="form-control-label">BPJS Kesehatan(lembaga)</label>

                    <?php
            $bpjs2 = mysqli_query($konek,"select *from setting limit 1");
            $bpjs12 =mysqli_fetch_array($bpjs2);
                      $bpjskes13=$bpjs1['bpjskeslembaga'] * $bpjs1['UMK']; 
            ?>
                 <select name="bpjskeslembaga"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
                     <option value=<?php echo $bpjskes13; ?>>YA</option>
                     <option value="0">TIDAK</option>
                      </select>
                      </div>
                    </div>
               <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjskeskaryawan" class="form-control-label">BPJS Kesehatan(karyawan)</label>

                    <?php
            $bpjs3 = mysqli_query($konek,"select *from setting limit 1");
            $bpjs13 =mysqli_fetch_array($bpjs3);
                      $bpjskes112=$bpjs1['bpjskeskaryawan'] * $bpjs1['UMK']; 
            ?>
                 <select name="bpjskeskaryawan"  class="form-control-sm form-control" >
                     <option value="0">Please select</option>
                     <option value=<?php echo $bpjskes112; ?>>YA</option>
                     <option value="0">TIDAK</option>
                      </select>
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
 <?php  include "halaman/HRD/footer.php";?>
<!-- Select2 -->
<script src="asset/AdminLTE-3.0.2/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<!-- SweetAlert2 -->


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
