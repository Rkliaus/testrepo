<?php
$array = [1, 22, 333, 4444, 22, 5555, 1];
function symbolControlling($array){
    $symbCheck = '/^[0-9]{1,3}$/';
    $newarr = array();    
    foreach ($array as $arr){    
        if (preg_match ($symbCheck, $arr)) {
            $newarr[] = $arr;    
        }
    }
    return implode(' ', $newarr);        
}

echo symbolControlling($array) . '<br>';





$date = "2025-12-31";
    $arr = date_parse($date);
print_r($arr) . '<br>';





function stringSorting($string) {
    $array = explode(" ", $string);
    sort($array, SORT_STRING);
    $tostringAgain = implode (" ", $array);
    return $tostringAgain;
}
$string = "Seven-six-two millimeter. Full metal jacket.";
$sorted = stringSorting($string);
print_r($sorted);
echo '<br>';

$inputArray = [1, 2, 3, 4, 5, 6, 7, 8 ,9];
function raiseitByone($inputArray){
$newarr = array(); 
foreach ($inputArray as $number){
    $newarr[] = $number+1;
    }
return implode(' ', $newarr);
}

$raised = raiseitByone($inputArray);
echo $raised . '<br>';
