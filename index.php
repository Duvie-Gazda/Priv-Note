<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/view/form.php';
    if(isset($_GET['fn'])){
        $fn = $_GET['fn'];
        echo "<script>window.location = '/model/getFromFile.php?fn=".$fn."'</script>";
    }
    if(isset($_POST['submit'])){
        require_once $_SERVER['DOCUMENT_ROOT'] . '/model/saveToFile.php';
        echo "<script>window.location = '/extraFunc/isSent.php?fn=".$fileName."'</script>";
    }