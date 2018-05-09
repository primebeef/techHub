<?php include '../Library/Tech30Lib.php';?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
    <pre>
<?php
$x = array();
$x[0]= "Hello";
$x[1]= "World";
echo $x[0]." ".$x[1]."<br>";
var_dump($x);

$y = array();
for($i=0; $i<10;$i++){
    $x[$i] = $i;
    $y[$i] = 3*($i + 4);
}
for($i=0;$i<10;$i++){
    echo "(".$x[$i].",".$y[$i].")<br>\n";
}
var_dump($x);
var_dump($y);
?>
</pre>
</body>
</html>