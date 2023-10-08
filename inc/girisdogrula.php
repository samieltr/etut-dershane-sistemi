<?php
session_start();
date_default_timezone_set('Europe/Istanbul'); // Sunucunun bulunduğu zaman dilimine göre ayarlayın
// Oturum değişkenini kontrol et, kullanıcı giriş yapmamışsa login.php'ye yönlendir
if (!isset($_SESSION['kullanici'])) {
    header('Location: login.php');
    exit;
}
?>