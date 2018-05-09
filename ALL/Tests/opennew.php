<!DOCTYPE html>
<html>
    <!--font-package.css-->
<head>
<title></title>
<style>
</style>
</head>
<body>
<?php

    //prompt function
    function prompt($prompt_msg){
        echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

        $answer = "<script type='text/javascript'> document.write(answer); </script>";
        return($answer);
    }

    //program
    $prompt_msg = "Please type your name.";
    $name = prompt($prompt_msg);
echo("<script type='text/javascript");
    $output_msg = "Hello there ".$name."!";
    echo($output_msg);

?>
<?php
/*$myfile = fopen(".txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
*/
?>


</body>
</html>