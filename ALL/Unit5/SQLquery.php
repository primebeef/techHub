<?php include "../Library/Tech30Lib.php"; 
if(isPost() == true){
    $name = getValue('name');
    $link = MYSQLConnect();
    $query = getValue('sql');
    $result = MYSQLQuery($link, $query);
    MYSQLClose($link);
    foreach ($result as $row) {
	var_dump ($row);
}


}
printDoctype();
startDoc();
startHead();
makeTitle('Query');
addCSSLink('../Library/formcss.css');
endHead();
startBody();
startDiv('class','form');
startForm('post',$_SERVER['PHP_SELF']);
echo "<label id='logheader' style='font-size:30px;'>SQL</label><br><br>";
textInput('Query ', 'sql', 50, null,getValue('sql',''));
//checkBox('I agree to allow my email to be used for survey data.','terms',true,null);
makeSubmit('Enter', 'login');
endForm();
endDiv();
endBody();
endDoc();
?>