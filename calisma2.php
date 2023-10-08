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
                        <h3 class="title">Ana Sayfa <span>/ Müzikler </span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <div class="row">
                <!--Fullcalendar Start-->
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h4 class="title">Ders Çalışma Müzikleri</h4>
                        </div>
                        <div class="box-body">
				 <button class="button button-outline button-info" onclick="showSametTable()">1.Çalma Listesi</button>
				<button class="button button-outline button-secondary" onclick="showGozdeTable()">2.Çalma Listesi</button>
				  <div id="sametTable" style="display:none;">
  <iframe width="100%" height="600" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/448538475&color=%23312f2f&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/relaxing-music-production" title="RELAXING MUSIC 😊 (Piano - Sleep - Study - Yoga)" target="_blank" style="color: #cccccc; text-decoration: none;">RELAXING MUSIC 😊 (Piano - Sleep - Study - Yoga)</a> · <a href="https://soundcloud.com/relaxing-music-production/sets/keep-calm-and-study-relaxing-1" title="Keep Calm and Study - Relaxing Music for Reading, Concentration, Focus, Brain Power, Work, Exams" target="_blank" style="color: #cccccc; text-decoration: none;">Keep Calm and Study - Relaxing Music for Reading, Concentration, Focus, Brain Power, Work, Exams</a></div>
    </div>

    <div id="gozdeTable" style="display:none;">
    <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/595582668&color=%23312f2f&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/dabootlegboy" title="the bootleg boy" target="_blank" style="color: #cccccc; text-decoration: none;">the bootleg boy</a> · <a href="https://soundcloud.com/dabootlegboy/sets/study-chill-lofi-hiphop" title="Study &amp; Chill | Lofi Hiphop" target="_blank" style="color: #cccccc; text-decoration: none;">Study &amp; Chill | Lofi Hiphop</a></div>
	</div>
                                <!--Basic Tab Start-->
              
				
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
        function showSametTable() {
            var sametTable = document.getElementById("sametTable");
            var gozdeTable = document.getElementById("gozdeTable");
            sametTable.style.display = "block";
            gozdeTable.style.display = "none";
        }

        function showGozdeTable() {
            var sametTable = document.getElementById("sametTable");
            var gozdeTable = document.getElementById("gozdeTable");
            sametTable.style.display = "none";
            gozdeTable.style.display = "block";
        }
    </script>


</body>

</html>