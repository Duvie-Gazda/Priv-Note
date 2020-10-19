<?php 
    // decrypt only note and pass. Script need data from file in array $data
    if($data->noteText != null){
        $data->noteText = openssl_decrypt($data->noteText,"aes-256-cbc",'123');
    }
    if($data->pass != null){
        $data->pass = openssl_decrypt($data->pass,"aes-256-cbc",'123');
    }