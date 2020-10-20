<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/header.php'?>
<?php
    /*
        1. if get - check if there is some pass. if no - open file
        2. if post - check if pass is right. if yes - open file. if no - reload page with all data
                require_once $_SERVER['DOCUMENT_ROOT'] . '/view/formPass.php';
        3. if file name is not right - write message
        4. if $_GET['er'] is. write error

        funcitons:
            deleteFile()
            showData()
    */ 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
    if(isset($_GET['fn'])){
        $fileName = $_GET['fn'];
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/storage/'.$fileName.'.json';
        // check if file exist
        if(file_exists($filePath)){
            $data = json_decode(file_get_contents($filePath));
            require_once $_SERVER['DOCUMENT_ROOT']. '/decrypt.php';
            // check if pass in file != null (if it != null it was not created)
            if($data->pass != null){
                // if there is pass show form to get pass 
                require_once $_SERVER['DOCUMENT_ROOT'] . '/view/formPass.php';
            }else{
                // if there is no pass in json, we dont need pass. And we can show this file
                showData($data);
                // delete file if we need it
                deleteFileByCondition($data,$filePath);                
            }
        }else{
            // if file is not exist write error
            $textError = 'Sory but this link is not correct!';
            require_once $_SERVER['DOCUMENT_ROOT'] .'/view/error.php';
            exit;
        }
    }
    if(isset($_POST['fn'])){
        $pass = $_POST['pass'];
        $fileName = $_POST['fn'];
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/storage/'.$fileName.'.json';
        // check if file exist
        if(file_exists($filePath)){
            $data = json_decode(file_get_contents($filePath));
            require_once $_SERVER['DOCUMENT_ROOT'] . '/decrypt.php';
            // pass check
            if($data->pass == $pass){
                // show file
                showData($data);
                // delete file if we need it
                //echo $data->deleteOptions;
                deleteFileByCondition($data,$filePath);
            }
            else{
                echo "<script>window.location = '/getFromFile.php?fn=$fileName&er=$textError'</script>";
            }
        }else{
            // if file is not exist write error
            $textError = 'Sory but this link is not correct!';
            require_once $_SERVER['DOCUMENT_ROOT'] .'/view/error.php';
            exit;
        }
    }
    if(isset($_GET['er'])){
        $textError = 'Pass is not right!';
        require_once $_SERVER['DOCUMENT_ROOT'] .'/view/error.php';
    }
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/footer.php'?>
