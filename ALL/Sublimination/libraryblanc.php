<?php
function compile(){
    global $input;
$coll = compute($input,"//");
        
    foreach($coll as $e){
        echo $e;
    }
    
    
}
function compute($input,$by){
    $newark = explode($by,$input);
    return $newark;
}
$input = "//my name is Makenna. // I was born in March. ";
compile();
?>