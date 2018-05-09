<!DOCTYPE html>
<?php
$money = isset($_GET['sentence'])?$_GET['sentence']:null;
$long=  strlen($money);
$last = substr($money,-1,1);
$first = substr($money,0,1);
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
$novowel = str_replace($vowels, "_", $money);
 echo("You entered $money! <br> It is $long characters long. <br> Your first letter is: $first<br> Your last letter is: $last <br> Without Vowels: $novowel");
 
?>
<html>
<head>
<title></title>
<style>
</style>
</head>
<body>
<?php


?>
</body>
</html>