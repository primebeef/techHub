<?php
function POSSKEY($array,$search,$allkeys=true){
    foreach($array as $key=>$e){
    if($allkeys = true){
        echo $key;
    }
    else{
        if($e == $search){
            echo $key;
        }
    }
    }
}
?>