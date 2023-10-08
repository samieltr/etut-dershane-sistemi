<?php include 'inc/girisdogrula.php';?>
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
                        <h3 class="title">Ana Sayfa <span>/ AYT Edebiyat </span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Ders Notları</h4>
                        </div>
                        <div class="box-body">
				<table class="table">
             <thead class="thead-light">
			<tr>
                <th>Ders Adı</th>
                <th>İndir</th>
            </tr>
			</thead>
            			
                 <tbody>
				<tr>
				<td>Edebiyat</td>
				<td><a href="notlar/not1.pdf" target="_blank" class="button button-outline button-info">Tıklayın</td>
                   
                </tr>
				<tr>
				<td>Edebiyat</td>
				<td><a href="notlar/not2.pdf" target="_blank" class="button button-outline button-info">Tıklayın</td>
                   
                </tr>
				<tr>
				<td>Edebiyat (Yazar Eser)</td>
				<td><a href="notlar/not3.pdf" target="_blank" class="button button-outline button-info">Tıklayın</td>
                   
                </tr>
				 </tbody>
            			
        
                    </table>
						
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