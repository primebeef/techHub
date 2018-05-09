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
<?php
$first = isset($_GET['first'])?$_GET['first']:die("No First name input.");
$last = isset($_GET['last'])?$_GET['last']:die("No Last name input.");
if(isset($_GET['style'])==true){
   $style =  $_GET['style'];
   switch($style){
       case 'firstlast':
           echo("$first $last");
           break;
        case 'lastfirst':
           echo("$last, $first");
           break;
        default:
           echo("$first $last");
            break;
   }
}
else{
       echo("$first $last");
   }
?>
</body>
</html>