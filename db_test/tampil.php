<?php 
include 'config.php'; 
$sql = "SELECT * FROM nama";  
$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
while ($row = $result->fetch_assoc()) { 
echo "Nama: " , $row["nama"] " - password: ",
$row["password"] ," - Umur": " . $row["umur"] . ["NPM"] . $row["NPM"] ."<br>"; 
} 
} else {
echo "Tidak ada data.";  
}
$conn->close();  
?>