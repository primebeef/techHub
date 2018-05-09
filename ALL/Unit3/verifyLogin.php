<?php include "../Library/Tech30Lib.php"; printDoctype();?>

<?php
$user = getValue('un',null);
$user = htmlspecialchars(strip_tags(trim($user)));

$pass = getValue('pw1',null);
$pass = htmlspecialchars(strip_tags(trim($pass)));
$pass1 = getValue('pw2',null);
$pass1 = htmlspecialchars(strip_tags(trim($pass1)));
$checkpoint = verify($user);

    if(is_array($checkpoint)==true){
        foreach($checkpoint as $e){
            echo $e."<br>";
        }
    }
    else if($checkpoint == 'next'){
        
        $checkpoint = verify_pass($pass,$pass1);
        if(is_array($checkpoint)==true){
        foreach($checkpoint as $e){
            echo $e."<br>";
        }
    }
    else if($checkpoint == 'next'){
        
     echo "LOGGED!";
    }
    }
    
    
   // verify_pass();
function verify_pass($pass,$pass1){
    $focus = true;
    $verify = array();
if($pass == $pass1){
    $verify[]=  'ERROR 403: --PASSWORDS DO NOT MATCH---';
    echo "$pass $pass1";
     $focus = false;
}
if(strcspn($pass,'QWERTYUIOPASDFGHJKLZXCVBNM')==strlen($pass)){
     $verify[]= 'ERROR 404(1): --NO CAP*LETTER IN PASSWORD---';
      $focus = false;
}
if(strcspn($pass,'qwertyuiopasdfghjklzxcvbnm')==strlen($pass)){
     $verify[]= 'ERROR 404(2): --NO LOW*LETTER IN PASSWORD---';
      $focus = false;
}
if(strcspn($pass,'1234567890')==strlen($pass)){
     $verify[]= 'ERROR 404(3): --NO NUMERAL IN PASSWORD---';
      $focus = false;
}
 if($focus != true){
            return $verify;
        }
        else if($focus == true){
            return 'next';
        }
}
function verify($user){
    $focus = true;
    $verify = array();
if(strlen($user) == 0){
    $verify[]= "ERROR 404: --USERNAME NOT FOUND---";
    $focus = false;
}
if(strlen($user) > 13 || strlen($user) < 3){
    $verify[]= "ERROR 401: --USERNAME MUST BE BETWEEN 13 & 3 CHARACTERS LONG---";
    $focus = false;
}
        if($focus != true){
            return $verify;
        }
        else if($focus == true){
            return 'next';
        }
}
?>
<a href="newUser.php?un=<?php echo $un; ?>&pw1=<?php echo $pw1?>">Go Back</a>

