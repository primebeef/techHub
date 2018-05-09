<?php
$am = isset($_GET['count'])?$_GET['count']:10;
$disp = isset($_GET['display'])?$_GET['display']:'common';
function genmain(){
$pars[1] =  rand(0,4);
$sum = sumarray($pars);
$pars[2] = gen($sum);
$sum = sumarray($pars);
$pars[3] = gen($sum);
$sum = sumarray($pars);
$pars[4] = gen($sum);
return $pars;
}
function gen($pastsum){
    if($pastsum == 0){
        $new = rand(0,4);
    }
    if($pastsum == 1){
        $new = rand(0,3);
    }
    if($pastsum == 2){
        $new = rand(0,2);
    }
    if($pastsum == 3){
        $new = rand(0,1);
    }
    if($pastsum == 4){
        $new = rand(0,0);
    }
  return $new;  
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
    function show_comp($array){
     
            foreach($array as $i=>$e){
                 echo "<tr>\n";
                    echo "<td>\n";
                echo "$i\n";
                    echo "</td>\n";
                    echo "<td>\n";
                echo "$e\n";
                    echo "</td>\n";
                     echo "</tr>\n";
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
  function AtS($array){
      $string=null;
      foreach($array as $e){
          $string = $string.$e;
      }
      return $string;
  }
  function filter($string, $array){
      foreach($array as $e=>$i){
          if($e == $string){
              $i = $i +1;
          }
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
$count = array();
 for($i=0;$i<$am;$i++){
        $pars = genmain();
        $count[]= AtS($pars);
        show($pars);
 }
 $master = newarray($count);
?>
    </table>
    <table>
        <br>
        <?php
        
        arsort($master);
        show_comp($master);
        ?>
    </table>
 <?php
    if($disp == 'common'){
        $cont = max($master);
        foreach($master as $i=>$e){
            if($cont == $e){
                echo "$i : $e<br>\n";
            }
        }
      
    }
    echo count($master);
    ?>

</body>
</html>