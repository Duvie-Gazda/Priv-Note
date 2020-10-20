<?php
    /*
        1. if get - check if there is some pass. if no - open file
        2. if post - check if pass is right. if yes - open file. if no - reload page with all data
                require_once $_SERVER['DOCUMENT_ROOT'] . '/view/formPass.php';
        3. if file name is not right - write message

        funcitons:
            deleteFile()
            showData()
    */ 

    function showData($data){
        if($data->deleteOptions == 'afterOpen'){
            $extraData = '<br>Please copy your letter if you want to save it. Becouse after reloading it will be deleted';
        }else{
            $time = $data->deleteTime;
            $extraData = '<br>Your note will be deleted at '. $time->hours . ':'. $time->minutes;
        }
        require_once $_SERVER['DOCUMENT_ROOT'].'/view/showData.php';
    }

    function deleteFileByCondition($data,$filePath){
        // if delete option is after open (function have to be used only after opening file)
        if($data->deleteOptions == 'afterOpen'){
            require_once $_SERVER['DOCUMENT_ROOT'].'/deleteFile.php';
        }
    }

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
                echo "<script>window.location = '/getFromFile.php?fn=".$fileName."'</script>";
            }
        }else{
            // if file is not exist write error
            $textError = 'Sory but this link is not correct!';
            require_once $_SERVER['DOCUMENT_ROOT'] .'/view/error.php';
            exit;
        }
    }