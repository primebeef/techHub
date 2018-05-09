<?php include "../Library/doctype.html"?>
<?php
$n = (isset($_GET['value']))?$_GET['value']:9;
$op = (isset($_GET['op']))?$_GET['op']:'multiply';
if(is_numeric($n)==false){
    //Makes sure it is a number.
    echo("Nope!");
    //if not it force exits.
  die;
}

?>
<html>
<head>
<!--
  Assignment: 1.3
  Name: Makenna Turner
-->
<title>Table</title>
<style>

table{
    border:3px solid black;
    border-collapse:collapse;
}
td{
    border:3px solid black;
}
</style>
</head>
<body>
<table>
 <?php
 switch($op){
    case 'add':
        add_V($n);
        break;
    case 'subtract':
          subtract_V($n);
        break;
    case 'multiply':
        multiply_V($n);
        break;
    case 'divide':
        divide_V($n);
        break;
    default:
        multiply_V();
        break;
}

 function add_V($n){
     for($x=0;$n>=$x;$x++){
     //Does not stop at nine, goes to Sq-root. i.e.(3 will only go to 3x3 but 90 will go to 90x90.)
    $pro = $n + $x;
    //finds product of given number and set number.
    echo("<tr><td>$n + $x</td><td>$pro</td></tr>\n");
    //prints their base values and product.
 }
 }
 function subtract_V($n){
     for($x=0;$n>=$x;$x++){
     //Does not stop at nine, goes to Sq-root. i.e.(3 will only go to 3x3 but 90 will go to 90x90.)
    $pro = $n - $x;
    //finds product of given number and set number.
    echo("<tr><td>$n - $x</td><td>$pro</td></tr>\n");
    //prints their base values and product.
 }
 }
 function multiply_V($n){
     for($x=0;$n>=$x;$x++){
     //Does not stop at nine, goes to Sq-root. i.e.(3 will only go to 3x3 but 90 will go to 90x90.)
    $pro = $n * $x;
    //finds product of given number and set number.
    echo("<tr><td>$n x $x</td><td>$pro</td></tr>\n");
    //prints their base values and product.
 }
 }
 function divide_V($n){
     for($x=1;$n>=$x;$x++){
     //Does not stop at nine, goes to Sq-root. i.e.(3 will only go to 3x3 but 90 will go to 90x90.)
    $pro = $n / $x;
    //finds product of given number and set number.
    echo("<tr><td>$n &divide; $x</td><td>$pro</td></tr>\n");
    //prints their base values and product.
 }
 }
 ?>   
</table>
</body>
</html>