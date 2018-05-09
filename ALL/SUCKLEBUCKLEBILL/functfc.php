<?php
//filaments are the length of the parscrypt.
function AtS_($array, $string=null, $space=null){
      foreach($array as $e){
          $string = $string.$space.$e;
      }
      return $string;
  }
function gen_cyrpt(){
    $filament = array();
    $filament[] = rand(0,9);
    $filament[] = rand(0,9);
    $filament[] = rand(0,9);
    $filament[] = '-';
    $filament[] = rand(0,9);
    $filament[] = '-';
    $filament[] = chr(rand(65,90));
    $filament[] = chr(rand(65,90));
    $filament[] = chr(rand(65,90));
    $filament[] = '-';
    $filament[] = rand(0,9);
    $filament[] = chr(rand(65,90));
    $filament[] = chr(rand(65,90));
$filament = AtS($filament);
return $filament;
}

function CHARS($source){
    
    if(strcspn($source,"!@#$%^&*()~`,:;'\"\\|}{][=+?/") != strlen($source)){
    $mark = array(4077);
    return $mark;
}
else{return true; }
}
function locateAT($source){
    //echo $source;
    $source = htmlspecialchars(strip_tags(trim($source)));
    //echo $source;
    if(strcspn($source,"@") == strlen($source)){
        $mark = array(4078);
        return $mark;
    }
    else{
    $go = strcspn($source,'@');
    //echo $go;
    $gone = substr($source,0,$go);
    //echo $gone;
    return $gone;
    }
}
?>