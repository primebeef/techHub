<?php
$n = 13;
function equate($n,$previous){
    $max = (($n * ($n + 1)*$previous)%($n + 2));
    return $max;
}
$x = 1;
echo(pow(64,2));
$simp = array(0004, 0013, 0022, 0031, 0040, 0103, 0112, 0121, 0130, 0202, 0211, 0220, 0301, 0310, 0400, 1003, 1012, 1021, 1030, 1102, 1111, 1120, 1201, 1210, 1300, 2002, 2011, 2020, 2101, 2110, 2200, 3001, 3010, 3100, 4000);
foreach($simp as $e){
   while($x >= 64){
       $leg = ((pow($x,2)));
       //if(array_key_exists($leg) == true){
           
       //}
        $x++;
   }
   $x = 1;
}
echo(pow(2,2) / 13);
?>