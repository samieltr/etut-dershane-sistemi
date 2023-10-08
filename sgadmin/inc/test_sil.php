<?php
require_once 'vt.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $testId = $_POST['test_id'];

    // Testi ve ilişkili soruları sil
    $silSorularSorgu = $db->prepare("DELETE FROM sorular WHERE testid = :testId");
    $silSorularSorgu->bindParam(':testId', $testId, PDO::PARAM_INT);
    $silSorularSorgu->execute();

    $silTestSorgu = $db->prepare("DELETE FROM testler WHERE id = :testId");
    $silTestSorgu->bindParam(':testId', $testId, PDO::PARAM_INT);
    $silTestSorgu->execute();

    // İşlem tamamlandıktan sonra testler.php sayfasına yönlendir
    header('Location: ../testler.php');
    exit();
} else {
    header('Location: ../testler.php');
    exit();
}
?>