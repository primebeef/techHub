<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Outerspace</title>
<script src="js.js"></script>
<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<style>
html,body{
    margin:0;
    padding:0;
}
body{
    z-index:-1;
    position:fixed;
    top:0;
    bottom:0;
    width:100%;
    height:100%;
    background-image:url("ThreefourMak.jpg");
    font-family: 'Work Sans', sans-serif;
color:#EAEAEA;
}
#bar{
    z-index:1;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:50%;
    background-color:#6985BC;
    transition:ease;
    
}
#plank{
    z-index:1;
    position:fixed;
    bottom:0%;
    left:0;
    width:100%;
    height:50%;
    background-color:#EAEAEA;
    transition:ease;
}
#cresent{
    z-index:2;
    width: 150px;
    height: 150px;
    background-color:#4D515B;
    display:table;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius:100% 100% 0% 0%;
    box-shadow: 0px 6px 0px 0px #607FBC;
    cursor:pointer;
    margin: auto;
    transition: .1s ;
    user-select:none;
    opacity:1;
    text-align:center;
    line-height:50px;
    font-size:40px;
    font-family: 'Varela Round', sans-serif;
    
}
#cresent:hover{
     width: 175px;
    height: 175px;
}
.middle{
    
    text-align: center;
    vertical-align: middle;
    line-height: 100px; 
    
}
.middle:hover{
    line-height:120px;
}
.camp{
    position: relative;
    font-size:90px;
    font-family: 'Varela Round', sans-serif;
    text-align:center;
    top:50%;
    visibility:visible;
    user-select:none;
}
#catch{
    
    
}
#caught{
    color:#607FBC;
}
#mark{
    z-index:4;
    visibility:hidden;
    opacity:0;
    transition:1.5s ease;
    cursor:pointer;
    color:white;
    font-size:100px;
}
#mark:hover{
    opacity:1;
}
#lucentwhite{
    z-index:3;
    position:fixed;
    top:0;
    bottom:0;
    left:0;
    width:100%;
    height:100%;
    background-color:black;
    opacity:0;
    visibility:hidden;
    transition:1.5s;
}
#lucentwhite:hover{
    opacity:.3;
}
#lucentwhite:hover > #mark {
    opacity: 1; 
    
}
.pulsate:hover {
    -webkit-animation: pulsate 3s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: .5;
}
@-webkit-keyframes pulsate {
    0% { 
        opacity: 1;
    }
    50% { 
        opacity: .5;
    }
    100% { 
        opacity: 1;
    }
}
</style>
</head>
<body>
    <div id='lucentwhite'>
    <div id='mark' class='camp pulsate' onclick='window.open("http://www.facebook.com")'>
    Begin.
   </div> 
    </div>
<div id='bar'>
   <div id='catch' class='camp'>
    Welcome!  
   </div> 
</div>
<div id='cresent' class='rotate'onclick= "start()"></div>
<div id='plank'>
     <div id='caught' class='camp'>
    Welcome!  
   </div> 
</div>

</body>
</html>





















