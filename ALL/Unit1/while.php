<!DOCTYPE html>
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
<?php
$i = 2;
 while($i < 10){
    echo"<span>$i</span>";
    $i = $i +2;
}
echo"<br>";
$i = 10;
 while($i > 0){
    echo"<span>$i</span>";
    $i = $i - 1;
}
echo"<br>";
$i = 2;
 while($i < 64){
    echo"<span>$i</span>";
    $i = pow($i, 2);
}
?>
</body>
</html>