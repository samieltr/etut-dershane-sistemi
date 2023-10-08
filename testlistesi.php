<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
<?php
session_start();
require_once 'inc/vt.php';

$ogrenci_id = $_SESSION['id'];

$izinliTestlerSql = "SELECT * FROM testler
                    INNER JOIN testizin ON testler.testid = testizin.testid
                    WHERE testizin.ogrencid = :ogrenciId AND (testizin.katilim = 0 OR testizin.katilim IS NULL)";
$izinliTestlerStmt = $db->prepare($izinliTestlerSql);
$izinliTestlerStmt->bindParam(':ogrenciId', $ogrenci_id, PDO::PARAM_INT);
$izinliTestlerStmt->execute();
$izinliTestler = $izinliTestlerStmt->fetchAll(PDO::FETCH_ASSOC);
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
                        <h3 class="title">Ana Sayfa <span>/ Test Listesi</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Çözebileceğiniz Test Listesi</h4>
                        </div>
                        <div class="box-body">
                                <!--Basic Tab Start-->
           
             <?php
if (empty($izinliTestler)) {
    echo "Çözmeniz için erişime açılmış testler bulunmamaktadır.";
} else {
    // İzin verilen testleri tablo olarak listele
    echo '<table class="table table-bordered data-table data-table-default">';
    echo '<tr><th>Test ID</th><th>Test Adı</th><th>Çöz</th></tr>';
    foreach ($izinliTestler as $test) {
        echo '<tr>';
        echo '<td>' . $test['testid'] . '</td>';
        echo '<td>' . $test['tesadi'] . '</td>';
        echo '<td><a href="test_coz.php?test_id=' . $test['testid'] . '">Çöz</a></td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
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
 <script>
        function katildim(etut_sira) {
            // AJAX ile katilim_guncelle.php dosyasını çağırarak veritabanında güncelleme yapalım
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "katilim_guncelle.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Güncelleme işlemi tamamlandıktan sonra sayfayı yenileyelim
                    location.reload();
                }
            };
            xhr.send("etut_sira=" + etut_sira);
        }
    </script>
<script>
$('.data-table-default').DataTable({
    responsive: true,
    language: {
        paginate: {
            previous: '',
            next: ''
        }
    }
});
</script>


</body>


</html>