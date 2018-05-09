<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<?php
startDoc();
startHead();
makeTitle('Hotdog');
addCSSLink('../Library/formcss.css');
endHead();
startBody();
startDiv('class','form');
if(isPost() == false){

startForm('post','soupin.php');
echo "<label id='logheader'style='font-size:30px;'>Parser 1.0</label><br><br>";
textArea('Editor', 'full', null,65,null);
makeSubmit('Send', 'login');    
endForm();
endDiv();
}
if(isPost() == true){
    $text = getValue('full',null);
startForm('post','soupin.php');
echo "<label id='logheader'style='font-size:30px;'>Parser 1.0</label><br><br>";
textArea('Editor', 'full', null,65,$text);
makeSubmit('Send', 'login');    
endForm();
endDiv();
include "funct-lib.php";
$brick = isset($_POST['full'])?$_POST['full']:null;
//
if($brick == null) die;
else{
$type = isset($_POST['lang'])?$_POST['lang']:null;    

//if($type == null){
   $fix =  strcspn($brick,'//');
   // Data Type
   $DTY = substr($brick,$fix,5);
    //echo $DTY;
    //else{die;}
//}
//else{
    switch($DTY){
        case '//MTH':
            echo "GENERATING MATH LIBRARY...";
                    include "../Library/DTY-MATH.php";
            break;
            
        default:
            
            break;
            
    }
}
}

//}



endBody();
endDoc();
?>