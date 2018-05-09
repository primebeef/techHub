<?php
 
// get Tech Library functions
include '../Library/Tech30Lib.php';
 
// print doctype
printDocType();
 
// start document
startDoc ();
 
// generate <head> element
startHead ();
makeTitle ('My Page');
addCSSLink ('../Library/Tech30.css');
endHead ();
 
// generate <body>
startBody();
 
// create a form
startForm('get', 'processForm.php');
textInput ('Username: ', 'user', 50, 15, 'Your username');
passInput ('Password: ', 'pass', 50, 15, null);
textArea ('Describe Yourself: ', 'description', 5, 60, 'Enter text');
radioGroup ('What grade are you in: ', 'grade', array ('9th', '10th', '11th', '12th'), '10th');
prnt ('What pets do you own: ');
checkBox ('Dog', 'dog', 'dog', false);
checkBox ('Cat', 'cat', 'cat', false);
checkBox ('Bird', 'bird', 'bird', 'bird');
checkBox ('Other', 'other', 'other', false);
dropDown ('Favorite Car Brand: ', 'car', array('Ford', 'Chevy', 'Dodge'), 'Chevy');
makeSubmit ('Enter', 'submit');
makeReset ();
endForm();
 
// close body
endBody();
 
// close document
endDoc ();
?>
