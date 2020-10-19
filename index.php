<?php
    require_once __DIR__.'/view/form.php';
    if(isset($_GET['fn'])){
        $fn = $_GET['fn'];
        echo "<script>window.location = '/getFromFile.php?fn=".$fn."'</script>";
    }
    if(isset($_POST['submit'])){
        require_once __DIR__ . '/saveToFile.php';
        echo "<script>window.location = '/isSent.php?fn=".$fileName."'</script>";
    }