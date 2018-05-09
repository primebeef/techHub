<?php
$pre = array(
    'nation' => null,
    'domain' => "die.txt",
    'list' => null,
    'state' => null,
    );
   function space($text,$spacer,$pre=null){
    $newer=null;
    $new = explode($spacer,$text);
    foreach($new as $e){
        $newer = $newer.$e." ";
    }
    return $newer;
} 
function open($stuff){
    global $pre;
    $file = fopen($pre['domain'],"a+")or die("ALERT");
    echo($file);
    fwrite($file,$stuff);
    fclose($file);
}
function run_lib_file_gen($array,$pre=null){
    //echo $piece[2];
    global $pre;
  
   $file = fopen($pre["domain"],"a+") or die("CANNOT GENERATE FILE");
   switch($array[2]){
        case "startHTML":
            $link = $array[4];
            $title = space($array[3],"-");
                $fill ="<!DOCTYPE html>
<html>
<head>
<title>$title</title>
<link rel='stylesheet' type='text/css' href='$link'>
</head>
<body>
";
            break;
            default:
                $fill = "kill me";
                break;
    }
    echo $fill;
    fwrite($file, $fill);
fclose($file);
}
run_lib_file_gen(array(null,null,'startHTML','Jeuryr','mycss.css'));
//open("HACK ATTACK!");
?>