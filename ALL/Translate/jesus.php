<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<?php

$size = isset($_GET['size'])?$_GET['size']:65;
$rep = isset($_GET['rep'])?$_GET['rep']:50;
$space = isset($_GET['space'])?$_GET['space']:false;
?>
<html>
<head>
<title></title>
<style>
body{
    background-color:#1C2321;
}
    canvas.part{
        width:20px;
        height:20px;
    }
    div.class{
        text-align:center;
    }
</style>
</head>
<body>
    <pre>
    <?php

$colors = array(
		"Indian Red" 		 => "#CD5C5C",
	
		"Salmon" 		 => "#FA8072",
		
		"Fire Brick" 		 => "#B22222",
		"Dark Red" 		 => "#8B0000",
		
		
		"Pink" 			 => "#FFC0CB",

	
		"Pale Violet Red" 	 => "#DB7093",
		
		
		"Light Salmon" 		 => "#FFA07A",
		"Coral" 		 => "#FF7F50",
	
		"Orange" 		 => "#FFA500",
		
	
		"Gold" 			 => "#FFD700",
	

	
		"Dark Khaki" 		 => "#BDB76B",
				
		
		"Lavender" 		 => "#E6E6FA",
		"Thistle" 		 => "#D8BFD8",
	
		"Fuchsia" 		 => "#FF00FF",
	
		"Dark Magenta" 		 => "#8B008B",
	
		"Dark Slate Blue" 	 => "#483D8B",
		
	
		"Green Yellow" 		 => "#ADFF2F",
		"Chartreuse" 		 => "#7FFF00",
		"Dark Cyan" 		 => "#008B8B",
		"Teal" 			 => "#008080",
		

		"Aqua" 			 => "#00FFFF",
		"Cyan" 			 => "#00FFFF",
		
		"Aquamarine" 		 => "#7FFFD4",

		"Navy" 			 => "#000080",
		"Midnight Blue" 	 => "#191970",
				
	
		"Cornsilk" 		 => "#FFF8DC",

			"Tan" 			 => "#D2B48C",
		
		"Goldenrod" 		 => "#DAA520",
		"Dark Goldenrod" 	 => "#B8860B",
		"Peru" 			 => "#CD853F",
		"Saddle Brown" 		 => "#8B4513",
	
		"Maroon" 		 => "#800000",
				
		
	
	
	
	
	

	
	
	
		"Slate Gray"		 => "#708090",
		"Dark Slate Gray"	 => "#2F4F4F",
	
		);
?>
</pre>
<pre>
    <?php
    $eight = array(
    0004, 
0013, 
0022, 
0031, 
0040, 
0103, 
0112, 
0121, 
0130, 
0202, 
0211, 
0220, 
0301, 
0310, 
0400, 
1003, 
1012, 
1021, 
1030, 
1102, 
1120, 
1201, 
1210, 
1300, 
2002, 
2011, 
2020, 
2101, 
2110, 
2200, 
3001, 
3010, 
3100, 
4000, 
);
    ?>
</pre>
    <pre>
      <?php
      echo"<br>\n";
for($i=0;$i<$rep;$i++){
    echo "<div class='line'>";
god($eight,$colors,$size);
  echo "</div>";
  if($space == true){
      echo "<br>\n";
  }

}
//displayNonAsc($eight);
//Leveling Comparison

?>  
    </pre>
<pre>
    <?php
function god($eight,$colors,$size){
$basic = array();
$basic[0] = 1111;
for($i=0;$i<$size;$i++){
    $rn = rand(0,33);
    $basic[]=$eight[$rn];
}
$basic[] = 0000;
$properties = assigncolors($eight,$colors);

$fer = BasicComp($basic,$properties);
PARSEsumate($fer);
//echo count($colors);
}


?>
<?php
function displayNonAsc($array){
    foreach($array as $e){
        echo "<div>$e</div><br>\n";
    }
}
function BasicComp($array,$array1){
    $a = '';
    $new = array();
    foreach($array as $e){
    $a = $e;
    //echo "--$a <br>";
    foreach($array1 as $i => $e){
        //echo "$i $e <br>";
        if($i == $a){
            
            $new[] = $e;
        }
    }
    }
    return $new;
}
function PARSEsumate($array){
    foreach($array as $e){
    echo "<canvas class='part' style='background-color:$e;'></canvas>";
}

}
function assigncolors($example,$colors){
 $fig = 0;
 $arrayblank = array();
foreach($colors as $e){
    $arrayblank[$example[$fig]]=$e;
    $fig++;
}
$arrayblank[1111]='white';
$arrayblank[0000]='black';
return $arrayblank;
}
?>
</pre>

</body>
</html>










