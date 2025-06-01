<?php 
// menghubungkan aplikasi PHP ke database MySQL

//Inisialisasi Variabel Koneksi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "habit_tracker_db";

// Mencoba Membuat Koneksi ke Database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//Menangkap Kesalahan Koneksi
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>