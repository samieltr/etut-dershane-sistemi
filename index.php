<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
<?php 
require_once 'inc/vt.php';
include 'inc/panobutton.php';?>



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
                        <h3>Hoşgeldiniz <span>/ <?php echo $_SESSION['ad'] . ' ' . $_SESSION['soyad']; ?> <u>Çalışmalarınızda Başarılar Dileriz</u></span></h3>
                    </div>
                </div><!-- Page Heading End -->

                <!-- Page Button Group Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-date-range">
                        <input type="text" class="form-control input-date-predefined">
                    </div>
                </div><!-- Page Button Group End -->

            </div><!-- Page Headings End -->

            <!-- Top Report Wrap Start -->
            <div class="row">
                <!-- Top Report Start -->
                <div class="col-xlg-3 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4>Bugün</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                            <h5>YKS Kalan Süre</h5>
							<div class="alert alert-outline-secondary" role="alert">
                               <p id="demo"></p>
                            </div>

                        </div>
    <!-- Footer -->
                        <div class="footer">
                            <div class="progess">
                                <div class="progess-bar" style="width: 100%;"></div>
                            </div>
                            
                        </div>
                 

                    </div>
                </div><!-- Top Report End -->


                <!-- Top Report Start -->
                <div class="col-xlg-3 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4>Deneme Sınavları</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                            <h5>En Son Alınan Puan</h5>

							<h2>
							<?php
// Giriş yapmış kullanıcının ID'sini al
$girisYapanKullaniciID = $_SESSION['id'];

// Kullanıcının en son girilen TYT puanını alalım
$sql_tyt_puan = "SELECT tyt_puan FROM ogrencideneme WHERE ogrencid = :ogrencid ORDER BY tarih DESC LIMIT 1";
$stmt_tyt_puan = $db->prepare($sql_tyt_puan);
$stmt_tyt_puan->bindParam(':ogrencid', $girisYapanKullaniciID);
$stmt_tyt_puan->execute();

$son_tyt_puan = $stmt_tyt_puan->fetchColumn();

// Eğer kullanıcının hiç deneme sınav sonucu yoksa son_tyt_puan null olacak
?>
<?= $son_tyt_puan ?? "Veri bulunamadı" ?>
							</h2>
                        </div>

                        <!-- Footer -->
                        <div class="footer">
                            <div class="progess">
                                <div class="progess-bar" style="width: 100%;"></div>
                            </div>
                            
                        </div>

                    </div>
                </div><!-- Top Report End -->

                <!-- Top Report Start -->
                <div class="col-xlg-3 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4>Ortalama</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                            <h5>Tüm Denemelerin Ortalama Puanı</h5>
                            <h2><?php
// Giriş yapmış kullanıcının ID'sini al
$girisYapanKullaniciID = $_SESSION['id'];

// Kullanıcının TYT puanlarını alalım
$sql_puanlar = "SELECT tyt_puan FROM ogrencideneme WHERE ogrencid = :ogrencid";
$stmt = $db->prepare($sql_puanlar);
$stmt->bindParam(':ogrencid', $girisYapanKullaniciID);
$stmt->execute();

$tyt_puanlar = $stmt->fetchAll(PDO::FETCH_COLUMN);

function tytPuanOrtalamasi($tyt_puanlar)
{
    if (empty($tyt_puanlar)) {
        return 0; // Eğer puanlar yoksa 0 döndür
    }

    $toplam_puan = array_sum($tyt_puanlar);
    $ortalama = $toplam_puan / count($tyt_puanlar);

    return $ortalama;
}

// TYT puanlarının ortalamasını hesapla
$tyt_ortalama = tytPuanOrtalamasi($tyt_puanlar);

echo "" . $tyt_ortalama;
?></h2>
                        </div>

                        <!-- Footer -->
                        <div class="footer">
                            <div class="progess">
                                <div class="progess-bar" style="width: 100%;"></div>
                            </div>
                        </div>

                    </div>
                </div><!-- Top Report End -->

                <!-- Top Report Start -->
                <div class="col-xlg-3 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
						<?php
// Giriş yapılan kullanıcının ID'sini alalım
$ogrenci_id = $_SESSION['id'];

