<?php include "Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title>Taehros</title>
<?php include "themes.php"; ?>
<style>
<?php include "style.php";?>


</style>


</head>

<body>
<div id='bar'><form><input class='head' type='submit' name='Makenna' value='Makenna'></form></div>
<div id='main'>
<?php
//$file = $_GET['file'];
//$where = $_GET['folder'];
//echo "$where/$file";
//$fname = getValue($_GET['file'],'sample.txt');
//    $lines = file($fname);
 //   foreach($lines as $e) {
 //       echo $e."<br>\n";
 //   }
?>
     
<?php
$where = isset($_GET['folder'])?$_GET['folder']:'Unit2';
echo $where."<br>";
$file = isset($_GET['file'])?$_GET['file']:'sample.txt';
//echo $file."<br>";
$path = realpath('.');
//echo $path."<br>";
$goto = $where.'/'.$file;
echo $goto."<br>";


?>
<br>


 <iframe id='mainage' src="<?php echo $goto?>" scrolling="no"></iframe>
    </div>


</body>
</html>