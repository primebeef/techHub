<!DOCTYPE html>
<html>
<head>
<!--
  Assignment: 
  Name: 
-->
<title></title>
<style>
</style>
</head>
<body>
    <script>
        var username = prompt("Choose a username or input your username.");
        valUser1();
        function valUser1(){
            var done = false;
            while(done == false){
            if (username.length > 10){
            alert("Too many Characters")
          username = prompt("Choose a username or input your username.");  
        }
        function validUser(){
        var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
        if (pattern.test(username)) {
        alert("Please only use standard alphanumerics");
        return false;
    }
    return true;
            }
        done = validUser(username);
        }}
        username = username.replace(/ +/g, "_");
       
        alert(username);
    </script>
<?php
/*$myfile = fopen(".txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
*/
?>
</body>
</html>