<?php 
$host = "localhost"; 
$user = "root"; 
$password = ""; // Ganti jika ada password
$database = "imamku"; 

$conn = new mysqli($host, $user, $password, $database); 

if ($conn->connect_error) { 
    die("Koneksi gagal: " . $conn->connect_error); 
} 

echo "Koneksi berhasil!";
$conn->close();
?>