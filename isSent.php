<?php 
    require_once __DIR__ . '/configs/path.config.php'; 
    $title = "Get Link"; 
    require_once HEADER;
    $fileName = $_GET['fn'];
    // generate value $link that contains all necessary data for link
    $textBefore = 'Note is ready! Copy this link to use it:<br>';
    $link = $_SERVER['HTTP_HOST'].'?fn='.  $fileName;
    $textAfter = "";
    // $link will be used in script LinkToSend.php
    require_once VIEW.'LinkToSend.php';
?>
<?php require_once FOOTER?>

    