<?php include_once "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php

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
$sim = EXPL("As I walk through the shadow of the valley of death, I take a look at my life and realize there is nothing left."," ");
foreach($sim as $i=>$e){
        $e = strtoupper($e);
        $e = trim($e);
    }
sim_drop($sim);

function sim_drop($array_piece){
    echo"<pre>";
    foreach($array_piece as $i=>$e){
        if($i < 10){
            $i1 = "0$i";
        }
        else{
            $i1 = $i;
        }
        if(is_array($e) == true){
        foreach($e as $f){
            sim_drop($f);
        }
        }
        echo "['$i1'] => $e <br>";
    }
    echo "</pre>";
}

function PV($array){
    include_once "../Library/Words.php";
  foreach($array as $i=>$e){
    if(array_key_exists($W[$i]) == true){
        $X[] = $W[$i]['value'];
        //$c = $W[$i]['count'];
        //Either a # or stable.
        //$s = $W[$i]['sumate']; 
        //Collection of all returned values made.
        
    }

  }  
}
?>
<script></script>
</body>
</html>