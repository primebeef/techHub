<?php
include_once "dirx_user.php";
function verifyLogin($user,$pass){
    if(isset($_SERVER['PHP_AUTH_USER'])!=true){
    header('WWW-Authenticate: Basic realm="Tech 30"');
    header('HTTP/1.0 401 Unauthorized');
    echo ("<script> alert('Unauthorized'); </script>");
    die;
}
else{
    if(($_SERVER['PHP_AUTH_USER'] == $user)&&($_SERVER['PHP_AUTH_PW'] == $pass)){
        return true;
    }
    else{
        header('WWW-Authenticate: Basic realm="Tech 30"');
        header('HTTP/1.0 401 Unauthorized');
        echo ("<script> alert('Credentials Unqualified'); </script>");
        die("$user $pass");
    }
     
}
}
function verifyLogin_v2($pass='Tester'){
    if(isset($_SERVER['PHP_AUTH_PW'])!=true){
    header('WWW-Authenticate: Basic realm="Tech 30"');
    header('HTTP/1.0 401 Unauthorized');
    echo ("<script> alert('Unauthorized'); </script>");
    die;
}
else{
    if(($_SERVER['PHP_AUTH_PW']==$pass)){
        return true;
    }
    else{
        header('WWW-Authenticate: Basic realm="Tech 30"');
        header('HTTP/1.0 401 Unauthorized');
        echo ("<script> alert('Credentials Unqualified'); </script>");
        die;
    }
     
}
}

function setSession ($key, $value) {
   $_SESSION[$key]=$value;
}
function getSession ($key, $def=null) {
	$ret = isset($_SESSION[$key])?$_SESSION[$key]:$def;
	return $ret;
}
function OS($key){
    global $default;
    $stage = isset($_SESSION[$key])?$_SESSION[$key]:$default[$key];
    echo $stage;
}
function delSession($key){
    unset($_SESSION[$key]);
}
function restartSession($key){
    $_SESSION = array();
}
function startForm($method,$action){
    echo "<form action='$action' method='$method'>\n";
}
function textInput($label,$name,$size,$maxLength,$prefill ){
    //'Username: ', 'user', 50, 15, 'Your username'
    echo "<label>$label</label><input type='text' name='$name' minlength='$size' maxlength='$maxLength' value='$prefill' autocomplete='off'><br>\n";
}
function passInput($label,$name){
    //'Password: ', 'user', 50, 15, 'Your username'
    echo "<label>$label</label><input type='password' name='$name' autocomplete='off'><br>\n";
}
function slideInput($label,$name,$size,$maxLength,$prefill){
    echo "<label>$label</label><input type='range' name='$name' value='$prefill'><br>\n";
}
function textArea($label,$name,$prefill){
    //textArea ('Describe Yourself: ', 'description', 5, 60, 'Enter text'); 
    echo "<textarea name='$name'></textarea>\n";
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
function isPost(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        return true;
    }
    else{
        return false;
    }
}
function getValue($key, $def = false){
    $value = isset($_REQUEST[$key])?$_REQUEST[$key]:$def;
    return $value;
}
function userDirx($user,$pass){
        global $DIRx_USER;
    if(array_key_exists($user,$DIRx_USER)){
            if($DIRx_USER[$user]['pass'] == $pass){
                return true;
            }
            else{
                return false;
            }
        
    }
    else{
        return false;
    }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function compile($errors){
    $new = array();
    foreach($errors as $i){
        $new[$i] = "";
        foreach($i as $e){
            $new[$i]=$new[$i].$e."<br>";
        }
    }
    return $new;
}
/*function present_rooms($user){
    $array = $DIRx_USER[$user]['chatrooms'];
    $keys = array_keys($DIRx_USER[$user]['chatrooms']);
    foreach($ as $e){
        echo
    }
}
*/
?>