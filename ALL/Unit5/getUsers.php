<?php include "../Library/Tech30Lib.php";
    $link = MYSQLConnect();
    $query = 'users';
    $result = MYSQLQuery($link, "SELECT * from users WHERE 1;");
    MYSQLClose($link);
    echo "<pre>";
   var_dump($result);
        
    
    
printDoctype();
startDoc();
startHead();
makeTitle('Query');
addCSSLink('../Library/formcss.css');
endHead();
startBody();

echo "<table>";
echo"<tr>";
echo "<td><b>Email</b></td>";
echo "<td><b>Name</b></td>";
echo "<td><b>Grade</b></td>";
echo "<td><b>ID</b></td>";
echo"</tr>";
foreach($result as $e){
    echo"<tr>";
    foreach($e as $i){
        echo "<td>";
        echo $i;
        echo "<td>";
    }
    echo"</tr>";
}
echo "</table>";

endBody();
endDoc();
?>
</pre>