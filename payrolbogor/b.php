<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'payrol';

//menghubungkan ke database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//mendapatkan input pencarian
$searchTerm = $_GET['term'];

//mendapatkan data yang sesuai dari tabel daftar_kota
$query = $db->query("SELECT idGapok FROM head_gajis WHERE idGapok LIKE '%".$searchTerm."%' ORDER BY idGapok ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['idGapok'];
}

//return data json
echo json_encode($data);
?>