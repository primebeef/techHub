<?php include "../Library/Tech30Lib.php";
if(isPost() == true){
    $web = getValue('site');
    $src= getValue('src');
    switch($web){
        case 'Google':
            $go = "http://www.google.com/search?q=";
            break;
        case 'Bing':
            $go = "http://www.bing.com/search?q=";
            break;
        case 'Yahoo':
            $go = "http://www.ask.com/web?q=";
            break;
        case 'MSN':
            $go = "http://search.yahoo.com/search?p=";
            break;
    }
    header("Location: $go$src");
}
?>
<?php
printDoctype();
startDoc();
startHead();
makeTitle('Search');
addCSSLink('../Library/formcss.css');
endHead();
startBody();
startDiv('class','form');
startForm('post',$_SERVER['PHP_SELF']);
echo "<label id='logheader'style='font-size:30px;'>Login</label><br><br>";
textInput('Search ', 'src', 50, 1000,'');


dropDown ('Engine ', 'site', array('Google', 'Bing', 'Yahoo','MSN'), 'Google');
makeSubmit('Search', 'login');

endForm();
endDiv();
endBody();
endDoc();
?>
