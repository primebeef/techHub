<!DOCTYPE html>
<html>
<head>
<title>Dataflow</title>
<style>
</style>
</head>
<script>
var n;
var step;
    function stateVar(){
    n = prompt("Enter numeral for evaluation");
    n = parseFloat(n)
    step = n;
    var check = isFinite(n);
    while(check == false){
        check = confirm("Continue? The value you entered was non-numneric.")
        if (check == true){
    n = prompt("Enter a numeral for evaluation");
    check = isFinite(n);
    }}
    n
    }
function evalVar_m(){
var x = n;  
var checked = false;
document.write("<br><br><br><br>"+n +"<br>")
while(x > 0){
var product = n*x
if(n == (.5*x)||(x==(.5*n))){
    document.write( "<br>"+ "*FOUND*" + "<br>")
    checked = true
}
document.write(x+","+n+"    "+ product + "<br>");
x = x - 1
n = n + 1
}
if (checked == false){
    document.write("No values found!*Simple Multiples.")
}
n = step;
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
    document.write("No values found!*Doubles.")
}
n = step
}
function evalVar_e(){
var x = n;  
var checked = false;
while(x > 0){
var product = n*x
if(n == x){
    document.write( "<br>"+ "*FOUND EQUALITY*" + "<br>")
    document.write(x+","+n+"    "+ product + "<br>");
    checked = true;
}
x = x - 1
n = n + 1
}
if (checked == false){
    document.write("No values found!*Equalities.")
}
n = step;
}
function evalVar_s(){
var x = n;  
var checked = false;
while(x > 0){
var product = n*x
if((Math.sqrt(n)==e)||(Math.pow(e,2)==n)){
    document.write( "<br>"+ "*FOUND SQUARE ROOT*" + "<br>")
    document.write(x+","+n+"    "+ product + "<br>");
    checked = true;
}
x = x - 1
n = n + 1
}
if (checked == false){
    document.write("No values found!*Roots")
}
n =step;
}
function whichEval(){
    var check = prompt("Which Eval? NUMBER! = Show table too.    1: Display all multiples.      2: Show only 1/2 valued multiple occurances.        3: Show only equality occurances.        4:Show only those which one # is SQ or POW of the other.        #: Display all shorthand.");
    
switch (check){
    case "1":
        evalVar_m();
       break;
    case "2":
        evalVar_m1();
        break;
    case "3":
        evalVar_e();
        break;
    case "4":
         evalVar_e();
     break;
    case "#":
       
        evalVar_m1();
        evalVar_e();
        eavlVar_s();
       break;
    case "1!":
        evalVar_m();
        data();
       break;
    case "2!":
        evalVar_m1();
        data();
        break;
    case "3!":
        evalVar_e();
        data();
        break;
    case "4!":
         evalVar_e();
         data();
     break;
    case "#!":
       data();
        evalVar_m1();
        evalVar_e();
        eavlVar_s();
       break;
}
}
</script>
<body>
    <table>
        <script>
            function data(){
             var x = n;    
while(x > 0){
var product = n*x
document.write("<tr>"+"<td>"+n+" x "+x+"</td>"+"<td> "+product+"</td>"+"</tr><br>");
x = x - 1
n = n + 1
}
n = step;   
            }
        </script>
    </table>
<script>
h = 1;


    stateVar();
whichEval();
n = 0;

</script>
</body>
</html>
</html>




















