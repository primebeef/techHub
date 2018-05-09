<!DOCTYPE html>
<html>
<head>
<!--
  Assignment: 
  Name: 
-->
<title></title>
<style>
</style>
</head>
<body>
<?php
$access = "NEO.000.info_kylon-surveyor";
PAR_string($access);
function PAR_string($access,$flow = null){
    $access = trim($access);
    $long = strlen($access);
//STEP 1: Parse XXX from beginning for array ID.
   $key = SCR_info($access,'.');
   echo $key;
//STEP 2: Search Array FUNCT.

   /*$length = 0;
   while($length <= $long){
      $cut = strcspn($access," ");
       $sent =  substr($access,0,$cut);
       $access = substr($access,$cut);
       $access = trim($access);
       $access = rtrim($access,".");
        
switch($flow){
    case ''
    default:
         
    break;
}
       echo $sent."<br>";
       $length = $length + 1;
       
   }
   if($length > $long || $length == $long){
       
   }
   */
}
//Scrape info
function SCR_info($skim,$stop){
    
    $cut = strcspn($skim,$stop);
    $parse = substr($skim,0,$cut);
return $parse;
}
//Search data
function SRC_data($key=0,$center){
    $i = 0;
    $long = strlen($center);
    echo $long;
while($i < $long){
   if($key == $center[$key]) 
$i++;
}
       
}    
$Drx_basic = array(

    array(
        'usn' => 'makenna',
       'psc' => 'Makenna2002',
        
    ),
    array(
        'id' => 3245,
        'usn' => 'sammyj',
        'psc' => 'Makenna2002',
    ),
    array(
        'id' => 5342,
        'usn' => 'makenna',
        'last_name' => 'Makenna2002',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);
if($users[0]['usn'] != null){
    echo "YUP";
}
?>

</body>
</html>