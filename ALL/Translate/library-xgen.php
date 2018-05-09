<?php
// THE SUM4 LIBRARY. CREATED BY KEN TURNER.
function printDoctype(){
    echo("<!DOCTYPE html>\n");
}
function startTable(){
    echo "<table style='border-collapse:collapse;'>";
}
function endTable(){
    echo "</table>";
}
function gensum(){
    $space = 1;
    $save = array();
    $total = 0;
    $place = array(
        1 => null,
        2 => null,
        3 => null,
        4 => null
    );
    //echo $place[0];
    for($i=0;$i<4;$i++){
    $npl = rand(1,4);
    while($place[$npl] != null){
        $npl = rand(1,4);
    }
    //echo $npl."<br>";
    $adt = genprob($total,$space);
    //echo $adt."<br>";
    //npl new place
    $save[$npl] = $adt;
    $place[$npl] = true;
    $total = $total + $adt;
    $space++;
    }
    return $save;
    //echo $save[$npl];
}
function genprob($total,$space){
    if($total == 0 && $space == 0){
        //add to total
        $adt = rand(0,4);
        return $adt;
    }
    
        if($total == 0 && $space == 1){
            $adt = rand(0,4);
            return $adt;
        }
        if($total == 1 && $space == 1){
            $adt = rand(0,3);
            return $adt;
        }
        if($total == 2 && $space == 1){
            $adt = rand(0,2);
            return $adt;
        }
        if($total == 3 && $space == 1){
        $adt = rand(0,1);
        return $adt;
        }
        if($total == 4 && $space == 1){
            $adt = rand(0,0);
            return $adt;
        }
        
                    if($total == 0 && $space == 2){
                    $adt = rand(0,4);
                    return $adt;
                    }
                    if($total == 1 && $space == 2){
                        $adt = rand(0,3);
                        return $adt;
                    }
                    if($total == 2 && $space == 2){
                        $adt = rand(0,2);
                        return $adt;
                    }
                    if($total == 3 && $space == 2){
                    $adt = rand(0,1);
                    return $adt;
                    }
                    if($total == 4 && $space == 2){
                        $adt = rand(0,0);
                        return $adt;
                    }
        
        if($total == 0 && $space == 3){
        $adt = rand(0,4);
        return $adt;
        }
        if($total == 1 && $space == 3){
            $adt = rand(0,3);
            return $adt;
        }
        if($total == 2 && $space == 3){
            $adt = rand(0,2);
            return $adt;
        }
        if($total == 3 && $space == 3){
        $adt = rand(0,1);
        return $adt;
        }
        if($total == 4 && $space == 3){
            $adt = rand(0,0);
            return $adt;
        }
                    if($total == 0 && $space == 4){
                    $adt = rand(4,4);
                    return $adt;
                    }
                    if($total == 1 && $space == 4){
                        $adt = rand(3,3);
                        return $adt;
                    }
                    if($total == 2 && $space == 4){
                        $adt = rand(2,2);
                        return $adt;
                    }
                    if($total == 3 && $space == 4){
                    $adt = rand(1,1);
                    return $adt;
                    }
                    if($total == 4 && $space == 4){
                        $adt = rand(0,0);
                        return $adt;
                    }
            
    
}
function sum4($count){
    $finite = array();
    $fut = array();
    for($i=0;$i<$count;$i++){
    
        $fut[] = gensum();
     //   $finite[] = AtS($fut[$i]);
    }
    return $fut;
}
function toAtS($array){
    $finite = array();
    foreach($array as $e){
        $finite[] = AtS($e);
    }
    return $finite;
}
function simpledisp($array){
    foreach($array as $i=>$e){
        echo "$e<br>";
    }
    echo "<br>";
}
function display($array){
    $p= 1;
    foreach($array as $i=>$e){
        echo "<div id='p$p'>$i => $e </div>\n";
        $p++;
    }
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
function AtS($array){
      $string=null;
      foreach($array as $e){
          $string = $string.$e;
      }
      return $string;
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
?>