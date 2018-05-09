<?php
$a;
$b;
$x;
$y;
$m;
$mod;
function modof($a,$b){
    global $mod;
    global $a,$b,$x,$y;
    global $m,$n;
    $mod = $a % $b;
    return $mod;
    
}
echo(modof(36,35));
function overhead(){
    global $mod;
    global $a,$b,$x,$y;
    global $m,$n;
    
}
?>