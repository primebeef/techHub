<!DOCTYPE html>
<?php
//$img = array('bobby.png','buttermeup.jpg','cleanmedaddy.jpg','guhhh.jpg','hettyboi.jpg');
$img = scandir('Images');

$num = count($img);
$c = rand(2,$num - 1);
?>
<html>
<head>
<title></title>
</head>
<body>
<img src="Images/<?php echo $img[$c]?>">
<script></script>
</body>
</html>