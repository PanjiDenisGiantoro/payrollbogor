
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
          <center><i class="fas fa-globe"></i> SLIP GAJI KARYAWAN KESELURUHAN SIIHA</center>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

      <!-- /.col -->
      <div class="col-12 invoice-col">
       <?php

                 $koneksi = mysqli_connect("localhost","root","","payrol");
           		
        if (isset($_POST['search'])) {
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
        }
  
?>
 
        <table align="center">
          <tr>
            <td width="180px">
        <img src="images/siiha2.png"></td>
            <td style="text-align: center;">
              <strong>Slip Gaji</strong>
            </td>
            <td><img src="images/siiha.png"></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          tanggal : <?php echo $tanggal;?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          Bulan :<?php echo $bulan;?>
            </td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td style="text-align: center;">
              
          Tahun :<?php echo $tahun;?> 
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
        <table class=" table-bordered" align="center" border="1">
          <thead>
            <tr>
              <center><b>Rincian Gaji keseluruhan</b></center>
            </tr>
          <tr>
          	<th>No</th>
          	<th colspan="1">Nama</th>
            <th colspan="1">Departemen</th>
            
            <th colspan="1">total potongan</th>
            <th colspan="1">total tunjangan</th>
            <th colspan="1">Gaji Pokok</th>
            <th colspan="1" >total gaji</th>
          </tr>
          </thead>
          <tbody>

        
          </tbody>
          <?php



$bulan3 = ''."$tahun".'-'."$bulan".'-%';
$sql = mysqli_query($koneksi,"select * from head_gajis a join karyawans b on a.namaKaryawan = b.nama where tglBuat like '$bulan3' ");
$no=1;
while($d= mysqli_fetch_array($sql)){
          $no=1;

echo 
"<tr>
<td width='40px' align='center'>$no</td>
<td width='40px' align='center'>$d[nama]</td>
<td width='40px' align='center'>$d[departemen]</td>
<td width='40px' align='center'>$d[idPotongan]</td>
<td width='40px' align='center'>$d[idTunjangan]</td>
<td width='40px' align='center'>$d[idGapok]</td>
<td width='40px' align='center'>$d[total]</td>
</tr>";
$no++;
}
?>
         
        </table>
        <br>
         <table align="center" >

            <tr>
              <td width="400px" align="center">
                
              </td>
              <td width="400px"align="center">
               tanggal
              </td>
            </tr>
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
        <!--   <table align="center" border="1">
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
           
          </table> -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
<script type="text/javascript">
  window.print();
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
