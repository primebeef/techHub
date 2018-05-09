<?php include "../Library/doctype.html";
?>
<?php
@$low = $_GET['low'];
@$high = $_GET['high'];
@$bgcolor = $_GET['bgcolor'];
?>

<script type="text/javascript" src="library.js"></script>
<html>
<head>
<!--
  Assignment: 
  Name: 
-->
<title></title>
<style>
html,body{
    padding:0;
    margin:0;
    font-family: 'Arsenal', sans-serif;
color:black;
}
body{
    background-color:white;
}
form{
    color:snow;
    position:relative;
    z-index:1;
    top:0;

width:94%;
padding:3%;
background-color:#46434F;



}

main{
    position:relative;
    top:0;
    width:100%;
    height:20%;
}



input{
    position:relative;
    display:block;
    padding-bottom:1%;
    width:100%;
}
input[type=text], select {
    
    display: inline-block;
    border: 1px solid #1B1725;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: 'Arsenal', sans-serif;
}

input[type=submit] {
    width: 45%;
    background-color: #6F8AB7;
    color: white;
    padding: 2%;
    margin-top:3%;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Arsenal', sans-serif;
    font-size:25px;
    display:inline-block;
}

input[type=submit]:hover {
    background-color: #89BBFE;
}

data_marks{
    position:relative;
    top:20%;
    width:100%;
    bottom:0;
    background-color:black;
}
</style>
</head>
<body>

    <div id='main'>
<form id='form'>
<h3>Number Def</h3>
#A <input name="a">
<input type="submit" value="Full Scan">
<input type="submit" value="Partial Report">
</form>
</div>
<div id="data_marks">
    
</div>

</body>
</html>