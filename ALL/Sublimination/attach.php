<?php
include_once "directory.php";
function create_numerical($rangearray){
$long = null;
    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
    foreach($rangearray as $e){
        $e1 = $f->format($e);
        $e1 = strtoupper($e1);
        $long = $long."array(\n'face' => \"$e1\",\n'type' => \"NUMERICAL\",\n'literal' => $e,\n),\n";
    }
    return $long;
}
function run_lib_file_subphp1($era){
    //global $pre;
    $domain = "numerical.php";
    $file = fopen($domain,"a+") or die("CANNOT GENERATE FILE");
               $contents = file_get_contents($domain);
$contents = str_replace("?>", '', $contents);
file_put_contents($domain, $contents);
  
            $maxim = $era;
            fwrite($file,$maxim);
            fwrite($file,"?>");
               fclose($file);
               echo "SCRIPT ADJUSTED";
    
}
function append($place){
    //global $pre;
    $domain = "numerical.php";
    $file = fopen($domain,"a+") or die("CANNOT GENERATE FILE");
               $contents = file_get_contents($domain);
$contents = str_replace("$place", '', $contents);
file_put_contents($domain, $contents);
  
            $maxim = $era;
            fwrite($file,$maxim);
            fwrite($file,"?>");
               fclose($file);
               echo "SCRIPT ADJUSTED";
    
}
function append_info($face,$type,$as){
    global $DIRx;
    $value;
    $key;
    foreach($DIRx as $e => $i){
        if($i['face'] == $face){
           //foreach($i as $x => $z) {
               //echo "$x => $z<br>";
               if(end($i) == null){
                   $value = prev($i);
                   $key = array_search(prev($i),$i);
               }
           //}
        }
        
        
    }
    
}
append_info('BLIND',3,3);
//$x = range(1,10000);
//run_lib_file_subphp1(create_numerical($x));
//$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
//$e = $f->format(1432);
//echo $e;
?>