<?php
$simp = array(0004, 0013, 0022, 0031, 0040, 0103, 0112, 0121, 0130, 0202, 0211, 0220, 0301, 0310, 0400, 1003, 1012, 1021, 1030, 1102, 1111, 1120, 1201, 1210, 1300, 2002, 2011, 2020, 2101, 2110, 2200, 3001, 3010, 3100, 4000);
function process($array){
  for($i=0;$i<count($array) - 1;$i++){
    
     $max[]=($array[$i] - $array[$i + 1]);
  }
  arsort($max);
  foreach($max as $e){
      $x = $e;
      $y = $x + 1;
      $mod[] = ($x * $y)%($y + 1);
        echo "$e <br>";
  }
   return $mod;
}
$var = process($simp);
foreach($var as $e){
    echo "$e <br>";
}
?>