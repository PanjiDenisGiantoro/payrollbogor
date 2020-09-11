
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cetak Gaji</title>
</head>
<body>
  <style type="text/css">
 body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }

  </style>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <?php $tanggal = date('l, d-m-Y');?>
      <div class="col-12">
        <h2 class="page-header">
          <center><i class="fas fa-globe"></i> RESUME BAGIAN KARYAWAN SIIHA</center>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

      <!-- /.col -->
      <div class="col-12 invoice-col">
     <?php 
        $nama="";
        $namajabatan="";
        $bulan="";
        $tahun="";
        if (isset($_POST['search'])) {	
            $namajabatan = $_POST['namajabatan'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $namajabatan1 = $_POST['namajabatan'];
            $bulan1 = $_POST['bulan'];
            $tahun1 = $_POST['tahun'];
        }
  ?>
 
        <table align="center">
          <tr>
            <td width="180px">
        <img src="images/siiha2.png"></td>
            <td style="text-align: center;">
              <strong>Resume Per bagian</strong>
            </td>
            <td><img src="images/siiha.png"></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          Bulan : <?php echo $bulan;?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          tahun :<?php echo $tahun;?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          Jabatan :<?php echo  $namajabatan;?> 
            </td>
            <td></td>
          </tr>
        </table>
        <br>
      </div>
      <!-- /.col -->
 
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class=" table-bordered" align="center">
          <thead>
            <tr>
              <center><b>Rincian Resume</b></center>
            </tr>
        
          </tr>

          </tbody>
      </thead>
  </table>
  <table align="center" border="1">
  	<tr>
  		<th rowspan="2">No</th>
  		<th rowspan="2">nama</th>
  		<th rowspan="2">bagian</th>
  		<th colspan="4">kehadiran</th>
  		<th rowspan="2">lembur</th>
  		<th colspan="3">info</th>
  	</tr>
  	<tr>
  		<th>Hadir</th>
  		<th> alpa</th>
  		<th>sakit</th>
  		<th>izin</th>
  		<th>very good</th>
  		<th>good</th>
  		<th>need improvement</th>
  	</tr>

                </thead>

<?php


include "koneksi/koneksi.php";
$sql = mysqli_query($konek,"SELECT  nama,departemen,
COUNT(CASE WHEN bolos = 'true' THEN 0 END) AS bolos,
COUNT(CASE WHEN bolos = '' THEN 0 END) AS hadir 
FROM kehadirans WHERE departemen='$namajabatan' AND  tanggal LIKE ('$tahun-$bulan-%') GROUP BY nama order by nama asc");
// echo "select * from kehadirans where departemen='$namajabatan' and  tanggal like ('$tahun-$bulan-%') ";

$sql1 = mysqli_query($konek,"
SELECT  nama,departemen,
COUNT(CASE WHEN masuk !='00:00:00' < awaltugas THEN 0 END) AS Very
FROM kehadirans WHERE departemen='Bagian Umum' AND  tanggal LIKE ('2019-05-%') AND masuk !='00:00:00'GROUP BY nama");
$no=1;
while($d= mysqli_fetch_array($sql)){
// while($e= mysqli_fetch_array($sql1)){
// if($d['bolos']==''){
// 	$hadir=;
// }else{
// 	$hadir="0";
// }

echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td align='center'>$d[nama]</td>
<td align='center'>$d[departemen]</td>
<td align='center'>$d[hadir]</td>
<td align='center'>$d[bolos]</td>
<td width='40px' align='center'>
</td>
</tr>";
$no++;

	// }
	}
?>
               
               
                </tfoot>
              </table>
  </table>

          <table align="center" >
            <tr>
              <td width="400px" align="center">
                
              </td>
              <td width="400px"align="center">
                <?php
                echo date('d M Y');
                ?>
              </td>
            </tr>
          </table>
        </table>
          <table align="center" border="1">
            <tr>
              <td width="400px" align="center">
                keuangan
              </td>
              <td width="400px"align="center">
                penerima
              </td>
            </tr>
            <tr height="100px">
              <td width="400px"></td>
              <td width="400px"></td>
              
            </tr>
            <tr>
                <td width="400px" align="center">
                Nuryatmi
              </td>
                <td width="400px" align="center">
                wkwkk
              </td>
            </tr>
           
          </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
<script type="text/javascript">
  // window.print();
</script>
  
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

</body>
</html>
