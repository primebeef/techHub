<?php include "../Library/doctype.html";?><html>
<?php
$x = intval($_GET['x']);
$y = intval($_GET['y']);
?>
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
$sum = $x + $y;
$product = $x*$y;
$average = ($x + $y)/2;
echo " x = $x <br> y = $y <br> x + y = $sum <br> x * y = $product <br> Average: $average"

?>
</body>
</html>