<?php include 'inc/girisdogrula.php';?>
<?php
// Veritabanı bağlantısı burada olmalıdır.
require_once 'inc/vt.php';

// Form gönderildiğinde işlemleri yap
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dersAdi = $_POST['dersadi'];
    $soruSayisi = intval($_POST['soru_sayisi']);
    $testAdi = $_POST['testadi'];

    // Ders adına ait ID'yi al
    $dersIdSorgu = $db->prepare("SELECT id FROM dersler WHERE dersad = :dersAdi");
    $dersIdSorgu->bindParam(':dersAdi', $dersAdi);
    $dersIdSorgu->execute();
    $dersId = $dersIdSorgu->fetchColumn();

    // Testi testler tablosuna ekle
    $testEkleSorgu = $db->prepare("INSERT INTO testler (tesadi) VALUES (:testAdi)");
    $testEkleSorgu->bindParam(':testAdi', $testAdi);
    $testEkleSorgu->execute();
    
    // Eklenen testin ID'sini al
    $testId = $db->lastInsertId();

    // Testi aynı ID ile testler tablosuna ekleyelim
    $testTestlerEkleSorgu = $db->prepare("UPDATE testler SET testid = :testId WHERE id = :testId");
    $testTestlerEkleSorgu->bindParam(':testId', $testId);
    $testTestlerEkleSorgu->execute();

    // Formdan gelen her soru için işlemleri yap
    for ($i = 1; $i <= $soruSayisi; $i++) {
        // Diğer soru verilerini al
        $soru = $_POST['soru_' . $i];
        $secenekler = array();

        for ($j = 1; $j <= 5; $j++) {
            $secenek = $_POST['secenek_' . $i . '_' . $j];
            $secenekler[] = $secenek;
        }

        $dogruCevap = $_POST['dogrucevap_' . $i];

        // Soruyu sorular tablosuna ekle ve testid değerini kullan
        $soruEkleSorgu = $db->prepare("INSERT INTO sorular (testid, dersadi, soru, secenek1, secenek2, secenek3, secenek4, secenek5, dogrucevap) VALUES (:testId, :dersAdi, :soru, :secenek1, :secenek2, :secenek3, :secenek4, :secenek5, :dogruCevap)");
        $soruEkleSorgu->bindParam(':testId', $testId);
        $soruEkleSorgu->bindParam(':dersAdi', $dersAdi);
        $soruEkleSorgu->bindParam(':soru', $soru);
        $soruEkleSorgu->bindParam(':secenek1', $secenekler[0]);
        $soruEkleSorgu->bindParam(':secenek2', $secenekler[1]);
        $soruEkleSorgu->bindParam(':secenek3', $secenekler[2]);
        $soruEkleSorgu->bindParam(':secenek4', $secenekler[3]);
        $soruEkleSorgu->bindParam(':secenek5', $secenekler[4]);
        $soruEkleSorgu->bindParam(':dogruCevap', $dogruCevap);
        $soruEkleSorgu->execute();
    }

    // İşlemler tamamlandıktan sonra yönlendirme yapabilirsiniz
    header('Location: index.php'); // Admin paneline yönlendir
    exit();
}
?>
<?php include 'inc/head.php';?>

<body id="top">

  <!-- Begin of #container -->
  <div id="container">
<?php include 'inc/header.php';?>

    <div class="fix-shadow-bottom-height"></div>
	
<?php include 'inc/side.php';?>
    	
    
    <!-- Begin of #main -->
    <div id="main" role="main">
    	
    	<!-- Begin of titlebar/breadcrumbs -->
		<div id="title-bar">
			<ul id="breadcrumbs">
				<li><a href="index.php" title="Home"><span id="bc-home"></span></a></li>
				<li class="no-hover">Soru Ekle</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Soru Ekle</h1>
				<p>Yapacağınız testler için soru ve test adı ekleyin.</p>
			</div>
			
			<div class="grid_12">
				<div class="block-border">
					<div class="block-header">
			  <script>
        function toggleSoruFields() {
            var soruSayisi = parseInt(document.getElementById("soru_sayisi").value);
            var soruEklemeAlanlari = document.getElementById("soru_ekleme_alanlari");

            while (soruEklemeAlanlari.firstChild) {
                soruEklemeAlanlari.removeChild(soruEklemeAlanlari.firstChild);
            }

            for (var i = 1; i <= soruSayisi; i++) {
                var soruDiv = document.createElement("div");
                soruDiv.innerHTML = "<label for='soru_" + i + "'>Soru " + i + ":</label>" +
                                    "<input type='text' name='soru_" + i + "' id='soru_" + i + "'>" +
                                    "<br>";

                var secenekDiv = document.createElement("div");
                secenekDiv.innerHTML = "Şıklar: <br>" +
                                       "<label for='secenek_" + i + "_1'>A:</label>" +
                                       "<input type='text' name='secenek_" + i + "_1' id='secenek_" + i + "_1'><br>" +
                                       "<label for='secenek_" + i + "_2'>B:</label>" +
                                       "<input type='text' name='secenek_" + i + "_2' id='secenek_" + i + "_2'><br>" +
                                       "<label for='secenek_" + i + "_3'>C:</label>" +
                                       "<input type='text' name='secenek_" + i + "_3' id='secenek_" + i + "_3'><br>" +
                                       "<label for='secenek_" + i + "_4'>D:</label>" +
                                       "<input type='text' name='secenek_" + i + "_4' id='secenek_" + i + "_4'><br>" +
                                       "<label for='secenek_" + i + "_5'>E:</label>" +
                                       "<input type='text' name='secenek_" + i + "_5' id='secenek_" + i + "_5'><br>";

                var dogruCevapDiv = document.createElement("div");
                dogruCevapDiv.innerHTML = "Doğru Cevap: " +
                                         "<select name='dogrucevap_" + i + "' id='dogrucevap_" + i + "'>" +
                                         "<option value='A'>A</option>" +
                                         "<option value='B'>B</option>" +
                                         "<option value='C'>C</option>" +
                                         "<option value='D'>D</option>" +
                                         "<option value='E'>E</option>" +
                                         "</select><br>";

                soruEklemeAlanlari.appendChild(soruDiv);
                soruEklemeAlanlari.appendChild(secenekDiv);
                soruEklemeAlanlari.appendChild(dogruCevapDiv);
            }
        }
    </script>
						<h1>Sorular</h1><span></span>
					</div>
				    <form class="block-content form" method="post" action="soruekle.php">
        <label class="required text" for="dersadi">Ders Adı:</label>
       <select name="dersadi" id="dersadi" required>
            <!-- Derslerin veritabanından alınması ve listelenmesi -->
            <?php
            $derslerSql = "SELECT dersad FROM dersler";
            $derslerStmt = $db->query($derslerSql);
            while ($ders = $derslerStmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $ders['dersad'] . '">' . $ders['dersad'] . '</option>';
            }
            ?>
        </select>
          <br> <label for="testadi">Test Adı:</label>
        <input class="required text" type="text" name="testadi" id="testadi"><br>
        <label for="soru_sayisi">Soru Sayısı:</label>
        <input class="required text" type="number" name="soru_sayisi" id="soru_sayisi" onchange="toggleSoruFields()"><br>

        <div id="soru_ekleme_alanlari">
            <!-- Dinamik olarak burada soru alanları oluşturulacak -->
        </div>
        
     
        
        <input type="submit" value="Soru Ekle">
    </form>
				</div>
			</div>
			
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
  </div> <!--! end of #main -->
 <?php include 'inc/footer.php';?>