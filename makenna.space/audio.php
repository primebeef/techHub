<?php
$sets =  array(
    'classical' => array(
        'clair' => 'clair.mp3',
        'bagatelle' => 'bagatelle.mp3',
        
        ),
    
    );
function audible($name,$audios, $volume = 1){
echo "<audio id=\"$name\">\n";
      echo "<source src=\"$audios\" type=\"audio/mpeg\">\n";
echo "</audio>\n";
echo "<script> var x = document.getElementById(\"$name\");\n 
alert(x);\n
x.volume = $volume;\n
x.playbackRate = 2;\n

x.play(); \n
x.onended = function(){ \n
playnext();
alert(\"audio has ended\")};\n";

 //echo($volume);
}
function player($set, $volume = 1){
    global $sets;
    switch($set){
     case 'classical':
         foreach($sets[$set] as $i => $e){
echo "<audio id=\"$i\">\n";
      echo "<source src=\"$e\" type=\"audio/mpeg\">\n";
echo "</audio>\n";

}
break;
default:
    break;
}
echo "<script> var x = document.getElementById(\"$name\");\n ";
echo " var $set =";
foreach($sets[$set] as $e){
    echo "\"$e,\"";
}
echo"\n";

}
cho($volume);

?>