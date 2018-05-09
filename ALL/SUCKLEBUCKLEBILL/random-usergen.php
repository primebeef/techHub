<?php
//filaments are the length of the parscrypt.
function AtS($array, $string=null, $space=null){
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
$save = gen_cyrpt();
echo $save;
?>