<!DOCTYPE html>
<?php
$x = isset($_GET['x'])?$_GET['x']:null;
if(($x > 0)&&($x <100)){
  if((101>$x)&&($x>89.5)){
      echo("You got an A!");
  } 
  if((89.4>$x)&&($x>79.5)){
      echo("You are average");
  }
  if((79.4>$x)&&($x>69.4)){
      echo("You will never go to MIT.");
  }
  if($x<69.4){
      echo("You're a failure");
  }
 
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

</body>
</html>