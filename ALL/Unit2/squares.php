<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<ul>
    <?php
$num = getValue('num',10);
$squares = array();
$e = 1;
for($i=0;$i<$num;$i++){
 $squares[$i]= $e*$e;
 $e = $e + 1;

 
}
printArray($squares);
function printArray($array){
    if(is_array($array)==false)return false;
    $size = count($array);
    foreach($array as $i){
        echo "<li>".$i."</li>"; 
    }
}
?>
</ul>

<script></script>
</body>
</html>