<?php include 'inc/girisdogrula.php';?>
<?php
// Veritabanı bağlantısı burada olmalıdır.
require_once 'inc/vt.php';

if (isset($_GET['test_id'])) {
    $testId = $_GET['test_id'];

    // Test bilgisini çekelim
    $testBilgiSql = "SELECT * FROM testler WHERE id = :testId";
    $testBilgiStmt = $db->prepare($testBilgiSql);
    $testBilgiStmt->bindParam(':testId', $testId, PDO::PARAM_INT);
    $testBilgiStmt->execute();
    $testBilgi = $testBilgiStmt->fetch(PDO::FETCH_ASSOC);

    // Teste ait soruları çekelim
    $sorularSql = "SELECT * FROM sorular WHERE testid = :testId";
    $sorularStmt = $db->prepare($sorularSql);
    $sorularStmt->bindParam(':testId', $testId, PDO::PARAM_INT);
    $sorularStmt->execute();
    $sorular = $sorularStmt->fetchAll(PDO::FETCH_ASSOC);
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
				<li class="no-hover">İlgili Testi Görüntüleme</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Testi Görüntüleyin</h1>
				<p>İlgili testi inceleyin veya silin</p>
			</div>
			
			<div class="grid_12">
			<a class="button" href="soruekle.php">Yeni Test Ekle</a> 
						<a class="button red" href="inc/test_sil.php?test_id=<?php echo $testId; ?>">Testi Sil</a>
				<div class="block-border">
				
					<div class="block-header">
					
						<h1><?php echo $testBilgi['tesadi']; ?> Testi</h1><span></span>
					</div>
					
					<div class="block-content">
						<table id="table-example" class="table" width="100%">
							<thead>
								<tr>
									<th colspan="5">Soru</th>
								</tr>
							</thead>
							 <?php $sira = 1; ?>
							 <?php foreach ($sorular as $soru) { ?>
							<tbody>
								<tr class="gradeX">
								<td><?php echo $sira; ?></td>
								<td colspan="6"><?php echo $soru['soru']; ?></td>
								</tr>
								<tr>
								<td>A) <?php echo $soru['secenek1']; ?></td>
								<td>B) <?php echo $soru['secenek2']; ?></td>
								<td>C) <?php echo $soru['secenek3']; ?></td>
								<td>D) <?php echo $soru['secenek4']; ?></td>
								<td>E) <?php echo $soru['secenek5']; ?></td>
								</tr>
								<tr>
								 <td colspan="6">Doğru Cevap: <?php echo $soru['dogrucevap']; ?></td>
								</tr>
							</tbody>
 <?php $sira++; ?>							  
							  <?php } ?>
						</table>
					
					</div>
				
				</div>
			</div>
			
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
  </div> <!--! end of #main -->
 <?php include 'inc/footer.php';?>