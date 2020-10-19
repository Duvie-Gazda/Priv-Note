<?php
    function showData($data){
        if($data->deleteOptions == 'afterOpen'){
            $extraData = '<br>Please copy your letter if you want to save it. Becouse after reloading it will be deleted';
        }else{
            $time = $data->deleteTime;
            $extraData = "<br>Your note will be deleted after <show>$time->year.$time->month.$time->mday $time->hours:$time->minutes</show>";
        }
        require_once $_SERVER['DOCUMENT_ROOT'].'/view/showData.php';
    }

    function deleteFileByCondition($data,$filePath){
        // if delete option is after open (function have to be used only after opening file)
        if($data->deleteOptions == 'afterOpen'){
            require_once $_SERVER['DOCUMENT_ROOT'].'/deleteFile.php';
        }
    }