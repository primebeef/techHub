<?php include "../Library/Tech30Lib.php"; printDoctype();include "functfc.php";?>
<?php
startDoc();
startHead();
makeTitle('Family Czar');
addCSSLink('../Library/formcss.css');
endHead();
startBody();
startDiv('class','form');
if(isPost() === false){
startForm('post',$_SERVER['PHP_SELF']);
echo "<label id='logheader' style='font-size:30px;'>Sign-Up</label><br><br>";
textInput('Email ', 'email', 50, 30,getValue('email',null));
passInput('Password ', 'pass', 50, 15, null);
textInput('Personal ID ', 'idn', 50, 6,null);
checkBox('I agree to allow my email to be used for survey data.','terms',true,null);
makeSubmit('Submit', 'login');
makeReset();
endForm();
}
if(isPost() === true){
    $mark = locateAT(getValue('email',null));
  //echo $mark;
    if(is_array($mark) == false){
      $mark = CHARS($mark);
    if($mark === true){
        echo 'Complete!';
        makeSubmit('GO!','myhome');
    }
    else{
       startForm('post',$_SERVER['PHP_SELF']);
echo "<label id='logheader' style='font-size:30px;'>Sign-Up</label><br><br>";
displayError($mark);
textInput('Email ', 'email', 50, 10,getValue('email',''));
passInput('Password ', 'pass', 50, 15, null);
textInput('Personal ID ', 'idn', 50, 6,null);
checkBox('I agree to allow my email to be used for survey data.','terms',true,null);
makeSubmit('Submit', 'login');
makeReset();
endForm();  
    }
    }
    else{
startForm('post',$_SERVER['PHP_SELF']);
echo "<label id='logheader' style='font-size:30px;'>Sign-Up</label><br><br>";
displayError($mark);
textInput('Email ', 'email', 50, 10,getValue('email',''));
passInput('Password ', 'pass', 50, 15, null);
textInput('Personal ID ', 'idn', 50, 6,null);
checkBox('I agree to allow my email to be used for survey data.','terms',true,null);
makeSubmit('Submit', 'login');
makeReset();
endForm(); 
}
}
endDiv();
endBody();
endDoc();
?>