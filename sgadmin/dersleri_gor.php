<?php include 'inc/girisdogrula.php';?>
<?php
// Veritabanı bağlantısı burada olmalıdır.

// Veritabanı bağlantısı burada olmalıdır.

require_once 'inc/vt.php';

$student_id = $_GET["student_id"];

// Öğrencinin adını ve soyadını al
$student_sql = "SELECT ad, soyad FROM kullanici_tablosu WHERE id = :student_id";
$student_stmt = $db->prepare($student_sql);
$student_stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
$student_stmt->execute();
$student = $student_stmt->fetch(PDO::FETCH_ASSOC);

// Öğrencinin aldığı dersleri al (tekrar etmeyen şekilde)
$etut_sql = "SELECT sira, dersler, dersadi, tarih, dersvideo, katilim
             FROM etut
             WHERE ogrencid = :student_id";
$etut_stmt = $db->prepare($etut_sql);
$etut_stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
$etut_stmt->execute();
$etutlar = $etut_stmt->fetchAll(PDO::FETCH_ASSOC);

// Ders silme işlemi için
if (isset($_GET["sira"])) {
    $sira_id = $_GET["sira"];
    
    // Dersi sil
    $delete_sql = "DELETE FROM etut WHERE sira = :sira_id";
    $delete_stmt = $db->prepare($delete_sql);
    $delete_stmt->bindParam(":sira_id", $sira_id, PDO::PARAM_INT);
    $delete_stmt->execute();
    
    header("Location: dersleri_gor.php?student_id=$student_id");
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
				<li class="no-hover">Etüt Listesi</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1><?php echo $student["ad"] . " " . $student["soyad"]; ?></h1>
				<p>Yukarıda ismi yazan öğrencinin aldığı etüt konularını ve tamamlanma durumu görüntüleyebilirsiniz.</p>
			</div>
			
			<div class="grid_12">
				<div class="block-border">
					<div class="block-header">
					
						<h1>Dersler</h1><span></span>
					</div>
					
					<div class="block-content">
						<table id="table-example" class="table" width="100%">
							<thead>
								<tr>
									<th>Ders Adı</th>
									<th>Konu</th>
									<th>Video</th>
									<th>Tarih</th>
									<th>Tamamlanma Durumu</th>
									<th>Dersi Sil</th>
								</tr>
							</thead>
							 <?php foreach ($etutlar as $etut) { ?>
							<tbody>
								<tr class="gradeX">
								 <td><?php echo $etut["dersler"]; ?></td>
            <td><?php echo $etut["dersadi"]; ?></td>
			 <td><a target="_blank" href="https://www.youtube.com/watch?v=<?php echo $etut["dersvideo"]; ?>">Tıklayın</a></td>
            <td><?php echo $etut["tarih"]; ?></td>

            <td>
                <?php if ($etut["katilim"] == 1) {
                    echo '<a class="button">Tamamlandı</a>';
                } else {
                    echo '<a class="button red">Tamamlanmadı</a>';
                } ?>
            </td>
			 <td>
                <a  class="button" href="dersleri_gor.php?student_id=<?php echo $student_id; ?>&sira=<?php echo $etut["sira"]; ?>">Sil</a>
            </td>
									
									
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