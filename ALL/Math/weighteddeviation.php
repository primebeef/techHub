<?php
$maxim = array();
function deviation($numeric){
    global $maxim;
    $ab = explode(":",$numeric);
        $x = str_split($ab[0]);
        $y = str_split($ab[1]);
        echo "$numeric --> ".$x[0]." ".$x[1]." ".$y[0]." ".$y[1];
        $maxim[0]=$x[0];
        $maxim[1]=$x[1];
        $maxim[2]=$y[0];
        $maxim[3]=$y[1];
}

function go(){
    echo "<br>";
    global $maxim;
        $a = pow(pow($maxim[0],2),4);
        echo $a;
        echo "  ";
        $b = pow(pow($maxim[1],3),4);
        echo $b;
        echo "  ";
        $x = pow(pow($maxim[2],2),6);
        echo $x;
        echo "  ";
        $y = pow(pow($maxim[3],3),6);
        echo $y;
        echo "  ";
}
function go2(){
    echo "<br>";
    global $maxim;
        $a =pow($maxim[0],2);
        //echo $a;
       // echo "  ";
        $b = pow($maxim[1],3);
        //echo $b;
        //echo "  ";
        $ab = $a + $b;
        $ab = pow($ab,4);
        
        
        $x = pow($maxim[2],2);
        //echo $x;
        //echo "  ";
        $y = pow($maxim[3],3);
       // echo $y;
       // echo "  ";
        $xy = $x + $y;
        $xy = pow($xy,6);
        
        echo "$ab --- $xy";
}
deviation("20:02");
go();
go2();
?>
