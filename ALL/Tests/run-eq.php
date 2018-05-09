<!DOCTYPE html>
<?php

$n[0]= (isset($_GET['value']))?$_GET['value']:10;
$m = [];
//$n[0]= (isset($_GET['value']))?$_GET['value']:10;
$a = $n[0];
$b = 0;
$x = $n[0];
$y = 0;
$count = $n[0];

    $n =[];
while($a>0){
 $n[$b]=$a;
 echo ($n[$b]."<br>");
 $a =$a - 1;
}


while($count > 0){
 $m[$y]=$x;
 echo ($m[$y]."<br>");
 $x =$x + 1;
 $count = $count - 1;
}


?>
<html>
<head>
<!--
  Assignment: 
  Name: 
-->
<title></title>
<style>
</style>
</head>
<body>
<table>


</table>
</body>
</html>