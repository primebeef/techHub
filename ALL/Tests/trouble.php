<!DOCTYPE html>

<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Raleway:200,400" rel="stylesheet">
<title></title>
<script>
function ValidateEmail(email) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}
<?php
$myfile = fopen(".txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);

?>
</script>
<script>
    function RunCheck(){
        ValidateEmail();
        ValidateUsername();
    }
</script>
<style>
html,body{
padding:0;
margin:0;
}
body{
    font-family: 'Raleway', sans-serif;

}
form{
    color:snow;
    position:fixed;
    z-index:1;
    top:0;
position:absolute;
width:94%;
padding:3%;
background-color:#46434F;
visibility:visible;


}

input{
    position:relative;
    display:block;
    padding-bottom:1%;
    width:100%;
}
input[type=text], select {
    width: 100%;
    display: inline-block;
    border: 1px solid #1B1725;
    border-radius: 4px;
    box-sizing: border-box;

}

input[type=submit] {
    width: 100%;
    background-color: #6F8AB7;
    color: white;
    padding: 2%;
    margin-top:3%;
    border: none;
    border-radius: 4px;
    cursor: pointer;

    font-size:25px;
}

input[type=submit]:hover {
    background-color: #89BBFE;
}
</style>
</head>
<body>
<form id='form'action="">
<h2>SIGN-UP</h2>
USERNAME <input name="username"><br>
EMAIL <input name="email"><br>
PASSWORD <input name="password">

<input type="submit" value="ENTER" onmousedown="RunCheck()">
</body>
</html>









