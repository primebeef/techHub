<?php include "library-chat.php";
session_start();
$start = getSession('use',0);
echo $start;
?>