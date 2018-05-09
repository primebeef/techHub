<?php
$xim = range("A","Z");
$tester= array(20,8,5); //= str_split($summate);
$summate = array();
$range = 1;
millie();
function keys($number){
    global $summate;
    global $xim;
    global $tester;
    
    if(is_array($number)){
        foreach($number as $e){
            echo $xim[$e+1];
            $summate[] = $xim[$e+1];
        }
    }
    else{
    echo $xim[$number+1];
    }
    echo"<br>";
    $tester = $summate;
    millie();
    
}
function millie(){
    global $xim;
    global $tester;
    global $range;

foreach($tester as $e){
    $far = array_search($e, $xim);
    $far = $far + $range;
    if($far >= 26){
    $s = $far - 26;
    $far = $s;
    }
    echo($xim[$far]);
}
}

?>