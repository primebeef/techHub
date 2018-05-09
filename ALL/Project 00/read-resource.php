<?php
include 'resources.php';
var_dump($users);
$size = count($users);
 /*$users[$size] = array(
        'usn' => 'makky',
        'psc' => 'love',
        'email' => 'ceo@neotet.com'
     ); */
     $f = fopen('resources.php', 'a');
/*fputs($f, PHP_EOL.$users[$size] = array(
        'usn' => 'makky',
        'psc' => 'love',
        'email' => 'ceo@neotet.com'
     ));
     
fclose($f);
*/
$users->append(array(
        'usn' => 'makky',
        'psc' => 'love',
        'email' => 'ceo@neotet.com'
     ));
var_dump($users);
?>