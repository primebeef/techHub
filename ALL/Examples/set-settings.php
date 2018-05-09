<?php include "../Library/doctype.html";?>
<?php
$bgcolor = $_GET['bgcolor']; 
$color = $_GET['color'];
$title = $_GET['title'];    
    
    

?>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<!--
  Assignment: 
  Name: 
-->
<title></title>
<style>
html,body{
    padding:0;
    margin:0;
    font-family: 'Open Sans', sans-serif;
color:white;
}
form{
    top:15%;
position:absolute;
width:87%;
padding:3%;
left:5%;
background-color:#9EA3B0;
border-radius:5px;


}
input{
    position:relative;
    display:block;
    padding-bottom:2%;
    width:100%;
}
input[type=text], select {
    width: 100%;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
}

input[type=submit] {
    width: 100%;
    background-color: #242038;
    color: white;
    padding: 3%;
    margin-top:5%;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Open Sans', sans-serif;
    font-size:25px;
    transition:.2s;
}

input[type=submit]:hover {
    background-color: #534B62;
}


</style>
</head>
<body>
    <div>
<form action="">
First Name <input name="bgcolor"> 
Last Name <input name="title">
Email <input name="color">
<input type="submit">
</div>
</body>
</html>













