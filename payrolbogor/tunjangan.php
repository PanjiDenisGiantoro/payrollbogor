
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
            <h1>tunjangan</h1>
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
              <h3 class="card-title">Data tunjangan SIIHA</h3>
          
            </div>

            <table >
              <tr>
                <td>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Add Data</h5>
              </div>
              <div class="card-body">
                <a href="tunjangan.php?view=tambah" class="btn btn-primary" >Tambah Data tunjangan Karyawan</a>


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
                  <a href="laporankasbonall.php" class="btn btn-success" target="_blank" >cetak tunjangan keseluruhan</a>

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
<th align='center'>Jabatan</th>
<th align='center'>Nama Karyawan</th>
<th align='center'>Nama Fungsional</th>
<th align='center'>Keluarga</th>
<th align='center'>Transport</th>
<th align='center'>Id Tunjangan</th>
<th align='center'>Bpjs Kesehatan (lembaga)</th>
<th align='center'>Bpjs Kesehatan (karyawan)</th>
<th align='center'>Bpjs Ketenagakerjaan(lembaga)</th>
<th align='center'>Bpjs Ketenagakerjaan(karyawan)</th>
<th align='center' style="width: 140px;">Aksi</th> 
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"SELECT a.*, b.nama,a.id as id from tunjangans a join karyawans b on a.namaKaryawan = b.nama
");
$no=1;
while($d= mysqli_fetch_array($sql)){
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[jabatan]</td>
<td align='center'>$d[nama]</td>
<td align='center'>$d[fungsional]</td>
<td align='center'>$d[keluarga]</td>
<td align='center'>$d[transport]</td>
<td align='center'>$d[idTunjangan]</td>
<td align='center'>$d[bpjsKeslembaga]</td>
<td align='center'>$d[bpjsKeskaryawan]</td>
<td align='center'>$d[bpjsKetlembaga]</td>
<td align='center'>$d[bpjsKetkaryawan]</td>
<td width='40px' align='center'>
<a class='btn btn-warning btn-sm fa fa-edit' href='tunjangan.php?view=edit&id=$d[id]' >edit</a>
<a class='btn btn-danger btn-sm fa fa-trash' href='aksi_tunjangan.php?act=del&id=$d[id]'>hapus</a>
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
            <h1>data tunjangan</h1>
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
              <h3 class="card-title">Tambah Data tunjangan </h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">

<form method="post" action="aksi_tunjangan.php?act=insert" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="nama" class=" form-control-label">nama Karyawan</label>
                  
                      <input  name="nama" id="nama" class="form-control" />
                      </div>
                    </div>
                
               <div class="row">
                  <div class="col-sm-4">
 <label for="departemen" class=" form-control-label">Jabatan</label>
      <input type="text" name="departemen" id="departemen"  class="form-control" readonly />
                       
                   
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
                       <label for="fungsional" class=" form-control-label">Fungsional</label>
      <input type="text" name="fungsional" id="fungsional" class="form-control"readonly="true" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="keluarga" class=" form-control-label">keluarga</label>
      <input type="number" name="keluarga" id="keluarga" class="form-control"readonly="true" />
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="Transport" class=" form-control-label">Transport</label>
        <input type="number"name="Transport" id="Transport"  class="form-control"readonly="true"  />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="jumlah" class=" form-control-label">Tunjangan</label>
      <input type="number" name="jumlah" id="jumlah" class="form-control"readonly="true" />
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
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="tunjangan.php">kembali</a> 
                  </div>
                </form>
         
         
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">

              
            function isi_otomatis(){
                var nim = $("#nama").val();

                var bulan = $("#bulan").val();
                var tahun = $("#tahun").val();
                $.ajax({
                    url: 'ajax1.php',
                    data:"nama="+nim +"&bulan="+bulan +"&tahun="+tahun,
                success:function (data) {
                    var json = data
                    obj = JSON.parse(json);
                    $('#departemen').val(obj.namajabatan)
                    $('#fungsional').val(obj.fungsional)
                    $('#keluarga').val(obj.keluarga)
                    $('#Transport').val(obj.transport)
                    $('#jumlah').val(obj.tunjangan)
                    $('#bpjskeskaryawan').val(obj.bpjsKeskaryawan)
                    $('#bpjskeslembaga').val(obj.bpjsKeslembaga)
                    $('#bpjsketkaryawan').val(obj.bpjsKetkaryawan)
                    $('#bpjsketlembaga').val(obj.bpjsKetlembaga);
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
$sqlEdit = mysqli_query($konek,"select * from tunjangans where id='$_GET[id]'");
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
              <form method="post" action="aksi_tunjangan.php?act=update" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="nama" class=" form-control-label">nama Karyawan</label>
   <input type="text" name="nama" id="nama" class="form-control" readonly="true" value="<?php echo $e['namaKaryawan'];?>" />
   
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="departemen" class=" form-control-label">Nama Jabatan</label>
      <input type="text" name="departemen" id="departemen" class="form-control" readonly="true" value="<?php echo $e['jabatan'];?>" />
                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="fungsional" class=" form-control-label">Fungsional</label>
      <input type="text" name="fungsional" id="fungsional" class="form-control"readonly="true" value="<?php echo $e['fungsional'];?>" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="keluarga" class=" form-control-label">keluarga</label>
      <input type="number" name="keluarga" id="keluarga" class="form-control"readonly="true" value="<?php echo $e['keluarga'];?>" />
                      </div>
                    </div>
                     <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="Transport" class=" form-control-label">Transport</label>
        <input type="number"name="Transport" id="Transport"  class="form-control"readonly="true"  value="<?php echo $e['transport'];?>" />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="jumlah" class=" form-control-label">Tunjangan</label>
      <input type="number" name="jumlah" id="jumlah" class="form-control"readonly="true" value="<?php echo $e['idTunjangan'];?>" />
                      </div>
                    </div>
             
            
              
                            <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsketlembaga" class="form-control-label">BPJS Ketenagakerjaan(lembaga)</label>
                
                  <input type="number"name="bpjsketlembaga" id="bpjsketlembaga"  class="form-control" readonly="true"  value="<?php echo $e['bpjsKetlembaga'];?>"/>
                      </div>
                    </div>
                        <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjsketkaryawan" class="form-control-label">BPJS Ketenagakerjaan(karyawan)</label>
                    <input type="number"name="bpjsketkaryawan" id="bpjsketkaryawan"  class="form-control" readonly="true"value="<?php echo $e['bpjsKetkaryawan'];?>" />
                 
                      </div>
                    </div>
                

                         <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjskeslembaga" class="form-control-label">BPJS Kesehatan(lembaga)</label>
             <input type="number"name="bpjskeslembaga" id="bpjskeslembaga"  class="form-control" readonly="true"value="<?php echo $e['bpjsKeslembaga'];?>" />
                 
                      </div>
                    </div>
               <div class="col-sm-6">
                      <div class="form-group">
                       <label for="bpjskeskaryawan" class="form-control-label">BPJS Kesehatan(karyawan)</label>
              <input type="number"name="bpjskeskaryawan" id="bpjskeskaryawan"  class="form-control" readonly="true" value="<?php echo $e['bpjsKeskaryawan'];?>"/>
                 
            
                      </div>
                    </div>
                          <input type="number"name="makan1" id="makan1"  class="form-control"  value="<?php echo $result1['transport'];?>" hidden="true"/>
                   <input type="number"name="zakat1" id="zakat1"  class="form-control"  value="<?php echo $result1['makan'];?>" hidden="true"/>
                 
              <input class="form-control" id="id" name="id" value="<?php echo $e['id']?>" hidden="true"/>
                    </div>
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="tunjangan.php">kembali</a> 
                  </div>
                </form>
         
         

<?php
break;
}
?>
  <!-- /.content-wrapper -->


<!-- ./wrapper -->

 <?php  include "halaman/HRD/footer.php";?>
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
