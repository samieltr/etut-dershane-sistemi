<?php

// Veritabanı ayarlarını yapılandırın.
$host = 'localhost';
$dbname = 'sgkoc';
$username = 'sgkoc';
$password = 'sifre';

// PDO bağlantı nesnesi oluşturun ve karakter setini belirtin.
$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $username, $password);

// Bağlantıyı test edin.
try {
    $db->query('SELECT 1');
} catch (PDOException $e) {
    echo 'Bağlantı hatası: ' . $e->getMessage();
    exit;
}

// Bağlantı başarılıysa, bir mesaj yazdırın.
?>