<?php include "library-chat.php";
$new = null;
$error = null;
$error['email'] = null;
$error['user'] = null;
if(isPost()==true){
    $user = strip_tags(trim(getValue('user',null)));
     $pass = strip_tags(trim(getValue('pass',null)));
     $email = strip_tags(trim(getValue('email',null)));
     $fname = strip_tags(ucfirst(strtolower(trim(getValue('fname',null)))));
     $lname = strip_tags(ucfirst(strtolower(trim(getValue('lname',null)))));
     /*
if($user == "" ||$user == null ||$user == " "){
    $error['user'] = "No Username Input";
}
   
    if(array_key_exists($user,$DIRx_USER) == true){
        $error['user']="*Username Exists ";
    }

    $name = test_input($user);
if (!preg_match("/^[a-zA-Z0-9@_]*$/",$name)) {
  $error['user'] =$error['user']."Only letters and white space allowed "; 
}
    $email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error['email']=$error['email']."Invalid Email ";
}
//$new = compile($error);
*/
function search_email($array,$key,$value){
    foreach($array as $i => $e){
        if(is_array($e)==true){
            
            search_email($e,$key,$value);
        }
        elseif (is_array($e) == false){
            
            if($i == $key){
                //echo $i;
                if($e == $value){
                   //echo $e; 
                  return true;
               
                }
                else{
                    return false;
                }
                
            }
            else{
            
            }
        }
    }
}
function search_for($array,$key,$value){
    $keys = array_keys($array);
    //var_dump($keys);
    foreach($array as $i => $e){
        echo $array[$i][$key];
        if(is_array($e)==true){
         search_for($e,$key,$value);
        }
        else{
            
            if($i == $key){
                 //echo "$i <br>";
                 
            if($e == $value){
                     //echo "$e <br>";
            $state = 'true';
                }
                if($e != $value){
                  
                }
                //echo $state;
                if($state != null){
                    echo $state;
                    return true;
                }
           
        }
            else{
              
            }
            
        }
        
    }
   
   
}
function search_array($needle, $haystack) {
     if(in_array($needle, $haystack)) {
          return true;
     }
     foreach($haystack as $element) {
          if(is_array($element) && search_array($needle, $element))
               return true;
     }
   return false;
}
//$tys =  true;
//$er = search_for($DIRx_USER,'email',$email);
//echo $er;
//echo $email;
//$tys = search_email($DIRx_USER,'email',$email);
//echo $tys;
//var_dump($DIRx_USER);
if($pass != null && $email != null && $pass != null && array_key_exists($user,$DIRx_USER)==false && search_array($email,$DIRx_USER)== false){
    $file = fopen('dirx_user.php',"a+") or die("CANNOT GENERATE FILE");
               $contents = file_get_contents("dirx_user.php");
$contents = str_replace("); ?>", '', $contents);
file_put_contents("dirx_user.php", $contents);
            $maxim = "\n 
        '$user' => array(
            'firstname' => '$fname',
            'lastname' => '$lname',
            'pass' => '$pass',
            'email' => '$email',
            'chatrooms' => array(
                
                '$user' => array(
                    'name' => 'Private Chat',
                    'pass' => '$user',
                    'doc' => '$user.html',
                    ),
                ),
            
            ),
";
            fwrite($file,$maxim);
            fwrite($file,"); ?>");
               fclose($file);
               
    setSession('user',$user);
    setSession('pass',$pass);
               
header("Location:http://www.pumatech.org/Classes/AdvWeb/Period6/Turner.Makenna/Chat%20System%20PHP/user-home.php?")               ;
}
else{
    die("error");
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" type="text/css" href="mian.css">
</head>
<body>
    <div class='form'>
        
        <?php
    startForm('post',$_SERVER['PHP_SELF']);



echo "<label id='logheader'style='font-size:30px;'>Sign-up</label><br>";


startForm('post',$_SERVER['PHP_SELF']);
echo "<br>";
textInput('First Name ', 'fname', null, null,null);
echo "<br>";  
textInput('Last Name ', 'lname', null, null,null);
echo "<br>";  
    textInput('Username ', 'user', 4, 10,null);
echo "<br>"; 
  textInput('Email ', 'email', null, null,null);
echo "<br>";  
    passInput('Password ', 'pass', null, 20,null);
    echo "<br>";
    
    makeSubmit('Login', 'log');
endForm();  

    
    
?>
    </div>

<script></script>
</body>
</html>