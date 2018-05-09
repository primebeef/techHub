<!DOCTYPE html>
<html>
<head>
<title>Dataflow</title>
<style>
</style>
</head>
<script>
var n;
    function stateVar(){
    n = prompt("Enter numeral for evaluation");
    n = parseFloat(n)
    var check = isFinite(n);
    while(check == false){
        check = confirm("Continue? The value you entered was non-numneric.")
        if (check == true){
    n = prompt("Enter a numeral for evaluation");
    check = isFinite(n);
    }}
    }

function evalVar_m(){
var x = n;    
document.write("<br><br><br><br>"+n +"<br>")
while(x > 0){
var product = n*x
if(n == (.5*x)||(x==(.5*n))){
    document.write( "<br>"+ "*FOUND DOUBLE*" + "<br>")
}
document.write(x+","+n+"    "+ product + "<br>");
x = x - 1
n = n + 1
}
}
function evalVar_m1(){
var x = n;  
var checked = false;
while(x > 0){
var product = n*x
if(n == (.5*x)||(x==(.5*n))){
    document.write( "<br>"+ "*FOUND DOUBLE*" + "<br>")
    document.write(x+","+n+"    "+ product + "<br>");
    checked = true;
}
x = x - 1
n = n + 1
}
if (checked == false){
    document.write("No values found!")
}
}
function whichEval(){
    var check = confirm("Which Eval");
if (check == true){
    evalVar_m();
}
else if(check == false){
    evalVar_m1();
}
else{}
}
function MinusN(n){
    n = n - 1
}
</script>
<body>
<script>
prompt
    stateVar();
whichEval();

</script>
</body>
</html>




















