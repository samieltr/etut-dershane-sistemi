<?php include 'inc/girisdogrula.php';?>
<?php
// Veritabanı bağlantısı burada olmalıdır.
require_once 'inc/vt.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['student_id'];
    $testId = $_POST['test_id'];

    // Öğrencinin teste giriş iznini testizin tablosuna kaydet
    $testIzinEkleSorgu = $db->prepare("INSERT INTO testizin (ogrencid, testid) VALUES (:studentId, :testId)");
    $testIzinEkleSorgu->bindParam(':studentId', $studentId, PDO::PARAM_INT);
    $testIzinEkleSorgu->bindParam(':testId', $testId, PDO::PARAM_INT);
    $testIzinEkleSorgu->execute();

    // İşlem tamamlandıktan sonra ogrenci_listesi.php sayfasına yönlendir
    header('Location: etut.php');
    exit();
}

// Öğrenci ID'sini alalım
$studentId = $_GET['student_id'];

// Öğrenci bilgisini çek
$ogrenciBilgiSql = "SELECT * FROM kullanici_tablosu WHERE id = :studentId";
$ogrenciBilgiStmt = $db->prepare($ogrenciBilgiSql);
$ogrenciBilgiStmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
$ogrenciBilgiStmt->execute();
$ogrenciBilgi = $ogrenciBilgiStmt->fetch(PDO::FETCH_ASSOC);

// Tüm testleri çek
$testlerSql = "SELECT * FROM testler";
$testlerStmt = $db->query($testlerSql);
$testler = $testlerStmt->fetchAll(PDO::FETCH_ASSOC);
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
				<li class="no-hover">Öğrenci Test İzni</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Öğrenci İzni</h1>
				<p>İlgili öğrenciye erişebileceği testi seçiniz.</p>
			</div>
			<a class="button" href="soruekle.php">Yeni Test Ekle</a> <br>
			<div class="grid_12">
				<div class="block-border">
				
					<div class="block-header">
					
						<h1><?php echo $ogrenciBilgi['ad'] . ' ' . $ogrenciBilgi['soyad']; ?></h1><span></span>
					</div>
					
					<div class="block-content">
						<form class="block-content form" method="post">
						<br>
    <input type="hidden" name="student_id" value="<?php echo $studentId; ?>">
    <label for="test_id">Test Seçin:</label>

    <select name="test_id" id="test_id" required>
        <?php foreach ($testler as $test) { ?>
            <option value="<?php echo $test['id']; ?>"><?php echo $test['tesadi']; ?></option>
        <?php } ?>
    </select>
	<div class="block-actions">

							<ul class="actions-right">
								<li><input type="submit" class="button" value="İzin Ver"></li>
							</ul>
						</div>
</form>
					</div>
				</div>
			</div>
			
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
  </div> <!--! end of #main -->
 <?php include 'inc/footer.php';?>