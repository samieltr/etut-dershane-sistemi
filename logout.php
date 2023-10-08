<?php
session_start();

// Oturumu kapat
session_unset();
session_destroy();

// Ana sayfaya yönlendir
header('Location: index.php');
exit;
?>