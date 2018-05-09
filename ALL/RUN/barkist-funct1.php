<?php
//SHOW LIB
function AtS($array){
      $string=null;
      foreach($array as $e){
          $string = $string.$e." ";
      }
      return $string;
  }
function setPre($type,$set,$value,$pre=null){
    global $pre;
   if($type == 'variable'){
       //echo $set;
       //echo $pre["$set"];
        if(array_key_exists($set,$pre)==true){
       $pre[$set] = $value; 
        //var_dump($pre[$set]);
        echo "---value <b>$set</b> set as <b>$value</b>---<br>";
    }
    else{
        
        echo("404(1): KEY NOT FOUND.");
       
    }
   }
    else if($type == 'array'){
        echo $set;
       if(array_key_exists($set,$pre)==true){
       $pre[$set] = array(); 
       $value1 = explode(",",$value);
       foreach($value1 as $x){
            if(strpos($x,"=")!=null){
           $value2 = explode("=",$x);
           $value2[1] = explode("_",$value2[1]);
            $term = AtS($value2[1]);
           $pre[$set][$value2[0]]=$term;
          
       }
       else{
          foreach($value2 as $e){
           $pre[$set][]=$e;
           
       }    
       }  
        
       }
       
       }
       else{
        die ("ERROR 404(1): KEY NOT FOUND.");
    }
    
    }   
    
    }
   

function run($type,$sub,$array,$pre=null){
    switch($type){
    case "color":
        inColor($sub,$array,$pre);
        break;
    
}
}
function inColor($color,$piece,$pre=null){
    global $pre;
    echo $pre["domain"];
    $max = count($piece);
        foreach($piece as $i=>$e){
            //echo $e;
            if(substr($e,-1)=="^"){
                $last = $i;
                //echo "yes";
            }
            else{
                //echo $e;
            }
        }
        if((substr($piece[2],0,1)=="^")&&(substr($piece[$last],-1)=="^")){
            $piece[2]=trim($piece[2],"^");
            $piece[$last]=trim($piece[$last],"^");
           $style = $piece[1];
           if($pre['domain']!=null){
               $domain = $pre["domain"];
               $file = fopen($domain,"a+") or die("CANNOT GENERATE FILE");
               
               //$test = fopen($piece[$last + 1],"a+");
                $jim = null;
            for($i=2;$i<=$last;$i++){
                $jim = $jim.$piece[$i]." ";
            }
            $maxim = "<span style='$style'>$jim</span>";
            fwrite($file,$maxim);
               fclose($file);
               //echo $maxim;
           }
            //echo "fine";
            /*if(isset($piece[$last + 1])!=true){
                $test = fopen($piece[$last + 1],"a+");
                $jim = null;
            for($i=2;$i<=$last;$i++){
                $jim = $jim.$piece[$i]." ";
            }
            $maxim = "<span style='$style'>$jim</span>\n";
            fwrite($test,$maxim);
            fclose($test);
            }
            */
            else{
                //echo $pre['domain'];
                //echo "FAULTY";
               echo "<span style='$style'>";
            for($i=2;$i<=$last;$i++){
                echo $piece[$i]." ";
            }
            echo "</span>"; 
            }
            
        }
        else{
            echo "---UNABLE TO SHOW INPUT---";
        }
}
function run_lib_show($piece,$pre=null){
$type = null;
$sub = null;
$noose = null;
//echo "check";
$piece[1] = explode("&&",$piece[1]);
foreach($piece[1] as $x){
    
  switch($x){
case "inBlue":
        $type = "color";
        $sub = "blue";
       
        
    break;
case "inGreen":
        $type = "color";
        $sub = "green";
        
        
    break;
case "inPink":
        $type = "color";
        $sub = "pink";
        
        
    break;
case "inGrey":
        $type = "color";
        $sub = "grey";
        
        
    break;
case "inAzure":
        $type= "color";
        $sub= "#135B8E";
    
    break;  
case "inBold":
        $type= "font-weight";
        $sub= "bold";
    
    break;
case "inHaute":
        $type = "color";
        $sub = "#ED254E";
    break;
case "outRight":
        $type= "float";
        $sub= "right";
    
  break;
case "outLeft":
        $type= "float";
        $sub= "left";
    
  break;

}
$noose = $noose." "."$type:$sub;";
}
$piece[1] = $noose;
run("color",$sub,$piece,$pre);  
}
//-------------------------------------------------------
//FILE COMMIT
function space($text,$spacer,$pre=null){
    $newer=null;
    $new = explode($spacer,$text);
    foreach($new as $e){
        $newer = $newer.$e." ";
    }
    return $newer;
}
function run_lib_file_gen($array){
    //echo $piece[2];
    
    global $pre;
  
   $file = fopen($pre["domain"],"a+") or die("CANNOT GENERATE FILE");
   echo "cheack 1";
   $link;
   $title;
   $fill;
   switch($array[2]){
        case "startHTML":
            $link = $array[4];
            $title = space($array[3],"-");
                $fill ="<!DOCTYPE html>\n<html>\n<head>\n<title>$title</title>\n<link rel='stylesheet' type='text/css' href='$link'>\n</head>\n<body>";
            break;
            default:
                $fill = "kill me";
                break;
    }
    echo $fill;
    fwrite($file, $fill);
fclose($file);
}
function run_lib_file_new($piece,$pre=null){
    global $pre;
    $max = count($piece[2]);
        if(substr($piece[2],0,1)=="'"){
        if(substr($piece[2],-1)=="'"){
            $piece[2]=trim($piece[2],"'");
            //echo $piece[2];
            $file = fopen($piece[2],"a+") or die("CANNOT GENERATE FILE");
            if(isset($piece[3])==true){
                $x = 0;
              foreach($piece as $i){
                    if($x > 2){
                        fwrite($file, $i." ");
                    }
                    $x++;
              }
            }
        fclose($file);
        
        }    
        }
}
function run_lib_file_die($array,$pre=null){
    //$fill = fopen($array[1],"a+");
   // fclose($fill);
   die;
}
function run_lib_show_gen($piece,$pre){
    switch($piece[2]){
        case "new":
            createParticle($piece,$pre);
            break;
    }
}
//like sweet berries hanging low from a tree.
function run_lib_file($piece,$pre=null){
    switch($piece[1]){
    
    case "newfile":
        run_lib_file_run($piece,$pre);
        break;
    case "load":
        run_lib_file_gen($piece);
        break;
    case "exit":
        run_lib_file_die($piece,$pre);
       
        break;
}
}
// SYSTEM LIBRARY
function run_lib_system_ini($piece,$pre=null){
    switch($piece[2]){
    case "stable":
        setPre($piece[3],$piece[4],$piece[5],$pre);
        break;
}
}
function run_lib_system($piece,$pre=null){
    switch($piece[1]){
    case "initiate":
        run_lib_system_ini($piece,$pre);
        break;
    }
}
?>



