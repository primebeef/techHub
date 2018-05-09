<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<style>
html,body{
    padding:0;
    margin:0;
}
body{
    background-color:black;
}
    canvas{ position: absolute;
        width:5px;
        height:5px;
        background-color:white;
        border-radius:50%;
    }
</style>
<body>
<?php
$z = 0;
$x = 0;
$y = 0;
$ink = 5;
$count = 0;
$switch = false;
$limit = 1;
$max = 255;
$dist = 1000;
$init = false;
while( $count < $dist*$ink){
 $color = array(rand($limit,$max),rand($limit,$max),rand($limit,$max));  
    $mes = $x."px";
    $top = $y."px";
    $i = rand(0,count($color) - 1);
    $color1 = $color[$i];
    $i = rand(0,count($color) - 1);
    $color2 = $color[$i];
    $i = rand(0,count($color) - 1);
    $color3 = $color[$i];
    echo "<canvas style='top: $top; left: $mes; background-color: rgb($color1,$color2,$color3)'></canvas>\n";
    $colors = null;
    $count++;
    
    /*if($z > 10){
     $x = $x + 2;
    $y = $y - 1;
    $z++;
    }
    else{
        $x = $x - 1;
    $y = $y + 2;
    $z++;
    }
    if($z == 20){
        $z = 0;
        
    }
    */
    ///Switched what x and y where
    
   
  /*
    if($x == $dist){
        $switch = true;
        $y = $y + 5;
    }
    if($x == 0 && $switch == true){
      $switch = false;
        $y = $y + 5;  
    }
    if($switch == true){
        $x = $x - 5;
    }
    if($switch == false){
         $x = $x + 5; 
    }
    */
    $x =  rand(1,360);
    $y = rand(1,360);
   /* if($x == $dist*$ink){
       $switch = true;
       $y = $y + $ink;
       $init = true;
       
   }
   else if($x == 0 && $init == true){
    $y = $y + $ink;
    $switch = false;
   }
    if($switch == false){
        $x = $x + $ink;
    }
    if($switch == true){
        $x = $x - $ink;
    } 
    */
}
?>
<script></script>

</body>
</html>