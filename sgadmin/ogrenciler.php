<?php include 'inc/girisdogrula.php';?>
<?php
// Veritabanı bağlantısı burada olmalıdır.
require_once 'inc/vt.php';

// Kullanici_tablosu adlı tablodan öğrencileri çekelim
$stmt = $db->query("SELECT id, ad, soyad, kullanici_adi, lastlogin, ip, fotoprofil FROM kullanici_tablosu");
$ogrenciler = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
				<p>Öğrencileri Listeleyebilir veya Düzenleyeiblirsiniz.</p>
			</div>
			
			<div class="grid_12">
				<div class="block-border">
				<a class="button" href="ogrenci_ekle.php">Yeni Öğrenci Ekle</a> 
					<div class="block-header">
					
						<h1>Öğrenciler</h1><span></span>
					</div>
					
					<div class="block-content">
						<table id="table-example" class="table" width="100%">
							<thead>
								<tr>
									<th>Foto</th>
									<th>Öğrenci No</th>
									<th>Ad</th>
									<th>Soyad</th>
									<th>Kullanıcı Adı</th>
									<th>Düzenle</th>
									<th>Son Giriş</th>
									<th>İp</th>
								</tr>
							</thead>
							<?php foreach ($ogrenciler as $ogrenci): ?>
							<tbody>
								<tr class="gradeX">
								<td><img width="40" src="../assets/images/avatar/<?php echo $ogrenci['fotoprofil']; ?>"></td>
									<td><?php echo $ogrenci['id']; ?></td>
									<td><?php echo $ogrenci['ad']; ?></td>
									<td><?php echo $ogrenci['soyad']; ?></td>
									<td><?php echo $ogrenci['kullanici_adi']; ?></td>
									<td><a  class="button red"href="ogrenci_duzenle.php?id=<?php echo $ogrenci['id']; ?>">Düzenle</a></td>
									<td><?php echo $ogrenci['lastlogin']; ?></td>
									<td><?php echo $ogrenci['ip']; ?></td>
								</tr>
							</tbody>
							  <?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
  </div> <!--! end of #main -->
 <?php include 'inc/footer.php';?>