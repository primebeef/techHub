<?php session_start();
include "library-chat.php";
if(isPost()==true){
     $send = getValue('create',false);
    if($send != false){
        header("Location:http://www.pumatech.org/Classes/AdvWeb/Period6/Turner.Makenna/Chat%20System%20PHP/newuser.php?");
    }
}

if(isPost()==true){
 
        $user = getValue('user');
    $pass = getValue('pass');
    $test = userDirx($user,$pass);
    

if($test == true){
    setSession('user',$user);
    setSession('pass',$pass);
    header("Location:http://www.pumatech.org/Classes/AdvWeb/Period6/Turner.Makenna/Chat%20System%20PHP/user-home.php?");
    
}
}
?>
<!DOCTYPE html>
<html>
<head>

<title></title>
<style>
</style>
</head>
<body>
<?php
if(isPost()==true){
 if($test == false){
   startForm('post',$_SERVER['PHP_SELF']);
echo "<label id='logheader'style='font-size:30px;'>Login</label><br>";
echo("<br>UNABLE TO LOGIN<br>");

startForm('post',$_SERVER['PHP_SELF']);

    textInput('Username ', 'user', null, null,$user);
 echo "<br>";   
    passInput('Password ', 'pass', null, null,$pass);
    echo "<br>";
    makeSubmit('Login', 'log');

endForm();       
}   
}
if(isPost() == false){
    startForm('post',$_SERVER['PHP_SELF']);



echo "<label id='logheader'style='font-size:30px;'>Login</label>";


startForm('post',$_SERVER['PHP_SELF']);
echo "<br>";
    textInput('Username ', 'user', null, null,null);
 echo "<br>";   
    passInput('Password ', 'pass', null, null,null);
    echo "<br>";
    makeSubmit('Login', 'log');
    makeSubmit("Create Account",'create');
endForm();  
    
    
}


?>
</body>
</html>