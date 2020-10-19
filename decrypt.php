<?php 
    // add all necessary data to decript
    require_once CONFIG_CRIPT;
    // decrypt only note and pass. Script need data from file in array $data
    if($data->noteText != null){
        $data->noteText = openssl_decrypt($data->noteText, TYPE,KEY);
    }
    if($data->pass != null){
        $data->pass = openssl_decrypt($data->pass, TYPE,KEY);
    }