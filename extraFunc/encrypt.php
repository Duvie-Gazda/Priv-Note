<?php
    // cript only note and pass. Script need arr $dataToFile that contains all data that have to go to file
    if($dataToFile['noteText'] != null){
        $dataToFile['noteText'] = openssl_encrypt($dataToFile['noteText'], "aes-256-cbc",'123');
    }
    if($dataToFile['pass'] != null){
        $dataToFile['pass'] = openssl_encrypt($dataToFile['pass'], "aes-256-cbc",'123');
    }