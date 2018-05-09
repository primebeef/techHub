<!DOCTYPE html>
<html>
<head>
<title></title>
<style>
</style>
<script>
function checkForID(){
        var i = 0;
        var solve = false;
        var checker = Dirx_Human[i][0]
        while(solve == false){
    if(checker == speaker1){
        
        var r = checker
 LOCdatax = i
                                return r;
    solve = true                            
    }
   else if(Dirx_Human.length < i){
       var r = undefined
                                return r;
   }
   i++
}
}
    function checkForID_name(){
        var i = 0
        var quest = false
        while((i <= Dirx_Human[LOCdatax].length)&&(quest == false)){
    if(Dirx_Human[LOCdatax][1]!= undefined){
        quest = true
        var r = ((Dirx_Human[LOCdatax][1].first))
     
    return r;
    break;
         }
         i++
    
}
    }
    
</script>
</head>
<body>
    <script>
        var speakid = [
    "Davey Jones",
    "Super Man",
    "LJ Shearer",
    "Jessica Jones",
    "Jon Snow",
    ]
    </script>
    <script>
        function rand(x){
    var rand = Math.floor(Math.random() * (x));
    return rand;
}
    </script>
    <script>
        function capNoun(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
    </script>
<script>
    var Dirx_Human = [
    
            [   
                "MAKENNA_TURNER",
                Name =
                {
                    first:"Makenna", last:"Turner",
                    
                },
                Basic_Info =
                {
                BDate:"04/03/2002",     
                },
            ]
            
    
        ]
</script>
<script>
//WELCOME FUNCTIONS
    function WEL(){
      var queue =  rand(8);
    switch(queue){
        case 1:
            var say = "Who am I speaking to? "
        break;
        case 2:
            var say = "Who am I speaking to? "
        break;
        case 3:
            var say = "HOWDY! Partner. "
        break;
        case 4:
            var say = "You know nothing? Jon Snow? "
        break;
        case 5:
            var say = "Hello. "
        break;
        case 6:
            var say = "Do you mind telling me who you are? "
        break;
        case 7:
            var say = "Are you Xx_sAmuri-Master_42-xX?! In Real Life!!! "
        break;
        case 8:
            var say = "Have you studied the blade kid? Like me? "
        break;
       default:
       var say = "State your name, please. "
       break;
    }
    queue = rand(6);
    switch(queue){
        case 1:
            var say = say + "A bit blind here..."
            break;
        case 2:
            var say = say + "Better not be a CHAD."
            break;
         case 3:
            var say = say + "I've got candy if you do... ;)"
            break;
    }
    
    return say
    }
</script>
<script>
//document.write(Dirx_Human[0][0]);
var WEL = WEL();
var if_human;
    var speaker = prompt(WEL, speakid[rand(speakid.length)]);

    speaker = speaker.toUpperCase();
speaker1 = speaker.replace(/ +/g, "_");
//document.write(speaker1);
 var check = checkForID();
 
 switch (speaker1){
     case check:
         var who = checkForID_name();
    alert("Welcome Home, " +who +".")
    
         break;
         //case speaker1:
    //var if_human = confirm("Are you a human?")
    case "nope":
             
             break;
    default:
    var if_human = confirm("Are you a human?");
    break;
 }
 if (if_human == true){
     alert()
 }
</script>
</body>
</html>





















