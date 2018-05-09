<?php 
$bgcolor = $_GET['bgcolor']; 
$color = $_GET['color'];
$title = $_GET['title'];
$rotate = '360deg';
?>
<!DOCTYPE html>
<html>
<head>
<!--
  Assignment: Youli
  Name: 
-->
<title><?php echo $title ?></title>
<style>
body{
    color:<?php echo $color;?>;
    background-color:<?php echo $bgcolor; ?>;
}
P{
    transition:10s;
    cursor:pointer;
}
p:hover{
    transform: rotate(<?php echo $rotate;?>)
}
</style>
</head>
<form action="">
New Background: <input name="bgcolor">
New Title: <input name="title">
New Font Color: <input name="color">
<input type="submit">
</form>


<body >
<p>The background color is: <?php echo $bgcolor; ?></p>


</body>
</html>