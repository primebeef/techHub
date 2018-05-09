<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
$arr = array(1,2,4,8,16,32);
var_dump($arr);
var_dump($_GET);
foreach($_GET as $key=>$e){
    echo "$key=>$e"."<br>";
}
?>
<script></script>
</body>
</html>