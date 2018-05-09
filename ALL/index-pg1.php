<?php include "Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title>Taehros</title>
<?php include "themes.php"; ?>
<style>
<?php include "style.php";?>
</style>
</style>
</head>

<body>
<div id='bar'><h1>Makenna</h1></div>
<div id='main'>
     <form action='index-pg2.php' method='get'>
<?php
$where = isset($_GET['folder'])?$_GET['folder']:'Unit2';
$path = realpath('.');

$goto = $path.'/'.$where;
newtgingrich($goto,'file');

?>
<br>
<input type='text' name='theme' value='<?php echo $theme?>' style="visibility:hidden;">
<input type='text' name='folder' value='<?php echo $where?>' style="visibility:hidden;">
 <input type='submit' class='buttonfit' name='submit' style="visibility:hidden;">
 </form>
    
    </div>


</body>
</html>