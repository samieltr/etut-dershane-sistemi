<?php include 'inc/girisdogrula.php';?>
<?php
// Veritabanı bağlantısı burada olmalıdır.
require_once 'inc/vt.php';

// Testleri çekelim
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
				<li class="no-hover">Öğrenci Listesi</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Test Listesi</h1>
				<p>Sisteme Eklenen testleri listeleyebilir ve sorularını görebilirsiniz.</p>
			</div>
			
			<div class="grid_12">
				<div class="block-border">
				<a class="button" href="soruekle.php">Yeni Test Ekle</a> <br>
					<div class="block-header">
					
						<h1>Testler</h1><span></span>
					</div>
					
					<div class="block-content">
						<table id="table-example" class="table" width="100%">
							<thead>
								<tr>
									<th>Test Adı</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<?php foreach ($testler as $test) { ?>
							<tbody>
								<tr class="gradeX">
								<td><?php echo $test['tesadi']; ?></td>
									<td><a class="button" href="test_incele.php?test_id=<?php echo $test['id']; ?>">Testi İncele</a></td>
									
								</tr>
							</tbody>
							   <?php } ?>
						</table>
					</div>
				</div>
			</div>
			
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
  </div> <!--! end of #main -->
 <?php include 'inc/footer.php';?>