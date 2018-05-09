<!DOCTYPE html>
<?php
@$number = $_GET['number'];
if($number>0){
  $stats = "positive"  ;
}
else if($number==='0'){
  $stats = "zero" ; 
}
else if($number<0){
  $stats = "negative" ; 
}
else{
    $stats = "not a number";
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
<?php
echo $stats
?>
</body>
</html>