<!DOCTYPE html>
<html>
<head>
<!--
  Assignment: 
  Name: 
-->
<title></title>
<style>
@import url('https://fonts.googleapis.com/css?family=Lato');
</style>
<link rel="stylesheet" type="text/css" href="basicform-css.css">
<style>

</style>
</head>
<body>
<div class="form">
    <label id="logheader"style="font-size:30px;">Login</label>
  <form action="FindUser.php" method="post">
     
     <br>
    <label for="username"class="inputs" required>Username</label>
    <input type="text" class="inputs" name="username">

    <label for="passcode" class="inputs" required>Password</label>
    <input type="password" class="inputs" name="passcode">

<label for="area" class="inputs" required>Leave a Note</label><br><br>
<textarea name='name' row='2' column='1'></textarea><br>
<?php
radioGroup ('<br>Who\'s the primest of them all?<br>', 'prime', array ('Mak-the-Black <br>', 'LJ Big Boi <br>', 'JeffieCheffie<br>', 'FloweryFlorian<br>'), 'JeffieCheffie<br>');
?>

<input type='checkbox'><label for="check"class="inputs" required>Use my data!</label> <br>
<br>
<input type='reset'>
    <input type="submit" value="Login">
  </form>
</div>
<input type="submit" value="Sign Up" id="signup"
    onclick="window.location='http://www.pumatech.org/Classes/AdvWeb/Period6/Turner.Makenna/Project%2000/logindex.php?';" />  

</body>
</html>