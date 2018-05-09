<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
if(isPost() === false){
    echo "Welcome!<br> <br>";
startForm('post', $_SERVER['PHP_SELF']);
radioGroup ('Who\'s the primest of them all?', 'prime', array ('Mak-the-Black <br>', 'LJ Big Boi <br>', 'JeffieCheffie<br>', 'FloweryFlorian<br>'), 'JeffieCheffie<br>');
makeSubmit ('Enter', 'submit');
endForm();
}
if(isPost() === true){
if(getValue('prime',null)==='Mak-the-Black <br>'){
    echo 'Great Job, You Choose Correctly!';
}
else{
    echo ' You succ.<br> <br>';
   startForm('post', $_SERVER['PHP_SELF']);
radioGroup ('Who\'s the primest of them all?', 'prime', array ('Mak-the-Black <br>', 'LJ Big Boi <br>', 'JeffieCheffie<br>', 'FloweryFlorian<br>'), 'JeffieCheffie<br>');
makeSubmit ('Enter', 'submit');
endForm(); 
}
}
?>
<script></script>
</body>
</html>