<?php
switch($piece[1]){
    
    case "newfile":
        $max = count($piece[2]);
        if(substr($piece[2],0,1)=="'"){
        if(substr($piece[2],-1)=="'"){
            $piece[2]=trim($piece[2],"'");
            echo $piece[2];
            $file = fopen($piece[2],"a+") or die("CANNOT GENERATE FILE");
            if(isset($piece[3])==true){
                $x = 0;
              foreach($piece as $i){
                    if($x > 2){
                        fwrite($file, $i." ");
                    }
                    $x++;
              }
            }
        fclose($file);
        
        }    
        }
        
        
        break;
}
?>