<?php
function run($type,$sub,$array){
    switch($type){
    case "color":
        inColor($sub,$array);
        break;
    
}
}
function inColor($color,$piece){
    $max = count($piece);
        foreach($piece as $i=>$e){
            echo $e;
            if(substr($e,-1)=="'"){
                $last = $i;
                echo "yes";
            }
        }
        if((substr($piece[2],0,1)=="'")&&(substr($piece[$last],-1)=="'")){
            $piece[2]=trim($piece[2],"'");
            $piece[$last]=trim($piece[$last],"'");
            
            echo "fine";
            echo "<p style='color:$color;'>";
            for($i=2;$i<=$last;$i++){
                echo $piece[$i]." ";
            }
            echo "</p>";
        }
}
$type = null;
$sub = null;
switch($piece[1]){
    case "inBlue":
        $type = "color";
        $sub = "blue";
       
        
break;
    case "inGreen":
        $type = "color";
        $sub = "green";
        
        
break;

}
run($type,$sub,$piece);

?>