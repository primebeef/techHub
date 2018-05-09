<?php
//global $pre;
function useglobe($name,$pre){
    $color = $pre['color'];
    echo "<span style=color:$color>$name</span>";
}
//useglobe("Makenna");
?>
<?php
$a = 1;
$b = 2;

function Sum()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
} 

Sum();
echo $b;
?>