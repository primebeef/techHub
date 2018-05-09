
<?php include "../Library/Tech30Lib.php"; printDoctype();?>

<?php
$user = getValue('user');
$user = htmlspecialchars(strip_tags(trim($user)));
echo $user;
displayError(textError($user,1,15));
$email = getValue('email');
$email = htmlspecialchars(strip_tags(trim($email)));
echo $email."<br>";
$pass = getValue('pass');
$pass = htmlspecialchars(strip_tags(trim($pass)));
echo $pass;
if(strcspn($pass,'QWERTYUIOPASDFGHJKLZXCVBNM')==strlen($pass)){
   displayError(array(4016));
}
if(strcspn($pass,'1234567890')==strlen($pass)){
    displayError(array(4017));
}
displayError(textError($pass,1,15));
$id = getValue('idn');
$id = htmlspecialchars(strip_tags(trim($id)));
echo $id;
$grade = getValue('grade');
$grade = htmlspecialchars(strip_tags(trim($grade)));
echo $grade;

echo  "<br><a href='Assignment3.2.php?".http_build_query($_POST)."'>Back</a>";
?>
