<?php
session_start();

// Oturumu sonland�r
session_destroy();

// Login sayfas�na y�nlendir
header("Location: login.php");
exit();
?>