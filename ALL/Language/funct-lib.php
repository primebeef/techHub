<?php
function doit(){
    foreach($array as $e){
        run($e);
    }
}
function run($ex){
    $ex = substr($ex,1);
    $check = array_search($MAX, $ex);
    if($check == true){
        echo 'TRUTH IS EVIDENT.';
    }
}

?>