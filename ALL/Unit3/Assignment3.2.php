<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<?php
startDoc();
startHead();
makeTitle('Hotdog');
addCSSLink('../Library/formcss.css');
endHead();
startBody();
startDiv('class','form');
startForm('post','Handler3.2.php');
echo "<label id='logheader' style='font-size:30px;'>Sign-Up</label><br><br>";
textInput('Username ', 'user', 50, 10,getValue('user',''));
textInput('Email ', 'email', 50, 10,getValue('email',''));
passInput('Password ', 'pass', 50, 15, null);
textInput('Student ID ', 'idn', 50, 6,null);
radioGroup('Grade ', 'grade', array ('9', '10', '11', '12'),'9',true);
checkBox('I agree to allow my email to be used for survey data.','terms',true,null);
makeSubmit('Submit', 'login');
makeReset();
endForm();
endDiv();
endBody();
endDoc();
?>