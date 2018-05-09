<pre>
    <?php
$legis = array();
$m = array();
$n = array();
function go($x){
    global $legis;
    $y = pow($x,2);
    $legis[]=$y;
    //echo $y;
    $e = 1;
    //while($legis[count($legis) - 1] > 0){
for($i=0;$i<$x;$i++){
    $y = $y - ($e);
    $legis[]= $y;
    $e = $e + 2 ;
    //echo $e."<br>";
}
}
go(36);
more();
//var_dump($legis);

function more(){
    global $legis;
    global $m;
    global $n;
$switch = false;

for($i=0;$i<count($legis)- 1;$i++){
    $x = $legis[$i];
    $y = $legis[$i + 1];
   
        $mod = $x % $y;
       //echo $mod."<br>";
        $m[] = $x / $mod;
        
}
for($i=0;$i<count($legis)- 1;$i++){
    if($switch == false){
         $n[] = $m[$i] - $m[$i + 1];  
         $switch = true;
    }
    if($switch == true){
         $n[] = $m[$i] + $m[$i + 1];  
         $switch = false;
    }
   
}
}
 $count = count($n) - 1;
$base = 0;
foreach($n as $e){
   
    if($e != null){
        $base = $base + $e;
    }
}
$sim = $base / $count;
echo $sim;
var_dump($n);


?>
</pre>