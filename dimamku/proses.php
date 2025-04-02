<?php 
include 'config.php'; // Pastikan ini mengarah ke file config.php yang benar

if (isset($_POST['nama']) && isset($_POST['password']) && isset($_POST['umur']) && isset($_POST['npm'])) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $umur = $_POST['umur'];
    $npm = $_POST['npm'];

    $sql = "INSERT INTO users (nama, password, umur, npm) VALUES ('$nama', '$password', $umur, $npm)";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Data Berhasil Disimpan.";
}
$conn->close();
?>