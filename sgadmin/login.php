<?php
session_start();
// Kullanıcı oturumunu kontrol et
if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"])) {
    // Kullanıcı zaten giriş yapmışsa, index sayfasına yönlendir
    header("Location: index.php");
    exit();
}
require_once 'inc/vt.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["pass"];
    
    $sql = "SELECT * FROM admin_tablosu WHERE kullanici_adi = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($stmt->rowCount() == 1) {
        $hashedPassword = $row["sifre"];
        
        if (password_verify($password, $hashedPassword)) {
            // Giriş başarılı, giriş işlemleri yapılabilir
            
            // Örneğin, son giriş bilgilerini güncelleme
            $ipAddress = $_SERVER['REMOTE_ADDR'];
            $currentTime = date('Y-m-d H:i:s');
            $updateQuery = "UPDATE admin_tablosu SET lastlogin = :currentTime, ip_adresi = :ipAddress WHERE kullanici_adi = :email";
            $updateStmt = $db->prepare($updateQuery);
            $updateStmt->bindParam(":currentTime", $currentTime);
            $updateStmt->bindParam(":ipAddress", $ipAddress);
            $updateStmt->bindParam(":email", $email);
            $updateStmt->execute();
            
            // Kullanıcı oturumunu başlat
            $_SESSION["user_id"] = $row["id"]; // Varsayılan olarak "id" sütunu kullanıldı
            $_SESSION["user_name"] = $row["ad"] . " " . $row["soyad"];
			$_SESSION['foto'] = $row['foto'];
            header("Location: index.php"); // Giriş başarılı, yönlendirme yapabilirsiniz
            exit();
        } else {
            $error_message = "Geçersiz kullanıcı adı veya şifre.";
        }
    } else {
        $error_message = "Geçersiz kullanıcı adı veya şifre.";
    }
}
?>
<?php include 'inc/head.php';?>

<body class="special-page">

  <!-- Begin of #container -->
  <div id="container">
  	
  	<!-- Begin of LoginBox-section -->
    <section id="login-box">
    	<img width="350" src="/assets/images/logo/logos2.png">
    	<div class="block-border">
    	    
    		<div class="block-header">
    			<h1>Yönetici Girişi</h1>
    		</div>
    		
    		<form id="login-form" class="block-content form" action="#" method="post">
    			<p class="inline-small-label">
					<label for="username">Kullanıcı Adı</label>
					<input type="text" name="email" value="" class="required">
				</p>
				<p class="inline-small-label">
					<label for="password">Şifre</label>
					<input type="password" name="pass" value="" class="required">
				</p>
    			<p>
					<label><input type="checkbox"  name="remember-me" /> Beni hatırla</label>
				</p>
				
				<div class="clear"></div>
				
				<!-- Begin of #block-actions -->
    			<div class="block-actions">
					<ul class="actions-right">
						<li><input type="submit" class="button" value="Login"></li>
					</ul>
				</div> <!--! end of #block-actions -->
    		</form>
    		
    		
    	</div>
    </section> <!--! end of #login-box -->
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
  <script defer src="js/mylibs/jquery.notifications.js"></script> <!-- Notifications  -->
  <script defer src="js/mylibs/jquery.uniform.min.js"></script> <!-- Uniform (Look & Feel from forms) -->
  <script defer src="js/mylibs/jquery.validate.min.js"></script> <!-- Validation from forms -->
  <script defer src="js/mylibs/jquery.tipsy.js"></script> <!-- Tooltips -->
  <script defer src="js/common.js"></script> <!-- Generic functions -->
  <script defer src="js/script.js"></script> <!-- Generic scripts -->
  
  <script type="text/javascript">
	$().ready(function() {
		
		/*
		 * Validate the form when it is submitted
		 */
		var validatelogin = $("#login-form").validate({
			invalidHandler: function(form, validator) {
      			var errors = validator.numberOfInvalids();
      			if (errors) {
        			var message = errors == 1
			          ? 'You missed 1 field. It has been highlighted.'
			          : 'You missed ' + errors + ' fields. They have been highlighted.';
        			$('#login-form').removeAlertBoxes();
        			$('#login-form').alertBox(message, {type: 'error'});
        			
      			} else {
       			 	$('#login-form').removeAlertBoxes();
      			}
    		}
		});
		
		jQuery("#reset-login").click(function() {
			validatelogin.resetForm();
		});
				
	});
  </script>
</body>
</html>
