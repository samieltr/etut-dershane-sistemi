<?php include 'inc/girisdogrula.php';?>
<?php
require_once 'inc/vt.php';
$ogrenci_id = $_SESSION['id'];

// Konu seçenekleri
$konuSecenekleri = array("Genel", "Destek", "Diğer"); // Örnek olarak

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['konu']) && isset($_POST['mesaj'])) {
        $konu = $_POST['konu'];
        $mesaj = $_POST['mesaj'];
        
        $stmt = $db->prepare("INSERT INTO ticket (ogrencid, konu, mesaj) VALUES (:ogrencid, :konu, :mesaj)");
        $stmt->bindParam(':ogrencid', $ogrenci_id);
        $stmt->bindParam(':konu', $konu);
        $stmt->bindParam(':mesaj', $mesaj);
        $stmt->execute();
    }
    
    if (isset($_POST['kapat'])) {
        $ticket_id = $_POST['kapat'];
        
        $stmt = $db->prepare("DELETE FROM ticket WHERE sira = :ticket_id AND ogrencid = :ogrencid");
        $stmt->bindParam(':ticket_id', $ticket_id);
        $stmt->bindParam(':ogrencid', $ogrenci_id);
        $stmt->execute();
    }
}

$stmt = $db->prepare("SELECT sira, konu, mesaj, cevap FROM ticket WHERE ogrencid = :ogrencid ORDER BY sira DESC");
$stmt->bindParam(':ogrencid', $ogrenci_id);
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'inc/head.php';?>
<body class="skin-dark">

    <div class="main-wrapper">

<?php include 'inc/sidebar.php';?>
     

        <!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3 class="title">Ana Sayfa <span>/ Destek Talebi</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Destek Talebi</h4>
                        </div>
                        <div class="box-body">
                                <!--Basic Tab Start-->
            <center>
 <h4>Destek Talebi Ekranına Hoşgeldiniz</h4>
 <p>Öneri,Şikayet,Destek almak istediğiniz her konuda aşağıdaki alandan bizlere ulaşabilirsiniz.</p>
</center>
<form class="form-control" method="POST">
 <div class="col-12 mb-15">
<select name="konu" class="form-control primary">
                                                <?php foreach ($konuSecenekleri as $konuSecenek): ?>
												<option value="<?php echo $konuSecenek; ?>" ><?php echo $konuSecenek; ?></option>
                                                <?php endforeach; ?>
                                            </select></div>
											
  <div class="col-12 mb-15"><textarea class="form-control primary" name="mesaj" placeholder="Buraya mesajınızı giriniz. "></textarea></div>
  <center>  <input class="button button-outline button-secondary" type="submit" value="Gönder"></center>
   <div style="text-align: right; padding-top: 10px;">
        <img src="assets/images/logo/maaskot.png" alt="Logo">
    </div>
</form>
             
                <!--Basic Tab End-->
						
                        </div>
						 <div class="box">
						<div class="box-head">
                            <h4 class="title">Destek Talebi Cevapları</h4>
                        </div>
						 <div class="box-body">
						 <div class="col-12 mb-15">
						        <?php foreach ($tickets as $ticket): ?>
   <div class="col-12 mb-15">
		<p class="form-control warning">
		Konu: <?php echo $ticket['konu']; ?></p>
        <p class="form-control primary">
		<?php echo $ticket['mesaj']; ?></p>
        <?php if (!empty($ticket['cevap'])): ?>
            <p class="form-control secondary">Cevap: <?php echo $ticket['cevap']; ?></p>
			 <form method="POST">
                <input type="hidden" name="kapat" value="<?php echo $ticket['sira']; ?>">
                <input class="button button-outline button-info" type="submit" value="Destek Talebini Sil">
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; ?> </div>
                    </div>
					</div>
</div>
					</div>
                <!--Fullcalendar End-->

               
            </div>

        </div><!-- Content Body End -->

     <?php include 'inc/footer.php';?>

    </div>

    <!-- JS
============================================ -->

     <?php include 'inc/jscript.php';?>


</body>

</html>