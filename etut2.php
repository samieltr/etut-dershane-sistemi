<?php include 'inc/girisdogrula.php';?>
<?php include 'inc/head.php';?>
<?php
require_once 'inc/vt.php';

// Oturum değişkenini kontrol et, kullanıcı giriş yapmamışsa login.php'ye yönlendir
date_default_timezone_set('Europe/Istanbul'); // Sunucunun bulunduğu zaman dilimine göre ayarlayın

$ogrenci_id = $_SESSION['id'];

// Tarihi "Gün Ay Yıl" formatına dönüştürmek için bir fonksiyon
function tarihFormatla($tarih)
{
    return date('d.n.Y', strtotime($tarih));
}

// Öğrenciye ait etütleri ve ödevleri etut tablosundan çekelim ve tarih sırasına göre sıralayalım
$stmt = $db->prepare("SELECT sira, tarih, dersadi, dersler, dersvideo, katilim FROM etut WHERE ogrencid = :ogrencid AND katilim = 1 ORDER BY tarih ASC");
$stmt->bindParam(':ogrencid', $ogrenci_id);
$stmt->execute();
$etutlar = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                        <h3 class="title">Ana Sayfa <span>/ Ders Programı</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Tamamlanmış Etüt Ders Programı</h4>
                        </div>
                        <div class="box-body">
                                <!--Basic Tab Start-->
              <?php if (empty($etutlar)): ?>
        <p>Etüt programı bulunmamaktadır.</p>
    <?php else: ?>
	<table class="table table-bordered data-table data-table-default">
    <thead>
       <tr>
          <th>Tarih</th>
		   <th>Ders Adı</th>
          <th>Ödeviniz</th>
		  <th>Ders Video</th>
          <th>Durum</th>
		  <th>Geri Al</th>
       </tr>
    </thead>
	 <?php foreach ($etutlar as $etut): ?>


    <tbody>
    <tr>
         <td><?php echo tarihFormatla($etut['tarih']); ?></td>
                <td><?php echo $etut['dersadi']; ?></td>
                <td><?php echo $etut['dersler']; ?></td>
		<td>
                    <?php if ($etut['dersvideo']) { ?>
                        <a href="dersvideo.php?etut_id=<?php echo $etut['sira']; ?>" target="_blank">Tıklayın</a>
                    <?php } else { ?>
                        -
                    <?php } ?>
                </td>
				  <td><?php if ($etut['katilim'] == 1): ?>
                <p class="badge badge-outline badge-success">Tamamlandı</p>
            <?php else: ?>
                <button class="badge badge-outline badge-danger" onclick="katildim(<?php echo $etut['sira']; ?>)">Ödevi Tamamla</button>
            <?php endif; ?></td>
			<td>
                    <a class="badge badge-outline badge-info" href="inc/gerialetut.php?etut_id=<?php echo $etut['sira']; ?>">Geri Al</a>
                </td>

    </tr>
    </tbody>
<?php endforeach; ?>
</table>
<?php endif; ?>
             
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