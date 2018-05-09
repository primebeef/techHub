<?php
$brick = isset($_POST['full'])?$_POST['full']:null;
//
if($brick == null) die;
else{
$type = isset($_POST['lang'])?$_POST['lang']:null;    

if($type == null){
   $fix =  strpos('//',$brick);
    echo $fix;
    //else{die;}
}
else{
    switch($type){
        case 'MTH':
            
            break;
            
        default:
            
            break;
            
    }
}
}
?>