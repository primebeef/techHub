<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
$a = 3;
$b = 1;
$x = 3;
$y = -4;
$EQ = 13;
echo("$EQ = $a($x)+$b($y) <br>");

function Objective($EQ,$x,$y,$a,$b){
    if(($a*$x+$b*$y)== $EQ){
        echo("($x,$y) is a solution.");
    }
    else{
        echo("($x,$y) is NOT solution.");    
    }
}
Objective($EQ,$x,$y,$a,$b);
?>
</body>
</html>