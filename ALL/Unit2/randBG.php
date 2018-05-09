<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<?php
$alto = array('blue','red','green','yellow','orange','purple','salmon');
$num = count($alto);
$color = rand(0,$num - 1);
?>
<html>
<head>
<title></title>
</head>
<style>
    body{
        background-color:<?php echo $alto[$color]?>;
    }
</style>
<body>
<?php 
echo 'no';
echo $color
?>
<script></script>
</body>
</html>