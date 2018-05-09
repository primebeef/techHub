<?php
function Doctype(){
    echo("<DOCTYPE! html>");
}
//Does the key exist for a search.
function SRC($context,$DRX_Area){
   $SRCH = array_key_exists($context, $DRX_Area)?true:false;
return $SRCH;
}
//Possible keys in field of search.
function POSSKEY($DRX_Area){
 print_r(array_keys($DRX_Area));   
}
//Tells what key certain data is under.
function DATA_KLINK($content,$DRX_Area){
    $key = array_search($content, $DRX_Area);

    return $key;
}
/*function 3DATA(){
    $long = count($DRX_Area);
    
for($e=0;$e <$long;$e++){
    if($DRX_Area[000][$title][])
}
}*/
function PARSE($access,$flow = null,$show = false){
    if($show == true){
    echo "<b>".$access."</b><br>";    
    }
else{}
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
        
        case 'BKS':
     include"../Library/BKS.php";
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
}
function SCR_info($skim,$stop){
    
    $cut = strcspn($skim,$stop);
    $parse = substr($skim,0,$cut);
return $parse;
}
function SCR_info2($skim,$stop){
    
    $cut = strcspn($skim,$stop);
    $parse = substr($skim,0,$cut + 1);
return $parse;
}
function PARSE2($access,$slice){
    $access = trim($access);
    $key = SCR_info($access,$slice);
    $cut = strcspn($access,$slice);
    $new = substr($access,$cut + 1);
    return $key;

}
function PARSE3($access,$count,$parse,$note1=null,$note2=null,$note3=null,$note4=null,$note5=null,$note6=null){
    
for($i = 1; $i>=$count;$i++){
$access = trim($access);
    $type = "note$count";
    echo $type;
    if($count == 1 && $note1 != null){
      $key[] = SCR_info($access,'.');
    $cut = strcspn($access,'.');  
    }
//STEP 1: Parse XXX from beginning for array ID.
   
  
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
   
//REQUEST RETURN WHICH? DATA. or\\ choose conversion array to string?
}}
//BEST CON_AtS
function CON_AtS($array,$CAPS = null){
    $string = '';
    foreach($array as $key){
    $string = $string.$key." ";
    
    }
    $string = trim($string);
    if($CAPS == true){
        $string = ucfirst($string);
    }
    return $string;
}
function CON_AtS2($array,$increment=1,$CAPS = null){
    $count = count($array);
    $i = 0;
    $string = '';
    while($i <= ($count- 1)){
       
       $string = $string.$array[$i]." ";
       $i = $i + $increment;
    }
    if($CAPS == true){
        $string = ucfirst($string);
    }
    return $string;
}
function selective_dictionary($access){
//FIND, CUT SUBSTRING OF CUTTER IF EQAUL TO THEN DO.
    $continue = true;
    while($continue == true){
    $where = SCR_info2($access,'/.');
    $long = strlen($where);
    $charcheck = substr($where,$long);
    $access = substr($access,$long);
    $where = substr($where,0,$long - 1);
    if($charcheck == '.'){
        echo '.';
        $string = $sting." ";
        $continue = false;
    }
    else if($charcheck = '/'){
        echo '/';
        switch($where){
            case '1':
                echo 'A';
                break;
            case '2':
                echo 'B';
                break;
            case '3':
                echo 'C';
                break;
            case '4':
                echo 'D';
                break;
            case '5':
                echo 'E';
                break;
            case '6':
                echo 'F';
                break;
            case '7':
                echo 'G';
                break;
            case '8':
                echo 'H';
                break;
            case '9':
                echo 'I';
                break;
            case '10':
                echo 'J';
                break;
            case '11':
                echo 'K';
                break;
            case '12':
                echo 'L';
                break;
            case '13':
                echo 'M';
                break;
            case '14':
                echo 'N';
                break;
            case '15':
                echo 'O';
                break;
            case '16':
                echo 'P';
                break;
            case '17':
                echo 'Q';
                break;
            case '18':
                echo 'R';
                break;
            case '19':
                echo 'S';
                break;
            case '20':
                echo 'T';
                break;
            case '21':
                echo 'U';
                break;
            case '22':
                echo 'V';
                break;
            case '23':
                echo 'W';
                break;
            case '24':
                echo 'X';
                break;
            case '25':
                echo 'Y';
                break;
            case '26':
                echo 'Z';
                break;
            default:
                echo 'NOT A VALID INPUT';
                echo "Where: $where Access:$access Charcheck:$charcheck ";
             
                die();
                break;
        }
        $continue = true;
    }
    // IF NEXT IS NOT WHITE SPACE CONTINUE.
//Current Parseless
   //$access = substr($access,$cut + 1);
}}




















?>