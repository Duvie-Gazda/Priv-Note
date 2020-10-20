<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Priv Note</title>
</head>
<body>
    <?php
        if(isset($_GET['fn'])){
            $fn = $_GET['fn'];
            echo "<script>window.location = '/getFromFile.php?fn=".$fn."'</script>";
        }
        else{
            require_once $_SERVER['DOCUMENT_ROOT'].'/view/form.php';
        }
        if(isset($_POST['submit'])){
            require_once $_SERVER['DOCUMENT_ROOT'] . '/saveToFile.php';
            echo "<script>window.location = '/isSent.php?fn=".$fileName."'</script>";
        }
    ?>
</body>
</html>