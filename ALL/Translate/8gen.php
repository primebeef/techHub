<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
<style>
    canvas.part{
        width:20px;
        height:20px;
    }
</style>
</head>
<body>
<?php
$eight = array(4000,3100,2200,3010,3001,1300,0400,2110);
$properties = array(4000 => 'lightblue',3100 => 'orange',2200 =>'red',3010 => 'pink',3001 => 'blue',1300 => 'purple',0400 => 'grey',2110 =>'green',0000 =>null);
function displayNonAsc($array){
    foreach($array as $e){
        echo "<div>$e</div><br>\n";
    }
}
//displayNonAsc($eight);
//Leveling Comparison
$basic = array();
for($i=0;$i<9;$i++){
    $rn = rand(0,7);
    $basic[]=$eight[$rn];
}
function BasicComp($array,$array1){
    $a = '';
    $new = array();
    foreach($array as $e){
    $a = $e;
    //echo "--$a <br>";
    foreach($array1 as $i => $e){
        //echo "$i $e <br>";
        if($i == $a){
            
            $new[] = $e;
        }
    }
    }
    return $new;
    var_dump($new);
}
$fer = BasicComp($basic,$properties);
PARSEsumate($fer);
function PARSEsumate($array){
    foreach($array as $e){
    echo "<canvas class='part' style='background-color:$e'></canvas>";
}
}
?>

</body>
</html>