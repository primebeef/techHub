<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<?php
startDoc();
startHead();
makeTitle('Hotdog');
addCSSLink('../Library/formcss.css');
endHead();
startBody();
startDiv('class','form');
startForm('post','verifyLogin.php');
echo "<label id='logheader'style='font-size:30px;'>Login</label><br><br>";
textInput('Username: ', 'un', 50, 15,'');
passInput('Password: ','pw1', 50, 15, null);
passInput('Retype Password: ','pw2', 50, 15, null);

makeSubmit('Submit', 'login');
makeReset();
endForm();
endDiv();
endBody();
endDoc();
?>
