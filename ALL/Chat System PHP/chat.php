<?php session_start(); include "library-chat.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
</style>
</head>
<body>
<?php
$start = getSession('user');
echo $start;
?>
</body>
</html>