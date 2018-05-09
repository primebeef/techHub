<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
    <pre>
<?php echo "You submitted: ";
var_dump($_GET);
var_dump($_POST);
var_dump($_REQUEST);
var_dump($_SERVER);
?>
    </pre>

<script></script>
</body>
</html>