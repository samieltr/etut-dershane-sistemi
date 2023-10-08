<?php
session_start();
require_once 'vt.php';

// Oturum değişkenini kontrol et, kullanıcı giriş yapmamışsa login.php'ye yönlendir
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['etut_id'])) {
    $etut_id = $_GET['etut_id'];

    // Etütü güncelle: katilim değerini 0 yap ve tarih değerini güncelle
    $guncelle_sql = "UPDATE etut SET katilim = 0, tarih = :bugun WHERE sira = :etut_id";
    $guncelle_stmt = $db->prepare($guncelle_sql);
    $bugun = date('Y-m-d'); // Bugünkü tarih
    $guncelle_stmt->bindParam(':bugun', $bugun);
    $guncelle_stmt->bindParam(':etut_id', $etut_id);
    $guncelle_stmt->execute();

    header('Location: ../etut2.php');
    exit();
} else {
    // Eksik parametrelerle çağrıldıysa başka bir sayfaya yönlendir
    header('Location: ../etut2.php');
    exit();
}
?>