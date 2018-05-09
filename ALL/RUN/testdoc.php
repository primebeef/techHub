<?php include_once "basic.php"; printDoctype();?>
<pre>
    <?php
$max = file_get_contents("text.txt");
//FORMAT_array(GEN_array($max,"_"));
//FORMAT_tree(GEN_array($max,"_"));
$arrayex = array(

"FirstName" => "Makenna",

"LastName" => "Turner",

"BirthYear" => "2002",

"BirthMonth" => "03",

"BirthDay" => "04",

"FavColor" => "TalcumBlue",

);
//SRC_keydirective($arrayex,"Makenna",true);
PARSIER("//show inGreen 'my name is jay.' //show inBlue 'hello!'");
?>
</pre>
