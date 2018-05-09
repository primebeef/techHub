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
<style>
html,body{
    padding:0;
    margin:0;
    
}

input[type=text],input[type=password] , select {
    width: 100%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #586BA4;
    border-radius: 1px;
    box-sizing: border-box;
    
}
input[type=text],input[type=password] {
    background-color: #586BA4;
    color: white;
}
input[type=submit] {
    z-index:2;
    width: 100%;
    background-color: #85BDBF;
    color: #C2FCF7;
    padding: 10px 20px;
    margin: 10px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size:15px;
}
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset;
    -webkit-text-fill-color: #4B4E54;
}
input[type=submit]:hover {
    background-color: #C2FCF7;
    color:#85BDBF;
    
    
}
input, textarea {
    
font-family: 'Lato', sans-serif;
 font-size:20px;   
}
div.form{
    
    background-color: #324376;
    padding: 20px;
    color:snow;
    font-family: 'Lato', sans-serif;

}
.inputs{
    opacity:0;
    user-select:none;
}
</style>
</head>
<body>
<div class="form">
  <form action="login.php" method="post">
    <label for="username"class="inputs">Username</label>
    <input type="text" class="inputs" name="username">

    <label for="passcode" class="inputs">Password</label>
    <input type="password" class="inputs" name="passcode">


    <input type="submit" value="ENTER">
  </form>
</div>


</body>
</html>














