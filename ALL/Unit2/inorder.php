<!DOCTYPE html>
<?php include '../Library/Tech30Lib.php'; ?>
<html>
<head>
<title>Makky</title>
<style>
</style>
</head>
<body>
<?php
$x = getValue("x");
$y = getValue("y");
$z = getValue("z");
$yupyupyup = inOrder($x,$y,$z);
echo $yupyupyup;
?>
</body>
</html>