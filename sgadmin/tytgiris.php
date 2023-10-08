<?php include 'inc/girisdogrula.php';?>
<?php
// Veritabanı bağlantısı burada olmalıdır.
require_once 'inc/vt.php';


// Veritabanından tüm öğrencileri çekelim
$sql_ogrenciler = "SELECT id, ad, soyad FROM kullanici_tablosu";
$stmt = $db->query($sql_ogrenciler);
$ogrenciler = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Düzenleme bağlantısına tıklanınca, öğrencinin ID'sini seçilen_ogrenci_id olarak saklayalım
if (isset($_GET['id'])) {
    $_SESSION['seçilen_ogrenci_id'] = $_GET['id'];
    header('Location: not_girisi.php');
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
				<li class="no-hover">Öğrenci Listesi</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Öğrenci Listesi</h1>
				<p>Öğrencileri Listeleyebilir ve not girişi yapabilirsiniz</p>
			</div>
			
			<div class="grid_12">
				<div class="block-border">
				
					<div class="block-header">
					
						<h1>Öğrenciler</h1><span></span>
					</div>
					
					<div class="block-content">
						<ul>
        <?php foreach ($ogrenciler as $ogrenci): ?>
            <li>
                <?php echo $ogrenci['ad'] . ' ' . $ogrenci['soyad']; ?>
                <a href="tytgiris.php?id=<?php echo $ogrenci['id']; ?>">Düzenle</a>
            </li>
        <?php endforeach; ?>
    </ul>
					</div>
				</div>
			</div>
			
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
  </div> <!--! end of #main -->
 <?php include 'inc/footer.php';?>