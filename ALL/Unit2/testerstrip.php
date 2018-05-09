<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
$array = range(8,80,3);
$part = addends($array);
echo $part;
function addends($array){
if(count($array)==0){
    return 0;
}
else{
$i = count($array) - 1;
$new = $array[0] + $array[$i];
return $new;
}
}
?>
<script></script>
</body>
</html>