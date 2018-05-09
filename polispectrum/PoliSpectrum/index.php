<?php 
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['search'])){
        header('Location: search.php?q='.$_POST['search'].'&src=');
    } 
    if (!isset($_SESSION['isLoggedIn'])){
        $_SESSION['isLoggedIn'] = NULL;
        $_SESSION['fullName'] = NULL;
    }
    if (!isset($_SESSION['fromLogin'])){
        $_SESSION['fromLogin'] = FALSE;
    }
    $fromLogin = $_SESSION['fromLogin'];

    $_SESSION['isLoggedIn'];
    $_SESSION['fullName'];
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
    <body>
        <div id = "loader">
            <div class = "dot" id = "dot1"></div>
            <div class = "dot" id = "dot2"></div>
            <div class = "dot" id = "dot3"></div>
        </div>

<?php 
    ///Add new news sites - instructions:
    ///1) Add new url to $nodes
    ///2) Edit cURL Multi (First use of it)
    ///3) Add new getRequests call
    $endResponseTitle = array();
    $endResponseContent = array();
    $endResponseImg = array();
    $endResponseSource = array();
    $endResponseDesc = array();
    $usedNums = array();
// <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
// <script>
//   (adsbygoogle = window.adsbygoogle || []).push({
//     google_ad_client: "ca-pub-4944006221813969",
//     enable_page_level_ads: true
//   });
// </script>

    $loc = 0;
    $mysqli = new mysqli("localhost", "kjxbrzwctm", "JVWQ73XG7V9HZ", "kjxbrzwctm");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    for($i = 0; $i < 6; $i++)
    {
        //BBC
        if ($i == 0){
            insertRequests('BBC', 2);
        }
        //Breitbart
        else if ($i == 1){
            insertRequests('Breit', 5);
        }
        else if ($i == 2){
            insertRequests('CNN', 4);
        }
        else if ($i == 3){
            insertRequests('AP', 3);
        }
        else if ($i == 4){
            insertRequests('NYT', 5);
        }
        else if ($i == 5){
            insertRequests('WSJ', 2);
        }
    }

    /* SIGNUP SYSTEM */ 
    $requiredFields = array('emailSignUpBox', 'passwordSignUpBox', 'nameSignUpBox', 'politicalSignUpBox', 'locationSignUpBox');
    
    function display(){
        global $mysqli, $error, $requiredFields, $email, $pass, $name, $stance, $options;
        $error = false;
        foreach($requiredFields as $field) {
          if (empty($_POST[$field])) {
            $error = true;
            break;
          }
        }

        if ($error) {
          echo '<script>';
          echo 'alert("All fields are required!")';
          echo '</script>';
        } else {
            $email = $_POST['emailSignUpBox'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $pass = $_POST['passwordSignUpBox'];
                $name = mysqli_escape_string($mysqli, $_POST['nameSignUpBox']);
                $stance = mysqli_escape_string($mysqli, $_POST['politicalSignUpBox']);
                $location = mysqli_escape_string($mysqli, $_POST['locationSignUpBox']);
                $email = mysqli_escape_string($mysqli, $email);
                $options = [
                    'cost' => 9,
                ];
                $pass = mysqli_escape_string($mysqli, password_hash($pass, PASSWORD_BCRYPT, $options));
                $sql = "INSERT IGNORE INTO `userbase` (`userID`, `email`, `password`, `fullName`, `politicalStance`, `location`) VALUES (NULL, '$email', '$pass', '$name', '$stance', '$location')";
                $result = $mysqli->query($sql);
                if ($mysqli->affected_rows == 0 || $result === FALSE){
                    echo '<script>';
                    echo 'alert("The email you entered is already in use!")';
                    echo '</script>';
                } else{
                    $sql = "SELECT * FROM `userbase` WHERE email = '$email'";
                    $result = $mysqli->query($sql);
                    while ($row = $result->fetch_assoc()){
                        $_SESSION['isLoggedIn'] = $row['userID'];
                    }
                    $_SESSION['fullName'] = $_POST['nameSignUpBox'];
                    echo '<script>';
                    echo 'alert("You are logged in!")';
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'alert("The entered email is not valid!")';
                echo '</script>';
            }
        }
        unset($_POST["signup"]);
        unset($_POST["emailSignUpBox"]);
        unset($_POST["passwordSignUpBox"]);
        unset($_POST["nameSignUpBox"]);
        unset($_POST["politicalSignUpBox"]);
        unset($_POST["locationSignUpBox"]);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup']) && $fromLogin == TRUE){
        $_SESSION['fromLogin'] = FALSE;
        $_SESSION['isLoggedIn'] = NULL;
        $_SESSION['userName'] = NULL;
        display();
    } 

    /* SIGNIN SYSTEM */ 
    $requiredFields = array('emailLogInBox', 'passwordLogInBox');
    
    function login(){
        global $mysqli, $error, $requiredFields, $email, $enteredPass, $pass, $name, $stance, $options;
        $error = false;
        $_SESSION['isLoggedIn'] = NULL;
        foreach($requiredFields as $field) {
          if (empty($_POST[$field])) {
            $error = true;
            break;
          }
        }

        if ($error) {
          echo '<script>';
          echo 'alert("You have not entered all your details!")';
          echo '</script>';
          $_SESSION['isLoggedIn'] = NULL;
        } else {
            $email = $_POST['emailLogInBox'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $enteredPass = $_POST['passwordLogInBox'];
                $sql = "SELECT * FROM `userbase` WHERE email = '$email'";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()){
                    $pass = $row['password'];
                    if (password_verify($enteredPass, $pass)){
                        echo '<script>';
                        echo 'alert("Log in successful!")';
                        echo '</script>';
                        $_SESSION['isLoggedIn'] = $row['userID'];
                        $_SESSION['fullName'] = $row['fullName'];
                    } else{
                        echo '<script>';
                        echo 'alert("Password wrong")';
                        echo '</script>';
                        $_SESSION['isLoggedIn'] = NULL;
                    }
                }
                if ($mysqli->affected_rows == 0){
                    echo '<script>';
                    echo 'alert("Email wrong!")';
                    echo '</script>';
                    $_SESSION['isLoggedIn'] = NULL;
                }

            } else {
                echo '<script>';
                echo 'alert("The entered email is not valid!")';
                echo '</script>';
                $_SESSION['isLoggedIn'] = NULL;
            }
        }
        unset($_POST["signin"]);
        unset($_POST["passwordLogInBox"]);
        unset($_POST["passwordSignUpBox"]);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signin']) && $fromLogin == TRUE){
        $_SESSION['fromLogin'] = FALSE;
        $_SESSION['userName'] = NULL;
        login();
    } 


    function insertRequests($table, $max){
        global $mysqli, $endResponseTitle, $endResponseContent, $endResponseImg, $endResponseSource, $endResponseDesc, $end;
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $max";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()){
            $endResponseTitle[] = stripcslashes($row['title']);
            $endResponseDesc[] = stripcslashes($row['description']);
            $endResponseSource[] = stripcslashes($row['url']);
            $endResponseImg[] = stripcslashes($row['imgSrc']);
        }
    }

    function getRank($site){
        global $mysqli;
        $sql = "SELECT * FROM ranks WHERE id = '$site'";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()){
            $numTot = $row['total'];
            $num = $row['num'];
        }
        return $numTot/$num;
    }
    
    $_SESSION['urls']=$endResponseSource;
    $_SESSION['images']=$endResponseImg;
    $_SESSION['desc']=$endResponseDesc;
    $_SESSION['titles']=$endResponseTitle;

    if (isset($_GET['logout']) == true){
        if ($_GET['logout']==1) {
            $_SESSION['isLoggedIn'] = NULL;
            $_SESSION['fullName'] = NULL;
        }
    }


