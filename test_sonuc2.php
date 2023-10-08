<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
<?php
session_start();
require_once 'inc/vt.php';

$ogrenci_id = $_SESSION['id'];

$sonuclarSql = "SELECT * FROM test_sonuclari WHERE ogrencid = :ogrenci_id";
$sonuclarStmt = $db->prepare($sonuclarSql);
$sonuclarStmt->bindParam(':ogrenci_id', $ogrenci_id, PDO::PARAM_INT);
$sonuclarStmt->execute();
$sonuclar = $sonuclarStmt->fetchAll(PDO::FETCH_ASSOC);
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
                        <h3 class="title">Ana Sayfa <span>/ Test Sonuçlarınız</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Çözdüğünüz Testlerin Sonuçları</h4>
                        </div>
                        <div class="box-body">
                                <!--Basic Tab Start-->
		   <table class="table table-bordered data-table data-table-default">
    <thead>
       <tr>
           <th>Test Adı</th>
                <th>Doğru Sayısı</th>
                <th>Yanlış Sayısı</th>
                <th>Net</th>
       </tr>
    </thead>
	 
	<tbody>
	 <?php foreach ($sonuclar as $sonuc) { ?>
	<tr>
	<td><?php echo $sonuc['ders']; ?></td>
                    <td><?php echo $sonuc['dsayisi']; ?></td>
                    <td><?php echo $sonuc['ysayisi']; ?></td>
                    <td><?php echo $sonuc['net']; ?></td>
	</tr>
	<?php } ?>
	</tbody>
	    
	</table>
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