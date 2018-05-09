<?php include "../Library/Tech30Lib.php"; printDoctype();?>
<html>
<head>
<title></title>
</head>
<style>
    table{
        
    }
    td{
        border: 1px solid black;
    }
</style>
<script>
    
</script>
<body>
<?php
$studentInfo = array(
    'name' => 'John Doe',
    'studentID' => '123456789',
    'age' => 15.5,
    );

    echo $studentInfo['name'];
    $studentInfo['age'] = 16;
        var_dump($studentInfo);
        foreach($studentInfo as $e){
            echo $e." ";
        }
        foreach($studentInfo as $key=>$e){
    echo "$key"."<br>";
}
echo "<table>";
foreach($_GET as $key=>$e){
    echo "<tr><td>$key</td> <td>$e</td></tr>";
    
}
echo "</table>";
?>
<script></script>
</body>
</html>