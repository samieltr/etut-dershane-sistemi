	<!-- Begin of Sidebar -->
    <aside id="sidebar">
    	
    	<!-- Search -->
    	<div id="search-bar">
			<form id="search-form" name="search-form" action="search.php" method="post">
				<input type="text" id="query" name="query" value="" autocomplete="off" placeholder="Search">
			</form>
		</div> <!--! end of #search-bar -->
		
		<!-- Begin of #login-details -->
		<section id="login-details">
    		<img width="60" class="img-left framed" src="<?php echo $_SESSION['foto']; ?>" alt="Merhaba Admin">
    		<h3>Giriş yapan</h3>
    		<h2><a class="user-button" href="javascript:void(0);"><?php echo $user_name; ?><span class="arrow-link-down"></span></a></h2>
    		<ul class="dropdown-username-menu">
    			<li><a href="profile.php">Profili Düzenle</a></li>
    			<li><a href="logout.php">Çıkış</a></li>
    		</ul>
    		
    		<div class="clearfix"></div>
  		</section> <!--! end of #login-details -->
    	
    	<!-- Begin of Navigation -->
    	<nav id="nav">
	    	<ul class="menu collapsible shadow-bottom">
	    		<li><a href="index.php" class="current"><img src="img/icons/packs/fugue/16x16/dashboard.png">Ana Sayfa<span class="badge">2</span></a></li>
	    		<li><a href="ogrenciler.php"><img src="img/icons/packs/fugue/16x16/application-form.png">Öğrenciler</a></li>
	    		<li><a href="tytgiris.php"><img src="img/icons/packs/fugue/16x16/table.png">Öğrenci TYT Sonuç Giriş</a></li>
	    		<li><a href="etut.php"><img src="img/icons/packs/fugue/16x16/chart.png">Etüt Listesi</a></li>
	    			<li>
	    			<a href="javascript:void(0);"><img src="img/icons/packs/fugue/16x16/clipboard-list.png">Test<span class="badge grey">3</span></a>
	    			<ul class="sub">
	    				<li><a href="soruekle.php">Test Ekle</a></li>
	    				<li><a href="testler.php">Testleri Görüntüle</a></li>
	    			</ul>
	    		</li>
	    
	    	</ul>
    	</nav> <!--! end of #nav -->
    	
    </aside> <!--! end of #sidebar -->
    