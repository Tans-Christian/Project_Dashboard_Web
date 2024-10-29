<?php
$servername = "localhost";  // Nama host, biasanya "localhost"
$username = "root";         // Username MySQL
$password = "";             // Password MySQL
$dbname = "project_website";      // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
