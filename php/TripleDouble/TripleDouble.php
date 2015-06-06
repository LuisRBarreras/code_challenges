<?php
//Using the PHP language, have the function tripleDouble(num1,num2) take both parameters being passed,
//and return 1 if there is a straight triple of a number at any place in num1 and also a straight double of the same number
//in num2. For example: if num1 equals 451999277 and num2 equals 41177722899,
//then return 1 because in the first parameter you have the straight triple 999 and you have a straight double,
//99, of the same number in the second parameter. If this isn't the case, return 0.

function  tripleDouble($n1, $n2) {
	$triples = findRepetitions(strval($n1),3);
	$doubles = findRepetitions(strval($n2),2);
	$results = array_intersect($triples, $doubles);
	if(count($results)>0)  {
		return 1;
	}	
	return 0;
}
function findRepetitions($n, $size) {
	$length = strlen($n);
	$setNumbers = array();
	for($i=0; $i<=$length-$size; $i++) {
		$current = substr($n,$i, $size);
		if($current === str_repeat($n[$i], $size)) {
			array_push($setNumbers, $n[$i]);
		}

	}
	return $setNumbers;
}
