<?php
include_once "execute.php";
$page = "The two women dance and forty men sing.";//"The two blind men walk.";
//$QUE =  array("Who is walking?","What is happening?","How many men were there?");

run();
proximity("WOMEN","NUMERICAL");

?>
<pre>
    <?php
    var_dump($brick)
    ?>
</pre>