<?php include "../Library/Tech30Lib.php";
$file = getValue('file','sample-pars.txt');
$brick = file($file);
$me = "S/dmihe";
$mark = null;
foreach($brick as $e){
    if($mark == null){
$mark = sscanf($e,"//%s");
$place = strpos($e,"//");
//echo $place;
$new = substr($e,$place,5);
echo $new;
if($mark == "SRC"){
    foreach($brick as $e){
        $comm = sscanf($e,"/%s");
        echo $comm; 
    }
   
}
}
}
//$info = array();
/*foreach($brick as $e){
$info = sscanf($e,"//%d");
printf($info);
}
*/
// set global MAXIMUM
/*function command_pars($ex){
    $variant = strpos($ex,"//");
    $brick = substr($ex,$variant," ");
    echo $variant;
}
*/
?>