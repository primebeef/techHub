
<?php include "../Library/doctype.html";
?>
<?php
@$low = $_GET['low'];
@$high = $_GET['high'];
@$bgcolor = $_GET['bgcolor'];
$red = rand(0,255);
$blue = rand(0,255);
$green = rand(0,255);

$numeral = rand($low,$high);
$randy=rand(2,5);
if($randy == 1){
    $letter1 ="A";
    $letter2 = "X";
    $letter3 = "G";
}
else if($randy == 2){
    $letter1 ="B";
    $letter2 = "Y";
    $letter3 = "H";
}
else if($randy == 3){
    $letter1 ="C";
    $letter2 = "Z";
    $letter3 = "I";
}
else if($randy == 4){
    $letter1 ="D";
    $letter2 = "A";
    $letter3 = "J";
}
else if($randy == 5){
    $letter1 ="E";
    $letter2 = "B";
    $letter3 = "K";
}
?>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Arsenal" rel="stylesheet">
<script type="text/javascript" src="library.js"></script>
<!--
  Assignment: Assignment 1.2
  Name: Makenna Turner
  Extension: Random Characters Generate, Style tag css.
-->
<title>OOOAAA</title>

<style>
html,body{
    padding:0;
    margin:0;
    font-family: 'Arsenal', sans-serif;

color:black;
}
body{
    background-color:<?php echo $bgcolor;?>;
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



#form{
    visibility:visible;
    transition:4s;

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
    font-family: 'Arsenal', sans-serif;
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
    font-family: 'Arsenal', sans-serif;
    font-size:25px;
}

input[type=submit]:hover {
    background-color: #89BBFE;
}
#numeral{
    z-index:1;
    position:absolute;
    bottom:10%;
    width:10%;
    color: rgb(<?php echo $red;?>,<?php echo $green;?>,<?php echo $blue;?>);

    
    left:45%;
    font-size:70px;
}
#main{
    z-index:2;
position:fixed;
 top:0%;
 bottom:70%;
 width:100%;
 height:3;
}
</style>
</head>
<body>

    <div id='main'>
<form id='form'>
<h2>Number Range</h2>
#1 <input name="low">
#2 <input name="high">
<h2>Background</h2> <input name="bgcolor">
<input type="submit">
</form>
</div>

<span id ='numeral'>
<?php echo $numeral;echo"";echo "$letter1$letter2$letter3"?><?php ;?><?php ;?>

</span>
</body>
</html>


