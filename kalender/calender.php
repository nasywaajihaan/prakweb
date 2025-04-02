<?php
$servername = "localhost";
$username = "root"; // ganti dengan username db Anda
$password = ""; // ganti dengan password db Anda
$dbname = "calender";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menambahkan pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $sql = "INSERT INTO pengguna (nama, email) VALUES ('$nama', '$email')";
    $conn->query($sql);
}

// Menambahkan acara
if (isset($_POST['add_event'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];
    $id_pengguna = $_POST['id_pengguna'];
    
    $sql = "INSERT INTO acara (judul, deskripsi, tanggal, waktu_mulai, waktu_selesai, id_pengguna) 
            VALUES ('$judul', '$deskripsi', '$tanggal', '$waktu_mulai', '$waktu_selesai', $id_pengguna)";
    $conn->query($sql);
}

// Mengambil acara untuk ditampilkan
$result = $conn->query("SELECT * FROM acara");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Imamku</title>
</head>
<body>
    <h1>Tambah Pengguna</h1>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="add_user" value="Tambah Pengguna">
    </form>

    <h1>Tambah Acara</h1>
    <form method="POST">
        <input type="text" name="judul" placeholder="Judul" required>
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <input type="date" name="tanggal" required>
        <input type="time" name="waktu_mulai" required>
        <input type="time" name="waktu_selesai" required>
        <input type="number" name="id_pengguna" placeholder="ID Pengguna" required>
        <input type="submit" name="add_event" value="Tambah Acara">
    </form>

    <h1>Daftar Acara</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id_acara']; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['deskripsi']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['waktu_mulai']; ?></td>
                <td><?php echo $row['waktu_selesai']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>