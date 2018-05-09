<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
</style>
</head>
<body>
<?php
$dir = '../Unit1';

$handle = opendir($dir);
$filename = readdir($handle);
while($filename != false){
    echo $filename."<br>";
$filename = readdir($handle);

}
closedir($handle);
?>
</body>
</html>