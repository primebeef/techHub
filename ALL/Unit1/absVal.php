<!DOCTYPE html>
<?php include '../Library/Tech30Lib.php'?>
<?php
$numeral = (getValue('value')?is_numeric($_GET['value'])?$_GET['value']:false:false);

$numeric = absVal($numeral);
if($numeric === false)die("No number entered");
echo ("Original Value: $numeral<br>\n");

echo ("Absolute Value: $numeric<br>\n");
?>
<html>
<head>
<!--
  Assignment: absVal
  Name: Makenna Turner
-->
<title></title>
<style>
</style>
</head>
<body>

</body>
</html>