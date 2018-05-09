<?php include "library-chat.php";
session_start();
$user = getSession('user');
$name = $DIRx_USER[$user]['firstname']." ".$DIRx_USER[$user]['lastname'];

?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
    <pre>
        <?php
echo "Welcome, $name!";
var_dump($DIRx_USER[$user]['chatrooms']['kent']) ;
foreach($DIRx_USER[$user]['chatrooms'] as $i){
    $en = $i['name'];
    echo "<button name=\"$en\">$en</button>";
}
//present_rooms($user);
?>
    </pre>

<script></script>
</body>
</html>