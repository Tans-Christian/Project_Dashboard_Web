<?php
// Sertakan file koneksi
session_start(); // Memulai session
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Mengambil data dari form
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Query untuk mengambil data user berdasarkan email
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Ambil data user
    $user = $result->fetch_assoc();
    
    // Verifikasi password biasa (tanpa hash)
    if ($password === $user['password']) {
      echo "<script>
              alert('Login berhasil! Selamat datang " . $user['name'] . "');
              window.location.href = 'index/index.html';
            </script>";
      exit();
    } else {
      // Jika password salah, arahkan kembali ke halaman login dengan pesan error
      echo "<script>
              alert('Password salah!');
              window.location.href = 'login.html';
            </script>";
      exit();
    }
  } else {
    // Jika email tidak ditemukan, arahkan kembali ke halaman login dengan pesan error
    echo "<script>
            alert('Email tidak ditemukan!');
            window.location.href = 'login.html';
          </script>";
    exit();
  }

  $conn->close();  // Tutup koneksi
}
?>
