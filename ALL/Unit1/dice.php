<?php 
$die1 = rand(1,6);
$die2 = rand(1,6);
$die3 = rand(1,6);

?>
<?php include "../Library/doctype.html";?>
<html>
<head>
<!--
  Assignment: 
  Name: 
--> 
<title></title>
<style>
table.die{ position:relative;
width:300px;
height:300px;
background-color:black;
border-radius:20px;
padding:25px;
}
tr{ position:;
    width:100%;
  
    height:10px;
    
}
th.die{ 
    
    position:relative;
    background-color:white;
    border-radius:50%;
    
    width:40px;
    height:40px;
   
   
    
}
img{position:relative;
    width:100px;
    height:100px;
    display:block;
}
</style>
</head>
<body>
<?php
if(($die1 == 6)&&($die2 == 6)&&$die3 == 6){
    echo "Satan";
    echo "<br>";
}
echo $die1;
echo "<br>";
echo $die2;
echo "<br>";
echo $die3;

?>
<?php
if($die1 == 1){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Dice-1.svg/557px-Dice-1.svg.png'>";
}
if($die1 == 2){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/3/34/Dice-2.svg'>";
}
if($die1 == 3){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Dice-3.svg/557px-Dice-3.svg.png'>";
}
if($die1 == 4){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Dice-4.svg/557px-Dice-4.svg.png'>";
}
if($die1 == 5){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Dice-5.svg/557px-Dice-5.svg.png'>";
}
if($die1 == 6){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Dice-6.svg/557px-Dice-6.svg.png'>";
}
if($die2 == 1){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Dice-1.svg/557px-Dice-1.svg.png'>";
}
if($die2 == 2){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/3/34/Dice-2.svg'>";
}
if($die2 == 3){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Dice-3.svg/557px-Dice-3.svg.png'>";
}
if($die2 == 4){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Dice-4.svg/557px-Dice-4.svg.png'>";
}
if($die2 == 5){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Dice-5.svg/557px-Dice-5.svg.png'>>";
}
if($die2 == 6){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Dice-6.svg/557px-Dice-6.svg.png'>";
}
if($die3 == 1){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Dice-1.svg/557px-Dice-1.svg.png'>";
}
if($die3 == 2){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/3/34/Dice-2.svg'>";
}
if($die3 == 3){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Dice-3.svg/557px-Dice-3.svg.png'>";
}
if($die3 == 4){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Dice-4.svg/557px-Dice-4.svg.png'>";
}
if($die3 == 5){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Dice-5.svg/557px-Dice-5.svg.png'>>";
}
if($die3 == 6){
    echo "<img src= 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Dice-6.svg/557px-Dice-6.svg.png'>";
}
?>
</body>
</html>