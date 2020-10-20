<?php 
    // get folder (all filies and links names)
    $filesArr = scandir(__DIR__ . '/storage');
    // delete ./ and ../
    array_shift($filesArr);
    array_shift($filesArr);
    foreach($filesArr as $file){
        // add to fileName path to file 
        $filePath  = __DIR__ . '/storage/'.$file;
        // decode data
        $data = json_decode(file_get_contents($filePath));
        // require_once __DIR__. '/decrypt.php';
        if(isset($data->deleteTime)){
            // get date 
            $nowTime = getdate();
            $year = $data->deleteTime->year < date('Y');
            $month = $data->deleteTime->month < date('n');
            $day = $data->deleteTime->mday < $nowTime['mday'];
            $hour = $data->deleteTime->hours < $nowTime['hours'];
            $minute = $data->deleteTime->minutes < $nowTime['minutes'];
            
            // check if date to delete is bigger than date 
            if($year){
                unlink($filePath);
            }
            $year = $data->deleteTime->year == date('Y');
            if($month && $year){
                unlink($filePath);
            }
            // check if days in MONTH is not smaller than day to delete
            $month = ($data->deleteTime->month == date('n')) && $year;
            if($month&&$day){
                unlink($filePath);
            }
            // check if hours in DAY is not smaller than hour to delete
            $day = ($data->deleteTime->mday == $nowTime['mday'])&& $month;
            if(($hour)&&($day)){
                unlink($filePath);
            }
            // check if minutes in HOUR is not smaller than minute to delete
            $hour = ($data->deleteTime->hours == $nowTime['hours']) && $day;
            if($hour&&$minute){
                unlink($filePath);
            }
        }
        else{
            unlink($filePath);
        }
    }