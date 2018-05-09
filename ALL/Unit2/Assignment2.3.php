<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<pre><?php
$parse = array('/',"'","\"","\\","/",".","(",")",",",);
$file = isset($_GET['file'])?is_file($_GET['file'])?$_GET['file']:die("This is not a file"):'sample.txt';

$string = file_get_contents($file);
$string1 = $string;
$string = str_replace($parse,"",$string);
$string = trim($string);
$string = strtoupper($string);

$array = explode(" ",$string);

$sik = array();
foreach($array as $e){
    $e = trim($e);
    $x = array_key_exists($e,$sik);
    if($x == true){
        $sik[$e] = $sik[$e] + 1; 
    }
    else{
        $sik[$e] = 1;
    }
}
$sort = isset($_GET['sort'])?$_GET['sort']:'count';
if($sort == 'word'){
    ksort($sik);
}
else{
arsort($sik);
}
?></pre>
<html>
<head>
    <!-- 
    Extension: sort types.
    -->
<title></title>
<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

<style>
html,body{
    padding:0;
    margin:0;
}
body{
    background-color:#252323;
    overflow:hidden;
   font-family: 'Muli', sans-serif;
}
    .slipper{
        position:absolute;
        width:46%;
        top:0;
        height:85%;
        background-color:#333030;
        overflow:auto;
        padding:5px;
        border:5px solid snow;
        border-radius:2px;
        color:snow;
        padding-top:10px;
        
  
    }
    #left{
         background-color:#333030;
        border-collapse:collapse;
        left:0;
        text-justify: inter-word;
        text-align: justify;
        
    }
    #right{
        border-collapse:collapse;
   
        right:0;
    }
    ::-webkit-scrollbar {
    background-color: #586BA4;
   
}    
::-webkit-scrollbar-corner {
    background-color: white;
    color: white;
}
::-webkit-scrollbar-track {
    background-color: black;
}
::-webkit-scrollbar-track-piece {
    background-color: #252323;
    color: white;
 
}
::-webkit-scrollbar-thumb {
    background-color: #586BA4;

}
::-webkit-scrollbar-button {
    color: white;
}
form{
    position:absolute;
    width:50%;
    height:10%;
    top:90%;
    left:25%;
}


input[type=text],input[type=password] , select {
    width: 100%;
    padding: 12px 20px;
    margin: 10px 0;
    display: inline-block;
    border: 1px solid #586BA4;
    border-radius: 1px;
    box-sizing: border-box;

    
}
input[type=text],input[type=password] {
    background-color: #586BA4;
    color: white;
}
input[type=submit] {
    width: 100%;
    background-color: #F4EFEB;
    color: #324376;
    padding: 20px 20px;
    margin: 14px 0;
    border: none;
    border-radius: 1px;
    cursor: pointer;
    transition: 1s;
    font-size: 20px;
}

input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset;
    -webkit-text-fill-color: #4B4E54;
}
input[type=submit]:hover {
    opacity:.8;
}
input, textarea {

 font-size:20px;   
}
div.form{
    
    background-color: #324376;
    padding: 20px;
    color:snow;
   

}
th{
    color:snow;
    float:left;
    width:45%;
    text-align: left;
}
table{
    position:relative;
    width:100%;
    
    font-size:15px;
}


</style>
</head>
<body>
    <div class="slipper" id='left'><?php echo $string1."<br>";?></div>

    <div class="slipper" id = 'right'>
<table>
        <?php
    
$c = -1;
foreach($sik as $i=>$e){
    $i1 = strtolower($i);
    $i1 = ucfirst($i1);
    $i1 = trim($i1);
    if($c%2 != 0){
    echo"<tr>";
    }
   
    if($i1 == " "){
        
    }
    else{
    echo("<th>$i1: $e </th>");
    }
    
     
   
    if($c%2 == 0){
    echo"</tr>";
    }
    $c++;
}

?>
</table>
    </div>
<form action="" method="get">
<input type="text" class="inputs" name='file' value ='Text' >
<input type='submit'>
</form>
<script></script>
</body>
</html>