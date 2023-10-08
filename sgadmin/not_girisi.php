<?php
session_start();
require_once '../inc/vt.php';

// Seçilen öğrencinin ID'sini alalım
if (!isset($_SESSION['seçilen_ogrenci_id'])) {
    header('Location: tytgiris.php');
    exit();
}
$ogrenci_id = $_SESSION['seçilen_ogrenci_id'];

// Öğrencinin adını ve soyadını alalım
$sql_ogrenci = "SELECT ad, soyad FROM kullanici_tablosu WHERE id = :ogrenci_id";
$stmt = $db->prepare($sql_ogrenci);
$stmt->bindParam(':ogrenci_id', $ogrenci_id);
$stmt->execute();
$ogrenci = $stmt->fetch(PDO::FETCH_ASSOC);

// Not bilgilerini formdan alalım
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarih = $_POST['tarih'];
    $turkce_dogru = $_POST['turkce_dogru'];
    $turkce_yanlis = $_POST['turkce_yanlis'];
    $mat_dogru = $_POST['mat_dogru'];
    $mat_yanlis = $_POST['mat_yanlis'];
    $sos_dogru = $_POST['sos_dogru'];
    $sos_yanlis = $_POST['sos_yanlis'];
    $fen_dogru = $_POST['fen_dogru'];
    $fen_yanlis = $_POST['fen_yanlis'];

    // Veritabanına not bilgilerini kaydedelim
   $sql_kaydet = "INSERT INTO ogrencideneme (ogrencid, tarih, turkced, turkcey, matd, maty, sosd, sosy, fend, feny) 
                VALUES (:ogrenci_id, :tarih, :turkced, :turkcey, :matd, :maty, :sosd, :sosy, :fend, :feny)";
    $stmt = $db->prepare($sql_kaydet);
    $stmt->bindParam(':tarih', $tarih);
    $stmt->bindParam(':turkced', $turkce_dogru);
    $stmt->bindParam(':turkcey', $turkce_yanlis);
    $stmt->bindParam(':matd', $mat_dogru);
    $stmt->bindParam(':maty', $mat_yanlis);
    $stmt->bindParam(':sosd', $sos_dogru);
    $stmt->bindParam(':sosy', $sos_yanlis);
    $stmt->bindParam(':fend', $fen_dogru);
    $stmt->bindParam(':feny', $fen_yanlis);
    $stmt->bindParam(':ogrenci_id', $ogrenci_id);
    $stmt->execute();

    // Kaydetme işlemi tamamlandıktan sonra ana sayfaya yönlendirelim
    header('Location: tytgiris.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Not Girişi</title>
</head>
<body>
    <h1>Not Girişi - <?php echo $ogrenci['ad'] . ' ' . $ogrenci['soyad']; ?></h1>
    <form method="post" action="not_girisi.php">
        <label for="tarih">Tarih:</label>
        <input type="date" name="tarih" id="tarih" required>
        <br>
        <h2>Türkçe</h2>
        <label for="turkce_dogru">Türkçe Doğru:</label>
        <input type="text" name="turkce_dogru" id="turkce_dogru" required>
        <br>
        <label for="turkce_yanlis">Türkçe Yanlış:</label>
        <input type="text" name="turkce_yanlis" id="turkce_yanlis" required>
        <br>
        <h2>Matematik</h2>
        <label for="mat_dogru">Matematik Doğru:</label>
        <input type="text" name="mat_dogru" id="mat_dogru" required>
        <br>
        <label for="mat_yanlis">Matematik Yanlış:</label>
        <input type="text" name="mat_yanlis" id="mat_yanlis" required>
        <br>
        <h2>Sosyal Bilimler</h2>
        <label for="sos_dogru">Sosyal Bilimler Doğru:</label>
        <input type="text" name="sos_dogru" id="sos_dogru" required>
        <br>
        <label for="sos_yanlis">Sosyal Bilimler Yanlış:</label>
        <input type="text" name="sos_yanlis" id="sos_yanlis" required>
        <br>
        <h2>Fen Bilimleri</h2>
        <label for="fen_dogru">Fen Bilimleri Doğru:</label>
        <input type="text" name="fen_dogru" id="fen_dogru" required>
        <br>
        <label for="fen_yanlis">Fen Bilimleri Yanlış:</label>
        <input type="text" name="fen_yanlis" id="fen_yanlis" required>
        <br>
        <input type="submit" value="Notları Kaydet">
    </form>
</body>
</html>

