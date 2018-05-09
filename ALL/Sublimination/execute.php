<?php
include_once "directory.php"; 
    $page = null;
    $hold = array();
    $brick = array();
    $QUE;
    //decon_punct($page);
    
    function run(){
        global $QUE;
        decon_punct();
        
        if(is_array($QUE)){
            foreach($QUE as $a){
                partition($a);
            }
        }
        else{
            partition($QUE);
        }
        
    }
    
function decon_punct(){
    global $page;
    global $hold;
$page = strtoupper($page);
$hold = explode(".",$page);
    cont("hold");
}
function searchForId($type,$id){
    global $DIRx;
   foreach ($DIRx as $key => $val) {
       if(array_search($id,$val) != 'face'){
           //echo 'no';
           //echo array_search($id,$val);
           
       }
       if (in_array($id, $val)) {
           //echo array_search($id,$val);
           return $val[$type];
           
       }
   }
   return null;
}
function determine($x,$type){
    global $DIRx;
    $t = null;
    switch($type){
         case "type":
            $name = searchForId("type",$x);
             //echo $name;
             return $name;
                        //$t = $DIRx[$name]
             break;
             
    }
}
function graphic_1($page){
    global $brick;
    
    $page = trim($page);
$arch = explode(" ",$page); 

    echo "<table style='border: 1px solid black; border-collapse: collapse;'>";
    foreach($arch as $a => $i){
        if($i != null){
        $i = trim($i);
      $x = determine($i,"type");
      echo("<tr>");
      echo("<td style='border: 1px solid black;'>$i</td>");
      echo("<td style='border: 1px solid black;'>$x</td>");
      echo("</tr>");
$brick[] = array($x,$i);
        }
    }
    echo "<table>";
    

}
function cont($type){
    global $page;
    global $hold;
    
    switch($type){
        
        case "hold":
                        foreach($hold as $e) {
                            graphic_1($e);
                        }
            break;
    }
    
}
function simple_que($QUE){
    global $brick;
    echo $QUE."<br>";
 $QUE = strtoupper($QUE); 
 $brQUE = explode("?",$QUE);
 
 $brQUE = explode(" ",$brQUE[0]);
  //echo $brQUE[2];
    if (strpos($QUE, 'WHO') !== false) {
    //echo 'WHO';
   // echo searchForId("type", $brQUE[2]);
    $sub = "NOUN";
}
    if (strpos($QUE, 'WHAT') !== false) {
    //echo 'WHAT';
    $sub = "VERB";
    }
     if (strpos($QUE, 'WHEN') !== false) {
   // echo 'WHEN';
     }
     if (strpos($QUE, 'WHERE') !== false) {
    //echo 'WHERE';
     }
     if (strpos($QUE, 'WHY') !== false) { //search for causation
   // echo 'WHY';
     }
if (strpos($QUE, 'HOW MANY') !== false) { //search for causation
    //echo 'HOW MANY';
     if ("NOUN" == searchForId("type", $brQUE[2])){
            //THIS NEEDS PROXIMITY FACTORS
            echo $brick["NUMERICAL"];
     }
     }
     
if (strpos($QUE, 'IS') !== false || strpos($QUE, 'ARE') !== false) {
    if($sub == "NOUN" && "VERB" == searchForId("type", $brQUE[2])){
        //echo "wow";
        
        echo $brick['NOUN'];
    }
     }
     
if (strpos($QUE, 'HAPPENING') !== false || strpos($QUE, 'HAPPENED') !== false){
    if($sub == "VERB"){
        echo($brick["NOUN"]." ".$brick["VERB"]);
    }}
    echo "<br>";
}
function AtS($array){
      $string=null;
      foreach($array as $e){
          $string = $string.$e." ";
      }
      return $string;
  }
function que($QUE){
    global $brick;
    echo $QUE."<br>";
 $QUE = strtoupper($QUE); 
 $brQUE = explode("?",$QUE); 

if (strpos($QUE, '') !== false) {
    
    
}
    
}
function distance($x,$y){
        $distance = abs($x - $y);
        //echo $distance;
return $distance;
}
function proximity($noun, $nearest){
    global $brick;
    $nearest = strtoupper($nearest);
    $noun = strtoupper($noun);
    $it = 0;
    $s = array();
    $f= array();
    // echo "no";
    $mark = array();
   //echo $noun;
  // echo $nearest."<br>";
    //var_dump($brick);
        foreach($brick as $key => $value){
            
            //echo $key;
           // echo $value[0]."<br>";
            if($value[0] == $nearest){
                $mark[] = array($it, $value[1]);
              // echo $mark[$key];
            }
            if($value[1] == $noun){
                $mark[$noun] = array($it,$value[1]);
                //echo $mark[$value[1]];
            }
            $it ++;
        }
        //echo $mark[$noun];
    foreach($mark as $e) {
       // $name = array_search($,$mark);
       // $s[] = distance($mark[$noun][0],$e[0]);
       if($e[1] != $noun){
        $f[$e[1]] = distance($mark[$noun][0],$e[0]);
       }
        //echo $s."<br>";
    }
    asort($f);
    $mon = array_search(min($f),$f);
    echo($mon);
    
    
}
function nut(){
    global $brick;
    global $QUE;
    $maxi = array();
    foreach($QUE as $e){
        switch($e){
            case 'WHO':
                $maxi[] = 0;
                break;
            case 'WHAT':
                $maxi[] = 1;
                break;
            case 'WHERE':
                $maxi[] = 2;
                break;
            case 'WHEN':
                $maxi[] = 3;
                break;
            
        }
    }
    $maxi = AtS($maxi);
}
function is_($type,$check){
    switch($type){
        case 'question':
               if(strpos($check, '?') !== true) return true;    
            break;
        case 'statement':
               if(strpos($check, '.') !== true) return true;    
            break;
    }
}
function parse($parsable,$split){
     $parsable = explode("$split",$parsable);
    return $parsable;
}
function remove_que($QUE){
    $QUE = strtoupper($QUE); 
    $brQUE = explode("?",$QUE);
    //echo $brQUE[1];
    $brQUE = $brQUE[0];
    return parse($brQUE," ");
 
 
}
function partition($QUE){
    global $brick;
    if(is_('question',$QUE)){
        $QUE = remove_que($QUE);
        foreach($QUE as $e){
            echo $e." ";
        }
    } 
else{}
    //echo $QUE;
   
    
}
//$QUE = "Who is walking?";

//var_dump($brick);
//echo "<br><br>";
//simple_que($QUE);
?>
























