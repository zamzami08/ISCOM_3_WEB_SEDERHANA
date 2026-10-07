<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "tugas_iscom_3"; // Nama database yang kamu pakai di phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>