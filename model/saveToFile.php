<?php 
    $noteText = $_POST['noteText'];
    $deleteOption = $_POST['date'];
    $pass = $_POST['pass'];
    $nowDate = getdate();
    // $plusMinute, $plusHour, $plusDay - values that will be added to current time to write it to file .json
    // as time to delete
    $plusMinute = 0;
    $plusHour = 0;
    $plusDay = 0;

    // add time depending on $deleteOption that is recieved from form;
    $plusMinute =  $deleteOption == 'afterOpen'? 3 : $plusMinute;
    $plusMinute =  $deleteOption == 'after2Minute'? 2 : $plusMinute;
    $plusMinute =  $deleteOption == 'standart'? 5 : $plusMinute;
    
    $plusHour = $deleteOption == 'after1Hour'? 1:$plusHour;
    $plusHour = $deleteOption == 'after24Hour'? 24:$plusHour;
    
    $plusDay = $deleteOption == 'oneDay'? 1 : $plusDay;
    
    // if delete date is going to be unreal convert it!
    if($plusMinute + $nowDate['minutes'] >= 60){
        $plusMinute = ($plusMinute + $nowDate['minutes'])- 60;
        $nowDate['minutes'] = 0;
        $plusHour = $plusHour + 1;
    }
    if($plusHour + $nowDate['hours'] >= 24){
        $plusHour = ($plusHour + $nowDate['hours'])-24;
        $nowDate['hours'] = 0;
        $plusDay = $plusDay + 1;
    }
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
    if($plusDay + $nowDate['mday'] > $daysInMonth){
        $plusDay = ($plusDay + $nowDate['mday'])-$daysInMonth;
        $nowDate['mday'] = 0;
    }
    $dataToFile = [
        'deleteOptions'=> $deleteOption,
        'deleteTime' => [
            'year' =>(date('Y')),
            'month' => (date('n')),
            'mday' => ($nowDate['mday'] + $plusDay),
            'hours' => ($nowDate['hours'] + $plusHour),
            'minutes' => ($nowDate['minutes'] + $plusMinute),
        ],
        'noteText' => $noteText,
        'pass'=>($pass == null ?null:$pass)
    ];
    require_once $_SERVER['DOCUMENT_ROOT'] . '/extraFunc/encrypt.php';
    $pass = $dataToFile['pass'];
    $encodedData = json_encode($dataToFile);
    require_once $_SERVER['DOCUMENT_ROOT']  .'/extraFunc/FileNaming.php';
    file_put_contents($filePath,$encodedData);