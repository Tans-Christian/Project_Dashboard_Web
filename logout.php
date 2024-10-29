<?php
session_start(); // Memulai session

// Hapus semua variabel session
$_SESSION = array();

// Jika Anda ingin menghancurkan session cookie, hapus
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hancurkan session
session_destroy();

// Arahkan kembali ke halaman login setelah logout
header("Location: index.html");
exit();
?>
