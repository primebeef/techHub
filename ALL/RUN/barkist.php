<?php
function PARSIER($file,$pre){
    $split = explode("//",$file);
    foreach($split as $e){
        $piece = explode(" ",$e);
        tree($piece,$pre);
    }
}

function tree($array,$pre){
    $array2 = $array;
    $array = null;
    foreach($array2 as $e){
        $array[]=trim($e);
    }
    switch($array[0]){
       case "filecommit":
                run_lib_file($array,$pre);
                 //filecommit newfile mirrors.txt
               // echo "HELLO";
                break;
            
            case "show":
                run_lib_show($array,$pre);
                //show inBlue "My name is Rex TILLERSON!"
                // //show inBold&&inAzure&&outRight 'Mona Lisa' //show inBold&&inPink 'Mona Lisa '//filecommit newfile 'hello-maxim1.html' //filecommit load startHTML hello-maxim1.html Hot-Shot mycss.css
                break;
                
            case "system":
                run_lib_system($array,$pre);
                //system initiate stable variable domain maximaille.html
                break;
        case "compute":
                run_lib_comp($array);
                
                break;
    }
}
include_once "barkist-funct.php"; 

?>