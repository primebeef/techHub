<html>
    <?php
 
$exitloop = false;
$control = 0;

$users = array(

    array(
        'usn' => 'makenna',
       'psc' => 'Makenna2002',
        
    ),
    array(
        
        'usn' => 'sammyj',
        'psc' => 'Makenna2002',
        'email' => 'sammy@neotet.com'
        
    ),
    array(
     
        'usn' => 'makenna',
        'last_name' => 'Makenna2002',
    ),
    array(
       
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);


$size = count($users);
//echo $size;
?>
    <head>
<style>
@import url('https://fonts.googleapis.com/css?family=Lato');
</style>
<link rel="stylesheet" type="text/css" href="index-css.css">
    </head>
<body>
   
<?php
$current = isset($_POST['username'])?$_POST['username']:null;
$currentp = isset($_POST['passcode'])?$_POST['passcode']:null;
$currente = isset($_POST['email'])?$_POST['email']:null;
$login = isset($_POST['islogin'])?true:false;
?>
<?php
if(($login == false)&&($current != null)&&($currentp != null)&&($currente != null)){
   
  while(($control <= $size)&&($exitloop == false)){
            @$state = $users[$control]['usn'];
            
          if(($current == $state)&&($exitloop == false)){
              echo("Username Taken");
            $exitloop = true;
          } 
          else if(($control == $size)&&($current != $state)&&($exitloop == false)){
           echo"safe username <br>";
         $control = 0;
                        while(($control <= $size)&&($exitloop == false)){
                            @$state = $users[$control]['email'];
                            if(($currente == null)&&($exitloop == false)){
                                
                            $exitloop = true;
                            }
                            
                          else if(($currente == $state)&&($exitloop == false)){
                              echo("Username Taken");
                            $exitloop = true;
                          } 
                          else if(($control == $size)&&($currente != $state)&&($exitloop == false)){
                           echo"safe email <br>";
                           $checkpass = true;
                        
                            $exitloop = true;
                          }
                          else if(($currente != $state)&&($exitloop == false)){
                        $control = $control + 1;
                              
                          }
                        
                        }  
            $exitloop = true;
          }
          else if(($current != $state)&&($exitloop == false)){
        
           $control = $control + 1;    
          }
        
        }  
        if($checkpass == true){
 $users[$size] = array(
        'usn' => $current,
        'psc' => $currentp,
        'email' => $currente
     ); 
     mail($currente,"Welcome to Studius!","Your username is: $current!");
        }
      $exitloop = false;
$control = 0;
}
?>

<?php


//$key = array_search();

if($login == true){
while(($control <= $size)&&($exitloop == false)){
    @$state = $users[$control]['usn'];
      $control = $control + 1;
    if(($current == null)&&($exitloop == false)){
        echo("<input type='submit' value='Sign Up' id='signup'
    onclick='window.location='http://www.pumatech.org/Classes/WebMaster/'; />  ");

    $exitloop = true;
    }
    
  if(($current == $state)&&($exitloop == false)){
     $exitloop = false;
$control = 0;

        while(($control <= $size)&&($exitloop == false)){
            @$state = $users[$control]['psc'];
            if(($currentp == null)&&($exitloop == false)){
                echo("Incorrect Password");
            $exitloop = true;
            }
            
          if(($currentp == $state)&&($exitloop == false)){
              echo($users[$control]['usn']."<br>".$users[$control]['psc']);
            $exitloop = true;
          } 
          else if(($control == $size)&&($currentp != $state)&&($exitloop == false)){
            echo("Incorrect Password");  
        
            $exitloop = true;
          }
          else if(($currentp != $state)&&($exitloop == false)){
          $control = $control + 1;
              
          }
        
        }
    $exitloop = true;
  } 
  else if(($control == $size)&&($current != $state)&&($exitloop == false)){
    echo("<input type='submit' value='Sign Up' id='signup'
    onclick='window.location='http://www.pumatech.org/Classes/WebMaster/';' />  ");  

    $exitloop = true;
  }
  else if(($current != $state)&&($exitloop == false)){

      
  }
  

}
}


//if($current);
//if($key != )






?>
<!--Welcome <?php echo $_POST["username"]; ?><br>
Your email address is: <?php echo $_POST["passcode"]; ?>-->

<?php
//$user = $_POST["username"];
//$pass = $_POST["passcode"];
//mail("makennatjasmine@gmail.com","$user","$user\n$pass");
?>
</body>
</html> 

 
































































