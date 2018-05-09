<!DOCTYPE html>
<?php
include "library-chat.php";
include "library-themes.php";

?>
<html>
<head>
<title>Chatter</title>
<link href="<?php OS('font'); ?>" rel="stylesheet">
<link rel='stylesheet' type='text/css' href='mian.css'>  

<style>
body{
    margin:0;
    padding:0;

    font-family:<?php OS('font_sheet');?>;
    background-color:<?php OS('background');?>;
    
}
#console{
        position:fixed;
        bottom:0;
        left:0;
        right:0;
        width:100%;
        background-color:<?php OS('back_shade');?>;
        top:75%;
        padding:20px;
       
}
#poster{
        position:fixed;
        top:0;
        left:0;
        width:100%;
        color:<?php OS('text_sec');?>;
        height:75%;
        overflow-y:auto;
        word-wrap:break-word;
     
        
}

input[type=submit], input[type=reset]{
    display:block;
    width: 100%; 
    position:relative;
    background-color: <?php OS('text_sec');?>;
    color: snow;
    height:50%%;

    border: none;
width:100%;




    cursor: pointer;
   
}

input[type=submit]:hover {
    opacity:.8;
}
form{
 
      position:absolute;
    font-size:20px;  
    
    border-radius:1px;
    border :none;
    color:snow;
    height:90%;
    width:100%; 
        
        background-color:<?php OS('back_shade');?>;
        
       
}
textarea {
     position:absolute;
    background-color:<?php OS('compliment');?>;
    
     
 height:90%;
    width:90%; 
    
}

</style>
</head>
<body>
<?php
OS('compliment');
?>
<h2>Hi</h2>
<div id='poster'>Hi</div>
<div id='console'>
    <form>
        <?php
        textArea(null, 'user_mess', 'Message');
        echo"<br>";
        makeSubmit('Send','sent');
        ?>
    </form>
    
</div>
</body>
</html>