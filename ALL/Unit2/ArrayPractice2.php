<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
<?php
/*$fruits = ["Apple","Banana","Cherry","Date"];
$fruits[1]="Blueberry";
$fruits[]="Elderberry";
for($i = count($fruits) - 1; $i >= 0; $i = $i - 1){
    echo $fruits[$i]." ";
    }
*/
$arr = array (2, 1, -4, 0, 19);
function additup($array){
    $sum = null;
    foreach($array as $e){
        $sum = $sum + $e;
    }
    return $sum;
}
$total = additup ($arr);
echo "The sum is $total";

//it should output:

//The sum is: 18

//Because 2 + 1 + -4 + 0 + 19 = 18

?>
<script></script>
</body>
</html>