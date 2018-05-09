<?php

$before1 = array ("android"=>1, "bender"=>2, "cupcake"=>3, "donut"=>4, "eclair"=>5, "froyo"=>6, "gingerbread"=>7, "honeycomb"=>8, "iceCreamSandwich"=>9, "jellyBean"=>10, "kitKat"=>11, "lollipop"=>12, "marshmallow"=>13, "nougat"=>14);
$before2 = array ("apple"=>-1, "banana"=>11, "cherry"=>0, "dragonfruit"=>1000, "elderberry"=>-5);
$before3 = array ();
?>
<!DOCTYPE html>
<html>
<head>
<title>Even up</title>
<style>
</style>
</head>
<body>
<pre>
    <?php
function evenup($array){
    $array1 = array();
 $e1 = null;
    foreach($array as $key=>$e){
        if(is_numeric($e) != true){}
        
        else if($e%2 == 1 || $e%2 == -1){
           $e1 = floor($e) + 1; 
        }
        else if($e%2 == 0){
            $e1 = $e;
        }
        $array1[$key]=$e1;
   
    }
    return $array1;
}
    
    
    ?>
Array1 before:<br>
<?php var_dump ($before1); ?>
<br>Array1 after:<br>
<?php var_dump (evenup ($before1)); ?>

<br><br>Array2 before:<br>
<?php var_dump ($before2); ?>
<br>Array2 after:<br>
<?php var_dump (evenup ($before2)); ?>

<br><br>Array3 before:<br>
<?php var_dump ($before3); ?>
<br>Array3 after:<br>
<?php var_dump (evenup ($before3)); ?>
</body>
</html>

