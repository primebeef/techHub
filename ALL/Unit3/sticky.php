<?php
include '../Library/Tech30Lib.php';
printDocType();

startHead ();
makeTitle ('sticky');
endHead ();

startBody();
echo '<pre>';
if(isPost() === false) echo "Welcome to Westworld, tell me what you'd like.";
else {
    echo "thanks bby";
    $var = numberError(getValue('num'), 0, 10);
   
    echo displayError($var);
}

startForm ('post', $_SERVER['PHP_SELF']);
textInput ('How Intense: ', 'num', 50, 10, getValue('text'));
makeSubmit ('Click Me', 'clickme');
endForm ();

endBody();
endDoc ();
?>