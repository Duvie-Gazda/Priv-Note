<?php
    // Script need fileName in value $fileName
    $fileName = sprintf('%s',md5($encodedData));
    $filePath = $_SERVER['DOCUMENT_ROOT'] .'/storage/' .$fileName.'.json';
