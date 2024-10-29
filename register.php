<?php
// Sertakan file koneksi
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Mengambil data dari form
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];  // Tidak menggunakan hash, menyimpan password biasa

  // Query untuk memasukkan data ke dalam tabel users
  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Registrasi berhasil! Anda akan diarahkan ke halaman login.');
            window.location.href = 'login.html';
          </script>";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();  // Tutup koneksi
}
?>
