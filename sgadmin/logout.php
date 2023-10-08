<?php
session_start();

// Oturumu sonlandýr
session_destroy();

// Login sayfasýna yönlendir
header("Location: login.php");
exit();
?>