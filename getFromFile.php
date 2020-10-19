<?php 
    //including
    require_once __DIR__ . '/configs/path.config.php';
    $title = 'Get Note';
    require_once HEADER;
    require_once FUNCTIONS;

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
    if(isset($_GET['fn'])){
        $fileName = $_GET['fn'];
        $filePath = STORAGE.$fileName.'.json';
        // check if file exist
        if(file_exists($filePath)){
            $data = json_decode(file_get_contents($filePath));
            require_once DECRYPT;
            // check if pass in file != null (if it != null it was not created)
            if($data->pass != null){
                // if there is pass show form to get pass 
                require_once VIEW.'formPass.php';
            }else{
                // if there is no pass in json, we dont need pass. And we can show this file
                showData($data);
                // delete file if we need it
                deleteFileByCondition($data,$filePath);                
            }
        }else{
            // if file is not exist write error
            $textError = 'Sory but this link is not correct!';
            require_once ERROR;
            exit;
        }
    }
    if(isset($_POST['fn'])){
        $pass = $_POST['pass'];
        $fileName = $_POST['fn'];
        $filePath = STORAGE.$fileName.'.json';
        // check if file exist
        if(file_exists($filePath)){
            $data = json_decode(file_get_contents($filePath));
            require_once DECRYPT;
            // pass check
            if($data->pass == $pass){
                // show file
                showData($data);
                // delete file if we need it
                //echo $data->deleteOptions;
                deleteFileByCondition($data,$filePath);
            }
            else{
                header("Location: /getFromFile.php?fn=$fileName&er=$textError");
            }
        }else{
            // if file is not exist write error
            $textError = 'Sory but this link is not correct!';
            require_once ERROR;
            exit;
        }
    }
    if(isset($_GET['er'])){
        $textError = 'Pass is not right!';
        require_once ERROR;
    }

require_once FOOTER?>
