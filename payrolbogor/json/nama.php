<?php

session_start();
include "../koneksi/koneksi.php";
header("Content-type: application/json");

    $result = mysqli_query($konek,"SELECT nama from karyawans  order by nama");
    $arrData = array();
    $arrNo = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $arrData[$arrNo] = array(
            "nama" => rtrim($row['nama'])
        );
        $arrNo++;
    }
    echo json_encode($arrData);
    
?>