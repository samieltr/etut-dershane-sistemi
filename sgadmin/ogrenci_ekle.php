<?php include 'inc/girisdogrula.php';?>
<?php
// Veritabanı bağlantısı burada olmalıdır.
require_once 'inc/vt.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    // Şifreyi hashleyerek veritabanına kaydedelim
    $hashliSifre = password_hash($sifre, PASSWORD_DEFAULT);

    // Eğer fotoğraf yüklendi ise
    if (!empty($_FILES['fotoprofil']['name'])) {
        $hedefKlasor = '../assets/images/avatar/';
        $dosyaAdi = $_FILES['fotoprofil']['name'];
        $geciciDosya = $_FILES['fotoprofil']['tmp_name'];
        $yuklemeSonucu = move_uploaded_file($geciciDosya, $hedefKlasor . $dosyaAdi);
    }

    // Veritabanına öğrenci bilgilerini ekleyelim
    $stmt = $db->prepare("INSERT INTO kullanici_tablosu (ad, soyad, kullanici_adi, sifre, fotoprofil) VALUES (:ad, :soyad, :kullanici_adi, :sifre, :fotoprofil)");
    $stmt->bindParam(':ad', $ad);
    $stmt->bindParam(':soyad', $soyad);
    $stmt->bindParam(':kullanici_adi', $kullanici_adi);
    $stmt->bindParam(':sifre', $hashliSifre);
    $stmt->bindParam(':fotoprofil', $dosyaAdi);

    if ($stmt->execute()) {
        // Öğrenci başarıyla eklendiyse ana sayfaya yönlendirelim
        header("Location: ogrenciler.php");
        exit();
    } else {
        // Ekleme işlemi başarısız olduysa hata mesajı gösterelim
        $error_message = "Öğrenci ekleme işlemi sırasında bir hata oluştu.";
    }
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
				<li class="no-hover">Öğrenci Ekle</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Öğrenci Ekleme</h1>
				<p>Yeni öğrenci kaydı yapabilirsiniz.</p>
			</div>
			
				<div class="grid_6">
				<div class="block-border">
					<div class="block-header">
						<h1>Öğrenci Bilgileri</h1><span></span>
					</div>
					<form id="validate-form" class="block-content form" method="post" enctype="multipart/form-data">
						<div class="_100">
							<p><label for="textfield">Ad</label><input id="textfield" name="ad" class="required" type="text" value="" /></p>
						</div>
						<div class="_100">
							<p><label for="textfield">Soyad</label><input id="textfield" name="soyad" class="required" type="text" value="" /></p>
						</div>
						<div class="_100">
							<p><label for="textfield">Kullanıcı Adı</label><input id="textfield" name="kullanici_adi" class="required" type="text" value="" /></p>
						</div>
						<div class="_100">
							<p><label for="textfield">Şifre</label><input id="textfield" name="sifre"  class="required" type="password"  /></p>
						</div>

						<div class="_100">
							<p>
						
								<label for="file">Öğrenci Fotoğrafı</label>
								<input class="required" type="file" name="fotoprofil">
							</p>
						</div>
						
					
						
						<div class="clear"></div>
						<div class="block-actions">
							<ul class="actions-left">
								<li><a class="button red" id="reset-validate-form" href="javascript:void(0);">Reset</a></li>
							</ul>
							<ul class="actions-right">
								<li><input type="submit" class="button" value="Öğrenci Ekle"></li>
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
			$.jGrowl("Blogpost was not created.", { theme: 'error' });
		});
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