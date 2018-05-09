<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
$fname = getValue('file','sample.txt');
echo $fname;
    $lines = file($fname);
    foreach($lines as $e) {
        echo $e."<br>\n";
    }
?>
<script></script>
</body>
</html>