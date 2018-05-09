<?php
include "../Library/Tech30Lib.php";
startDoc();
startHead();
makeTitle('Convert between Fahrenheit and Celsius');
addCSSLink('basicform-css.css');
endHead();
startBody();
if(isPost() === false){
    prnt("<div class='form'>");
startForm('post', $_SERVER['PHP_SELF']);
prnt("<h1 id='logheader'>Degrees</h1>");
textInput('Celsius ', 'cel', 50, null, getValue('cel',null));
makeSubmit ('To Fahrenheit', 'submit');
endForm();

startForm('post', $_SERVER['PHP_SELF']);
textInput('Fahrenheit ', 'fah', 50, null, getValue('fah',null));
makeSubmit ('To Celsius', 'submit1');
endForm();
prnt("<div>");
}
if(isPost() === true){
   
    $cel = getValue('cel',null); 
    $sub = getValue('submit',null);
  

    $sub1 = getValue('submit1',null);
     
    $fah = getValue('fah',null); 
  
if($sub != null){
    $fah = null;
    if(is_numeric($cel)==true){
        if($cel > -273.15 && $cel < INF){
            $fah = ($cel*1.8 + 32);
        }
        else{
            prnt("<div class='form'>"); 
        displayError(numberError($cel,-273.15, INF,true));    
        prnt("<div>");
        }
    }
    else{
        displayError(numberError($cel,null,null));
    }
    
}   
else if($sub1 != null){
    $cel = null;
    if(is_numeric($fah)==true){
        if($fah >  -459.6 && $fah < INF){
            $cel = (($fah - 32)/1.8);
        }
        else{
        prnt("<div class='form'>");     
        displayError(numberError($fah,-459.6, INF,true));  
        prnt("<div>");
        }
    }
    else{
        displayError(numberError($fah,null,null));
    } 
}
  
prnt("<div class='form'>");
startForm('post', $_SERVER['PHP_SELF']);
prnt("<h1 id='logheader'>Degrees</h1>");
textInput('Celsius ', 'cel', 50, 15, $cel);
makeSubmit ('To Fahrenheit', 'submit');
endForm();

startForm('post', $_SERVER['PHP_SELF']);
textInput('Fahrenheit ', 'fah', 50, 15, $fah);
makeSubmit ('To Celsius', 'submit1');
endForm();
prnt("<div>");
}
endBody();
endDoc();
?>