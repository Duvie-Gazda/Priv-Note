<?php
    require_once __DIR__.'/view/form.php';
    if(isset($_GET['fn'])){
        $fn = $_GET['fn'];
        echo "<script>window.location = '/getFromFile.php?fn=".$fn."'</script>";
    }
    
    if(isset($_POST['submit'])){
        if(($_POST['noteText'] == "")||($_POST['noteText'] == null)){
            $textError = 'Sorry but note text can not be empty!';
            require_once __DIR__ . '/view/error.php';
            exit;
        }
        if(($_POST['emailLink'] != "")||($_POST['emailLink'] != null)){
            $email = $_POST['emailLink'];
            $subject = 'You have new message';
            $message = $link;
            require_once __DIR__ . '/sendEmail.php';
        }
        require_once __DIR__ . '/saveToFile.php';
        echo "<script>window.location = '/isSent.php?fn=".$fileName."'</script>";
    }