<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
$mark = false;
$deviate = 3;
$of = 100;
$particle = range("A","Z");
$article = "My father is not here.";
//THe risk-time is equal to $of to the second.
$risk = pow($of,$of);
function deviate($deviate,$of,$mark){
    $choice = range(1,$deviate);
//echo $choice;
$action = rand(1,$of);
    foreach($choice as $e){
        if($action == $e){
            $mark = true;
        }
        else{}
        }
        return $mark;
    }
    
function particle_generate($particle){
    $particle_r = rand(0,count($particle) - 1);
    $cent = $particle[$particle_r];
        return $cent;
    
}
function format($article){
    $article = preg_replace('/[^a-z]+/i', ' ', $article); 
    $article = strtoupper($article);
    echo $article;
    return $article;
}
function finalize($mark,$deviate,$of,$article,$particle){
    $a = deviate($deviate,$of,$mark);
   // echo $a;
    if($a == true){
    $b = particle_generate($particle);
    $article = format($article);
        $ax = explode(" ", $article);
        $cho = $ax[rand(0,count($ax) - 1)];
        echo "here";
            $ax[$cho] = str_split($cho);
        
    $let = $cho[rand(0,count($cho) - 1)];
    $sentence ="";
    foreach($ax as $i=>$e){
        if(is_array($e) == true){
            $word="";
            foreach($e as $s){
                $word = $word.$s;
            }
        }
        else{
            $sentence = $sentence." ".$e;
        }
        return $sentence;
    }
        
  
    }
}
function gens($times,$mark,$deviate,$of,$article,$particle){
      $sim;
      for($i=0;$i<$times;$i++){
      $sim = finalize($mark,$deviate,$of,$article,$particle);
      if($i % 10 == 0){
          echo $sim;
      }
      }
  }
    
    gens(1000,$mark,$deviate,$of,$article,$particle);
//A step forward, a step in the right direction. a step away from the future. A step from the past
?>
</body>
</html>
