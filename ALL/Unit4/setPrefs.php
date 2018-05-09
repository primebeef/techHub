<?php include "../Library/Tech30Lib.php"; 
if(isPost()==true){
    $v1 = getValue('Fname');
    $v2 = getValue('Fback');
    $v3 = getValue('Ftext');
    setcookie('name', $v1, time() + 60*2);
    setcookie('back', $v2, time() + 60*2);
    setcookie('text', $v3, time() + 60*2);
}
printDoctype();
startDoc();
startHead();
makeTitle('LICKITY');
addCSSLink('../Library/formcss.css');
endHead();
startBody();
startDiv('class','form');

startForm('post','setPrefs.php');
echo "<label id='logheader'style='font-size:30px;'>Set Prefs</label><br><br>";
textInput('Name ','Fname', 50, 15,getValue('Fname',null));
textInput('Background ','Fback', 50, 15, getValue('Fback',null));
textInput('Text Color ','Ftext', 50, 15, getValue('Ftext',null));
makeSubmit('Submit', 'login');
makeReset();
endForm();    


endDiv();
endBody();
endDoc();
?>
