
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
Selamat <strong>Proses Berhasil</strong>
</div>
<?php 
}else if(isset($_GET['e']) && $_GET['e']=='hutang'){
?>
<div class="alert alert-danger" role="alert"  style="margin-top: 30px">
Error <strong>Belum Lunas</strong>
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
            <h1>Karyawan</h1>
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
              <h3 class="card-title">Data Karyawan SIIHA</h3>
          
            </div>
           <br>
            
            <!-- /.card-header -->
          
        
             
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th align='center'>No</th>
                  <th align='center'>Nama Karyawan</th>
                  <th align='center'>Jumlah Pinjaman</th>
                  <th align='center'>Tanggal Pinjam</th>
                  <th align='center'>jenjang waktu</th>
                  <th align='center'>bayar</th>
                  <th align='center'>sisa Pinjaman</th>
                  <th align='center'>keterangan</th>
                  <th align='center'>Status</th>
                  <th align='center' style="width: 100px;">Aksi</th> 
                </tr>
                </thead>
                <tbody>
              
<?php
$sql = mysqli_query($konek,"select * from pinjamen ");
$no=1;
while($d= mysqli_fetch_array($sql)){

$dd= $d['status'];
  if($d['status'] == 'false'){
    $stat= "belum disetujui";
  }else if($d['status'] == 'true'){
    $stat = "sudah disetujui";
  }else{
    $stat = "tidak disetujui";
  }
    if($d['status'] == 'tidak disetujui'){
    $stat1= $d['alasan'];
  }else if($d['status'] == 'true'){
    $stat1 = "OK";
  }else if($d['status'] == 'false'){
    $stat1 = "Tunggu";
}
  
  $ju =  number_format($d['jumlahPinjam'],2,',','.');
echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[namaKaryawan]</td>
<td align='center'>$ju</td>
<td align='center'>$d[tgl]</td>
<td align='center'>$d[waktu] bulan</td>
<td align='center'>$d[bayar]</td>
<td align='center'>$stat1-($d[sisaPinjaman])</td>
<td align='center'>$d[opsibayar]</td>
<td align='center'>$stat</td>
<td width='180px' align='center'> 
<a class='btn btn-success btn-sm ' href='aksi_pinjaman.php?act=ajukan&id=$d[id]'>disetujui</a>
<a class='btn btn-warning btn-sm btn-sm ' href='pinjaman.php?view=edit&id=$d[id]'>tidak disetujui</a>
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
            <h1>data kasbon</h1>
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
              <h3 class="card-title">Tambah Data kasbon </h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="aksi_pinjaman.php?act=insert">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="ui-widget">
                        <label>Nama Karyawan</label>
                      <input  name="nama" id="nama" class="form-control"/></td>

                             
                      </div>
 
                </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="jumlahPinjam" class=" form-control-label">jumlah pinjam</label>
               <input type="number" name="jumlahPinjam" id="jumlahPinjam" class="form-control"/></td>

                      </div>
                
                  </div>
                   <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                       <label for="jumlahKasbon" class=" form-control-label">sisa pinjam</label>
    			  <input type="number" name="jumlahKasbon" id="jumlahKasbon" class="form-control"/></td>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label for="tgl" class="form-control-label">Tanggal Pinjam</label>
                  <input name="tgl" type="date" class="form-control" id="tgl"  value="<?php echo date('Y-m-d') ?>" />
                      </div>
                    </div>
                   
                </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="pinjaman.php">kembali</a> 
                  </div>
                </form>


<script>
$(function() {
  $( "#nama" ).autocomplete({
    source: 'aa.php'
    
  });
});
</script>
          
<?php
break;
case "edit";
$sqlEdit = mysqli_query($konek,"select * from pinjamen where id='$_GET[id]'");
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
            <h1>pinjaman</h1>
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
              <h3 class="card-title">edit Data pinjaman</h3>
          
            </div>
              <div class="col-md-6">
            <!-- general form elements disabled -->
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form action="aksi_pinjaman.php?act=update" method="post" >
                       <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="ui-widget">
                        <label>Nama Karyawan</label>
                          <?php 
                            $d = mysqli_fetch_array(mysqli_query($konek,"select namalengkap from admin where username='$_SESSION[username]'"));
                            $nama= mysqli_fetch_array(mysqli_query($konek,"select namaKaryawan from pinjamen where namaKaryawan='$d[namalengkap]'"));
                            ?>
                      <input  name="nama" id="nama" class="form-control"value="<?php echo $e['namaKaryawan'];?>"  readonly/></td>

                             
                      </div>
 
                </div>
                 <div class="col-sm-6">
                      <div class="form-group">
                         <label for="tgl" class="form-control-label">Tanggal Pinjam</label>
                  <input name="tgl" type="date" class="form-control" id="tgl"  value="<?php echo $e['tgl'];?>"readonly/>

            <input type="text" name="status" id="status" class="form-control" value="tidak disetujui" hidden="true" />
                      </div>
                    </div>
                   </div>

                    <div class="row">
                   <!-- <div class="col-sm-6"> -->
                      <!-- text input -->
                      <!-- <div class="form-group"> -->
                       <!-- <label for="jumlahKasbon" class=" form-control-label">sisa pinjam</label> -->
            <!-- <input type="number" name="jumlahKasbon" id="jumlahKasbon" class="form-control"/></td> -->
                      <!-- </div> -->
                    <!-- </div> -->
                   
                
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="jumlahPinjam" class=" form-control-label">jumlah pinjam</label>
               <input type="number" name="jumlahPinjam" id="jumlahPinjam" class="form-control" value="<?php echo $e['jumlahPinjam'];?>"readonly/></td>

                      </div>
                
                  </div>

            <input type="text" name="opsibayar" id="opsibayar" class="form-control" value="cicil" hidden="true" />
                 <div class="col-sm-6">
                      <div class="form-group">
                         <label for="waktu" class="form-control-label">Jenjang Waktu</label>
                
               <input type="number" name="waktu" id="waktu" class="form-control" value="<?php echo $e['waktu'];?>"readonly/>
                      </div>
                    </div>
                  </div>
                       <div class="row">
                   
                
                    <div class="col-sm-6">
                      <div class="form-group">
                     <label for="bayar" class=" form-control-label">Bayar pinjaman</label>
               <input type="number" name="bayar" id="bayar" class="form-control" value="<?php echo $e['bayar'];?>"readonly/></td>

                      </div>
                
                  </div>
                          <div class="col-sm-6">
                      <div class="form-group">
                       <label for="alasan" class="form-control-label">Tidak Disetujui</label>
                  <textarea rows="2" class="form-control" id="alasan" name="alasan"><?php echo $e['alasan'] ?>
                  </textarea>
                </div>
              </div>
            </div>

            <input type="text" name="id" id="id" class="form-control" value="<?php echo $e['id'];?>" />

                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary" value="Simpan" >Submit</button>
              
                    <a class="btn btn-danger" href="pinjaman.php">kembali</a> 
                  </div>
                </form>
         
<?php
break;
}
?>
  <!-- /.content-wrapper -->


 <?php  include "halaman/HRD/footer.php";?>

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
