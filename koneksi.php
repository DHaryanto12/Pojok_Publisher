<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pojok_publisher";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Koneksi database gagal: ' . mysqli_connect_error()]);
    exit();
}
?>