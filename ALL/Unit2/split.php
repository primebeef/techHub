<?php
$css = array('color' => 'blue', 'font-size' => '12pt', 'font-weight' => 'bold', 'position' => 'absolute');
// you write code to create two regular arrays
// one should contain all the keys and one should contain all the values
// 
// split into an array called $properties for the keys and
// $values for the values
?>
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
<pre>
<?php 
$properties = array();
$values = array();
foreach($css as $i=>$e){
  $properties[] = $i;
  $values[] = $e;
}
var_dump ($properties);
var_dump ($values);
?>
</pre>
</body>
</html>

