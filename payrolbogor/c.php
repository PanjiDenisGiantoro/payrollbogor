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
$query = $db->query("SELECT nama FROM karyawans WHERE departemen ='Security' and nama LIKE '%".$searchTerm."%'  ORDER BY nama ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nama'];
}

//return data json
echo json_encode($data);
?> 