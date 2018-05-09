<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet">
<style>
html,body{
    padding:0;
    margin:0;
}
body{
    background-color:#E5E5E5;
    font-family: 'Quicksand', sans-serif;

}
#header{
    position:fixed;
    z-index:2;
    top:0;
    left:0;
    right:0;
    bottom:90%;
    background-color:#3C5896;
    color:#E5E5E5;
        box-shadow:0px 1px 0px 2px #39548E;  

}
div.header{
    z-index:-1;
    position:fixed;
    left:0;
    line-height:5%;
    top:5%;
    bottom:5%;
    width:100%;
    font-size:4em;
    text-align:center;
    text-shadow:1px 1px 0px #383B42 inset;
    padding:0;
}
button.header{
    position:fixed;
    top:5%;
    bottom:5%;
    left:0;
    display:inline-block;
    background-repeat:no-repeat;
    width:30px;
   
    height:auto;
    cursor:pointer;
    line-height:5%;
}
button.donut{
    position:relative;
    background-color:#E5E5E5;
    display:inline-block;
    border:none;
    width:4em;
    top:25%;
    left:0;
    text-align:center;
    line-height:25%;
    border-radius:50%;
    height:auto;
}
img.circle{
    z-index:-1;
position: relative;
border-radius: 50%;
width: 5%;
height: auto;
display:inline-block;
top:2.5%;
left:0 ;
line-height:5%;
padding-top: 5%;
border:none;
opacity:.8;
   background-color:#E5E5E5;
}
#main{
position:fixed;
    z-index:1;
    top:10%;
    left:0;
    right:0;
    bottom:0%;
    background-color:transparent;
    color:#E5E5E5;
}
div.slide{
    position:relative;
    z-index:1;
    width:100%;
    height:30%;
    display:block;
     
    background-color:#4D515B;
    color:#E5E5E5;
    opacity:1;
   padding:0;
   margin:0;
    min-height: 650px;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
div.simple{
    position:relative;
    z-index:1;
    width:80%;
    height: 30%;
    min-height:400px;
    display:block;
    background-color:#E5E5E5;
    text-align:justify;
    padding:10%;
    color:#4D515B;
    line-height:200%;
    font-size:25px;
    word-wrap: break-word;
    overflow:hidden;
    box-shadow:0px 1px 0px 2px #CECECE;
    opacity:1;
}
div.rightsimple{
    position:relative;
    z-index:1;
    width:30%;
    left:50%;
    height: 30%;
    min-height:400px;
    display:inline-block;
    background-color:#E5E5E5;
    text-align:justify;
    padding:10%;
    color:#4D515B;
    line-height:200%;
    font-size:25px;
    word-wrap: break-word;
    overflow:hidden;
    box-shadow:0px 1px 0px 2px #CECECE;
    float:right;
    opacity:1;
}
div.slideleft{
    position:relative;
    z-index:1;
    width:50%;
    height:30%;
    float:left;
    min-height:400px;
    display:inline-block;
     
    background-color:#4D515B;
    color:#E5E5E5;
    opacity:1;
   padding:0;
   margin:0;
    
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
</head>
<body>
<div id='header'>
    <div class='header'>moonmilk</div>
    
    
</div>

    <div class='slide' style="background-image: url('http://www.animalsaustralia.org/images/features/1000-secret-lives-cows-2.jpg');"></div>
    <div class='simple'>
<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut accumsan auctor nulla a dignissim. Aliquam erat volutpat. Aliquam erat volutpat. 
Curabitur non lectus ut orci ullamcorper tempus. Curabitur posuere tortor vel tempus molestie. Sed elementum id diam at ornare. Sed vulputate ipsum in fermentum mollis. 
Aliquam bibendum quam dui, quis tempor mauris dictum id. Duis placerat ex a diam hendrerit efficitur. Maecenas vel tortor feugiat orci vestibulum iaculis ac at ante. 
Curabitur maximus blandit leo, at molestie eros. Pellentesque faucibus augue non fermentum iaculis.
</span>
    </div>
    <div>
        <div class='slideleft'></div>
    <div class='rightsimple'>
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut accumsan auctor nulla a dignissim. Aliquam erat volutpat. Aliquam erat volutpat. 
Curabitur non lectus ut orci ullamcorper tempus. Curabitur posuere tortor vel tempus molestie. Sed elementum id diam at ornare. Sed vulputate ipsum in fermentum mollis. 
Aliquam bibendum quam dui, quis tempor mauris dictum id. Duis placerat ex a diam hendrerit efficitur. Maecenas vel tortor feugiat orci vestibulum iaculis ac at ante. 
Curabitur maximus blandit leo, at molestie eros. Pellentesque faucibus augue non fermentum iaculis.
</span>
    </div>
    </div>
    
    <div class='slide'></div>

</body>
</html>
