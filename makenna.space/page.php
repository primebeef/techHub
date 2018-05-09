<!DOCTYPE html>
<?php include "audio.php";

?>
<html>
<head>
<title>Cosmos</title>
<style>
</style>
</head>
<body>
<?php
audible("bagatelle","bagatelle.mp3",1);
?>
<?php
function current_timesong($which){
    if($which == "time"){
    return "document.write(x.currentTime)</script>";
    }
    else if( $which == 'song'){
     return "document.write(x.src)</script>";   
    }
}
$_SESSION['song'] = current_timesong("song");
echo $_SESSION['song'];
?>

</body>
</html>