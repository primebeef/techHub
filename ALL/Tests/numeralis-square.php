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

function evalVar_s(){
var x = n;  
var checked = false;
while(x > 0){
var product = n*x;
if((Math.sqrt(n)==e)||(Math.pow(e,2)==n)){
    document.write( "<br>"+ "*FOUND SQUARE ROOT*" + "<br>")
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
function evalVar_s1(){
var x = n;  
var checked = false;
while(x > 0){
var product = n*x;
document.write(x+","+n+"    "+ product + "<br>");

if((Math.sqrt(n)==e)||(Math.pow(e,2)==n)){
    document.write( "<br>"+ "*FOUND SQUARE ROOT*" + "<br>")
    checked = true;
}

x = x - 1
n = n + 1
}
if (checked == false){
    document.write("No values found!")
}
}

</script>
<body>
<script>
//var h = prompt("How many values would you like to enter?");
h = 1//parseFloat(h);

while (h > 0){
    stateVar();
evalVar_s1();
h = h - 1
}
</script>
</body>
</html>
</html>




















