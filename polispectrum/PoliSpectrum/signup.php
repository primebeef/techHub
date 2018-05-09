<?php
	session_start();
    $_SESSION["fromLogin"] = TRUE;
?>
<!DOCTYPE HTML>
<html>
	<head>
		<META http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <title>PoliSpectrum - Unbiased, Non-Partisan, and Balanced Political News</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="Unbiased, Non-Partisan, Balanced Political News, News">
        <meta name="description" content="See issues and the latest reliable news from across the political spectrum. Tackle media bias one issue at a time. ">
        <meta name="author" content="PoliSpectrum">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href = "styles.css" rel = "stylesheet">
	</head>
	<body id = "signup">
		<div id = "loader">
            <div class = "dot" id = "dot1"></div>
            <div class = "dot" id = "dot2"></div>
            <div class = "dot" id = "dot3"></div>
        </div>
		<div id = "login">
            <div id = "gradientHeader"><h3>Sign Up / Log In</h3></div>
            <div class = "container">
                <h2>Sign Up</h2>
                <form id = "signup" method = "post" action="index.php" class = "border">
                    <input type = "text" name = "emailSignUpBox" placeholder="Email"/>
                    <input type = "password" name = "passwordSignUpBox" placeholder="Password"/>
                    <input type = "text" name = "nameSignUpBox" placeholder="First and Last Name"/>
                    <input type = "text" name = "politicalSignUpBox" placeholder="Political Affiliation"/>
                    <input type = "submit" name = "signup" class = "button" value = "Sign Up">
                </form>
            </div><div class="container">
                <h2>Log In</h2>
                <form id = "signin" method = "post" action="index.php">
                    <input type = "text" name = "emailLogInBox" placeholder="Email"/>
                    <input type = "password" name = "passwordLogInBox" placeholder="Password"/>
                    <input type = "submit" name = "signin" class = "button" value = "Log In">
                </form>
            </div>
        </div>

      	<script type = "text/javascript">
	        $( "#loader" ).fadeTo( "fast" , 0, function() {   
	        	$(this).css({"visibility":"hidden"});  
	        });
 
        </script>
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-103611642-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</body>
</html>