?>

        <div id = "blur">
        <!-- Navigation Bar -->
        <nav>
            <a href = "index.php"><img id = "logo" src = "images/polispectrum_logo.png" class = "links"/></a>
                <ul>
                    <li><a href = "topstories.php" class = "links">Top Stories</a></li>
                    <li><a href = "construction.html" class = "links greyLink">Spectrum</a></li>
                    <li><a href = "hottopics.php" class = "links">Hot Topics</a></li>
                    <li><a href = "construction.html" class = "links greyLink">Videos</a></li>
                    <li><a href = "construction.html" class = "links greyLink">About</a></li>
                    <li>
                        <form method = "POST" class = "forms">
                            <input type = "text" name = "search" placeholder="Search"/>
                        </form>
                    </li>
                </ul>
                <div class = "buttonContainer">
                    
                    <?php if (isset($_SESSION['isLoggedIn'])){
                        echo '<a href = "?logout=1" class = "links"><img class = "signupButtons" src = "images/logout.png"/></a>';
                    } else{
                        echo '<a href = "?login=1" class = "links"><img class = "signupButtons" src = "images/login.png"/></a>';
                    }?>
                    <?php if ($_SESSION['fullName'] == NULL){
                        echo '<a href = "?login=1" class = "links"><img class = "signupButtons" src = "images/signup.png"/></a>';
                    } else{
                        echo '<span id = "greeting">Hi, '.explode(' ',trim($_SESSION['fullName']))[0].'!</span>';
                    }
                    ?>
                </div>
            <div class = "hamburger">
               
                <div class = "container" id = "hiddenMenu">
                 <span onclick = "slideMenu()" id = "slideIcon">&#9776;</span>
                    <ul>
                        <li id = "logoHam"><img src = "images/greylogoIndex.png" /></li>
                        <li><form method = "POST" class = "forms">
                        <input type = "text" name = "search" placeholder="Search"/>

                    </form></li>
                        <li><?php if (isset($_SESSION['isLoggedIn'])){
                                echo '<a href = "?logout=1.html" class = "button"><span>Log Out</span></a>';
                            } else{
                                echo '<a href = "?login=1.html" class = "button"><span>Log In</span></a>';
                            }?>
                            <a href = "?login=1.html" class = "button"><span>Sign Up</span></a>
                            </li>
                        <li><a href = "topstories.php" class = "links">Top Stories</a></li>
                        <li><a href = "construction.html" class = "links">Spectrum</a></li>
                        <li><a href = "hottopics.php" class = "links">Hot Topics</a></li>
                        <li><a href = "construction.html" class = "links">Videos</a></li>
                        <li><a href = "about.php" class = "links">About</a></li>
                        
                    </ul>
                </div>
            </div>
            <div id = "gradientBorder"></div>
        </nav>
        <h6 id = "alpha">PoliSpectrum Alpha v1</h6>

        <div class = "hidden">
            <div id = "hidden1"><?php print getRank(1)."%"; ?></div>
            <div id = "hidden2"><?php print getRank(2)."%"; ?></div>
            <div id = "hidden3"><?php print getRank(3)."%"; ?></div>
            <div id = "hidden4"><?php print getRank(4)."%"; ?></div>
            <div id = "hidden5"><?php print getRank(5)."%"; ?></div>
            <div id = "hidden6"><?php print getRank(6)."%"; ?></div>
        </div>
        <div class = "hidden" id = "logs"><?php echo $_SESSION['isLoggedIn'] ?></div>

        <!-- Breaking News Bar -->
        <div id = "breaking">
            <span class = "landing"><div>Latest Headlines</div>
            <?php echo '<a href="javascript:void(0);" onclick="openModal(-1)">';
                  echo "<div class = 'hidden' id = 'hidden_1_-1'>".$endResponseDesc[0]."</div>";
            $src = $endResponseSource[0];
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                }

                                echo "<img src = '".$src."'/>";echo $endResponseTitle[0]; 
                                echo '<div class = "hidden" id = "hidden_-1">'.$endResponseSource[0].'</div>';
                                echo '<div class = "hidden" id = "title-1"><span>'.$endResponseTitle[0].'</span></div>';
                                echo '<div class = "hidden"><img src = "'.$endResponseImg[0].'" id="img-1"/></div>';
                                ?> </a></span> 

        </div>

        <!-- Top Stories -->
        <div id = "main">
        <div class = "container topStories">
            <div class = "topStory main container">
                <h2 class = "title">
                    <img src = "images/newsicon.png"/>
                    <span>Top Stories</span>
                </h2>
                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);
                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(1)">';
                    ?>
                    <div class = "hidden" id = "hidden_1"><?php print $endResponseSource[$loc];?></div>
                                        
                    <h1 id="title1"><?php print "<span>".$endResponseTitle[$loc]."</span>"; ?></h1>
                    <div class = "topStory main image">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id="img1"/>';?>
                        <div class = "overlay" id = "overlay1">
                            <?php 
                                $src = $endResponseSource[$loc];
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_1'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                            <ul>
                                <li><?php echo date('M d'); ?></li>
                                <li><?php echo $srcName; ?></li>
                            </ul>
                            <h2 id = "overlay1Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Conservative";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class = "container otherStories">
                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(2)">';
                    ?>
                    <div class = "hidden" id = "hidden_2"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "otherStory">
                    <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img2"/>';?>
                    <div class = "overlay" id = "overlay2">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_2'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay2Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>
                    </div>
                    <h2 id = "title2"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h2>
                </div></a>
                <?php 
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(3)">';
                    ?>
                    <div class = "hidden" id = "hidden_3"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "otherStory">
                    <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img3"/>';?>
                    <div class = "overlay" id = "overlay3">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_3'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }
                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay3Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>
                    </div>
                    <h2 id = "title3"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h2>
                </div></a>
                <?php 
                            do{
                                $usedNums[] = $loc;
                                $loc = rand (1, count($endResponseTitle)-1);
                                
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(4)">';
                    ?>
                    <div class = "hidden" id = "hidden_4"><?php print $endResponseSource[$loc];?></div>
                    
                <div class = "otherStory">
                    <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img4"/>';?>
                    <div class = "overlay" id = "overlay4">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_4'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay4Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>
                    </div>
                    <h2 id = "title4"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h2>
                </div></a>
            </div>
            
        </div>

        <div class = "container hotTopics">
            <div class = "border right"></div>
            <h2 class = "title">
                <img src = "images/trendingicon.png"/>
                <span>Hot Topics</span>
            </h2>
            <ol>
                <a href = "search.php?q=Charlotte&src=" class = "links"><li>Charlotte -<span> 521 Stories</span></li></a>
                <a href = "search.php?q=Obama&src=" class = "links"><li>Obama -<span> 414 Stories</span></li></a>
                <a href = "search.php?q=Trump&src=" class = "links"><li>Trump -<span> 405 Stories</span></li></a>
                <a href = "search.php?q=Russia&src=" class = "links"><li>Russia -<span> 309 Stories</span></li></a>
                <a href = "search.php?q=health%20care&src=" class = "links"><li>Health Care -<span> 286 Stories</span></li></a>
                <a href = "search.php?q=immigration&src=" class = "links"><li>Immigration -<span> 246 Stories</span></li></a>
                <a href = "search.php?q=north%20korea&src=" class = "links"><li>North Korea -<span> 230 Stories</span></li></a>
                <a href = "search.php?q=senate&src=" class = "links"><li>Senate -<span> 199 Stories</span></li></a>
                <a href = "search.php?q=white%20house&src=" class = "links"><li>White House -<span> 165 Stories</span></li></a>
                <a href = "search.php?q=military&src=" class = "links"><li>Military -<span> 142 Stories</span></li></a>
            </ol>
        </div>

        <div class = "spectrum container">
            <h2 class = "title">
                <img src = "images/spectrumicon.png"/>
                <span>Spectrum</span>
                <a href = "#" id = "explain">How do we determine this?</a>
                 
            </h2>
            <img src = "images/scroll.png" id = "scroll"/>
        
            <div id = "spectrumBar">
                <span>100</span>
                <span>50</span>
                <span>0</span>
                <span>50</span>
                <span>100</span>
                <p>LIBERAL</p>
                <p>NEUTRAL</p>
                <p>CONSERVATIVE</p>
                <div class = "specContainer" id = "CNN">
                    <img src = "images/Cnn.png" class = "newsLogo"/>
                    <img src = "images/spectrumPoint.png" class = "specPoint"/>
                </div>
                <div class = "specContainer" id = "BBC">
                    <img src = "images/bbc.png" class = "newsLogo"/>
                    <img src = "images/spectrumPoint.png" class = "specPoint"/>
                </div>
                <div class = "specContainer" id = "AP">
                    <img src = "images/ap.png" class = "newsLogo"/>
                    <img src = "images/spectrumPoint.png" class = "specPoint"/>
                </div>
                <div class = "specContainer" id = "Breit">
                    <img src = "images/Breitbart_News.png" class = "newsLogo"/>
                    <img src = "images/spectrumPoint.png" class = "specPoint"/>
                </div>
                <div class = "specContainer" id = "nyTimes">
                    <img src = "images/nyt_black.png" class = "newsLogo"/>
                    <img src = "images/spectrumPoint.png" class = "specPoint"/>
                </div>
                <div class = "specContainer" id = "wsj">
                    <img src = "https://www.wsj.com/apple-touch-icon.png" class = "newsLogo"/>
                    <img src = "images/spectrumPoint.png" class = "specPoint"/>
                </div>
            </div>
           
        </div>

        <div class = "latestNews container">
            <h2 class = "title">
                <img src = "images/latestnews.png"/>
                <span>Latest News</span>
            </h2>
            <div class = "newsContainer 1">
                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(5)">';
                    ?>
                    <div class = "hidden" id = "hidden_5"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id="img5"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay5">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_5'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay5Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title5"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>
                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(6)">';
                    ?>
                    <div class = "hidden" id = "hidden_6"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img6"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay6">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_6'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay6Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title6"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>
                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(7)">';
                    ?>
                    <div class = "hidden" id = "hidden_7"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img7"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay7">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_7'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay7Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title7"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>
                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(8)">';
                    ?>
                    <div class = "hidden" id = "hidden_8"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img8"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay8">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_8'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay8Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title8"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>
                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            $usedNums[] = $loc;
                            $_SESSION['usedNum']=$usedNums;
                            echo '<a href="javascript:void(0);" onclick="openModal(9)">';
                    ?>
                    <div class = "hidden" id = "hidden_9"><?php print $endResponseSource[$loc];?></div>
                    
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img9"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay9">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_9'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay9Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title9"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>
                <img src = "images/arrow.png" class = "moreNewsImg"/>
            </div>
            <div class = "newsContainer moreNews 2" id = "ajaxInsert">
                <img src = "images/arrow.png" class = "moreNewsImg"/>
                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(10)">';
                    ?>
                    <div class = "hidden" id = "hidden_10"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img10"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay10">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_10'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay10Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title10"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>

                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(11)">';
                    ?>
                    <div class = "hidden" id = "hidden_11"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img11"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay11">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_11'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay11Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title11"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>

                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(12)">';
                    ?>
                    <div class = "hidden" id = "hidden_12"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img12"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay12">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_12'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay12Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title12"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>

                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(13)">';
                    ?>
                    <div class = "hidden" id = "hidden_13"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img13"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay13">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_13'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay13Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title13"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>

                <?php 
                            
                            do{
                                $usedNums[] = $loc;$loc = rand (1, count($endResponseTitle)-1);


                            
                            } while (in_array($loc, $usedNums));
                            echo '<a href="javascript:void(0);" onclick="openModal(14)">';
                    ?>
                    <div class = "hidden" id = "hidden_14"><?php print $endResponseSource[$loc];?></div>
                
                <div class = "newsArticle">
                    <div class = "container">
                        <?php echo '<img src = "'.$endResponseImg[$loc].'" id = "img14"/>';?>
                    </div>
                    <div class = "overlay" id = "overlay14">
                        <?php 
                                $src = $endResponseSource[$loc];
                                echo "<div class = 'hidden' id = 'hidden_1_14'>".$endResponseDesc[$loc]."</div>";
                                if (strpos($src, "nytimes") !== false){
                                    $src = "images/nyt_white.png";
                                    $srcName = "New York Times";
                                    $rank = getRank(5);
                                }
                                else if (strpos($src, "cnn") !== false){
                                    $src = "images/Cnn.png";
                                    $srcName = "CNN";
                                    $rank = getRank(3);
                                }
                                else if (strpos($src, "breitbart") !== false){
                                    $src = "images/Breitbart_News.png";
                                    $srcName = "Breitbart";
                                    $rank = getRank(2);
                                }
                                else if (strpos($src, "bbc") !== false){
                                    $src = "images/bbc.png";
                                    $srcName = "BBC";
                                    $rank = getRank(1);
                                }
                                else if (strpos($src, "ap") !== false){
                                    $src = "images/ap.png";
                                    $srcName = "AP";
                                    $rank = getRank(4);
                                }
                                else if (strpos($src, "wsj") !== false){
                                    $src = "https://www.wsj.com/apple-touch-icon.png";
                                    $srcName = "Wall Street Journal";
                                    $rank = getRank(6);
                                }

                                echo "<img src = '".$src."'/>";
                            ?>
                        <h2 id = "overlay14Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h2>

                    </div>
                    <h1 id = "title14"><?php print "<span>".$endResponseTitle[$loc]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h1>
                </div></a>
            </div>
            <div id = "button" class = "moreNewsImg">
                <span>Load More Articles</span>
            </div>
        </div>
        </div>
        
        <footer>
            <div class = "container">
                <img src = "images/greylogoIndex.png" />
            </div>
            <ul>
                <li>Policy</li>
                <li><a href = "Terms%20of%20Use.pdf">Terms of Use</a></li>
                <li><a href = "Privacy%20Policy.pdf">Privacy Policy</a></li>
            </ul>
            <ul>
                <li>Get in Touch</li>
                <li><a href = "#">Contact Us</a></li>
                <li><a href = "#">Feedback</a></li>
                <li><a href = "#">About Us</a></li>
                <li><a href = "#">Newsletter</a></li>
            </ul>
            <ul>
                <li>Social Media</li>
                <li><a href = "#">Facebook</a></li>
                <li><a href = "#">Twitter</a></li>
            </ul>
        </footer>
        </div>
        
        <div id = "modal" style = "visibility: hidden; opacity: 0;">
        <img src = "images/closebutton.png" id = "close" onclick = "closeModal()" />
            <h1 id = "title0">
               Title
            </h1>
            
            
            <div class = "container">
                
                
                <div class  = "wrapper">
                    
                <div class = "modalOverlay">
                <div id = "modalVote">Vote</div>
                <img src = "" id = 'img0'/>
                <div class = "modalBanner" id = "modal0">
                    <img src = "" id = "modalLogo"/>
                    <h2 id = "modalRank"></h2>
                </div>
            </div><div id = "contentWrap">
                <h2 id = "modalTitle"><img src = "images/polispectrumSummaryLgo.png" />Summary</h2>
                <p id = "content0">
                    Content
                </p><a href = "" id = "fullLink" target = "_blank">Read the Full Article</a></div>
                </div>
                <form method = "post" id = "voteModal" action = "sendVotes.php">
                    <h2 id = "modalTitle">Place This Article On The Spectrum</h2>
                    <input type = "range" id = "vote" min = '0' max = '100' step = '1' list = "tickmarks"/>
                    <datalist id="tickmarks">
  <option value="0" label="Liberal">
  <option value="10">
  <option value="20">
  <option value="30">
  <option value="40">
  <option value="50" label="Center">
  <option value="60">
  <option value="70">
  <option value="80">
  <option value="90">
  <option value="100" label="Conservative">
</datalist>

                    <input type = "submit" class = "button" value = "Vote" />
                </form>
            </div>
        </div>

        <?php if (isset($_GET['login'])) {
                if ($_GET['login']==1) {
                    $_SESSION['fromLogin'] = TRUE;
                
        ?>
            <div id = "login">
                <div id = "gradientHeader"><h3>Sign Up / Log In</h3></div>
                <div class = "container">
                    <h2>Sign Up</h2>
                    <form id = "signup" method = "post" action="index.php" class = "border">
                        <input type = "text" name = "emailSignUpBox" placeholder="Email"/>
                        <input type = "password" name = "passwordSignUpBox" placeholder="Password"/>
                        <input type = "text" name = "nameSignUpBox" placeholder="First and Last Name"/>
                        <h5>Political Stance</h5>
                        <input type = "range" name = "politicalSignUpBox" min = '0' max = '100' step = '1' list = "politicalSignUp"/>
                        <datalist id="politicalSignUp">
                          <option value="0" label="Liberal">
                          <option value="10">
                          <option value="20">
                          <option value="30">
                          <option value="40">
                          <option value="50" label="Center">
                          <option value="60">
                          <option value="70">
                          <option value="80">
                          <option value="90">
                          <option value="100" label="Conservative">
                        </datalist>
                        <h5>Location</h5>
                        <select name = "locationSignUpBox">
                            <option value="International">International</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
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
                <script type = "text/javascript">
                $( document ).ready(function() { 
                    var filterVal = 'blur(5px) brightness(30%)';
                       $('#blur')
                .css('filter',filterVal)
                .css('webkitFilter',filterVal)
                .css('mozFilter',filterVal)
                .css('oFilter',filterVal)
                .css('msFilter',filterVal);
                });

                $('html').click(function() {
              document.getElementById("login").style.visibility = "hidden";
              var filterVal = 'blur(0px) brightness(100%)';
                       $('#blur')
                .css('filter',filterVal)
                .css('webkitFilter',filterVal)
                .css('mozFilter',filterVal)
                .css('oFilter',filterVal)
                .css('msFilter',filterVal);
            });

            $('#login').click(function(event){
                event.stopPropagation();
            });

                </script>
            </div>
        <?php }} ?>

        <script type = 'text/javascript'>
            var siteNum = 0;
            for (var i = 1; i <= 9; i++){
                var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 11, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
            }
            $( document ).ready(function() {
                
            $( "#loader" ).fadeTo( "fast" , 0, function() {     
            $(this).css({"visibility":"hidden"});
            $("#BBC").animate({
                    left: $( "#hidden1" ).text(),                       
            }, 1500);
            $("#Breit").animate({
                    left: $( "#hidden2" ).text(),                       
            }, 1500);
            $("#CNN").animate({
                    left: $( "#hidden3" ).text(),                       
            }, 1500);
            $("#AP").animate({
                    left: $( "#hidden4" ).text(),                       
            }, 1500);
            $("#nyTimes").animate({
                    left: $( "#hidden5" ).text(),                       
            }, 1500);   
            $("#wsj").animate({
                    left: $( "#hidden6" ).text(),                       
            }, 1500);   
            }); 
    
        });
        $(document).on('submit','#voteModal',function(){
         $.ajax({
            url: 'sendVotes.php', //This is the current doc
            type: "POST",
            data: ({value: $('#vote').val(), sitenum: siteNum}),
            success: function(data){
                alert("Vote registered!");
                closeModal();
            }
        });        
         return false;
        });

            function slideMenu(){
                if (count % 2 == 0){
                    document.getElementById("hiddenMenu").style.left = "calc(100% - 200px)";
                    $('html, body').animate({
                      'left' : '-75px'
                  });                  
                }else{
                    document.getElementById("hiddenMenu").style.left = "100%";
                    $('html, body').animate({
                      'left' : '0px'
                  });       
                }
                count += 1;
            }
            $('html').click(function() {
              document.getElementById("hiddenMenu").style.left = "100%";
                    $('html, body').animate({
                      'left' : '0px'
                  });       
            });

            $('#hiddenMenu').click(function(event){
                event.stopPropagation();
            });

            $('#modalVote').click(function(event){
                if ($("#logs").text() != ""){
                    $('#contentWrap').css({"display":"none"});
                    $('#contentWrap').animate({
                            'opacity' : '0'
                    });     
                    $('#voteModal').css({"visibility":"visible"});
                    $('#voteModal').animate({
                          'opacity' : '1'
                      });       
                }else{
                    alert("You must be logged in to vote!");
                }
            });
            
            function updateHidden(siteNum){
                document.getElementById('hiddenInp').value=siteNum; 
            }
            var originalSite;
            function findSite(originalUrl){
                if (originalUrl.indexOf("bbc") !== -1){
                    originalSite = 1;
                } else if (originalUrl.indexOf("breitbart") !== -1){
                    originalSite = 2;
                } else if (originalUrl.indexOf("cnn") !== -1){
                    originalSite = 3;
                } else if (originalUrl.indexOf("ap") !== -1){
                    originalSite = 4;
                } else if (originalUrl.indexOf("nytimes") !== -1){
                    originalSite = 5;
                } else if (originalUrl.indexOf("wsj") !== -1){
                    originalSite = 6;
                }  else{
                    originalSite = 0;
                }
                return originalSite;
            }
            var count = 0;
            var openCheck;
            function closeModal(){
                $('#contentWrap').css({"display":"block"});
                $('#voteModal').css({"opacity":"0"});
                $('form#voteModal').css({"visibility":"hidden"});
                $('#contentWrap').css({"opacity":"1"});
                $("#modal").animate({ opacity: 0 }, 300, function(){
                    $("#modal").css({"visibility":"hidden"});
                });
                var filterVal = 'blur(0px) brightness(100%)';
               $('#blur')
        .css('filter',filterVal)
        .css('webkitFilter',filterVal)
        .css('mozFilter',filterVal)
        .css('oFilter',filterVal)
        .css('msFilter',filterVal);
                file = "index.php";
                window.history.pushState("object or string", "Title", "/" + file );
            }    

            function openModal(source){
                $("#modal").css({"visibility":"visible"});
                var filterVal = 'blur(5px) brightness(30%)';
               $('#blur')
        .css('filter',filterVal)
        .css('webkitFilter',filterVal)
        .css('mozFilter',filterVal)
        .css('oFilter',filterVal)
        .css('msFilter',filterVal);
        $("#modal").animate({ opacity: 1 }, 300, 'linear');
                file = "search.php?" + "q=&src=" + document.getElementById("hidden_"+source).innerHTML;
                document.getElementById("title0").innerHTML = document.getElementById("title"+source).firstChild.innerHTML;
                document.getElementById("content0").innerHTML = document.getElementById("hidden_1_"+source).innerHTML;
                document.getElementById("img0").src = document.getElementById("img" + source).src;
                document.getElementById("fullLink").href = document.getElementById("hidden_" + source).innerHTML;
                var currURL = document.getElementById("hidden_" + source).innerHTML;
                window.history.pushState("object or string", "Title", "/" + file );
                siteNum = findSite(document.getElementById("hidden_"+source).innerHTML);
                var varStrColor = "modal0";            
                var rank;
                  
                originalUrl = document.getElementById("hidden_" + source).innerHTML;
                var table;
                source = "";
                if (originalUrl.indexOf("bbc") !== -1){
                    source = "images/bbc.png";
                    rank = document.getElementById("hidden1").innerHTML;
                    rank = parseFloat(rank);
                    table = 'BBC';
                } else if (originalUrl.indexOf("breitbart") !== -1){
                    source = "images/Breitbart_News.png";
                    rank = document.getElementById("hidden2").innerHTML;
                    rank = parseFloat(rank);
                    table = 'Breit';
                } else if (originalUrl.indexOf("cnn") !== -1){
                    source = "images/Cnn.png";
                    rank = document.getElementById("hidden3").innerHTML;
                    rank = parseFloat(rank);
                    table = 'CNN';
                } else if (originalUrl.indexOf("ap") !== -1){
                    source = "images/ap.png";
                    rank = document.getElementById("hidden4").innerHTML;
                    rank = parseFloat(rank);
                    table = 'AP';
                } else if (originalUrl.indexOf("nytimes") !== -1){
                    source = "images/nyt_white.png";
                    rank = document.getElementById("hidden5").innerHTML;
                    rank = parseFloat(rank);
                    table = 'NYT';
                } else if (originalUrl.indexOf("wsj") !== -1){
                    source = "https://www.wsj.com/apple-touch-icon.png";
                    rank = document.getElementById("hidden6").innerHTML;
                    rank = parseFloat(rank);
                    table = 'WSJ';
                }
                $.ajax({
                    url: 'userController.php', 
                    type: "POST",
                    data: ({specPos: rank, 
                        articleURL: currURL, 
                        source: table})
                });    
                document.getElementById("modalLogo").src = source;
                if (rank > 60){
                    document.getElementById(varStrColor).style.background = "rgba(168, 11, 68, 0.77)";
                    document.getElementById("modalRank").innerHTML = "Cons.";
                    document.getElementById("fullLink").style.color = "rgba(168, 11, 68, 1)";
                    document.getElementById("modalVote").style.background = "rgba(168, 11, 68, 0.77)";
                }
                else if (rank < 40){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                    document.getElementById("modalRank").innerHTML = "Liberal";
                    document.getElementById("fullLink").style.color = "rgba(9, 27, 188, 1)";
                    document.getElementById("modalVote").style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                    document.getElementById("modalRank").innerHTML = "Neutral";
                    document.getElementById("fullLink").style.color = "rgba(85, 21, 168, 1)";
                    document.getElementById("modalVote").style.background = "rgba(85, 21, 168, 0.77)";
                }
            }
            

           $('.links').click(function(){
            $("#loader").css({"visibility":"visible"});
            $("#loader").animate({ opacity: 1 }, 300, 'linear');
           });
    $(".forms").submit(function() {
            $("#loader").css({"visibility":"visible"});
            $("#loader").animate({ opacity: 1 }, 300, 'linear');
    });
    var newsCount = 0;
    $(".latestNews").on("click", ".moreNewsImg", function(){
        if ($(window).width() > 750) {
            if (newsCount % 2 == 0){
                    $(".newsContainer.2").css({"visibility":"visible"});
                    $(".newsContainer.2").animate({ opacity: 1 }, 300, 'linear');
                    $(".newsContainer.1").css({"visibility":"hidden"});
                    $(".newsContainer.1").animate({ opacity: 0 }, 300, 'linear');
                    $(".container.latestNews .newsContainer img.moreNewsImg").css({"float":"left"});
                    var filterVal = 'rotate(180deg)';
                   $('.container.latestNews .newsContainer img.moreNewsImg')
            .css('transform',filterVal)
            .css('webkitTransform',filterVal)
            .css('mozTransform',filterVal)
            .css('oTransform',filterVal)
            .css('msTransform',filterVal);
                } else{
                    $(".newsContainer.1").css({"visibility":"visible"});
                    $(".newsContainer.1").animate({ opacity: 1 }, 300, 'linear');
                    $(".newsContainer.2").css({"visibility":"hidden"});
                    $(".newsContainer.2").animate({ opacity: 0 }, 300, 'linear');
                    $(".container.latestNews .newsContainer img.moreNewsImg").css({"float":"none"});
                    var filterVal = 'rotate(0deg)';
                   $('.container.latestNews .newsContainer img.moreNewsImg')
            .css('transform',filterVal)
            .css('webkitTransform',filterVal)
            .css('mozTransform',filterVal)
            .css('oTransform',filterVal)
            .css('msTransform',filterVal);
                }
                newsCount += 1;
            }else{
                 $(".newsContainer.2").css({"position":"relative"});
                 $(".newsContainer.2").css({"visibility":"visible"});
                    $(".newsContainer.2").animate({ opacity: 1 }, 300, 'linear');
                  $(".newsContainer.2").css({"margin-top":"0"});
            }
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



