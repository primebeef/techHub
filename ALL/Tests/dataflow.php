<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
</style>
</head>
<body>
<?php

    //prompt function
    function prompt($prompt){
        echo("<script type='text/javascript'> var answer = prompt('".$prompt."'); </script>");

        $answer = "<script type='text/javascript'> document.write(answer); </script>";
        return($answer);
    }

    //program
    $prompt = "Please enter a numeral";
    $n = prompt($prompt);

    $output_msg = "YOUR BASE IS ".$n.".";
    echo($output_msg);

?>
<script>
    var <?php echo $n;?>;
    function stateVar(){
    <?php echo $n;?> = prompt("Enter numeral for evaluation");
    <?php echo $n;?> = parseFloat(<?php echo $n;?>)
    var check = isFinite(<?php echo $n;?>);
    while(check == false){
        check = confirm("Continue? The value you entered was non-numneric.")
        if (check == true){
    <?php echo $n;?> = prompt("Enter a numeral for evaluation");
    check = isFinite(<?php echo $n;?>);
    }}
    }

function evalVar_m(){
var x = <?php echo $n;?>;    
while(x > 0){
var product = <?php echo $n;?>*x
document.write(x+","+<?php echo $n;?>+"    "+product + "<br>");
x = x - 1
<?php echo $n;?> = <?php echo $n;?> + 1
}
}
</script>
</body>
</html>