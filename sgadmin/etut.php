<?php include 'inc/girisdogrula.php';?>
<?php
// Veritabanı bağlantısı burada olmalıdır.

require_once 'inc/vt.php';

// Tüm öğrencilerin verilerini al
$students_sql = "SELECT * FROM kullanici_tablosu";
$students_stmt = $db->query($students_sql);
$students = $students_stmt->fetchAll(PDO::FETCH_ASSOC);

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
				<li class="no-hover">Etüt Listesi</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Etüt Listesi</h1>
				<p>Öğrencilerin etüt bilgilerini görebilir veya ekleyebilirsiniz.</p>
			</div>
			
			<div class="grid_12">
				<div class="block-border">
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
									<th>Dersler</th>
									<th colspan="2">İşlemler</th>
								</tr>
							</thead>
							 <?php foreach ($students as $student) { ?>
							<tbody>
								<tr class="gradeX">
								<td><img src="../assets/images/avatar/<?php echo $student["fotoprofil"]; ?>" width="40" alt="Profil Resmi"></td>
									<td><?php echo $student['id']; ?></td>
									<td><?php echo $student["ad"]; ?></td>
									<td><?php echo $student["soyad"]; ?></td>
									<td><?php echo $student['kullanici_adi']; ?></td>
									 <td><a class="button" href="dersleri_gor.php?student_id=<?php echo $student["id"]; ?>">Dersleri Gör</a></td>
									<td>
									<a class="button red" href="ders_ekle.php?student_id=<?php echo $student["id"]; ?>">Ders Ekle</a>
									</td>
									<td><a  class="button"href="test_izin_ver.php?student_id=<?php echo $student['id']; ?>">Test Ver</a></td>
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