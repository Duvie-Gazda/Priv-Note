<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/header.php'?>
<?php  
    $fileName = $_GET['fn'];
    // generate value $link that contains all necessary data for link
    $textBefore = 'Note is ready! Copy this link to use it:<br>';
    $link = $_SERVER['HTTP_HOST'].'?fn='.  $fileName;
    $textAfter = "";
    // $link will be used in script LinkToSend.php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/view/LinkToSend.php';
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'?>

    