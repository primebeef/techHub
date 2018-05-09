<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?
$words = getValue('words');
$array = explode(' ',$words);
foreach($array as $e){
    echo $e."<br>\n";
}
?>
<script></script>
</body>
</html>