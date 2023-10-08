<?php include 'inc/girisdogrula.php';?>
<?php
require_once 'inc/vt.php';

$user_id = $_SESSION["user_id"];

// Bilgileri getir
$sql = "SELECT * FROM admin_tablosu WHERE id = :user_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Form gönderildiğinde güncelleme işlemleri
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_kullanici_adi = isset($_POST["new_kullanici_adi"]) ? $_POST["new_kullanici_adi"] : $user["kullanici_adi"];
    $new_password = isset($_POST["new_password"]) ? $_POST["new_password"] : null; // Şifre alanı boşsa null olarak bırakalım
    $new_first_name = $_POST["new_first_name"];
    $new_last_name = $_POST["new_last_name"];

    // Dosya yükleme işlemleri
    $upload_directory = "images/admin/"; // Yükleme dizini
    $uploaded_file = $_FILES["new_photo"]["tmp_name"]; // Geçici dosya adı
    $photo_name = $_FILES["new_photo"]["name"]; // Yüklenen dosyanın adı

    if (!empty($uploaded_file)) {
        $new_photo_path = $upload_directory . $photo_name;
        move_uploaded_file($uploaded_file, $new_photo_path);
    } else {
        $new_photo_path = $user["foto"];
    }

    // Güncelleme sorgusu
    $update_sql = "UPDATE admin_tablosu SET kullanici_adi = :kullanici_adi, sifre = :password, ad = :first_name, soyad = :last_name, foto = :photo WHERE id = :user_id";
    $update_stmt = $db->prepare($update_sql);
    $update_stmt->bindValue(":kullanici_adi", $new_kullanici_adi, PDO::PARAM_STR);
    
    if ($new_password !== null) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_stmt->bindValue(":password", $hashed_password, PDO::PARAM_STR);
    } else {
        $update_stmt->bindValue(":password", $user["sifre"], PDO::PARAM_STR);
    }
    
    $update_stmt->bindValue(":first_name", $new_first_name, PDO::PARAM_STR);
    $update_stmt->bindValue(":last_name", $new_last_name, PDO::PARAM_STR);
    $update_stmt->bindValue(":photo", $new_photo_path, PDO::PARAM_STR);
    $update_stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);

    if ($update_stmt->execute()) {
        $success_message = "Bilgiler başarıyla güncellendi.";
    } else {
        $error_message = "Bilgi güncelleme işleminde bir hata oluştu.";
    }
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
				<li class="no-hover">Profilim</li>
			</ul>
		</div> <!--! end of #title-bar -->
		
		<div class="shadow-bottom shadow-titlebar"></div>
		
		<!-- Begin of #main-content -->
		<div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Profil Güncelleme</h1>
				<p>Bilgilerinizi buradan güncelleyebilirsiniz.</p>
			</div>
			
			<div class="grid_6">
				<div class="block-border">
					<div class="block-header">
						<h1><?php echo $user_name; ?> Bilgilerini Düzenle</h1><span></span>
					</div>
			
					<form id="validate-form" class="block-content form" method="post" enctype="multipart/form-data">
						<div class="_100">
							<p><label for="textfield">Kullanıcı Adınız:</label><input id="textfield" name="new_kullanici_adi"  type="text" value="<?php echo $user["kullanici_adi"]; ?>" /></p>
						</div>
							<div class="_100">
							<p><label for="textfield">Şifreniz:</label><input id="textfield" name="new_password"  type="password" value="" /></p>
						</div>
						<div class="_100">
							<p><label for="textfield">Adınız:</label><input id="textfield" name="new_first_name"  type="text" value="<?php echo $user["ad"]; ?>" /></p>
						</div>
						
						<div class="_100">
							<p><label for="textfield">Soyadınız:</label><input id="textfield" name="new_last_name"  type="text" value="<?php echo $user["soyad"]; ?>" /></p>
						</div>
						<div class="_100">
							<p>
								<label for="file">Resim Güncelle</label>
								<img width="50" src="<?php echo $user["foto"]; ?>">
								<div class="uploader" id="uniform-undefined">
								<input type="file" name="new_photo" size="19" style="opacity: 0;"><span class="filename">Dosya Seçilmedi</span><span class="action">Dosya Seç</span>
								</div>
							</p>
						</div>
	
						<div class="clear"></div>
						<div class="block-actions">
								<?php if (isset($success_message)) { ?>
    <p style="color: white;"><?php echo $success_message; ?></p>
<?php } ?>

<?php if (isset($error_message)) { ?>
    <p style="color: yellow;"><?php echo $error_message; ?></p>
<?php } ?>
							<ul class="actions-left">
								<li><a class="button red" id="reset-validate-form" href="javascript:void(0);">Sıfırla</a></li>
							</ul>
							<ul class="actions-right">
								<li><input type="submit" class="button" value="Güncelle"></li>
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