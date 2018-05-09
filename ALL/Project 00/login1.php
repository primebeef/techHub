<html>
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
$users = array(

    array(
        'usn' => 'makenna',
       'psc' => 'Makenna2002',
        
    ),
    array(
        'id' => 3245,
        'usn' => 'sammyj',
        'psc' => 'Makenna2002',
    ),
    array(
        'id' => 5342,
        'usn' => 'makenna',
        'last_name' => 'Makenna2002',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);

$size = count($users);
?>
<?php

//$key = array_search();
 $exitloop = false;
$control = 0;

while(($control <= $size)&&($exitloop == false)){
    @$state = $users[$control]['usn'];
      $control = $control + 1;
    if(($current == null)&&($exitloop == false)){
        echo("<input type='submit' value='Sign Up' id='signup'
    onclick='window.location=''; />  ");

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
        
              
          }
        
        }
    $exitloop = true;
  } 
  else if(($control == $size)&&($current != $state)&&($exitloop == false)){
    echo("<input type='submit' value='Sign Up' id='signup'
    onclick='window.location='fackbook.com';' />  ");  

    $exitloop = true;
  }
  else if(($current != $state)&&($exitloop == false)){

      
  }
  

}


//if($current);
//if($key != )
login();





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

 
































































