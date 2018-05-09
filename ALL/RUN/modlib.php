<?php
session_start();
//Gets absolute value.
function absVal($numeral){
     if(($numeral == false))return false;
   
   if($numeral < 0){ 
       return -1 * $numeral;
   }
   else{
       return $numeral;
}
}
//Checks for key in URL.
function getValue($key, $def = false){
    $value = isset($_REQUEST[$key])?$_REQUEST[$key]:$def;
    return $value;
}
function makes10($a,$b){
    if((is_numeric($a)==false)||(is_numeric($b)== false))die("Those are non-numeric");
    if(($a + $b)==10){
        return true;
    }
    if($a == 10 || $b == 10){
        return true;
    }
    else{
        return false;
    }
}
function nearHundred($n){
    if((is_numeric($n)==true)){
        if((90 >= $n)|($n <= 110)){
            return true;  
        }
        if((190 >= $n)|($n <= 210)){
            return true;  
        }
        else{
            return false;
        }
        
    }
}
function posNeg($a,$b,$negative)   {
    if($negative == true && $a < 0 && $b < 0)   {
        return true;
    }
    elseif(($negative == false && $a < 0 && $b > 0) || ($negative == false && $a > 0 && $b < 0))    {
        return true;
    }
    else return false;
}
function notString($str){
    $str = trim($str);
    $local = strcspn($str,' ');
    $local = substr($str,0,$local);
    if($local == 'not'){
        return $str;
    }
    else{
        $str = ('not'.' '.$str);
        return $str;
    }
}
function missingChar($str, $n)  {
    if(strlen($str) < $n)   {
        return false;
    }
    else {
        $first = substr($str, 0, $n + 1);
        $second = substr($str, $n + 1);
        $removed = substr($first, 0, (strlen($first) - 1));
        return $removed.$second;
    }
}
// Accepts URL search string keys   

