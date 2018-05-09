<?php
$DIRx = array(
    array(
       'face' => 'and',
       'part' => 'junct',
       'defin' => null,
       ),
    array(
       'face' => 'there',
       'part' => 'place',
       'defin' => null,
       ),
    array(
       'face' => 'was',
       'part' => 'tobe',
       'defin' => 'first',
       ),
    array(
       'face' => 'here',
       'part' => 'place',
       ),
    array(
       'face' => 'I',
       'part' => 'perso',
       'defin' => 'first',
       ),
    array(
       'face' => 'you',
       'part' => 'perso',
       'defin' => 'second'
       ),
     array(
       'face' => 'were',
       'part' => 'tobe',
       'defin' => 'second',
       ),
     array(
       'face' => 'are',
       'part' => 'tobe',
       'defin' => 'second',
       ),
     array(
       'face' => 'blue',
       'part' => 'sense',
       'defin' => null,
       ),
     array(
       'face' => 'sad',
       'part' => 'sense',
       'defin' => null,
       ),
      array(
       'face' => 'happy',
       'part' => 'sense',
       'defin' => null,
       ),
       array(
       'face' => 'mad',
       'part' => 'sense',
       'defin' => null,
       ),
       array(
       'face' => 'glad',
       'part' => 'sense',
       'defin' => null,
       ),
       array(
       'face' => 'eating',
       'part' => 'sense',
       'defin' => null,
       ),
       array(
       'face' => 'sleeping',
       'part' => 'sense',
       'defin' => null,
       ),
    );
    function AtS($array){
      $string=null;
      foreach($array as $e){
          $string = $string.$e." ";
      }
      return $string;
  }
function generate(){
    global $DIRx;
  $type = 1;
switch($type){
    case 1:
        $simp = array('perso'=>null,'tobe'=>null,'sense'=>null);
        
        gio($simp);
        break;
        
}

}
function gio($structure){
    global $DIRx;
    $def = null;
    foreach($structure as $u => $i){
       
        //echo $u;
        $arra = array();
    foreach($DIRx as $e){
        
         
        //echo $e['part']."<br>";
        //echo $u."*<br>";
       
        if($e['part']==$u){
            //if($def ==null){
                
            //}
           // else if( $e['defin'] == $def || $e['defin']==null){
            $arra[]=$e['face'];
            //}
       // }
        
    }
    }
    var_dump($arra);
    
    $size = count($arra) - 1;
    //$num = rand(0,$size);
   echo $arra[$num];
   // $structure[$u] = $arra[$num];
  // foreach($arra as $a){
   $a = $arra[$num];
   if($def == null){
    foreach($DIRx as $o){
        if($o['face'] == $a){
            if($def == null){
          $def = $o['defin']; //$e['defin'] ;
          //echo $def;
        } 
        
        }
    }
   }
   //}
  echo AtS($structure);
    

}
}
generate();
//Daniel Shiftman Coding Rainbow










?>