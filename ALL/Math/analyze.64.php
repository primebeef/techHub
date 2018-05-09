<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<body>
    
<?php
$simp = array(0004, 0013, 0022, 0031, 0040, 0103, 0112, 0121, 0130, 0202, 0211, 0220, 0301, 0310, 0400, 1003, 1012, 1021, 1030, 1102, 1111, 1120, 1201, 1210, 1300, 2002, 2011, 2020, 2101, 2110, 2200, 3001, 3010, 3100, 4000);
$list = array();

$num = range(0,64);

$space = 1;
//var_dump($num);
foreach($simp as $e){
        echo"<table>";

    while($space < 65){
            echo "<tr>";

                echo "<td>";
        $side = (($e * pow($num[$space],2)) % (pow(($e + 1),2)));
        $space++;
        echo "$side";
        echo "</td>";
        if(in_array($side,$list)==true){
            echo "<td>";
             echo "<span style='color:red';>FALSE</span>";
              echo "</td>";
            
        }
        else{
            $list[]= $side;
             echo "<td>";
             echo "<span style='color:green';>TRUE</span>";
              echo "</td>";
        }
        echo "</tr>";
    }
    echo"</table>";
    $space = 0;
}
//echo ((4 * pow(2,2)) % (pow(5,2)));
?>

<script></script>
</body>
</html>