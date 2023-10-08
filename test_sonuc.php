<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
<?php
session_start();
require_once 'inc/vt.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ogrenci_id = $_SESSION['id'];
    $test_id = $_POST['test_id'];
    $cevaplar = $_POST['cevap'];

    $sorularSql = "SELECT * FROM sorular WHERE testid = :testId";
    $sorularStmt = $db->prepare($sorularSql);
    $sorularStmt->bindParam(':testId', $test_id, PDO::PARAM_INT);
    $sorularStmt->execute();
    $sorular = $sorularStmt->fetchAll(PDO::FETCH_ASSOC);

    $dogruSayisi = 0;
    foreach ($sorular as $index => $soru) {
        $dogruCevap = $soru['dogrucevap'];
        $ogrenciCevap = isset($cevaplar[$index]) ? $cevaplar[$index] : '';

        if ($ogrenciCevap === $dogruCevap) {
            $dogruSayisi++;
        }
    }

    $ders = $sorular[0]['dersadi'];
    $soruSayisi = count($sorular);
    $yanlisSayisi = $soruSayisi - $dogruSayisi;
    $net = $dogruSayisi - ($yanlisSayisi / 4); // Yanlış başına -0.25 puan

    $sonucEkleSorgu = $db->prepare("INSERT INTO test_sonuclari (ogrencid, ders, dsayisi, ysayisi, net, testid) VALUES (:ogrenci_id, :ders, :dsayisi, :ysayisi, :net, :test_id)");
    $sonucEkleSorgu->bindParam(':ogrenci_id', $ogrenci_id, PDO::PARAM_INT);
    $sonucEkleSorgu->bindParam(':ders', $ders);
    $sonucEkleSorgu->bindParam(':dsayisi', $dogruSayisi, PDO::PARAM_INT);
    $sonucEkleSorgu->bindParam(':ysayisi', $yanlisSayisi, PDO::PARAM_INT);
    $sonucEkleSorgu->bindParam(':net', $net);
    $sonucEkleSorgu->bindParam(':test_id', $test_id, PDO::PARAM_INT);
    $sonucEkleSorgu->execute();

    $testKatilimGuncelleSorgu = $db->prepare("UPDATE testizin SET katilim = 1 WHERE ogrencid = :ogrenci_id AND testid = :test_id");
    $testKatilimGuncelleSorgu->bindParam(':ogrenci_id', $ogrenci_id, PDO::PARAM_INT);
    $testKatilimGuncelleSorgu->bindParam(':test_id', $test_id, PDO::PARAM_INT);
    $testKatilimGuncelleSorgu->execute();

 // Test sonuçlarını çıkarttıktan sonra değerleri değişkenlere atayalım
    $dsayisi = $dogruSayisi;
    $ysayisi = $yanlisSayisi;
    $net = $net;
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
                        <h3 class="title">Ana Sayfa <span>/ Test Sonucu</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Çözdüğünüz Testin Sonucu</h4>
                        </div>
                        <div class="box-body">
                                <!--Basic Tab Start-->
		   <table class="table table-bordered data-table data-table-default">
    <thead>
       <tr>
          <th>Doğru Sayısı</th>
		   <th>Yanlış Sayısı</th>
          <th>Netiniz</th>
       </tr>
    </thead>
	<tbody>
	<tr>
	<td>
	<?php echo $dsayisi; ?>
	</td>
	<td>
	<?php echo $ysayisi; ?>
	</td>
	<td>
	<?php echo $net; ?>
	</td>
	</tr>
	</tbody>
	</table>
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
 <script>
        function katildim(etut_sira) {
            // AJAX ile katilim_guncelle.php dosyasını çağırarak veritabanında güncelleme yapalım
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "katilim_guncelle.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Güncelleme işlemi tamamlandıktan sonra sayfayı yenileyelim
                    location.reload();
                }
            };
            xhr.send("etut_sira=" + etut_sira);
        }
    </script>
<script>
$('.data-table-default').DataTable({
    responsive: true,
    language: {
        paginate: {
            previous: '',
            next: ''
        }
    }
});
</script>


</body>


</html>