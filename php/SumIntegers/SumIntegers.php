<?php
$fileHandle = fopen("example.txt", "r");
$numbers = array();
while(!feof($fileHandle)) {
    $line = fgets($fileHandle);
    $numbers[] = intval($line);
}
fclose($fileHandle);

function sumIntegers($numbers) {
    $result = 0;
    foreach($numbers as $num) {
        $result += $num;
    }
    return $result;
}

echo sumIntegers($numbers) . "\n";