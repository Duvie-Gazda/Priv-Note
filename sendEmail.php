<?php
    /*
        Script need values:
            $email;
            $subject;
            $message;
            $headers
    */

    if(($headers == "")||($headers == null)){
        // 'Reply-To: gazda.haimdavid@gmail.com' . "\r\n" .
        // 'X-Mailer: PHP/' . phpversion();
    }
    $headers = 'From:fdaadf@daf.com';
    $email = 'adf@gmadfadail.com';
    $subject = 'test';
    $message = 'teeest';
    $message = wordwrap($message, 70, "\r\n");
    if(mail('caffeinated@example.com', 'My Subject', $message)){
        $textError = 'Your message IS recieved!';
        require_once __DIR__ . '/view/error.php';
    }else{
        $textError = 'Your message not recieved!';
        require_once __DIR__ . '/view/error.php';
    }
    // print phpinfo();  
    exit;