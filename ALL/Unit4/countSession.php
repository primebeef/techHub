<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php

$count = getSession('count',0);
$count++;
echo "Page views: $count";
setSession('count',$count);
?>
<script></script>
</body>
</html>