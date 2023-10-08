-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 10 Eki 2023, 19:06:32
-- Sunucu sürümü: 10.3.36-MariaDB
-- PHP Sürümü: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sgbijcx_sgkoc`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_tablosu`
--

CREATE TABLE `admin_tablosu` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `ad` varchar(255) DEFAULT NULL,
  `soyad` varchar(255) DEFAULT NULL,
  `eposta` varchar(50) DEFAULT NULL,
  `lastlogin` varchar(1000) DEFAULT NULL,
  `ip_adresi` varchar(1000) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `admin_tablosu`
--

INSERT INTO `admin_tablosu` (`id`, `kullanici_adi`, `sifre`, `ad`, `soyad`, `eposta`, `lastlogin`, `ip_adresi`, `foto`) VALUES
(1, 'admin', '$2y$10$mDdA75fCRK0D03YgH.pzLedwuc6nUzggdaPseQ3lPF4e.jnnNOdJu', 'Admin', 'Demo', 'sameterten@gmail.com', '2023-10-10 16:00:30', '24.133.101.149', 'images/admin/images.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersler`
--

CREATE TABLE `dersler` (
  `id` int(11) NOT NULL,
  `dersad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `dersler`
--

INSERT INTO `dersler` (`id`, `dersad`) VALUES
(1, 'Matematik'),
(2, 'Türkçe'),
(3, 'Tarih'),
(4, 'Coğrafya'),
(5, 'Biyoloji'),
(6, 'Felsefe'),
(7, 'Kimya'),
(8, 'KPSS'),
(9, 'Fizik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etut`
--

CREATE TABLE `etut` (
  `sira` int(11) NOT NULL,
  `ogrencid` int(11) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `dersler` varchar(255) DEFAULT NULL,
  `katilim` int(11) DEFAULT NULL,
  `dersadi` varchar(255) DEFAULT NULL,
  `dersvideo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `etut`
--

INSERT INTO `etut` (`sira`, `ogrencid`, `tarih`, `dersler`, `katilim`, `dersadi`, `dersvideo`) VALUES
(5, 2, '2023-08-07', 'Temel İşlem Yeteneği', 1, 'Matematik', NULL),
(6, 2, '2023-08-07', 'Temel Kavramlar', 1, 'Matematik', NULL),
(7, 2, '2023-08-07', 'Tek Çift Sayılar', 1, 'Matematik', NULL),
(8, 2, '2023-08-07', 'Pozitif Negatif Sayılar', 1, 'Matematik', NULL),
(9, 2, '2023-08-07', 'Asal ve Özel Sayılar', 1, 'Matematik', NULL),
(15, 2, '2023-08-13', '13 Soru bankası Testi', NULL, 'Matematik', NULL),
(19, 1, '2023-10-10', 'Kişiye Özel Sayfa', 0, 'Yazılım', NULL),
(20, 2, '2023-08-13', 'Faktöriyel - 1', 1, 'Matematik', 'CctYd8FHIRw'),
(21, 2, '2023-08-13', 'Faktöriyel - 2', 1, 'Matematik', 'O2UPivygoHk'),
(22, 2, '2023-08-13', 'Ardışık Sayılar - 1', 0, 'Matematik', 'wm8a7hR8WsA'),
(23, 2, '2023-08-13', 'Ardışık Sayılar - 2', 0, 'Matematik', 'SZljl-kb17I'),
(24, 2, '2023-08-13', 'Faktöriyel  ve Ardışık Sayılar Testi', 0, 'Matematik', ''),
(25, 3, '2023-08-11', 'Temel İşlem Aritmetiği', 0, 'Matematik', '3VcpwAoVjZ8'),
(26, 3, '2023-08-11', 'Temel Kavramlar 1', 0, 'Matematik', '6sxM28d7oYY'),
(27, 3, '2023-08-11', 'Temel Kavramlar 2', 0, 'Matematik', 'ev4P1M74tVg'),
(28, 3, '2023-08-11', 'Temel Kavramlar 3', 0, 'Matematik', 'zWl1oZb7EFE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_tablosu`
--

CREATE TABLE `kullanici_tablosu` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `ad` varchar(255) DEFAULT NULL,
  `soyad` varchar(255) DEFAULT NULL,
  `eposta` varchar(50) DEFAULT NULL,
  `universite` varchar(255) DEFAULT NULL,
  `unibolum` varchar(255) DEFAULT NULL,
  `unitur` varchar(50) DEFAULT NULL,
  `unitkont` varchar(50) DEFAULT NULL,
  `unitaban` varchar(50) DEFAULT NULL,
  `unitavan` varchar(50) DEFAULT NULL,
  `unitanitimvideo` varchar(150) DEFAULT NULL,
  `fotoprofil` varchar(255) DEFAULT NULL,
  `lastlogin` varchar(1000) DEFAULT NULL,
  `ip` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `kullanici_tablosu`
--

INSERT INTO `kullanici_tablosu` (`id`, `kullanici_adi`, `sifre`, `ad`, `soyad`, `eposta`, `universite`, `unibolum`, `unitur`, `unitkont`, `unitaban`, `unitavan`, `unitanitimvideo`, `fotoprofil`, `lastlogin`, `ip`) VALUES
(1, 'demo', '$2y$10$6MOniQlo9S796Z0XQdQybuTkMj1QjfHh6K7wc2SQtq9X4wbqG4kDa', 'Samet', 'Erten', 'sameterten@gmail.com', 'Samet Üniversitesi', 'AI Çözümleme', 'SAY', '24', '357.321', '425.312', 'iKCMVRJGx38', '1690267.png', '2023-10-10 19:00:41', '24.133.101.149'),
(2, 'demo2', '$2y$10$Ph8w4O4vxW.94NNAvLdvVOXK0ZVfFKPYk6xSbVcix85MxxLCJESoi', 'Demo', 'Kullanıcı', 'bethny@gmail.com', 'Ankara Sosyal Bilimler Üniversitesi', 'Uluslararası İlişkiler', 'EA', '60', '373,624', '401,729', 'bwEpVXMGa1w', '1690267.png', '2023-08-13 15:38:40', '24.133.101.143'),
(3, 'demo3', '', 'Gözde', 'Erten', 'gozderten@gmail.com', 'SG Teknik Üniversitesi', 'Bilgi İşlem', 'EA-SAY', '2', '500', '500', 'BMy6IAg1B9g', '1690267.png', '2023-08-11 22:27:42', '24.133.101.143');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrencideneme`
--

CREATE TABLE `ogrencideneme` (
  `sira` int(11) NOT NULL,
  `ogrencid` int(11) DEFAULT NULL,
  `turkced` varchar(255) DEFAULT NULL,
  `turkcey` varchar(255) DEFAULT NULL,
  `matd` varchar(255) DEFAULT NULL,
  `maty` varchar(255) DEFAULT NULL,
  `sosd` varchar(255) DEFAULT NULL,
  `sosy` varchar(255) DEFAULT NULL,
  `fend` varchar(255) DEFAULT NULL,
  `feny` varchar(255) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `tyt_puan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrencitest`
--

CREATE TABLE `ogrencitest` (
  `ogrencid` int(11) DEFAULT NULL,
  `dersadi` varchar(255) DEFAULT NULL,
  `cozulensoru` int(11) DEFAULT NULL,
  `dogrusayisi` int(11) DEFAULT NULL,
  `yanlisayisi` int(11) DEFAULT NULL,
  `netsayisi` float DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `sira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `ogrencitest`
--

INSERT INTO `ogrencitest` (`ogrencid`, `dersadi`, `cozulensoru`, `dogrusayisi`, `yanlisayisi`, `netsayisi`, `tarih`, `sira`) VALUES
(1, 'Türkçe', 2, 1, 1, NULL, '2023-08-07', 8),
(1, 'Türkçe', 2, 1, 1, NULL, '2023-08-07', 9),
(1, 'Türkçe', 2, 1, 1, NULL, '2023-08-07', 10),
(1, 'Türkçe', 2, 1, 1, NULL, '2023-08-07', 11),
(1, 'Türkçe', 2, 1, 1, NULL, '2023-08-07', 12),
(NULL, 'Türkçe', 2, 1, 1, NULL, '2023-08-07', 13),
(NULL, 'Türkçe', 2, 1, 1, NULL, '2023-08-07', 14),
(1, 'Türkçe', 2, 1, 1, NULL, '2023-08-07', 15),
(1, 'Matematik', 1, 1, 1, NULL, '2023-08-07', 16),
(1, 'Coğrafya', 100, 90, 10, NULL, '2023-08-16', 17),
(1, 'Kimya', 20, 10, 3, NULL, '2023-08-07', 18);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `id` int(11) NOT NULL,
  `dersadi` varchar(255) NOT NULL,
  `soru` text NOT NULL,
  `secenek1` text NOT NULL,
  `secenek2` text NOT NULL,
  `secenek3` text NOT NULL,
  `secenek4` text NOT NULL,
  `secenek5` text NOT NULL,
  `dogrucevap` varchar(1) NOT NULL,
  `testid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`id`, `dersadi`, `soru`, `secenek1`, `secenek2`, `secenek3`, `secenek4`, `secenek5`, `dogrucevap`, `testid`) VALUES
(23, 'Tarih', 'Kudüs; Yahudiler, Müslümanlar ve Hristiyanlar tara­fından kutsal bir şehir olarak kabul edilmektedir.  Bu duruma,  1- Kudüs\'te değişik milletlerin bir arada yaşaması,  2- ilahi dinler tarafından kutsal sayılması,  3- değişik milletler tarafından ele geçirilmesi  özelliklerinden hangilerine ortam hazırladığı söylenebilir?', 'Yalnız 1', 'Yalnız 2', 'Yalnız 3', '1 ve 2', '1,2,3', 'E', 17),
(24, 'Tarih', 'Felsefelerini insanın kendi aklını kullanmaya başla­ması olarak tanımlayan aydınlanmacı düşünürler; akıllarıyla kavrayamadıkları, deney ve gözlem yoluyla ispat edemedikleri bilgileri reddetmişlerdir.  Buna göre,  1- insanın hayatını kolaylaştıran gelişmelerin ortaya çıkması,  2- skolastik düşüncenin etkisini yitirmesi,  3- bilim ve teknolojik gelişmelerin önünün açılması  gelişmelerinden hangilerinde aydınlanmacı düşünürlerin etkisinden söz edilebilir? ', 'Yalnız 1', 'Yalnız 3', '1 ve 2', '2 ve 3', '1,2 ve 3', 'E', 17),
(25, 'Tarih', 'I. Türk Dil Kurumu  II. Köy Enstitüleri  III. Halkevleri <br> Yukarıdaki kurumlardan hangileri eğitimi Anadolu’nun en ücra yerlerine kadar yayma amacıyla açılmıştır?', 'Yalnız 1', 'Yalnız 2', 'Yalnız 3', '1 ve 2', '2 ve 3', 'B', 17),
(26, 'Tarih', 'TBMM’de birden fazla partinin bulunması,  I. Ulusal egemenlik düşüncesinin yerleşmesi  II. Hükümet işlerinin denetlenmesi  III. Laiklik <br> ilkesinin yerleşmesi durumlarından hangilerini kolaylaştırmıştır?', 'Yalnız 1', 'Yalnız 2', 'Yalnız 3', '1 ve 2', '2 ve 3', 'D', 17),
(27, 'Tarih', 'Aşağıdakilerden hangisi Türkiye Cumhuriyeti’nin kurmuş olduğu bankalar arasında yer almaz?', 'Sümerbank', 'İş Bankası', 'Osmanlı Bankası', 'Deniz Bank', 'Etibank', 'C', 17);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testizin`
--

CREATE TABLE `testizin` (
  `id` int(11) NOT NULL,
  `testid` int(11) DEFAULT NULL,
  `ogrencid` int(11) DEFAULT NULL,
  `katilim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `testizin`
--

INSERT INTO `testizin` (`id`, `testid`, `ogrencid`, `katilim`) VALUES
(5, 17, 1, NULL),
(6, 17, 2, NULL),
(7, 17, 3, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testler`
--

CREATE TABLE `testler` (
  `id` int(11) NOT NULL,
  `tesadi` varchar(255) NOT NULL,
  `soruid` int(11) NOT NULL,
  `testid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `testler`
--

INSERT INTO `testler` (`id`, `tesadi`, `soruid`, `testid`) VALUES
(17, 'İlk Testim - Tarih (5 Soru)', 0, 17);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `test_sonuclari`
--

CREATE TABLE `test_sonuclari` (
  `id` int(11) NOT NULL,
  `ogrencid` int(11) NOT NULL,
  `ders` varchar(255) NOT NULL,
  `dsayisi` int(11) NOT NULL,
  `ysayisi` int(11) NOT NULL,
  `net` int(11) NOT NULL,
  `testid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `test_sonuclari`
--

INSERT INTO `test_sonuclari` (`id`, `ogrencid`, `ders`, `dsayisi`, `ysayisi`, `net`, `testid`) VALUES
(16, 3, 'Tarih', 5, 0, 5, 17);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket`
--

CREATE TABLE `ticket` (
  `sira` int(11) NOT NULL,
  `ogrencid` int(11) DEFAULT NULL,
  `mesaj` varchar(5000) DEFAULT NULL,
  `cevap` varchar(5000) DEFAULT NULL,
  `konu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `ticket`
--

INSERT INTO `ticket` (`sira`, `ogrencid`, `mesaj`, `cevap`, `konu`) VALUES
(7, 2, 'Deneme yardım istiyorum abi', 'kes kes kes !', 'Genel');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin_tablosu`
--
ALTER TABLE `admin_tablosu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `dersler`
--
ALTER TABLE `dersler`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `etut`
--
ALTER TABLE `etut`
  ADD PRIMARY KEY (`sira`) USING BTREE;

--
-- Tablo için indeksler `kullanici_tablosu`
--
ALTER TABLE `kullanici_tablosu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `ogrencideneme`
--
ALTER TABLE `ogrencideneme`
  ADD PRIMARY KEY (`sira`) USING BTREE;

--
-- Tablo için indeksler `ogrencitest`
--
ALTER TABLE `ogrencitest`
  ADD PRIMARY KEY (`sira`) USING BTREE;

--
-- Tablo için indeksler `sorular`
--
ALTER TABLE `sorular`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `testizin`
--
ALTER TABLE `testizin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `testler`
--
ALTER TABLE `testler`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `test_sonuclari`
--
ALTER TABLE `test_sonuclari`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Tablo için indeksler `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`sira`) USING BTREE;

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin_tablosu`
--
ALTER TABLE `admin_tablosu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `dersler`
--
ALTER TABLE `dersler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `etut`
--
ALTER TABLE `etut`
  MODIFY `sira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_tablosu`
--
ALTER TABLE `kullanici_tablosu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ogrencideneme`
--
ALTER TABLE `ogrencideneme`
  MODIFY `sira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `ogrencitest`
--
ALTER TABLE `ogrencitest`
  MODIFY `sira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `sorular`
--
ALTER TABLE `sorular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `testizin`
--
ALTER TABLE `testizin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `testler`
--
ALTER TABLE `testler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `test_sonuclari`
--
ALTER TABLE `test_sonuclari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `ticket`
--
ALTER TABLE `ticket`
  MODIFY `sira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
