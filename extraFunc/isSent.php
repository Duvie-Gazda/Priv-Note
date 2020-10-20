<?php  
    $fileName = $_GET['fn'];
    // generate value $link that contains all necessary data for link
    $link = 'Note is ready! Copy this link to use it:<br>'.$_SERVER['HTTP_HOST'].'?fn='.  $fileName;
    // $link will be used in script LinkToSend.php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/view/LinkToSend.php';
    