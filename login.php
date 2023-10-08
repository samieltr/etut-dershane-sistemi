<?php
session_start();
date_default_timezone_set('Europe/Istanbul'); // Sunucunun bulunduğu zaman dilimine göre ayarlayın
require_once 'inc/vt.php';

// Eğer daha önce "Remember me" seçeneği işaretlenmişse ve kullanıcı zaten oturum açmışsa
if (isset($_COOKIE['remember_me']) && isset($_SESSION['kullanici'])) {
    // Pano.php sayfasına yönlendir
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $girilenKullaniciAdi = $_POST['email'];
    $girilenSifre = $_POST['pass'];

    // Kullanıcı bilgilerini veritabanından kontrol et
    $stmt = $db->prepare("SELECT * FROM kullanici_tablosu WHERE kullanici_adi = :kullanici_adi");
    $stmt->bindParam(':kullanici_adi', $girilenKullaniciAdi);
    $stmt->execute();
    $kullanici = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($kullanici && password_verify($girilenSifre, $kullanici['sifre'])) {
        // Kullanıcı doğrulandı, oturum başlat
        $_SESSION['id'] = $kullanici['id'];
        $_SESSION['kullanici'] = $kullanici['kullanici_adi'];
        $_SESSION['ad'] = $kullanici['ad'];
        $_SESSION['soyad'] = $kullanici['soyad'];
        $_SESSION['fotoprofil'] = $kullanici['fotoprofil'];
        $_SESSION['eposta'] = $kullanici['eposta'];
        $_SESSION['universite'] = $kullanici['universite'];
        $_SESSION['unibolum'] = $kullanici['unibolum'];
        $_SESSION['unitur'] = $kullanici['unitur'];
        $_SESSION['unitkont'] = $kullanici['unitkont'];
        $_SESSION['unitaban'] = $kullanici['unitaban'];
        $_SESSION['unitavan'] = $kullanici['unitavan'];
        $_SESSION['unitanitimvideo'] = $kullanici['unitanitimvideo'];

        // "Remember me" seçeneği işaretlenmişse, çerez oluştur
        if ($hatirla) {
            $expire = time() + 60 * 60 * 24 * 30; // 30 gün
            setcookie('remember_me', $girilenKullaniciAdi, $expire, '/');
        }
        
        // Son giriş bilgilerini güncelle
        $ipAdresi = $_SERVER['REMOTE_ADDR'];
        $simdi = date('Y-m-d H:i:s');
        $updateQuery = "UPDATE kullanici_tablosu SET lastlogin = :simdi, ip = :ipAdresi WHERE kullanici_adi = :kullanici_adi";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bindParam(':simdi', $simdi);
        $updateStmt->bindParam(':ipAdresi', $ipAdresi);
        $updateStmt->bindParam(':kullanici_adi', $girilenKullaniciAdi);
        $updateStmt->execute();

        // index.php sayfasına yönlendir
        header('Location: index.php');
        exit;
    } else {
        $hataMesaji = "Geçersiz kullanıcı adı veya şifre!";
    }
}
?>
<html lang="en">
<head>
<title>SG Etüt Sistemi | Derslerinize En İyi Şekilde Hazırlanın </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico">

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

<meta name="robots" content="noindex, follow">
</head>
<body>
<div class="limiter">
    
<div class="container-login100">
    
<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
       <style>
.login100-form-btn {

    background: #002952;
   
}
       </style>
<form action="#" method="post">
        <span class="login100-form-title p-b-55"><img width="350" src="/assets/images/logo/logos2.png"></span>
        <div class="wrap-input100 validate-input m-b-16" data-validate="Kullanıcı adı boş bırakılamaz">
            <input class="input100" type="text" name="email" placeholder="Kullanıcı Adı">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <span class="lnr lnr-envelope"></span>
            </span>
        </div>
        <div class="wrap-input100 validate-input m-b-16" data-validate="Şifre boş bırakılamaz">
            <input class="input100" type="password" name="pass" placeholder="Şifre">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <span class="lnr lnr-lock"></span>
            </span>
        </div>
        <div class="contact100-form-checkbox m-l-4">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">Bilgilerimi Hatırla</label>
        </div>
        <div class="container-login100-form-btn p-t-25">
            <button class="login100-form-btn">Giriş Yap</button>
        </div>
        <?php if (isset($hataMesaji)) { ?>
            <p><font color="white"><?php echo $hataMesaji; ?></font></p>
        <?php } ?>
    </form>
</body>
</html>


</div>
</div>
</div>

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/select2/select2.min.js"></script>

<script src="js/main.js"></script>

<script async="" src="../../../gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer="" src="../../../beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"7f01861609af92cf","version":"2023.7.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>
</html>
