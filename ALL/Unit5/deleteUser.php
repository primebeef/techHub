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

echo "<table class='form'>";
echo"<tr>";
echo "<td><b>Email</b></td>";
echo "<td><b>Name</b></td>";
echo "<td><b>Grade</b></td>";
echo "<td><b>ID</b></td>";
echo"</tr>";
foreach($result as $e){
    echo"<tr>";
    $s = 0;
    foreach($e as $i){
        
        echo "<td>";
        if($s == 3){
            makeSubmit ($i, 'submit');
        }
        else{
            echo $i;
        }
        
        echo "<td>";
        $s++;
    }
    echo"</tr>";
}
echo "</table>";

endBody();
endDoc();
?>
</pre>