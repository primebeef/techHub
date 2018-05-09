<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
$firstNames = array ('Adam', 'Ben', 'Casey', 'Daphne', 'Evangeline', 'Fleur');
$lastNames = array ('Adamson', 'Bransen', 'Carmichael', 'Davis', 'Farnsworth', 'Gonzalez');
function randomName($first,$last){
$longF = count($first) - 1;
$longL = count($last) - 1;
$newname = array();
$newname['first'] = $first[rand(0,$longF)];
$newname['last'] = $last[rand(0,$longL)];
return $newname;
}
$rand = randomName ($firstNames, $lastNames);
var_dump ($rand);
?>
<script></script>
</body>
</html>