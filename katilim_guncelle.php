<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
<?php
require_once 'inc/vt.php';
// Oturum değişkenini kontrol et, kullanıcı giriş yapmamışsa login.php'ye yönlendir

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // AJAX isteği ile gelen etüt sıra numarasını alalım
    $etut_sira = $_POST['etut_sira'];

    // Veritabanında etut tablosundaki katilim sütununu güncelleyelim
    $stmt = $db->prepare("UPDATE etut SET katilim = 1 WHERE sira = :etut_sira");
    $stmt->bindParam(':etut_sira', $etut_sira);
    $stmt->execute();

    // İşlem başarılı ise 1, aksi takdirde 0 döndürelim (AJAX tarafında kullanmak için)
    echo "1";
} else {
    // Hatalı istek durumunda 0 döndürelim (AJAX tarafında kullanmak için)
    echo "0";
}
?>