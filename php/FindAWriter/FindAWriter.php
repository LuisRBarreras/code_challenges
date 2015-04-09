<?php
$fileHandle = fopen("example.txt", "r");
while(!feof($fileHandle)) {
    $line = trim(fgets($fileHandle));
    if($line !== "") {
        findAWriter($line);
    }
}
fclose($fileHandle);

function findAWriter($input) {
    $data = explode("|",$input);
    $writerNameEncripted = str_split($data[0]);
    $keys  = explode(" ",$data[1]);
    array_shift($keys);
    foreach($keys as $key) {
        echo $writerNameEncripted[$key-1];
    }
    echo "\n";
}