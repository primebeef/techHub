<!DOCTYPE html>

<html>
<head>

<!--
  Assignment: 
  Name: 
  Extension: Upper and Lower case (differenciated?)
-->
<title></title>
<style>
@import url('https://fonts.googleapis.com/css?family=Lato');
</style>
<?php echo("<link rel='stylesheet' type='text/css' href='uegrufbidgusghf.css'>")
?>
<style>

</style>
</head>
<body>
<div class="form">
    <label id="logheader"style="font-size:30px;">Translate to Pig-latin</label>
  <form method="post">
     <br>
    <label for="" class="inputs" required>Word</label>
    <input type="text" class="inputs" name="word">
  


    <input type="submit" value="Translate">
  </form>
</div>
<div id="phraseplace">
<?php
$phrase = isset($_REQUEST['word'])?$_REQUEST['word']:null;
if($phrase != null){

$phrase = trim($phrase);

$local = strcspn($phrase,'aeiouAEIOU');

$long = strlen($phrase);
$fletter = substr($phrase,0,$local);
function isPartUppercase($fletter) {
	if(preg_match("/[A-Z]/", $fletter)===0) {
		return true;
	}
	return false;
}
$check = (isPartUppercase($fletter));
if($check==true){
   $rletter = substr($phrase,$local);
$newphrase = ($rletter.$fletter."ay");
$newphrase =(strtolower($newphrase)); 
}
else if($check==false){
     $rletter = substr($phrase,$local);
$newphrase = ($rletter.$fletter."ay");
$newphrase =(ucfirst(strtolower($newphrase)));
   

}
echo ("<span style=' font-size:30px;'>($phrase) </span><br>") ;
echo $newphrase;
}
?>
</div>


</body>
</html>













