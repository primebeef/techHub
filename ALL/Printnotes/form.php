<!DOCTYPE html>
<html>
<head>
<!--
  Assignment: 
  Name: 
-->
<title></title>
<link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">

<style>
html,body{
    padding:0;
    margin:0;
    
}
body{
    font-family: 'Lato', sans-serif;
}
#form{
    position:fixed;
    top:0;
    left:0;
    background-color: #324376;
    margin:0;
    padding:2%;
    color:snow;
  
    right:0;
    height:100%;
    
}
form{
    position:relative;
    
}
input{
   background-color: #F4EFEB;  
}
input[type=text]#term-in {
    width: 40%;
    padding: 12px 20px;
    margin: 6px 0;
    display: inline;
    box-sizing: border-box;
    float:left;
     outline:none;
      border:none;
}
input[type=text]#def-in {
    width: 59.5%;
    padding: 12px 20px;
    margin: 6px 0;
    display: inline;
    box-sizing: border-box;
     border:none;
    outline:none;
    float:right;
}
input[type=text]#header-in {
    width: 70%;
    padding-left:20px;
    padding-top:7px;
    margin-top: 10px;
    margin-bottom:1px;
    display: inline-block;
    border:none;
    border-radius: 0px;
    box-sizing: border-box;
    color:snow;
    background:none;
     outline:none;

}
input#header-in, textarea{
    position:relative;
    font-size:25px;
    
}
input, textarea{
    position:relative;
    font-size:19px;
    color:#303030;
}
#header-in::-webkit-input-placeholder { 
    color:#F2F2F2;
}
::-webkit-input-placeholder { 
    color:grey;
}
canvas#divider{
    position:relative;
    height:5px;
    margin-top:2px;
    margin-bottom:2px;
    width:100%;
    background-color:snow;
     box-sizing: border-box;
}
input[type=submit] { 
    position:relative;
    width: 30%;
    background-color: #F4EFEB;
    color: #324376;
    padding: 20px 20px;
    margin: 14px;
    border: none;
   
    cursor: pointer;
    outline:none;
    font-size: 20px;
    top:0;
    left:0;
    float:left;
    
    
}
button{
    position:relative;
  
    width: 30%;
    background-color: #F4EFEB;
    color: #324376;
    padding: 20px 20px;
    margin: 14px;
    border: none;
   
    cursor: pointer;
    outline:none;
    font-size: 20px;
    top:0;
    left:0;
    float:left;
}
input[type=submit]:active{
    font-size:15px;
}
#footer{
    bottom:0;
    left:0;
    padding-left:2%;
  width:100%;
    position:fixed;
}
@media print {
  body * {
    visibility: hidden;
  }
  form * {
    visibility: visible;
  }
  #footer,button {
 
     visibility: hidden;
    
  }
}
</style>
</head>
<body>
    <div id='form'>
        <form>
          
     <input type='text' id='header-in' placeholder="Title"> 
     <canvas id='divider'></canvas> 
     <br>
     
     <input type="text" id="term-in" placeholder="Term">
     <input type="text" id="def-in" placeholder="Definition">
     
     <input type="text" id="term-in" placeholder="Term">
     <input type="text" id="def-in" placeholder="Definition">
      
     <input type="text" id="term-in" placeholder="Term">
     <input type="text" id="def-in" placeholder="Definition">
 
   
     <div id= 'footer'>
         <button onclick=''>New Term</button>
         <button onclick='print()'>Make Notes</button>
     </div>
</form>
   
    
</div>
</body>
</html>

















