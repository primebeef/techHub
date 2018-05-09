<?php
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
//setup
$main = array();
$main[0]=null;
$main[1]=null;
$main[2]=null;
$main[3]=null;
$main[4]=null;
$main[5]=null;
$main[10]=null;
$main[15]=null;
$main[20]=null;
$main[25]=null;

//choose start
function random($min,$max){
    $number = rand($min,$max);
    return $number;
}
function chosen($array_breaker,$chosen,$min,$max){
    $x = false;
    $num = ($chosen + 1)*5;
    $ar2 = $array_breaker[0]; + $array_breaker[1]; + $array_breaker[2]; + $array_breaker[3]; + $array_breaker[4];
    while($x != true){
    if($array_breaker[$num] != null){
        random($min,$max);
    }
    else if($array_breaker[$num]== null){
        $array_breaker[$num] = true;
        $array_breaker[$chosen] = sum($ar2,$chosen);
        $x = true;
    }
    }
    return $array_breaker;
}
$e = random(0,4);
echo $e;
//echo $r;
$r = chosen($main,$e,0,4);

var_dump($r);
//run($main,4);
echo "<br>";
echo $r[$e];
force($main);
function force($main){
    $x[1]=null;
    $x[2]=null;
    $x[3]=null;
    $x[4]=null;
    foreach($x as $e){
        $h = random(0,4);
        $r = chosen($main,$h,0,4);
        
      $e = $r[$h];  
      echo $e;
    }
}
/*function run($main,$size){
    
  for($e=0;$e<$size;$e++){
      for($i=1;$i<=4;$i++){
        $r = random(0,4);
        $main[$e][$i] = chosen($main[$e],$r,0,4);
        echo $main[$e][$r];
      }
  }
}
*/
?>