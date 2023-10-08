<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
<?php
require_once 'inc/vt.php';
// Oturum değişkenini kontrol et, kullanıcı giriş yapmamışsa login.php'ye yönlendir
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Giriş yapmış kullanıcının ID'sini al
$girisYapanKullaniciID = $_SESSION['id'];

// Kullanıcının Türkçe, Matematik, Sosyal Bilimler ve Fen Bilimleri derslerindeki doğru ve yanlış sayılarını alalım
$sql_dersler = "SELECT * FROM ogrencideneme WHERE ogrencid = :ogrencid ORDER BY tarih DESC";
$stmt = $db->prepare($sql_dersler);
$stmt->bindParam(':ogrencid', $girisYapanKullaniciID);
$stmt->execute();

$deneme_sonuclari = $stmt->fetchAll(PDO::FETCH_ASSOC);

function tarihFormatla($tarih)
{
    return date('d.n.Y', strtotime($tarih));
}

function tytPuanHesapla($turkce_dogru, $turkce_yanlis, $mat_dogru, $mat_yanlis, $sos_dogru, $sos_yanlis, $fen_dogru, $fen_yanlis)
{
    $turkce_net = $turkce_dogru - ($turkce_yanlis * 0.25);
    $mat_net = $mat_dogru - ($mat_yanlis * 0.25);
    $sos_net = $sos_dogru - ($sos_yanlis * 0.25);
    $fen_net = $fen_dogru - ($fen_yanlis * 0.25);

    $turkce_puan = $turkce_net * 3.3;
    $mat_puan = $mat_net * 3.3;
    $sos_puan = $sos_net * 3.4;
    $fen_puan = $fen_net * 3.4;

    $tyt_puan = $turkce_puan + $mat_puan + $sos_puan + $fen_puan + 0.6 + 100;

    return $tyt_puan;
}

// En son girilen sınavın TYT puanını hesapla ve veritabanında güncelle
if (!empty($deneme_sonuclari)) {
    $son_sonuc = $deneme_sonuclari[0]; // İlk sıradaki sonuç en son girilen sınav sonucudur
    $tyt_puan = tytPuanHesapla($son_sonuc['turkced'], $son_sonuc['turkcey'], $son_sonuc['matd'], $son_sonuc['maty'], $son_sonuc['sosd'], $son_sonuc['sosy'], $son_sonuc['fend'], $son_sonuc['feny']);

    $sql_guncelle = "UPDATE ogrencideneme SET tyt_puan = :tyt_puan WHERE ogrencid = :ogrencid AND tarih = :tarih";
    $stmt_guncelle = $db->prepare($sql_guncelle);
    $stmt_guncelle->bindParam(':tyt_puan', $tyt_puan);
    $stmt_guncelle->bindParam(':ogrencid', $girisYapanKullaniciID);
    $stmt_guncelle->bindParam(':tarih', $son_sonuc['tarih']);
    $stmt_guncelle->execute();
}
?>

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
                        <h3 class="title">Ana Sayfa <span>/ Deneme Sınavı</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Deneme Sınavı TYT</h4>
                        </div>
                        <div class="box-body">
                                <!--Basic Tab Start-->
							<center>	
							<p>TYT Puanı Nasıl Hesaplanır ?</p>
							<p>TYT Sınavında derslere göre aldığınız netler ÖSYM tarafından verilen katsayılar ile çarpılır. 
							Ardından ÖSYM tarafından sınava giren adaya +100 puan verilir. Mezun olduğunu diploma puanı 0.6 ile çarpılır. Katsayıları ile çarpılan netleriniz , +100 puan ve 0.6 ile çarptığınız diploma notunuz toplanır. Bu sizlere ham puanınızı verir.
							Aşağıda derslerin katsayıları yer almaktadır.</p>
							<p class="alert alert-outline-info"> Türkçe : 3.3 Matematik 3.3 Sosyal Bilimler : 3.4 Fen Bilimleri : 3.4 </p>
							</center>
								 <br>
 <?php if (count($deneme_sonuclari) > 0) : ?>
	<table class="table">
	<?php foreach ($deneme_sonuclari as $sonuc) : ?>
	  <thead class="thead-light">
	  <tr>
		<th>Sınav Tarihi: <?= tarihFormatla($sonuc['tarih']) ?></th>
		</tr>
        <tr>
            <th>Ders</th>
            <th>Doğru</th>
            <th>Yanlış</th>
        </tr>
		</thead>
		
		<tbody>
        <tr>
            <td>Türkçe</td>
             <td><?= $sonuc['turkced'] ?></td>
            <td><?= $sonuc['turkcey'] ?></td>
        </tr>

        <tr>
            <td>Sosyal Bilimler</td>
            <td><?= $sonuc['sosd'] ?></td>
             <td><?= $sonuc['sosy'] ?></td>

        </tr>
		        <tr>
            <td>Matematik</td>
           <td><?= $sonuc['matd'] ?></td>
            <td><?= $sonuc['maty'] ?></td>

        </tr>
        <tr>
            <td>Fen Bilimleri</td>
            <td><?= $sonuc['fend'] ?></td>
            <td><?= $sonuc['feny'] ?></td>
        </tr>
        <tr>
            <td colspan="5" class="alert alert-outline-info">TYT PUAN :<?= tytPuanHesapla($sonuc['turkced'], $sonuc['turkcey'], $sonuc['matd'], $sonuc['maty'], $sonuc['sosd'], $sonuc['sosy'], $sonuc['fend'], $sonuc['feny']) ?></td>
        </tr>
		</tbody>
		  <?php endforeach; ?>
    </table>
           <?php else : ?>
        <p>Öğrenciye ait deneme sınavı sonuçları bulunmamaktadır.</p>
    <?php endif; ?>
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