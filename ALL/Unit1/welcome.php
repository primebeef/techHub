<?php include "../Library/doctype.html";?>
<?php
@$userFirstname = $_GET['first'];
@$userLastname = $_GET['last'];
@$userBalance = $_GET['bal']
?>
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
$welcome = "Welcome, $userFirstname $userLastname <br> Your account balance is \$$userBalance.";
echo $welcome;
?>
</body>
</html>