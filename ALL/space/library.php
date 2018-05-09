<?php
session_start();
//Gets absolute value.

//Checks for key in URL.
function getValue($key, $def = false){
    $value = isset($_REQUEST[$key])?$_REQUEST[$key]:$def;
    return $value;
}

// Accepts URL search string keys   

function printDoctype(){
    echo("<!DOCTYPE html>\n");
}

// opening html tag.
function startDoc(){
    echo "<html>\n";
}
// opening head tag.
function startHead(){
    echo "<head>\n";
}
//generates title.
function makeTitle($title){
    echo "<title>$title</title>\n";
}
//External css link.
function addCSSLink($file){
    echo "<link rel='stylesheet' type='text/css' href='$file'>\n";
}
//Final head tag.
function endHead(){
    echo "</head>\n";
}
// opening bdy tag.
function startBody(){
    echo "<body>\n";
}
function startForm($method,$action){
    echo "<form action='$action' method='$method'>\n";
}
function textInput($label,$name,$size,$maxLength,$prefill){
    //'Username: ', 'user', 50, 15, 'Your username'
    echo "<label>$label</label><input type='text' name='$name' size='$size' maxlength='$maxLength' value='$prefill'><br>\n";
}
function passInput($label,$name,$size,$maxLength,$prefill){
    //'Password: ', 'user', 50, 15, 'Your username'
    echo "<label>$label</label><input type='password' name='$name' size='$size' maxlength='$maxLength' value='$prefill'><br>\n";
}
function slideInput($label,$name,$size,$maxLength,$prefill){
    echo "<label>$label</label><input type='range' name='$name' value='$prefill'><br>\n";
}
function textArea($label,$name,$rows,$cols,$prefill){
    //textArea ('Describe Yourself: ', 'description', 5, 60, 'Enter text'); 
    echo " <br><label>$label</label><br>\n <textarea name='$name' rows='$rows' cols='$cols' width='100%;'>$prefill</textarea><br>\n";
}
// Echoes radio group
function radioGroup($label, $name, $valueArr, $preCheck,$break = null) {
    //radioGroup ('What grade are you in: ', 'grade', array ('9th', '10th', '11th', '12th'), '10th'); 
    
    echo "<label>$label</label><br>\n";
    foreach($valueArr as $e){
      if($break != null){
            if($preCheck == $e){
        echo " <input type='radio' name='$name' value='$e' checked='checked'>$e \n"; 
        }
        else{
        echo " <input type='radio' name='$name' value='$e'>$e \n";
        }
      }
      else{
            if($preCheck == $e){
        echo " <input type='radio' name='$name' value='$e' checked='checked'>$e \n"; 
        }
        else{
        echo " <input type='radio' name='$name' value='$e'>$e \n";
        }
      }
    }
    echo "<br>";
}
// And checked!
function checkBox($label, $name, $value, $preCheck){
    //checkBox ('Bird', 'bird', 'bird', 'bird');
   //<input type="checkbox" name="bird" value="bird" checked="checked">Bird<br>
        if($preCheck == true){
        echo "<label>$label</label><input type='checkbox' name='$name' value='$value'><br>\n"; 
        }
        else{
        echo "<label>$label</label><input type='checkbox' name='$name' value='$value'><br>\n"; 
        }
}
//Rain drop, drop top.
function dropDown($label, $name, $valueArr, $preSelect){
       // dropDown ('Favorite Car Brand: ', 'car', array('Ford', 'Chevy', 'Dodge'), 'Chevy');
        echo "$label <br>";
        echo "<select name='$name'>\n";
    foreach($valueArr as $e){
       if($e == $preSelect){
            echo "<option value='$e' selected='selected'>$e</option>\n";
       }
       else{
            echo "<option value='$e'>$e</option>\n";
       }
    }
        echo "</select><br>\n";
}
// Prints text
function prnt($text) {
    echo $text."<br>";
}
//rest button
function makeReset() {
    echo "<input type='reset'>\n";
} 
//Submit!
function makeSubmit ($label, $name){
    echo "<input type='submit' name='$name' value='$label'>\n";
}
//My final form...
function endForm(){
    echo "</form>";
}
//My toes.
function endBody(){
    echo "</body>";
}
//How many words can a word-file file?
function endDoc(){
    echo "</html>";
}
function isPost(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        return true;
    }
    else{
        return false;
    }
}
function startDiv($type=null,$name){
   if($type == null){
        echo "<div>\n";
   }
   else if($type == 'id'){
        echo "<div id='$name'>\n";
   }
   else if($type == 'class'){
        echo "<div class='$name'>\n";
   }
}
function endDiv(){
        echo "</div>\n";
}

function getcookie($name, $default=null){
    return getValue($name,$default);
}
function clearcookie($name){
    setcookie($name,false,1);
}
function startTable(){
    echo "<table>";
}
function endTable(){
    echo "</table>";
}
function setSession ($key, $value) {
   $_SESSION[$key]=$value;
}
function getSession ($key, $def=null) {
	$ret = isset($_SESSION[$key])?$_SESSION[$key]:$def;
	return $ret;
}
function delSession($key){
    unset($_SESSION[$key]);
}
function restartSession($key){
    $_SESSION = array();
}
?>