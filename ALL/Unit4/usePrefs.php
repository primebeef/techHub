<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<?php
$color = getcookie('text','BUCKYMYBILL');
$text = getcookie('name');
$back = getcookie('back');
?>
<html>
<head>
<title></title>
<style>
    body{
        color:<?php echo $color;?>;
        background-color:<?php echo $back;?>;
    }
</style>
</head>
<body>
<?php echo $text;?>
<script></script>
</body>
</html>