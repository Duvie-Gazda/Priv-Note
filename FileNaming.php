<?php
    $fileName = sprintf('%s',md5($encodedData));
    $filePath = __DIR__ .'/storage/' .$fileName.'.json';
