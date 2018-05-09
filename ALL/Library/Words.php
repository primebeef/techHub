
<?php
$W = array();
$sim = EXPL("As I walk through the shadow of the valley of death, I take a look at my life and realize there is nothing left."," ");
foreach($sim as $i=>$e){
if(array_key_exists($e,$sim)==false){
    $W[$e]['value'] = generate();
}
else{
    $W[$e]['value'] = ($W[$e]['value'] + $GW)/ $W[$e]['count'];
     $W[$e]['count'] =  $W[$e]['count'] + 1;
}
}
$words = array(
    'my' => generate(),
    'your' => generate(),
    'his'  => generate(),
    'apple' => generate(),
    
    
    
    
    
    );
    
    function generate(){
        $h = rand(1,100);
        $l = rand(-100,1);
        $set = rand($l,$h);
        return $set;
    }
   // sim_drop($W);
    echo array_search('9',$W);
  //function sim_drop($array){
    //var_dump($W);
  //  }
 /* pete($W,'WALK','');
  function pete($array,$src,$pref){
      $xc = false;
    foreach($array as $i=>$e){
        if(is_array($i) == false){
        if($i == $src){
            echo " $pref, [$i] => $e";
            $xc = true;
        }
     
       }
        else{$xc = false;}
    } 
    if($xc == false){
       
      foreach($array as $i=>$e){
           if(is_array($e)==true){
        pete($e,$src,$pref + $i);
    } }
    }
  }

   */
   //echo $W['WALK']['value'];

  /* $LINK = array();
      dance($W,'WALK','value',$LINK);
   function dance($array,$src,$sec,$link){
     
       foreach($array as $i=>$e){
           $set = array_search($e,$array);
         
           if($set == $src){
                 echo $set;
           if(is_array($e)){
               $link[] = $i;
               dance($e, $src,$sec,$link);
           }
          
         else if($e == $src){
           echo "$i => $e";
          
           foreach($link as $f){
               echo $f."<br>";
           }
           
                  }}
       
       }
   }
   
  function recur($array){
      
  }
  */
  swaerwords($W,'WALK','value');
  function swaerwords($array,$arraykey,$src){
     
     foreach($array as $i){
          if(is_array($i)== true){
              swaerwords($i,$src);
          }
          else{
              if($arraykey == $i){
          echo $W[$i][$src];
          }}
      }
  }
 function EXPL($text,$parsr){
        $text = strtoupper($text);
        $text = trim($text);
    
        $text = remPUNCT($text);
    $new = explode($parsr,$text);
    
   return $new; 
}
function remPUNCT($string){
    $parse = array('/',"'","\"","\\","/",".","(",")",",","}","{",":",";","]","[");
    $string = str_replace($parse,"",$string);
    return $string;
} 
?>
