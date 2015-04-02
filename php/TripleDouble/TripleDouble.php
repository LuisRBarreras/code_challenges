<?php
//Using the PHP language, have the function tripleDouble(num1,num2) take both parameters being passed,
//and return 1 if there is a straight triple of a number at any place in num1 and also a straight double of the same number
//in num2. For example: if num1 equals 451999277 and num2 equals 41177722899,
//then return 1 because in the first parameter you have the straight triple 999 and you have a straight double,
//99, of the same number in the second parameter. If this isn't the case, return 0.

function tripleDouble($num1, $num2) {
    if(!is_int($num1) || !is_int($num2) ) {
        return null;
    }
    $tripleNumbers = findTriple($num1);
    $doubleNumbers = findDouble($num2);
    return checkNumbers($tripleNumbers, $doubleNumbers);
}
function findTriple($num) {
    $tripleNumbers = findNumber($num, 3, function($num, $index) {
        if($num[$index] === $num[$index+1] && $num[$index] === $num[$index+2]) {
            return true;
        }
        return false;
    });
    return $tripleNumbers;
}
function findDouble($num) {
    $doubleNumbers = findNumber($num,2, function ($num, $index) {
       if($num[$index] === $num[$index+1]) {
           return true;
       }
       return false;
    });
    return $doubleNumbers;
}
function findNumber($num, $numRepetition, $compareFunction) {
    $num = (string) $num;
    $length = strlen($num);
    $index = 0;
    $repetitionNumbers = array();
    while($index <= $length-$numRepetition) {
        if($compareFunction($num, $index) === true) {
            $repetitionNumbers[] = $num[$index];
        }
        $index++;
    }
    return $repetitionNumbers;
}
function checkNumbers($tripleNumbers, $doubleNumbers) {
    $length = count($doubleNumbers);
    $i = 0;
    while($i < $length) {
        if(array_search($doubleNumbers[$i], $tripleNumbers) !== false) {
            return 1;
        }
        $i++;
    }
    return 0;
}
//***************
//****Testing***
$result1  = tripleDouble("2323", 123123);
if($result1 === null) {
    echo "1st Test Success\n";
} else {
    echo "1st Test Failed\n";
}


$result2 = tripleDouble(55512345, 4115599);
if($result2 === 1) {
    echo "2th Test Success\n";
} else {
    echo "2th Test Failed\n";
}

$result3 = tripleDouble(888123456, 12341199);
if($result3 === 0) {
    echo "3th Test Success\n";
} else {
    echo "3th Test Failed\n";
}

$result4 = tripleDouble(812883456, 12341188);
if($result4 === 0) {
    echo "4th Test Success\n";
} else {
    echo "4th Test Failed\n";
}


$result5 = tripleDouble(888999277, 411777228899);
if($result5 === 1) {
    echo "5th Test Success\n";
} else {
    echo "5th Test Failed\n";
}
