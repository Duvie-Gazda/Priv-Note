<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/header.php'?>
<?php
    if(isset($_GET['fn'])){
        $fn = $_GET['fn'];
        echo "<script>window.location = '/getFromFile.php?fn=".$fn."'</script>";
    }
    else{
        require_once $_SERVER['DOCUMENT_ROOT'].'/view/form.php';
    }
    if(isset($_POST['submit'])){
        if(($_POST['noteText'] == "")&&($_POST['noteText'] == null)){
            $textError = "Sorry but you did not write anything!";
            require_once $_SERVER['DOCUMENT_ROOT'] . '/view/error.php';
            exit;
        }
        require_once $_SERVER['DOCUMENT_ROOT'] . '/saveToFile.php';
        echo "<script>window.location = '/isSent.php?fn=".$fileName."'</script>";
    }
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'?>