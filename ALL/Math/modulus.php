<!DOCTYPE html>
<html>
<head>
<!--
  Assignment: 
  Name: 
-->
<title></title>
<style>
table{
    border-collapse:collapse;
    border:1px solid black;
}
td,th{
   border:1px solid black; 
}
</style>
</head>
<body>
    <table>
        
<script>

    var x = prompt("Value");
    x = parseInt(x);
    var y = x;
    
    ShowBoth(x,y);
function ShowBoth(x,y){
    document.write("<tr>"+
            "<th>Numerals</th>"+
            "<th>Modulus</th>"+
            "<th>Variant</th>"+
            "<th>TRUE?</th>"+
        "</tr>"
        )
    var low = x;
    var high = y;
    while(low > 1){
        var variate = (low*high);
        var variate1 = ((low - 1)*(high + 1));
        
        var variant = variate1 - variate;
        var modulus = ((low*high)%(high + 1));
        document.write("<tr>");
        document.write("<td>"+low+" x "+high+"</td>");
        document.write("<td>"+modulus+"</td>");
        document.write("<td>"+variant+"</td>");
         if ((variant *(-1))== modulus){
        document.write("<td style = 'color:green;'>"+"TRUE"+"</td>");
        }
        document.write("</tr>");
       
        low = low - 1;
        high = high + 1;
    
    }
}
</script>
</table>
</body>
</html>