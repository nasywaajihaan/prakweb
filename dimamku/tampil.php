<?php 
include  'config.php' ; 

$sql = "SELECT * FROM barang" ; 
$result = $conn -> query ( $sql ); 

if ( $result ->num_rows > 0 ) { 
    while ( $row = $result -> fetch_assoc ()) { 
        echo  "nama_depan: " . $row [ "nama_depan" ] . 
             " | nama_blkng: " . $row [ "nama_blkng" ] . 
             " | email: " . $row [ "email" ] . 
             " | pesan: " . $row [ "pesan" ] ."<br>" ; 
    } 
} else { 
    echo  "Tidak ada data." ; 
} 

$conn -> close (); 
?>