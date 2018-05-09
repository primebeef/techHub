<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
$access = isset($_GET['access'])?$_GET['access']:"NEO.000-info_name/";
$flow = isset($_GET['flow'])?$_GET['flow']:"DRX";
$parse = PAR_string($access,$flow);
function PAR_string($access,$flow = null){
echo "<b>".$access."</b><br>";
    $access = trim($access);
    $long = strlen($access);
//STEP 1: Parse XXX from beginning for array ID.
   $key = SCR_info($access,'.');
   $cut = strcspn($access,'.');
  
//Current Parseless
   $access = substr($access,$cut + 1);
  
//STEP 2: Parse 000.
   $pass = SCR_info($access,'-');
   $cut = strcspn($access,'-');
   
//Current Parseless
   $access = substr($access,$cut + 1);
   
//STEP 3: Parse off 'title'.
 $title = SCR_info($access,'_');
   $cut = strcspn($access,'_');
   
//Current Parseless
   $access = substr($access,$cut + 1);
   
//STEP 3: Parse off 'desc'.
 $desc = SCR_info($access,'/');
   $cut = strcspn($access,'/');
   
//Current Parseless
   $access = substr($access,$cut + 1);
   
//
 /*  echo $key."<br>";
   echo $pass."<br>";
   echo $title."<br>";
   echo $desc."<br>";
*/
//Use Data.

switch($flow){
    case 'DRX':
     include"../Library/DRX.php";
     if(isset($DRX[$key][$pass][$title][$desc])==true){
     return $DRX[$key][$pass][$title][$desc];
     }
     else { 
       
         return 'No Information Available.<br>Likely Causation: KEY NOT FOUND.';
         
     }
        break;
    default:
        die("No Information Available.<br>Likely Causation: INVALID DIRECTORY INPUT.");
        break;

}


















//SourcePAR($key,$pass,$title,$desc,$flow);
}
echo $parse;
function SourcePAR($key,$pass,$title,$desc,$flow){
 if(isset($flow[$key][$pass][$title][$desc])==true){
     echo $flow[$key][$pass][$title][$desc];
 } 
 else{ echo "no";
  echo $flow[$key][$pass][$title][$desc];
 }
}
function SCR_info($skim,$stop){
    
    $cut = strcspn($skim,$stop);
    $parse = substr($skim,0,$cut);
return $parse;
}

?>
<script></script>
</body>
</html>