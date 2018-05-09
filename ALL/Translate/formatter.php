<?php
$show = isset($_GET['display'])?$_GET['display']:'freq';
$size = isset($_GET['size'])?$_GET['size']:100;
function sum($s,$p){
    if($p == 1 && $s == 0){
         $new = rand(0,4);
         return $new;
    } 
    else if($p == 2 && $s == 0){
         $new = rand(0,4);
         return $new;
    }
    else if($p == 3 && $s == 0){
         $new = rand(0,4);
         return $new;
    }
    else if($p == 4 && $s == 0){
         $new = rand(4,4);
         return $new;
    }
                            else if($p == 2 && $s == 1){
                                 $new = rand(0,3);
                                 return $new;
                            }
                            else if($p == 3 && $s == 1){
                                 $new = rand(0,3);
                                 return $new;
                            }
                            else if($p == 4 && $s == 1){
                                 $new = rand(3,3);
                                 return $new;
                            }
    else if($p == 2 && $s == 2){
         $new = rand(0,2);
         return $new;
    }
    else if($p == 3 && $s == 2){
         $new = rand(0,2);
         return $new;
    }
    else if($p == 4 && $s == 2){
         $new = rand(2,2);
         return $new;
    }
                            else if($p == 2 && $s == 3){
                                 $new = rand(0,1);
                                 return $new;
                            }
                            else if($p == 3 && $s == 3){
                                 $new = rand(0,1);
                                 return $new;
                            }
                            else if($p == 4 && $s == 3){
                                 $new = rand(1,1);
                                 return $new;
                            }
    else if($p == 2 && $s == 4){
         $new = rand(0,0);
         return $new;
    }
    else if($p == 3 && $s == 4){
         $new = rand(0,0);
         return $new;
    }
    else if($p == 4 && $s == 4){
         $new = rand(0,0);
         return $new;
    }
}
function sumarray($array){
      $sum = null;
      foreach($array as $e){
          if(is_numeric($e)==true){
             $sum = $sum + $e;  
          }
         
      }
      return $sum;
  }
$sumo = 1;
$place = 4;
$germ = sum($sumo,$place);

$ex = sum4();
function sum4(){
    $sum = 0;
    $place = 1;
    $cur = array();
    $i = 0 ;
    for($i=0;$i<4;$i++){
   $cur[] = sum($sum,$place);
   $sum = sumarray($cur);
   //echo "$place => $sum <br>";
   $place ++;
    }
   return $cur;
}
function display($array){
    $p= 1;
    foreach($array as $i=>$e){
        echo "<div id='p$p'>$i => $e </div>\n";
        $p++;
    }
}
function displayraw($array){
    $p= 1;
    foreach($array as $i=>$e){
        echo "$i, \n";
        $p++;
    }
}
function show($array){
      echo "<tr>\n";
            foreach($array as $e){
                    echo "<td>\n";
                echo "$e\n";
                    echo "</td>";
            }
      echo "</tr>\n";
  } 
  function got($array){
    
   foreach($array as $i=>$e){
    
    if(is_array($e)==true){
       show($e);
    }
    else{
      
    }

} 

}
function AtS($array){
      $string=null;
      foreach($array as $e){
          $string = $string.$e;
      }
      return $string;
  }
  function newarray($array){
      $master = array();
      foreach($array as $i=>$e){
        if(array_key_exists($e,$master)==true){
            $master[$e]= $master[$e] + 1;
        }
        else{
           $master[$e] = 1; 
        }
      }
      return $master;
  }
?>
<?php


$count = array();
for($i=0;$i<$size;$i++){
    $master[] = sum4();
    $count[]= AtS($master[$i]);
}
 $news = newarray($count);



?>
<?php
function goth($array){
     echo "<br>{";
   foreach($array as $i=>$e){
       echo "<br>{";
    if(is_array($e)==true){
       goth($e);
    }
    else{
        echo "$i => $e";
    }
    echo "}<br>";
} 
 echo "}<br>";
}
function gothic($array,$space="|--",$spaceb="--|"){
    
$space = $space."----";
$spaceb = "----".$spaceb;

echo "{";
   foreach($array as $i=>$e){
       echo "<br>";
    if(is_array($e)==true){
        
       echo "$space";
       gothic($e,$space,$spaceb);
        echo "$spaceb";
    }
    else{
        echo "$space{ $i => $e }";
    }
   
} 
 echo "<br>}";

}
?>
<html>
<head>
<title></title>
<style>
    table{
    border-collapse:collapse;
    border:1px solid black;
}
td,th{
   border:1px solid black; 
}
</style>
</head>
<body>
   
    <table>
        

<?php
if($show == 'full'){got($master);}
if($show == 'count'){echo count($news);}
if($show == 'all'){
    echo count($news);
    echo "<br>";
    arsort($news);
    display($news);
    got($master);
    
    
}
if($show == 'freq'){
    echo count($news);
    echo "<br>\n";
    arsort($news);
    display($news);
   
    
    
}
if($show == 'format'){
    echo count($news);
    echo "<br>\n";
    ksort($news);
    displayraw($news);
   
    
    
}
if($show == 'gothic'){
    gothic($master);
}
?>
    </table>

 

</body>
</html>



























