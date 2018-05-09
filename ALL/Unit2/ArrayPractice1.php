<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
    <pre><?php
$names = array();
var_dump($names);
$cars = array(
'Ford',
'Honda',
'Toyota',
'GM',
);
var_dump($cars);
$cars[1]='BMW';
var_dump($cars);
echo "<br>".$cars[0];
echo "<br>".count($cars);
$e = 0;
for($i = count($cars);$e < $i;$e++){
    echo $cars[$e];
}
echo "<ol>";
foreach($cars as $e){
    echo "<li>".$e."</li>";
}
echo "</ol>";
?></pre>

<script></script>
</body>
</html>