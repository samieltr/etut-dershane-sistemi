<?php
session_start();
require_once 'inc/vt.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kullaniciAdi = $_POST['username'];
    $sifre = $_POST['password'];
    $sifreOnay = $_POST['confirm_password'];

    // Şifreleri kontrol et
    if ($sifre !== $sifreOnay) {
        $hataMesaji = "Şifreler uyuşmuyor!";
    } else {
        // Şifreyi güvenli bir şekilde hashle
        $hashliSifre = password_hash($sifre, PASSWORD_DEFAULT);

        // Kullanıcıyı veritabanına ekle
        $stmt = $db->prepare("INSERT INTO kullanici_tablosu (kullanici_adi, sifre) VALUES (:kullanici_adi, :sifre)");
        $stmt->bindParam(':kullanici_adi', $kullaniciAdi);
        $stmt->bindParam(':sifre', $hashliSifre);

        if ($stmt->execute()) {
            // Kayıt başarılıysa oturum başlat ve ana sayfaya yönlendir
            $_SESSION['kullanici'] = $kullaniciAdi;
            header('Location: pano.php');
            exit;
        } else {
            $hataMesaji = "Kayıt oluşturulurken bir hata oluştu!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Process</title>
    <!-- Burada CSS ve diğer meta etiketlerini ekleyebilirsiniz -->
</head>
<body>
    <?php if (isset($hataMesaji)) { ?>
        <p><?php echo $hataMesaji; ?></p>
    <?php } ?>
    <p><a href="register.php">Back to Register</a></p>
</body>
</html>