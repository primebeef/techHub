<?php
include "../Library/Tech30Lib.php";
//session start
verifyGLogin();
$userInfo = $_SESSION['userInfo'];
echo "<pre>";
var_dump($userInfo);
echo "</pre>";


?>
<script>
    function signOut(){
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut();
}
function onSignIn(googleUser){
	var profile = googleUser.getBasicProfile();
	console.log("Email: " + profile.getEmail());
}

</script>
<a href="http://www.pumatech.org/glogin/Tech30Signout.php">Sign Out</a>