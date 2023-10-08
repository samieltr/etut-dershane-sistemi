   <!-- Header Section Start -->
        <div class="header-section">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo (Header Left) Start -->
                    <div class="header-logo col-auto">
                        <a href="index.html">
                            <img src="assets/images/logo/logo.png" alt="">
                            <img src="assets/images/logo/logo-light.png" class="logo-light" alt="">
                        </a>
                    </div><!-- Header Logo (Header Left) End -->

                    <!-- Header Right Start -->
                    <div class="header-right flex-grow-1 col-auto">
                        <div class="row justify-content-between align-items-center">

                            <!-- Side Header Toggle & Search Start -->
                            <div class="col-auto">
                                <div class="row align-items-center">

                                    <!--Side Header Toggle-->
                                    <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>

                                    <!--Header Search-->
                                    <div class="col-auto">

                                        <div class="header-search">

                                            <button class="header-search-open d-block d-xl-none"><i class="zmdi zmdi-search"></i></button>

                                            <div class="header-search-form">
                                                <form action="#">
                                                    <input type="text" placeholder="Search Here">
                                                    <button><i class="zmdi zmdi-search"></i></button>
                                                </form>
                                                <button class="header-search-close d-block d-xl-none"><i class="zmdi zmdi-close"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div><!-- Side Header Toggle & Search End -->

                            <!-- Header Notifications Area Start -->
                            <div class="col-auto">

                                <ul class="header-notification-area">

                                    <!--Language-->
                                    <li class="adomx-dropdown position-relative col-auto">
                                        <a class="toggle" href="#"><img class="lang-flag" src="assets/images/flags/flag-1.jpg" alt=""><i class="zmdi zmdi-caret-down drop-arrow"></i></a>

                                        <!-- Dropdown -->
                                        <ul class="adomx-dropdown-menu dropdown-menu-language">
                                            <li><a href="#"><img src="assets/images/flags/flag-1.jpg" alt=""> Türkçe</a></li>
                                        </ul>

                                    </li>

                                    <!--User-->
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle" href="#">
                                            <span class="user">
                                        <span class="avatar">
                                            <img src="assets/images/avatar/<?php echo $_SESSION['fotoprofil']; ?>" alt="">
                                            <span class="status"></span>
                                            </span>
                                            <span class="name"><?php echo $_SESSION['ad'] . ' ' . $_SESSION['soyad']; ?></span>
                                            </span>
                                        </a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-user">
                                            <div class="head">
                                                <h5 class="name"><a href="#"><?php echo $_SESSION['ad'] . ' ' . $_SESSION['soyad']; ?></a></h5>
                                                <a class="mail" href="#"><?php echo $_SESSION['eposta']; ?></a>
												 <a  href="#">Öğrenci No : <?php echo $_SESSION['id']; ?></a>
                                            </div>
                                            <div class="body">
    
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-settings"></i>Ayarlar</a></li>
                                                    <li><a href="logout.php"><i class="zmdi zmdi-lock-open"></i>Çıkış Yap</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </li>

                                </ul>

                            </div><!-- Header Notifications Area End -->

                        </div>
                    </div><!-- Header Right End -->

                </div>
            </div>
        </div><!-- Header Section End -->
        <!-- Side Header Start -->
        <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

                <nav class="side-header-menu" id="side-header-menu">
                    <ul>
                        <li ><a href="index.php"><i class="ti-home"></i> <span>Ana Sayfa</span></a>
                        </li>
                        <li><a href="etut.php"><i class="ti-palette"></i> <span>Program & Etüt</span></a></li>
                        <li ><a href="etut2.php"><i class="ti-crown"></i> <span>Tamamlanan Ödevler</span></a>
                        </li>
						<li ><a  href="testlistesi.php" ><i class="ti-pencil"></i> <span>Online Test Çöz</span><span class="badge badge-outline badge-success">Yeni</span></a>
						<li ><a  href="test_sonuc2.php" ><i class="ti-pencil"></i> <span>Online Test Sonuçları</span><span class="badge badge-outline badge-success">Yeni</span></a>
                            
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-stamp"></i> <span>Motivasyon</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="calisma2.php"><span>Ders Çalışma Müzikleri</span></a></li>
                                <li><a href="calisma.php"><span>Ders Çalışma Müzikleri(Canlı)</span></a></li>
                                <li><a href="kronometre.php"><span>Kronometre</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-notepad"></i> <span>Sınav</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="denemesinav.php"><span>TYT Deneme Sınavı Sonuçları</span></a></li>
                                <li><a href="csorular.php"><span>Çözülen Sorular</span></a></li>
                            </ul>
                        </li>
                       
                        <li class="has-sub-menu"><a href="#"><i class="ti-pie-chart"></i> <span>AYT Edebiyat</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="dersnot.php"><span>Ders Notları</span></a></li>
                            </ul>
                        </li>


                        <li ><a  href="https://meet.google.com" target="_blank"><i class="ti-layers"></i> <span>Google Meet (Canlı Ders)</span></a>
                            
                        </li>
                          <li ><a  href="ticket.php" ><i class="ti-ticket"></i> <span>Destek Talebi</span></a>
                            
                        </li>

                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div><!-- Side Header End -->