<?php
include "modlib.php";
if(isPost() == true){
    
}
printDoctype();
startDoc();
startHead();
makeTitle('Search');
addCSSLink('formcss1.css');
endHead();
startBody();
startDiv('class','form');
startForm('post',"exit.php");
echo "<label id='logheader'style='font-size:30px;'>Taehros</label><br><br>";
textArea('Parse <br>', 'script', 3, 0,null);

//dropDown ('Engine ', 'site', array('Google', 'Bing', 'Yahoo','MSN'), 'Google');
makeSubmit('Commit', 'commit');
//system initiate stable variable domain moonmilk.php
//

endForm();
endDiv();
endBody();
endDoc();
?>