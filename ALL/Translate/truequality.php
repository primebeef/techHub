<?php
$show = isset($_GET['display'])?$_GET['display']:'colored';
$size = isset($_GET['size'])?$_GET['size']:10;
$type = isset($_GET['type'])?$_GET['type']:'normal';
$data = isset($_GET['data'])?$_GET['data']:true;
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
//$sumo = 1;
//$place = 4;
//$germ = sum($sumo,$place);
//$ex = sum4();
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

$master = array();
$count = array();
            $master[0][0]=1;
            $master[0][1]=1;
            $master[0][2]=1;
            $master[0][3]=1;
if($type == 'normal'){
         
for($i=0;$i<$size;$i++){
    $ma = sum4();
   
    if(AtS_($ma)== '1111'){
        $var = false;
         while($var == false){
       $ma = sum4(); 
     if(AtS_($ma)== '1111'){
        $var = false;
    }
    else{
        
        $var = true;
    }
    }
    }
  
        $master[]= $ma;
         $count[]= AtS($master[$i]);
         $var = true;
  
    
    
}
 $news = newarray($count);

    
}
if($type == 'genstop'){
            
    for($i=0;$i<$size;$i++){
        $master[]= sum4();
        $count[]= AtS($master[$i]);
        if(AtS_($master[$i])=='1111'){
            $master[$i][0]=0;
            $master[$i][1]=0;
            $master[$i][2]=0;
            $master[$i][3]=0;
            $i = $size;
        }
}
 $news = newarray($count);


}
if($type == 'experiment'){
    $stop = false;
    $i = 1;
    while($stop == false){
            $master[]= sum4();
            $count[]= AtS($master[$i]);
     if(AtS_($master[$i])=='1111'){
         
            $stop = true;
            $master[$i][0]=0;
            $master[$i][1]=0;
            $master[$i][2]=0;
            $master[$i][3]=0;
     }
     $i++;   
    }
}
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
   border:1px solid transparent; 
   text-align:center;
   color:black;
   font-family: 'Press Start 2P', cursive;
   font-size:10px;
   user-select:none;
   
}
td.part{ position:relative;
        width:20px;
        height:20px;
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
function gotos($array,$colors){
          
    
   foreach($array as $i=>$e){
    
    if(is_array($e)==true){
       gate($e,$colors);
    }
    else{
      
    }



      }
  }
  
  function gate($array,$colors){
      echo "<tr>\n";
            foreach($array as $e){
                $color = $colors[$e];
                
                    echo "<td class='part' style='background-color:$color'>\n";
             echo "$e";
                    echo "</td>";
            }
      echo "</tr>\n";
  }
  function gates($array,$colors){
      
      if(AtS_($array)=='1111'){
          
      }
      else{
          echo "<tr>\n";
          foreach($array as $e){
                $color = $colors[$e];
                
                    echo "<td class='part' style='background-color:$color'>\n";
             echo "$e";
                    echo "</td>";
            }
            echo "</tr>\n";
      }
            
  }
  function AtS_($array, $string=null, $space=null){
      foreach($array as $e){
          $string = $string.$space.$e;
      }
      return $string;
  }
?>
    </table>
<?php
$colors = array(
 0 => '#CEC3C1',
 1 => '#FFCF9C',
 2 => '#9CE5B4',
 3 => '#79CE96',
 4 => '#82B593',
 
 
    
    );
?>
 <table>
  <?php
  if($show == 'colored'){
        gotos($master,$colors); 
  }
  
  ?> 
  
 </table>
<?php
if($data == true){
    echo (count($master) - 2);
}
?>
</body>
</html>



