function frontBack($str)    {
    $middle = substr($str, 1, strlen($str) - 1);
    $first = substr($str, 0, 1);
    $last = substr($str, strlen($str) - 2);
    return $last.$middle.$first;
}
// Checks if things are good.
function inOrder($x, $y, $z){
    $true = is_numeric($x);
        if($true == true ){
    $true = is_numeric($y); 
        if($true == true ){
    $true = is_numeric($x); 
    }
    else{ return false;}
        if($true == true ){
    $true = is_numeric($x);
        if($true == true){
            if ( $x <= $y && $y <= $z){
    return true;
    }
    else{return false;}
    }
    else{return false;}
    } 
    else{return false;}
    }
    else{return false;}
    
}
function printDoctype(){
    echo("<!DOCTYPE html>\n");
}
function testmybeef($dir) {
    if (is_dir($dir) == true) {
        $path = realpath($dir);
        echo("<b>Path Key:</b> [$path] <br>");
        $handle = opendir($dir);
        $filename = readdir($handle);
        $numero = 0;
        while ($filename != false) {
            if ($filename != '..' && $filename != '.') {
$filen = $dir.'/'.$filename;
         
            if (is_dir($dir.'/'.$filename) == true) {
                $filename = "<b>".$filename.'/'."</b>";
               
            }
                $numero = $numero + 1;
                echo '['.$numero.'] '."<a href='$filen' target= 'blank_'>$filename</a>"."<br>";
            }
        
            $filename = readdir($handle);
        }
        closedir($handle);
        echo 'File Count: '.$numero;
    }
    else {
        die("No valid data input.");
    }
}
function tonybologna($dir) {
    if (is_dir($dir) == true) {
        $path = realpath($dir);
        echo("<b>Path Key:</b> [$path] <br>");
        $files = scandir($dir);
        $i = 1;
        foreach($files as $e){
            if ($e != '..' && $e != '.') {
            echo "[$i] ".$e."<br>";
            $i++;
            }
            else{}
        }
    }
    else{
        return false;
    }
}
function getImageNames($filename,$type=null){
    $ret = array();
    $files = scandir($filename);
    $i = 0;
    $long = strlen($type);
    
    foreach($files as $e){
        if($e != '.' && $e != '..'){
            if($type != null){
            $zip = substr($e,-$long);
            if($zip == $type){
            $ret[$i] = $e;
            $i++;
            }
        }
        else{
          $ret[$i] = $e;
            $i++;  
        }
        }
    }
    return $ret;
}
function pickRandom($array){
    $size = count($array);
    if($size == 0){
        return false;
    }
    else{
        $rand = rand(0,($size - 1));
        $file = $array[$rand];
        return $file;
    }
}
function mitromney($dir){
    if (is_dir($dir) == true) {
        $handle = opendir($dir);
        $filename = readdir($handle);
        $numero = 0;
        while ($filename != false) {
            if ($filename != '..' && $filename != '.') {
$filen = $dir.'/'.$filename;
         
            if (is_dir($dir.'/'.$filename) == true) {
                $filename = "<b>".$filename."</b>";
               
                $numero = $numero + 1;
                echo " <div class='direct' ><a href='$filen' target= 'blank_'>$filename</a> </div>";
            }
            }
            $filename = readdir($handle);
        }
        closedir($handle);
    }
    else {
        die("No valid data input.");
    }
}
function rushlimbaugh($dir){
    if (is_dir($dir) == true) {
        $handle = opendir($dir);
        $filename = readdir($handle);
        $numero = 0;
        while ($filename != false) {
            if ($filename != '..' && $filename != '.') {
$filen = $dir.'/'.$filename;
         
            if (is_dir($dir.'/'.$filename) == true) {
                $filename1 = "<b>".$filename."</b>";
               
                $numero = $numero + 1;
                echo " <input type='submit' class='buttonfit' value='$filename' name='folder'>";
            }
            }
            $filename = readdir($handle);
        }
        closedir($handle);
    }
    else {
        die("No valid data input.");
    }
}
function newtgingrich($dir,$name){
    if (is_dir($dir) == true) {
    $handle = opendir($dir);
    $filename = readdir($handle);
    $numero = 0;
    while ($filename != false) {
        if ($filename != '..' && $filename != '.') {
$filen = $dir.'/'.$filename;
     
        if (is_dir($dir.'/'.$filename) != true) {
            $filename1 = "<b>".$filename."</b>";
           
            $numero = $numero + 1;
            echo " <input type='submit' class='buttonfit' value='$filename' name='$name'>";
        }
        }
        $filename = readdir($handle);
    }
    closedir($handle);
   
}

else {
    die("No valid data input.");
}
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
function textInput($label,$name,$size,$maxLength,$prefill, $placeholder){
    //'Username: ', 'user', 50, 15, 'Your username'
    echo "<label>$label</label><input type='text' name='$name' size='$size' maxlength='$maxLength' value='$prefill' placeholder='$placeholder'><br>\n";
}
function passInput($label,$name,$size,$maxLength,$prefill){
    //'Password: ', 'user', 50, 15, 'Your username'
    echo "<label>$label</label><input type='password' name='$name' size='$size' maxlength='$maxLength' value='$prefill'><br>\n";
}
function slideInput($label,$name,$size,$maxLength,$prefill){
    echo "<label>$label</label><input type='range' name='$name' value='$prefill'><br>\n";
}
function textArea($label,$name,$rows,$cols,$prefill,$placeholder = null){
    //textArea ('Describe Yourself: ', 'description', 5, 60, 'Enter text'); 
    echo "<label>$label</label><br>\n <textarea name='$name' rows='$rows' cols='$cols' placeholder='$placeholder' style='width: 100%;'>$prefill</textarea><br>\n";
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
function textError($input,$min,$max){
    $verify = array();
    $long = strlen($input);
    if($min > $long){
        $verify[]= 4012;
    }
    if($max < $long){
        $verify[]= 4011;
    }
    if($min <= $long && $long <= $max ){
        $verify[]=null;
    }
    return $verify;
}
function numberError($input,$min,$max,$ist=false){
    $verify = array();
    if(is_numeric($input)==true){
        $long = $input;
    if($min > $long){
        if($ist == true){
            $verify[]= 4113;
        }
        else{$verify[]= 4013;}
    }
    if($max < $long){
        $verify[]= 4014;
    }
    if($min <= $long && $long <= $max ){
        $verify[]= true;
    }
    }
    else{
        $verify[]=4041;
    }
    return $verify;
}
function displayError($error){
    echo "<p style='color:red'>";
    foreach($error as $e){
        switch($e){
            case 4011:
                echo "ERROR 401(1): --USERNAME MUST BE LESS THAN 15 CHARACTERS LONG---";
                break;
            case 4012:
                echo "ERROR 401(2): --USERNAME MUST BE MORE THAN 0 CHARACTERS LONG---";
                break;
            case 4013:
                echo "ERROR 401(3): --NUMERAL BELOW RANGE REQUIRED---";
                break;
            case 4014:
                echo "ERROR 401(4): --NUMERAL ABOVE RANGE REQUIRED---";
                break;
            case 4113:
                echo "ERROR 411(3): --TEMPERATURE BELOW ZERO (Celsius: -273.15, Fahrenheit: -459.6)---";
                break;
            case 4114:
                echo "ERROR 411(4): --TEMPERATURE ABOVE ALLOWED (INF)---";
                break;
            case 4015:
                echo "ERROR 401(5): --ID MUST BE 6 CHARACTERS LONG---";
                break;
            case 4016:
                echo "ERROR 401(6): --PASSCODE MUST CONTAIN A CAP*LETTER ---";
                break;
            case 4017:
                echo "ERROR 401(7): --PASSCODE MUST CONTAIN A NUMBER ---";
                break;
            case 404:
                echo "ERROR 404: --INPUT NOT FOUND---";
                break;
            case 4041:
                echo "ERROR 404(1): --NUMERICAL INPUT NOT FOUND---";
                break;
                case 4077:
                echo "ERROR 407(7): --CONTAINS NON-ALLOWED CHARACTER---";
                break;
                case 4078:
                echo "ERROR 407(8): --NOT A VALID EMAIL---";
                break;
                default:
                    echo '';
                    break;
        }   
    }
    echo "</p>";
}
function verifyLogin($user='tech30',$pass='Puma$'){
    if(isset($_SERVER['PHP_AUTH_USER'])!=true){
    header('WWW-Authenticate: Basic realm="Tech 30"');
    header('HTTP/1.0 401 Unauthorized');
    echo ("<script> alert('Unauthorized'); </script>");
    die;
}
else{
    if(($_SERVER['PHP_AUTH_USER'] == $user)&&($_SERVER['PHP_AUTH_PW']==$pass)){
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
function verifyLogin_($user='tech30',$pass='Puma$'){
    if(isset($_SERVER['PHP_AUTH_USER']) == true) {
        if($_SERVER['PHP_AUTH_USER'] != "" && $_SERVER['PHP_AUTH_PW'] != "") {
         $users = file ('passwd.txt', FILE_IGNORE_NEW_LINES);
        $user = sha1($_SERVER['PHP_AUTH_USER'])." ".sha1($_SERVER['PHP_AUTH_PW']);
     

            if(array_search($user, $users)==true){
                echo ("<script> alert('Credientials Initiated'); </script>");
                return true;
            }
            else {
                header('WWW-Authenticate: Basic realm="Tech30"');
                header('HTTP/1.0 401 Unauthorized');
               // addCSSLink('../Library/Tech30.css');
                echo ("<script> alert('Unauthorized'); </script>");
                exit;
            }
        }
        else {
            header('WWW-Authenticate: Basic realm="Tech30"');
            header('HTTP/1.0 401 Unauthorized');
            //addCSSLink('../Library/Tech30.css');
            echo ("<script> alert('Unauthorized'); </script>");
            exit;
        }
    }
    else {
        header('WWW-Authenticate: Basic realm="Tech30"');
        header('HTTP/1.0 401 Unauthorized');
        //addCSSLink('../Library/Tech30.css');
        echo ("<script> alert('Unauthorized'); </script>");
        exit;
    }

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
function verifyGLogin() {
    if (getSession('userInfo') !== null) {
        return true; 
    }
    else {
        setSession('returnURL', "http://www.pumatech.org" . $_SERVER['PHP_SELF']);
        setSession('cssURL', "http://www.pumatech.org/Classes/AdvWeb/FinalProjects/Programmatical/shared/css.css");
        setSession('signinMsg', "Welcome to Programmatical!");
        setSession('signoutMsg', "You have left the realm of Programmatical...");

        header ('Location: http://www.pumatech.org/glogin/Tech30Signin.php');
        exit ();
    }
} 
function MYSQLConnect () {
    $host = 'localhost';
    $un = 'teacher_programm';
    $pw = 'Suckle1!';
    $db = 'teacher_programm';
    
	// connect to the mySQL server
	$link = @mysqli_connect($host, $un, $pw) or die (mysqli_error($link));
	
	// select the database
	mysqli_select_db($link, $db) or die (mysqli_error($link));

	// return link to the connection (to be used to close it later)
	return $link;
}

function MYSQLQuery ($link, $query) {
	// send query
	$result = mysqli_query ($link, $query) or die (mysqli_error($link));

    // there was an error;
    if ($result === false) 
        return false;
    
	// check for a success for a query OTHER than SELECT, SHOW, DESCRIBE, or EXPLAIN
	// returns the number of rows affected by the query
	if ($result === true) 
	    return mysqli_affected_rows ($link);
	
	// for SELECT, SHOW, DESCRIBE, or EXPLAIN collect the results into an array and return them	
	$resArr = array();
	while (($row = mysqli_fetch_assoc ($result)) != false) {
		$resArr[] = $row;
	}	
	return $resArr;
}
function MYSQLClose ($link) {
	mysqli_close ($link);
}
?>