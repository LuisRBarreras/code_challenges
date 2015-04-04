<?php
$fileHandle = fopen("example.txt", "r");
while(!feof($fileHandle)) {
    $line = fgets($fileHandle);
    matrixRotation(trim($line));
}
fclose($fileHandle);

function matrixRotation($input) {
    $matrix = unserializeMatrix($input);
    $matrix = rotate($matrix);
    $output = serializeMatrix($matrix);
    echo $output."\n";
}

function unserializeMatrix($input) {
    $matrix = array();
    $data = explode(" ",$input);
    $n = findN(count($data));

    for($i=0; $i<$n; $i++) {
        $matrix[$i] = array();
        for($j=0; $j<$n; $j++) {
            $matrix[$i][$j] = array_shift($data);
        }
    }
    return $matrix;
}

function findN($length) {
    for($i=1; $i<=$length; $i++) {
        if(($length / $i) === $i) {
            break;
        }
    }
    return $i;
}

function rotate($matrix) {
    $n = count($matrix);
    $data = "";
    for($j=0; $j<$n; $j++) {
        for($i=$n-1; $i>=0; $i--) {
            $data .= $matrix[$i][$j] . " ";
        }
    }
    $matrixRotated = unserializeMatrix(trim($data));
    return $matrixRotated;
}

function serializeMatrix($matrix) {
    $n = count($matrix);
    $data = "";
    for($i=0; $i<$n; $i++) {
        for($j=0; $j<$n; $j++) {
            $data.= $matrix[$i][$j]." ";
        }
    }
    return trim($data);
}