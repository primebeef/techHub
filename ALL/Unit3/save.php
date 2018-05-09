<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title>Scooby-dooby</title>
</head>
<body>
<?php
addCSSLink('../Library/formcss.css');
endHead();
startBody();
startDiv('class','form');
startForm('post','ack.php');
echo "<label id='logheader'style='font-size:30px;'>Movie</label><br>";
textInput('', 'un', 50, null,'');
radioGroup('Quality: ', 'quality', array ('1', '2', '3', '4','5'), '3',true);
echo "<br>";
radioGroup('Rating: ', 'safety', array ('G', 'PG', 'PG-13', 'TV-14','R'),'PG',true);
makeSubmit('Submit', 'login');
makeReset();
endForm();
endDiv();
?>
</body>
</html>