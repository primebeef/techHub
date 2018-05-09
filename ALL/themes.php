
    <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <?php
    if(isset($theme)==false){
$theme = isset($_GET['theme'])?$_GET['theme']:'thedrear';
}
switch($theme){
    case "thedrear":
$main = '#232323';
$primary = '#687082';
$secondary = 'snow';
$highlight = '#4F5563';
$font_h = "'Rubik Mono One', sans-serif";
        break;
        
    case "randomcompliment":
        $c1 = rand(1,255);
        $c2 = rand(1,255);
        $c3 = rand(1,255);
$main = "rgb($c3,$c2,$c1)";
$primary = "rgb($c1,$c2,$c3)";
$secondary = "rgb($c2,$c3,$c1)";
$highlight = '#4F5563';
$font_h = "'Rubik Mono One', sans-serif";

    case "random":
        $c1 = rand(1,255);
        $c2 = rand(1,255);
        $c3 = rand(1,255);
$main = "rgb($c3,$c2,$c1)";
 $c1 = rand(1,255);
        $c2 = rand(1,255);
        $c3 = rand(1,255);
$primary = "rgb($c1,$c2,$c3)";
 $c1 = rand(1,255);
        $c2 = rand(1,255);
        $c3 = rand(1,255);
$secondary = "rgb($c2,$c3,$c1)";
$highlight = '#4F5563';
$font_h = "'Rubik Mono One', sans-serif";
        break;
        
  case "moonmilk":
$main = "#1C2321";
$primary = "#4772B7";
$secondary = "#E6E8ED";
$highlight = '#E6E8ED';
$font_h = "'Orbitron', sans-serif";
        break; 
        
  case "peopleEater":
//body      
$main = "#1E1E24";
//bar
$primary = "#8989F9";
//text
$secondary = "snow";
//shadow
$highlight = '#4F5563';
//font
$font_h = "'Baloo Bhaina', cursive";
        break;

  case "partyhardy":
//body      
$main = "#4D515B";
//bar
$primary = "#ED254E";
//text
$secondary = "snow";
//shadow
$highlight = '#D9DBE0';
//font
$font_h = "'Pacifico', cursive";
        break;
        
case "salmony":
//body      
$main = "#23272B";
//bar
$primary = "#FF5A5F";
//text
$secondary = "#F5F5F5";
//shadow
$highlight = '#F5F5F5';
//font
$font_h = "'Baloo Bhaina', cursive";
        break;
        
case "thepeak":
//body      
$main = "#23272B";
//bar
$primary = "#FF5A5F";
//text
$secondary = "#F5F5F5";
//shadow
$highlight = '#F5F5F5';
//font
$font_h = "'Poppins', sans-serif  ";
        break;
   
                    default:
            $main = 'red';
            $primary = 'green';
            $secondary = 'blue';
            $highlight = 'yellow';
            $font_h = 'cursive';
                    break;

 
}
?>


