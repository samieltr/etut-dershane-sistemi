<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
<?php
require_once 'inc/vt.php';

if (isset($_GET['etut_id'])) {
    $etut_id = $_GET['etut_id'];

    // Öğrenci ve etüt bilgilerini al
    $stmt = $db->prepare("SELECT dersvideo FROM etut WHERE sira = :etut_id");
    $stmt->bindParam(':etut_id', $etut_id);
    $stmt->execute();
    $etut = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($etut && $etut['dersvideo']) {
        $dersVideoURL = $etut['dersvideo'];
    } else {
        $dersVideoURL = false;
    }
} else {
    // Eksik parametrelerle çağrıldıysa başka bir sayfaya yönlendir
    header('Location: etut.php');
    exit();
}
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
                        <h3 class="title">Ana Sayfa <span>/ Ders Video</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Etüt Ders Videosu</h4>
                        </div>
						 
                        <div class="box-body">
						    <?php if ($dersVideoURL) { ?>
                                <!--Basic Tab Start-->
           <iframe width="100%" height="800" src="https://www.youtube.com/embed/<?php echo $dersVideoURL; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
             
                <!--Basic Tab End-->
				  <?php } else { ?>
        <p>Seçilen etüte ait ders videosu bulunmuyor.</p>
    <?php } ?>
						
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