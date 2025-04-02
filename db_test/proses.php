<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $password = $_POST['password'];
    $umur        = $_POST['umur'];
    $NPM        = $_POST['NPM'];

    $sql = "INSERT INTO nama (nama, password, umur, NPM) 
            VALUES ('$nama', '$password', '$umur', '$NPM')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>