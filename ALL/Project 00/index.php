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
<link rel="stylesheet" type="text/css" href="index-css.css">
<style>

</style>
</head>
<body>
<div class="form">
    <label id="logheader"style="font-size:30px;">Login</label>
  <form action="login.php" method="post">
     
     <br>
    <label for="username"class="inputs" required>Username</label>
    <input type="text" class="inputs" name="username">

    <label for="passcode" class="inputs" required>Password</label>
    <input type="password" class="inputs" name="passcode">

<input type="text" class="inputs" name="islogin" style="display:none">
    <input type="submit" value="Login">
  </form>
</div>
<input type="submit" value="Sign Up" id="signup"
    onclick="window.location='http://www.pumatech.org/Classes/AdvWeb/Period6/Turner.Makenna/Project%2000/logindex.php?';" />  

</body>
</html>














