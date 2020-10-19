<?php
    // add all necessary data to encript
    require_once CONFIG_CRIPT;
    // cript only note and pass. Script need arr $dataToFile that contains all data that have to go to file
    if($dataToFile['noteText'] != null){
        $dataToFile['noteText'] = openssl_encrypt($dataToFile['noteText'], TYPE,KEY);
    }
    if($dataToFile['pass'] != null){
        $dataToFile['pass'] = openssl_encrypt($dataToFile['pass'], TYPE,KEY);
    }