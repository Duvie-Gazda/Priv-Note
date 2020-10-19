<?php
    require_once __DIR__ . '/configs/path.config.php';  
    $title = 'Priv Note';
    require_once HEADER; 
    if(isset($_GET['fn'])){
        $fn = $_GET['fn'];
        echo "<script>window.location = '/getFromFile.php?fn=".$fn."'</script>";
    }
    else{
        require_once VIEW.'form.php';
    }
    if(isset($_POST['submit'])){
        if(($_POST['noteText'] == "")&&($_POST['noteText'] == null)){
            $textError = "Sorry but you did not write anything!";
            require_once ERROR;
            exit;
        }
        require_once ROOT . '/saveToFile.php';
        header("Location: /isSent.php?fn=$fileName");
    }
?>
<?php require_once FOOTER?>