// Öğrencinin çözdüğü toplam soru sayısını veritabanından alalım
$sql = "SELECT SUM(cozulensoru) AS toplam_soru, SUM(dogrusayisi) AS toplam_dogru, SUM(yanlisayisi) AS toplam_yanlis FROM ogrencitest WHERE ogrencid = :ogrenci_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':ogrenci_id', $ogrenci_id, PDO::PARAM_INT);
$stmt->execute();

// Sonuç kümesindeki satırı alalım
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$toplam_soru = $row['toplam_soru'];
$toplam_dogru = $row['toplam_dogru'];
$toplam_yanlis = $row['toplam_yanlis'];
// Net sayısını hesaplayalım
$net_sayisi = $toplam_dogru - ($toplam_yanlis * 0.25);
?>
                        <div class="head">
                            <h4>Soru Bankası</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                           
							<div class="alert alert-outline-secondary" role="alert">
                               <h5>Toplamda Çözülen Soru Sayısı</h5> <h5><?php echo $toplam_soru; ?></h5>
                            </div>

                           <div class="alert alert-outline-info" role="alert">
                                <h5>Toplam Doğru ve Yanlış</h5>
                            <h5><?php echo $toplam_dogru; ?> D <?php echo $toplam_yanlis; ?> Y Net : <?php echo $net_sayisi; ?> </h5>
                            </div>
							
                        </div>
                    </div>
                </div><!-- Top Report End -->
            </div><!-- Top Report Wrap End -->

            <div class="row mbn-30">

                <!-- Revenue Statistics Chart Start -->
                <div class="col-md-8 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title"><?php echo $_SESSION['universite'] . ' ' . $_SESSION['unibolum']; ?> </h4>
                        </div>
                        <div class="box-body">
                            <div class="chart-legends-1 row">
                               <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tür</th>
                                        <th>Kon.</th>
                                        <th>Taban</th>
                                        <th>Tavan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><?php echo $_SESSION['unitur']; ?></th>
                                        <td><?php echo $_SESSION['unitkont']; ?></td>
                                        <td><?php echo $_SESSION['unitaban']; ?></td>
                                        <td><?php echo $_SESSION['unitavan']; ?></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                            </div>
                            <div class="chartjs-revenue-statistics-chart">
                               <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $_SESSION['unitanitimvideo']; ?>?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div><!-- Revenue Statistics Chart End -->

                <!-- Market Trends Chart Start -->
		
                <div class="col-md-4 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Günün Ödevi</h4>
                        </div>
                        <div class="box-body">
                            <div class="chartjs-market-trends-chart">
                          <?php
// Giriş yapmış kullanıcının ID'sini al
$girisYapanKullaniciID = $_SESSION['id'];

// Giriş yapan öğrencinin etut içeriklerini çekelim
$sql_etut = "SELECT * FROM etut WHERE ogrencid = :ogrencid AND tarih >= CURDATE() ORDER BY tarih ASC";
$stmt = $db->prepare($sql_etut);
$stmt->bindParam(':ogrencid', $girisYapanKullaniciID);
$stmt->execute();

$etut_icerikler = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fonksiyon: Tarihi "Gün Ay Yıl" formatına dönüştürmek için
function tarihFormatla($tarih)
{
    return date('d.n.Y', strtotime($tarih));
}
?>
<div class="table-responsive">
<table class="table">
<thead class="thead-light">
    <tr>
        <th>Dersler</th>
        <th>Durum</th>
    </tr>
	</thead>
	<tbody>
	
    <?php foreach ($etut_icerikler as $icerik) { ?>
        <tr>

            <td><?php echo $icerik['dersler']; ?></td>
            <td>
                <?php if ($icerik['katilim'] == 1) { ?>
				  <p class="badge badge-outline badge-info" >Tamamlandı</p>
               
                <?php } else { ?>
                    <p class="badge badge-outline badge-warning" >Tamamlanmadı</p>
				
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
	</tbody>
</table>
</div>

                            </div>
                        </div>
                    </div>
                </div><!-- Market Trends Chart End -->

                
            </div>

        </div><!-- Content Body End -->
		
 <?php include 'inc/footer.php';?>
        
    </div>

   <?php include 'inc/jscript.php';?>

   <?php include 'inc/yks.php';?>


</body>

</html>