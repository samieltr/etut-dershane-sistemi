<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
<?php
session_start();
require_once 'inc/vt.php';

// Giriş yapan kullanıcının ID'sini alalım
$ogrenci_id = $_SESSION['id'];

// Test ID'sini alalım
$test_id = $_GET['test_id'];

// Testin sorularını çekmek için işlemleri yapalım
function getQuestionsFromDatabase($test_id, $db) {
    $sorularSql = "SELECT * FROM sorular WHERE testid = :testId";
    $sorularStmt = $db->prepare($sorularSql);
    $sorularStmt->bindParam(':testId', $test_id, PDO::PARAM_INT);
    $sorularStmt->execute();
    $sorular = $sorularStmt->fetchAll(PDO::FETCH_ASSOC);
    return $sorular;
}

$questions = getQuestionsFromDatabase($test_id, $db);
?>

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
                        <h3 class="title">Ana Sayfa <span>/ Test</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Testinizde Başarılar... (4 Yanlış 1 Doğru Götürecek Şekilde Ayarlanmıştır.)</h4>
                        </div>
                        <div class="box-body">
                                <!--Basic Tab Start-->
								
							
<form action="test_sonuc.php" method="post">
    <?php foreach ($questions as $index => $question) { ?>
        <h3><?php echo ($index + 1) . '. Soru'; ?></h3>
        <p><?php echo $question['soru']; ?></p>
        <?php
        $secenekler = array(
            'A' => $question['secenek1'],
            'B' => $question['secenek2'],
            'C' => $question['secenek3'],
            'D' => $question['secenek4'],
            'E' => $question['secenek5']
        );
        ?>
        <ul>
            <?php foreach ($secenekler as $secenekIndex => $secenek) { ?>
                <li>
                    <input type="radio" name="cevap[<?php echo $index; ?>]" value="<?php echo $secenekIndex; ?>">
                    <?php echo $secenekIndex . '. ' . $secenek; ?>
                </li>
            <?php } ?>
        </ul>
        <hr>
    <?php } ?>
    <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
    <button type="submit">Testi Bitir</button>
</form>

               
			   <!--Basic Tab End-->
						
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