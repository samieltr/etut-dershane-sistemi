<?php include 'inc/girisdogrula.php';?>
<?php

require_once 'inc/vt.php';

$student_id = $_GET["student_id"];

// Öğrencinin adını ve soyadını al
$student_sql = "SELECT ad, soyad FROM kullanici_tablosu WHERE id = :student_id";
$student_stmt = $db->prepare($student_sql);
$student_stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
$student_stmt->execute();
$student = $student_stmt->fetch(PDO::FETCH_ASSOC);

// Ders eklemek için form gönderildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarih = $_POST["tarih"];
    $ders_adi = $_POST["ders_adi"];
    $dersler = $_POST["dersler"];
	$dersvideo = $_POST["dersvideo"];
    
    // Etütü öğrenciye ekle
    $ekle_sql = "INSERT INTO etut (ogrencid, tarih, dersadi, dersler, dersvideo, katilim)
                 VALUES (:student_id, :tarih, :ders_adi, :dersler, :dersvideo, 0)";
    $ekle_stmt = $db->prepare($ekle_sql);
    $ekle_stmt->bindParam(":student_id", $student_id, PDO::PARAM_INT);
    $ekle_stmt->bindParam(":tarih", $tarih, PDO::PARAM_STR);
    $ekle_stmt->bindParam(":ders_adi", $ders_adi, PDO::PARAM_STR);
    $ekle_stmt->bindParam(":dersler", $dersler, PDO::PARAM_STR);
	$ekle_stmt->bindParam(":dersvideo", $dersvideo, PDO::PARAM_STR);
    $ekle_stmt->execute();
    
    header("Location: dersleri_gor.php?student_id=$student_id");
    exit();
}
?>
<?php include 'inc/head.php';?>
<body id="top">

  <!-- Begin of #container -->
  <div id="container">
  	<!-- Begin of #header -->
   <?php include 'inc/header.php';?>
    <div class="fix-shadow-bottom-height"></div>
	
	<?php include 'inc/side.php';?>
	
    <!-- Begin of #main -->
    <div id="main" role="main">
    	
    	<!-- Begin of titlebar/breadcrumbs -->
		<div id="title-bar">
			<ul id="breadcrumbs">
				<li><a href="index.php" title="Home"><span id="bc-home"></span></a></li>
				<li class="no-hover">Ders Ekle</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1><?php echo $student["ad"] . " " . $student["soyad"]; ?></h1>
				<p>Yukarıda ismi geçen öğrenciye etüt ders eklemesi yapın.</p>
			</div>
			
			<div class="grid_6">
				<div class="block-border">
					<div class="block-header">
						<h1><?php echo $student["ad"] . " " . $student["soyad"]; ?> Ders Ekle</h1><span></span>
					</div>
			
					<form id="validate-form" class="block-content form" method="post" >
						<div class="_100">
							<p><label for="textfield">Tarih:</label><input type="date" name="tarih" id="tarih"  /></p>
						</div>
						<div class="_100">
							<p><label for="textfield">Ders Adı:</label><input name="ders_adi" id="ders_adi"  type="text" value="Matematik" /></p>
						</div>
						
						<div class="_100">
							<p><label for="textfield">Ders Konusu:</label><input name="dersler" id="dersler"  type="text" value="Temel İşlemler" /></p>
							</div>
							<div class="_100">
						Youtube linkini v= den sonraki kısmı ekleyin <br> Örn Kırmızı Alan Eklenecek Alan: https://www.youtube.com/watch?v=<font color="red">lIwli_IGghY</font>
							<p><label for="textfield">Ders Video Link:</label><input name="dersvideo" id="dersvideo"  type="text" value="3VcpwAoVjZ8" /></p>
							</div>
						<div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-left">
								<li><a class="button red" id="reset-validate-form" href="javascript:void(0);">Sıfırla</a></li>
							</ul>
							<ul class="actions-right">
								<li><input type="submit" class="button" value="Ders Ekle"></li>
							</ul>
						</div>
					</form>
				</div>
			</div>
			
			
		
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
  </div> <!--! end of #main -->

    
    <footer id="footer"><div class="container_12">
		<div class="grid_12">
    		<div class="footer-icon align-center"><a class="top" href="#top"></a></div>
		</div>
    </div></footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
  <script defer src="js/mylibs/jquery-ui-1.8.15.custom.min.js"></script> <!-- jQuery UI -->
  <script defer src="js/mylibs/jquery.uniform.min.js"></script> <!-- Uniform (Look & Feel from forms) -->
  <script defer src="js/mylibs/jquery.validate.min.js"></script> <!-- Validation from forms -->
  <script defer src="js/mylibs/jquery.dataTables.min.js"></script> <!-- Tables -->
  <script defer src="js/mylibs/jquery.tipsy.js"></script> <!-- Tooltips -->
  <script defer src="js/mylibs/excanvas.js"></script> <!-- Charts -->
  <script defer src="js/mylibs/jquery.visualize.js"></script> <!-- Charts -->
  <script defer src="js/mylibs/jquery.slidernav.min.js"></script> <!-- Contact List -->
  <script defer src="js/common.js"></script> <!-- Generic functions -->
  <script defer src="js/script.js"></script> <!-- Generic scripts -->
  
  <script type="text/javascript">
	$().ready(function() {
		
		/*
		 * Form Validation
		 */
		$.validator.setDefaults({
			submitHandler: function(e) {
				$.jGrowl("Form was successfully submitted.", { theme: 'success' });
				$(e).parent().parent().fadeOut();
				v.resetForm();
				v2.resetForm();
				v3.resetForm();
			}
		});
		var v = $("#create-user-form").validate();
		jQuery("#reset").click(function() { v.resetForm(); $.jGrowl("User was not created!", { theme: 'error' }); });
		
		var v2 = $("#write-message-form").validate();
		jQuery("#reset2").click(function() { v2.resetForm(); $.jGrowl("Message was not sent.", { theme: 'error' }); });
		
		var v3 = $("#create-folder-form").validate();
		jQuery("#reset3").click(function() { v3.resetForm(); $.jGrowl("Folder was not created!", { theme: 'error' }); });
		
		var validateform = $("#validate-form").validate();
		$("#reset-validate-form").click(function() {
			validateform.resetForm();
			$.jGrowl("You resetted the form.", { theme: 'error' });
		});
		
		/*
		 * Datepicker
		 */
		$( "#datepicker" ).datepicker();		
	});
  </script>
  <!-- end scripts-->

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>