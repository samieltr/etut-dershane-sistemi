<?php 
session_start();
include 'inc/head.php';
?>
<?php
require_once 'inc/vt.php';
// Oturum değişkenini kontrol et, kullanıcı giriş yapmamışsa login.php'ye yönlendir

// Giriş yapmış kullanıcının ID'sini al
$girisYapanKullaniciID = $_SESSION['id'];

// Kullanıcının verilerini ogrencitest tablosundan çek
$stmt = $db->prepare("SELECT * FROM ogrencitest WHERE ogrencid = :ogrencid");
$stmt->bindParam(':ogrencid', $girisYapanKullaniciID);
$stmt->execute();
$veriler = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Tarihi "Gün Ay Yıl" formatına dönüştürmek için bir fonksiyon
function tarihFormatla($tarih)
{
    return date('d.n.Y', strtotime($tarih));
}
// "Çözülen Soru Ekle" butonuna basıldığında formun gösterilmesi için kontrol değişkeni
$gonderildi = false;
$tabloGizli = true;
// "Çözülen Soru Ekle" butonuna basıldığında form verilerini al ve yeni veriyi ekleyerek tabloyu güncelle
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ders_adi'])) {
    $dersAdi = $_POST['ders_adi'];
    $cozulenSoru = $_POST['cozulen_soru'];
    $dogruSayisi = $_POST['dogru_sayisi'];
    $yanlisSayisi = $_POST['yanlis_sayisi'];
	$tarih = $_POST['tarih'];

    // Yeni veriyi veritabanına ekle
    $stmt = $db->prepare("INSERT INTO ogrencitest (ogrencid, dersadi, cozulensoru, dogrusayisi, yanlisayisi, tarih) VALUES (:ogrencid, :dersadi, :cozulensoru, :dogrusayisi, :yanlisayisi, :tarih)");
    $stmt->bindParam(':ogrencid', $girisYapanKullaniciID);
    $stmt->bindParam(':dersadi', $dersAdi);
    $stmt->bindParam(':cozulensoru', $cozulenSoru);
    $stmt->bindParam(':dogrusayisi', $dogruSayisi);
    $stmt->bindParam(':yanlisayisi', $yanlisSayisi);
	 $stmt->bindParam(':tarih', $tarih);
    $stmt->execute();

  
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gonderildi'])) {
    $gonderildi = true;
	$tabloGizli = false;
}
?>
 <style>
        /* CSS kullanarak formun başlangıçta gizlenmesini sağlıyoruz */
        #cozulenSoruForm {
            display: none;
        }
		 #ogrenciTablosu {
            display: <?php echo $tabloGizli ? 'block' : 'none'; ?>;
        }
    </style>
<script>
        // JavaScript kullanarak formun gösterilip gizlenmesi
        function gosterForm() {
            document.getElementById('cozulenSoruForm').style.display = 'block';
            document.getElementById('cozulenSoruEkleButon').style.display = 'none';
			 document.getElementById('ogrenciTablosu').style.display = 'none';
        }

        function gizleForm() {
            document.getElementById('cozulenSoruForm').style.display = 'none';
            document.getElementById('cozulenSoruEkleButon').style.display = 'block';
			document.getElementById('ogrenciTablosu').style.display = 'block';
        }
    </script>
<body class="skin-dark">

    <div class="main-wrapper">

<?php include 'inc/sidebar.php';?>
     

        <!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3 class="title">Ana Sayfa <span>/ Çözülen Sorular ve Değerler</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Çözülen Sorular</h4>
                        </div>
                        <div class="box-body">
                                <!--Basic Tab Start-->
							<center>	<h6>Netleriniz hesaplanırken 4 yanlışınız 1 doğrunuzu götürecek şekilde hesaplanacaktır. Her yanlış 0.25 net değerindedir.</h6></center>
								  <?php if (!$gonderildi) { ?>
        <button class="button button-outline button-primary" id="cozulenSoruEkleButon" onclick="gosterForm()">Çözülen Soru Ekle</button>
    <?php } ?>

    <div class="form-control" id="cozulenSoruForm" <?php if ($gonderildi) echo 'style="display:block;"'; ?>>
        <h3>Çözülen Soru Ekle</h3>
        <form  class="form-control" action="" method="post">
            <label for="ders_adi">Ders Adı:</label>
            <select class="form-control" name="ders_adi" id="ders_adi">
                <option value="Matematik">Matematik</option>
                <option value="Türkçe">Türkçe</option>
                <option value="Tarih">Tarih</option>
                <option value="Kimya">Kimya</option>
                <option value="Türk Dili ve Edebiyatı">Türk Dili ve Edebiyatı</option>
                <option value="Coğrafya">Coğrafya</option>
                <option value="Biyoloji">Biyoloji</option>
                <option value="Fizik">Fizik</option>
            </select>
            <br>
            <label for="cozulen_soru">Çözülen Soru Sayısı:</label>
            <input class="form-control" type="text" name="cozulen_soru" id="cozulen_soru">
            <br>
            <label for="dogru_sayisi">Doğru Sayısı:</label>
            <input class="form-control" type="text" name="dogru_sayisi" id="dogru_sayisi">
            <br>
            <label for="yanlis_sayisi">Yanlış Sayısı:</label>
            <input class="form-control" type="text" name="yanlis_sayisi" id="yanlis_sayisi">
           <br>
            <label for="tarih">Tarih (Gü/Ay/Yıl):</label>
            <input class="form-control" type="date" name="tarih" id="tarih">
            <input class="form-control" type="hidden" name="gonderildi" value="1">
            <input class="button button-outline button-info" type="submit" value="Kaydet">
            <button class="button button-outline button-secondary" type="button" onclick="gizleForm()">Vazgeç</button>
        </form>
    </div>
	<div id="ogrenciTablosu" <?php if ($gonderildi) echo 'style="display:block;"'; ?>>
              <?php if ($veriler && count($veriler) > 0) { ?>
        <table class="table">
             <thead class="thead-light">
			<tr>
                <th>Ders Adı</th>
                <th>Çözülen Soru</th>
				<th>Doğru</th>
				<th>Yanlış</th>
				<th>Net</th>
				<th>Tarih</th>
            </tr>
			</thead>
            <?php foreach ($veriler as $veri) { ?>
			
                 <tbody>
				<tr>
				<td><?php echo $veri['dersadi']; ?></td>
					<td><?php echo $veri['cozulensoru']; ?></td>
                    <td><?php echo $veri['dogrusayisi']; ?></td>
                    <td><?php echo $veri['yanlisayisi']; ?></td>
					 <td><?php
                        $dogruSayisi = intval($veri['dogrusayisi']);
                        $yanlisSayisi = intval($veri['yanlisayisi']);
                        $netSayisi = $dogruSayisi - ($yanlisSayisi * 0.25);
                        echo $netSayisi;
                        ?></td>
						<td><?php echo tarihFormatla($veri['tarih']); ?></td>
                </tr>
				 </tbody>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>Henüz öğrenci soruları eklenmemiş.</p>
    <?php } ?>
	   </div>
           
                <!--Basic Tab End-->
						
                        </div>
                    </div>
                </div>
                <!--Fullcalendar End-->

               
            </div>

        </div><!-- Content Body End -->

     <?php include 'inc/footer.php';?>

    </div>

    <!-- JS
============================================ -->

     <?php include 'inc/jscript.php';?>



</body>

</html>