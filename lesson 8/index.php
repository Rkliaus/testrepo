<?php
$array = [10, 22, 353, 99, 22, 14, 1];
echo array_sum ($array) . "<br>";
// ИЛИ 
function arraySummary($array) {
    $summary = 0;
    foreach ($array as $part)
    {
    $summary += $part;
}
return $summary;
    
}
echo arraySummary($array) . "<br>";




function arrayComparison(array $arrayTwo, string $string): string {
    $resultString = "";
    foreach ($arrayTwo as $result) {
        $resultString .= $result . ' ';
        if  ($result === $string) {
            break;
        }
    }
    return $resultString;
}
$arrayTwo = [4,12,"6",7,8,9,"lol", 5,10];
$finalresult = arrayComparison($arrayTwo, string: "6");
echo $finalresult . "<br>";  


function arraySorting(&$array){
for ($j = 0; $j < count($array) - 1; $j++){
    for ($i = 0; $i < count($array) - $j - 1; $i++){
        if ($array[$i] > $array[$i + 1]){
            $tmp_var = $array[$i + 1];
            $array[$i + 1] = $array[$i]; 
            $array[$i] = $tmp_var;
            }
        }
    }
}
$arrayThree = [1, 0, 6, 69996, 9, 4, 5, 2, 1400, 34, 532, 14, 3, 8, 7, 25, 15];
arraySorting($arrayThree);

echo '<pre>';
print_r ($arrayThree);
echo '</pre>';