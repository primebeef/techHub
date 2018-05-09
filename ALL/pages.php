<!DOCTYPE HTML>
<html>
 <head>
  <title>Index of /</title>
  <?php $theme = 'thepeak'; include "themes.php";  ?>
  <style>
 html,body{
    padding:0;
    margin:0;
}
body{
    position:fixed;
top:0;
left:0;
width:100%;
height:100%;
    background-color:black;
   color:<?php echo $secondary;?>;
   font-family:<?php echo $font_h;?>;
}
#bar{
position:relative;
z-index:2;
left:0;
top:0%;
right:0;
height:8vh; 
box-shadow:0px 0px 0px 4px <?php echo $highlight; ?>;
background-color:<?php echo $primary; ?>;
font-family: <?php echo $font_h;?>;
text-align:center;
padding-top:1%;
padding-bottom:1%;
font-size:30px;
vertical-align: middle;
line-height:8%;  
color:<?php echo $secondary;?>;
margin:0;
cursor:pointer;
}
#main{
  font-size:14px;
  font-family: <?php echo $font_h;?>;
position:relative;
z-index:0;
left:0;
top:0;
right:0;
height:88%;
margin:auto;
overflow:scroll;
overflow-x:hidden;
background-color:<?php echo $main; ?>;
font-family: <?php echo $font_h;?>;
padding:2%;
color:snow;
}
.bubble{
  
    border:10px solid <?php echo $primary; ?>;;
    border-radius: 50%;
    width: 200px;
    height: 200px;
    margin: 25px;
    text-align:center;
    background-color:<?php echo $primary; ?>;
    transition: opacity 2s;
    float:center;
    left:100%;
    border-collapse:auto;
    transition: .3s ease;
    user-select:none;
   
    
}
input:focus{
    outline: none;   
}
.bubble:hover{
    opacity:.95;
    width:210px;
    height:210px;
    margin:20px;
}
form.themechange{
    position:relative;
    border-collapse:collapse;
    display:inline-block;
}
div.direct{
display:inline-block;  
padding:10px;
margin:5px;
background-color:<?php echo $highlight; ?>;   
width:25%;
text-align:center;

}
a{
     text-decoration: none; 
        color:<?php echo $secondary;?>;
}

::-webkit-scrollbar {
    background-color: <?php echo $main;?>;
}    
::-webkit-scrollbar-corner {
    background-color: white;
    color: white;
}
::-webkit-scrollbar-track {
    background-color: black;
}
::-webkit-scrollbar-track-piece {
    background-color: <?php echo $main;?>;
    color: white;
 
}
::-webkit-scrollbar-thumb {
    background-color: <?php echo $highlight;?>;

}
::-webkit-scrollbar-button {
    color: white;
}
input.buttonfit{
 background-color:<?php echo $primary; ?>;
 border:0px;
 color:<?php echo $secondary;?>;
 font-family:<?php echo $font_h;?>;
 width:20%;
 padding:.7%;
 margin:.7%;
 cursor:pointer;
 overflow:hidden;
}
#mainage{ position:relative;
    width:100%;
    height:100%;
    border:none;
    
}
.head{
    position:relative;
    border:none;
    background:transparent;
    font-family:<?php echo $font_h;?>;
    color:<?php echo $secondary;?>;
    font-size: 90%;
}

  </style>
 </head>
 <body>
     <div id='bar'><h1 class='head'>Puma Tech Server</h1></div>

<div id='main'>
<h2>Explore files for classes:</h2>
<div id='main'><div class="tile" onclick="window.location.href='Classes/Gateway/'"><div>Gateway<br></div></div>
<div class="tile" onclick="window.location.href='Classes/AppComp/'"><div>Applied Computing</div></div>
<div class="tile" onclick="window.location.href='Classes/WebMaster/'"><div>Webmastering</div></div>
<div class="tile" onclick="window.location.href='Classes/AdvWeb/'"><div>Adv Web Programming</div></div>
<div class="tile" onclick="window.location.href='Classes/CS2/'"><div>CS2</div></div>
<h2>Teacher Folders</h2>
<div class="tile" onclick="window.location.href='gvantol/'"><div>Ms. VanTol</div></div>
<div class="tile" onclick="window.location.href='mrH/'"><div>Mr. H</div></div>
<h2>Access the code editor</h2>
<div class="tile" onclick="window.location.href='editor/'"><div>Code Editor</div></div>
<div class="tile" onclick="window.location.href='editor/clearCookies.php'"><div>Reset Browser Settings</div></div>
</div>
</div>

</body></html>