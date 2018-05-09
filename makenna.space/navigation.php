<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet">
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
    background-color:#EAEAEA;
    font-family: 'Work Sans', sans-serif;
    color:#EAEAEA;
}
#bar{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    background-color:#6985BC;
    bottom:80%;
   
    box-shadow:0px 5px 0px 0px #3E4249;
}
#main{
     position:fixed;
    top:20%;
    left:0;
    width:100%;
    background-color:#6985BC;
    bottom:0%;
   
    box-shadow:0px 5px 0px 0px #3E4249;
}
#head{
    position:absolute;
    background-color:;
    width:100%;
    height:65%;
    left:0;
    overflow:hidden;
    text-align:center;
    font-size:100%;
    color:#EAEAEA;
    font-family: 'Varela Round', sans-serif;
    padding:.5em;
}
#nav{
    position:absolute;
    background-color:#303238;
    height:35%;
    width:100%;
    bottom:0;
    display:block;
    font-family: 'Varela Round', sans-serif;
}
div.header{
     z-index:;
    position:relative;
    left:0;
   
    width:100%;
    font-size:4em;
    text-align:center;
    text-shadow:1px 1px 0px #383B42 inset;
    padding:0;
}
.boop{
    z-index:;
    position:relative;
    left:0;
   
    width:100%;
    font-size:1em;
    text-align:center;
    text-shadow:1px 1px 0px #383B42 inset;
    padding:0;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #303238;
}

li {
    width:25%;
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding:17px 10px 17px 0px;
    text-decoration: none;
    transition:1s;
}

li a:hover {
    background-color: #27282B;
}
.preview{
  
    cursor:pointer;
    width:300px;
    height:400px;
    background-color:#69747C;
    transition:.5s ease;
    margin:1.5%;
    display:inline-block;
    
    
}
#gallery{
    position:absolute;
    top:15%;
    text-align:center;
    width:100%;
   
    
}
.preview:hover{
opacity:.7;    
}
.preview:active{
opacity:.6;    
}
</style>
</head>
<body>
    <div id='bar'>
        <div id='head'><div class='header'>Makenna</div></div>
        <div id='nav'>
    <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>
        </div>
    </div>
<div id='main'>
    
    <div id='gallery'>
<a class='preview' href='http://www.pumatech.org/Classes/WebMaster/Period6/Turner.Makenna/Final%20Project/main-source.html?timestamp=1480726476983' style='background-image:url(ac-thumbnail.jpg)'></a>
<a class='preview' href='http://www.pumatech.org/Classes/WebMaster/Period6/Turner.Makenna/Final%20Project/story.hotfood.html?timestamp=1481056083243' style='background-image:url(hf-thumbnail.jpg)'></a>
<a class='preview' href='http://www.pumatech.org/Classes/WebMaster/Period6/Turner.Makenna/Final%20Project/abillywish.html?timestamp=1481058591479' style='background-image:url(bg-thumbnail.jpg)'></a>
<a class='preview' href='http://www.pumatech.org/Classes/WebMaster/Period6/Turner.Makenna/Final%20Project/soundbits.html?timestamp=1481222068732' style='background-image:url(sb-thumbnail.jpg)'></a>

</div>
</div>
</body>
</html>