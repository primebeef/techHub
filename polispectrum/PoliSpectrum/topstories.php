<?php 
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['search'])){
        header('Location: search.php?q='.$_POST['search'].'&src=');
    } 
    $fromLogin = $_SESSION['fromLogin'];
    $_SESSION['isLoggedIn'];
    $_SESSION['fullName'];
?>
<!DOCTYPE HTML>
<html>
    <head>
        <META http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <title>Top Stories</title>
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
    <body id = "search">
    <div id = "loader">
            <div class = "dot" id = "dot1"></div>
            <div class = "dot" id = "dot2"></div>
            <div class = "dot" id = "dot3"></div>
        </div>
        <div id = "notOptimized">
            <div class = "container">
                <h1>Sorry! Our current Alpha version is not optimized for mobile sites!</h1>
            </div>
        </div>
<?php 
    ///Add new news sites - instructions:
    ///1) Add new url to $nodes
    ///2) Edit cURL Multi (First use of it)
    ///3) Add new getRequests call

    $time_start = microtime(true);
    $endResponseTitle = array();
    $endResponseImg = array();
    $endResponseDate = array();
    $endResponseSource = array();
    $endResponseDesc = array();
    $usedNums = array();
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

    $searchTerm = "";
    function insertRequests($table, $max){
        global $mysqli, $endResponseTitle, $endResponseImg, $endResponseSource, $endResponseDesc, $end, $endResponseDate;
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT $max";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()){
            $endResponseTitle[] = stripcslashes($row['title']);
            $endResponseDesc[] = stripcslashes($row['description']);
            $endResponseSource[] = stripcslashes($row['url']);
            $endResponseImg[] = stripcslashes($row['imgSrc']);
            $t = strtotime($row["date"]);
            $endResponseDate[] = date('M d',$t);
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['spectrum']))
    {
        sendRanks();
    }

    function getRank($site){
        global $mysqli;
        $sql = "SELECT * FROM ranks WHERE id = '$site'";
        $result = $mysqli->query($sql);
        if (!$result) {
            throw new Exception("Database Error ");
        }else{
            while ($row = $result->fetch_assoc()){
                $numTot = $row['total'];
                $num = $row['num'];
            }
        }
        return $numTot/$num;
    }

    $_SESSION['endUrl']=$endResponseSource;
    $_SESSION['endDesc']=$endResponseDesc;
    if (isset($_GET['logout']) == true){
        if ($_GET['logout']==1) {
            $_SESSION['isLoggedIn'] = NULL;
            $_SESSION['fullName'] = NULL;
        }
    }

?>
        <div id = "blur">
        <!-- Navigation Bar -->
        <div class = "hidden" id = "logs"><?php echo $_SESSION['isLoggedIn'] ?></div>
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
        <!-- Breaking News Bar -->
        <div id = "breaking"><span>Top Stories</span></div>
        <div id = "main">
        <div class = "container about">
        <div class = "spectrum container">
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
        </div></div>
        <div class = "container topStories">
            <div id = "mostPopular">
                <div id = "titleGradient">
                    <h2>Most Recent</h2>
                </div>
                <ul>
                    <a href="javascript:void(0);" onclick="openModal(1)"><li>
                        <div class = "recentContainer">
                            <?php echo '<img src = "'.$endResponseImg[1].'" id="img1"/>';?>
                            <div class = "recentOverlay" id = "overlay1">
                                <?php 
                                $src = $endResponseSource[1];
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
                                <h6 id = "overlay1Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Conservative";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h6>
                            </div>
                            <script type = "text/javascript">
                    var i = 1;
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
                </script>
                        </div>
                        <div id = "title1"><h5><?php echo $endResponseTitle[1];?></h5></div>
                    </li></a>
                    
                    <a href="javascript:void(0);" onclick="openModal(12)"><li>
                        <div class = "recentContainer">
                            <?php echo '<img src = "'.$endResponseImg[12].'" id="img12"/>';?>
                            <div class = "recentOverlay" id = "overlay12">
                                <?php 
                                $src = $endResponseSource[12];
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
                                <h6 id = "overlay12Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Conservative";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h6>
                            </div>
                            <script type = "text/javascript">
                    var i = 12;
                    var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
                </script>
                        </div>
                        <div id = "title12"><h5><?php echo $endResponseTitle[12];?></h5></div>
                    </li></a>
                    
                    <a href="javascript:void(0);" onclick="openModal(10)"><li>
                        <div class = "recentContainer">
                            <?php echo '<img src = "'.$endResponseImg[10].'" id="img10"/>';?>
                            <div class = "recentOverlay" id = "overlay10">
                                <?php 
                                $src = $endResponseSource[10];
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
                                <h6 id = "overlay10Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Conservative";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h6>
                            </div>
                            <script type = "text/javascript">
                    var i = 10;
                    var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
                </script>
                        </div>
                        <div id = "title10"><h5><?php echo $endResponseTitle[10];?></h5></div>
                    </li></a>
                    
                    <a href="javascript:void(0);" onclick="openModal(7)"><li>
                        <div class = "recentContainer">
                            <?php echo '<img src = "'.$endResponseImg[7].'" id="img7"/>';?>
                            <div class = "recentOverlay" id = "overlay7">
                                <?php 
                                $src = $endResponseSource[7];
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
                                <h6 id = "overlay7Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Conservative";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h6>
                            </div>
                            <script type = "text/javascript">
                    var i = 7;
                    var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
                </script>
                        </div>
                        <div id = "title7"><h5><?php echo $endResponseTitle[7];?></h5></div>
                    </li></a>
                    
                    <a href="javascript:void(0);" onclick="openModal(14)"><li>
                        <div class = "recentContainer">
                            <?php echo '<img src = "'.$endResponseImg[14].'" id="img14"/>';?>
                            <div class = "recentOverlay" id = "overlay14">
                                <?php 
                                $src = $endResponseSource[14];
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
                                <h6 id = "overlay14Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Conservative";
                                    } else{
                                        echo "Center";
                                    }
                                ?></h6>
                            </div>
                            <script type = "text/javascript">
                    var i = 14;
                    var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
                </script>
                        </div>
                        <div id = "title14"><h5><?php echo $endResponseTitle[14];?></h5></div>
                    </li></a>
                </ul>
            </div>
            <div class = "topStory main container">
            
                <a href="javascript:void(0);" onclick="openModal(11)">
                    <div class = "hidden" id = "hidden_11"><?php print $endResponseSource[11];?></div>
                                        
                    <h1 id="title11"><?php print "<span>".$endResponseTitle[11]."</span>"; ?></h1>
                    <div class = "topStory main image">
                        <?php echo '<img src = "'.$endResponseImg[11].'" id="img11"/>';?>
                        <div class = "overlay" id = "overlay11">
                            <?php 
                                $src = $endResponseSource[11];
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
                                    $rank = getRank(11);
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
                            <h2 id = "overlay11Txt"><?php 
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
                <a href="javascript:void(0);" onclick="openModal(2)">
                    <div class = "hidden" id = "hidden_2"><?php print $endResponseSource[2];?></div>
                
                <div class = "otherStory">
                    <?php echo '<img src = "'.$endResponseImg[2].'" id = "img2"/>';?>
                    <div class = "overlay" id = "overlay2">
                        <?php 
                                $src = $endResponseSource[2];
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
                    <h2 id = "title2"><?php print "<span>".$endResponseTitle[2]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h2>
                </div></a>
                <a href="javascript:void(0);" onclick="openModal(13)">
                    <div class = "hidden" id = "hidden_13"><?php print $endResponseSource[13];?></div>
                
                <div class = "otherStory">
                    <?php echo '<img src = "'.$endResponseImg[13].'" id = "img13"/>';?>
                    <div class = "overlay" id = "overlay13">
                        <?php 
                                $src = $endResponseSource[13];
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
                    <h2 id = "title13"><?php print "<span>".$endResponseTitle[13]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h2>
                </div></a>
                <a href="javascript:void(0);" onclick="openModal(4)">
                    <div class = "hidden" id = "hidden_4"><?php print $endResponseSource[4];?></div>
                    
                <div class = "otherStory">
                    <?php echo '<img src = "'.$endResponseImg[4].'" id = "img4"/>';?>
                    <div class = "overlay" id = "overlay4">
                        <?php 
                                $src = $endResponseSource[4];
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
                    <h2 id = "title4"><?php print "<span>".$endResponseTitle[4]."</span>";?><p><?php echo $srcName; ?> - <?php echo date('M d'); ?></h2>
                </div></a>
            </div>
            
        </div>
        <div class = "container about topstorypage">
           

    <?php if ($endResponseTitle[9] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('9')">
                <div class = "searchResult">
                    <?php if (is_null($endResponseImg[9]) || $endResponseImg[9] == ''){
                        echo '<img src = "images/placeholderpolispectrum.png" id = "img9"/>';
                    }else{ echo '<img src = "'.$endResponseImg[9].'" id = "img9"/>';}?>
                    <div class = "searchOverlay" id = "overlay9">
                    <?php
                        $src = $endResponseSource[9];
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

                                echo "<img src = '".$src."' class = 'logo'/>";?>
                        <span id = "overlay9Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></span>
                    </div>
                </div>
                <div class = "container">
                    <h1 id = "title9"><span><?php echo htmlspecialchars($endResponseTitle[9]);?></span></h1>
                    <h4><?php echo $srcName." - ".$endResponseDate[9]; ?></h4>
                    <p><?php echo substr($endResponseDesc[9], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 9;
                    var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(89, 21, 168, 0.77)";
                }
                </script>
            </div>
    <?php } ?>
         
    <?php if ($endResponseTitle[8] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('8')">
                <div class = "searchResult">
                    <?php if (is_null($endResponseImg[8]) || $endResponseImg[8] == ''){
                        echo '<img src = "images/placeholderpolispectrum.png" id = "img8"/>';
                    }else{ echo '<img src = "'.$endResponseImg[8].'" id = "img8"/>';}?>
                    <div class = "searchOverlay" id = "overlay8">
                        <?php
                        $src = $endResponseSource[8];
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

                                echo "<img src = '".$src."' class = 'logo'/>";?>
                        <span id = "overlay8Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></span>
                    </div>
                </div>
                <div class = "container">
                    <h1 id = "title8"><span><?php echo htmlspecialchars($endResponseTitle[8]);?></span></h1>
                    <h4><?php echo $srcName." - ".$endResponseDate[8]; ?></h4>
                    <p><?php echo substr($endResponseDesc[8], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 8;
                    var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
                </script>
            </div>
    <?php } ?>
        
        <?php if ($endResponseTitle[3] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('3')">
                <div class = "searchResult">
                    <?php if (is_null($endResponseImg[3]) || $endResponseImg[3] == ''){
                        echo '<img src = "images/placeholderpolispectrum.png" id = "img3"/>';
                    }else{ echo '<img src = "'.$endResponseImg[3].'" id = "img3"/>';}?>
                    <div class = "searchOverlay" id = "overlay3">
                        <?php
                        $src = $endResponseSource[3];
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

                                echo "<img src = '".$src."' class = 'logo'/>";?>
                        <span id = "overlay3Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></span>
                    </div>
                </div>
                <div class = "container">
                    <h1 id = "title3"><span><?php echo htmlspecialchars($endResponseTitle[3]);?></span></h1>
                    <h4><?php echo $srcName." - ".$endResponseDate[3]; ?></h4>
                    <p><?php echo substr($endResponseDesc[3], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 3;
                    var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
                </script>
            </div>
    <?php } ?>
        
        <?php if ($endResponseTitle[6] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('6')">
                <div class = "searchResult">
                    <?php if (is_null($endResponseImg[6]) || $endResponseImg[6] == ''){
                        echo '<img src = "images/placeholderpolispectrum.png" id = "img6"/>';
                    }else{ echo '<img src = "'.$endResponseImg[6].'" id = "img6"/>';}?>
                    <div class = "searchOverlay" id = "overlay6">
                        <?php
                        $src = $endResponseSource[6];
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

                                echo "<img src = '".$src."' class = 'logo'/>";?>
                        <span id = "overlay6Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></span>
                    </div>
                </div>
                <div class = "container">
                    <h1 id = "title6"><span><?php echo htmlspecialchars($endResponseTitle[6]);?></span></h1>
                    <h4><?php echo $srcName." - ".$endResponseDate[6]; ?></h4>
                    <p><?php echo substr($endResponseDesc[6], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 6;
                    var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(5, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
                </script>
            </div>
    <?php } ?>
    
    <?php if ($endResponseTitle[5] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('5')">
                <div class = "searchResult">
                    <?php if (is_null($endResponseImg[5]) || $endResponseImg[5] == ''){
                        echo '<img src = "images/placeholderpolispectrum.png" id = "img5"/>';
                    }else{ echo '<img src = "'.$endResponseImg[5].'" id = "img5"/>';}?>
                    <div class = "searchOverlay" id = "overlay5">
                        <?php
                        $src = $endResponseSource[5];
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

                                echo "<img src = '".$src."' class = 'logo'/>";?>
                        <span id = "overlay5Txt"><?php 
                                    if ($rank < 40){
                                        echo "Liberal";
                                    } else if ($rank > 60){
                                        echo "Cons.";
                                    } else{
                                        echo "Center";
                                    }
                                ?></span>
                    </div>
                </div>
                <div class = "container">
                    <h1 id = "title5"><span><?php echo htmlspecialchars($endResponseTitle[5]);?></span></h1>
                    <h4><?php echo $srcName." - ".$endResponseDate[5]; ?></h4>
                    <p><?php echo substr($endResponseDesc[5], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 5;
                    var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(5, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
                </script>
            </div>
    <?php } ?>
    </div>
    </div>
    </div>
        <footer>
            <div class = "container">
                <img src = "images/greylogoIndex.png" />
            </div>
            <ul>
                <li>Policy</li>
                <li><a href = "#">Terms of Use</a></li>
                <li><a href = "#">Privacy Policy</a></li>
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
            </div>
        <div class = "hidden">
            <div id = "hidden1"><?php print $endResponseSource[1]; ?></div>
            <div id = "hidden2"><?php print $endResponseSource[2]; ?></div>
            <div id = "hidden3"><?php print $endResponseSource[3]; ?></div>
            <div id = "hidden4"><?php print $endResponseSource[4]; ?></div>
            <div id = "hidden5"><?php print $endResponseSource[5]; ?></div>
            <div id = "hidden6"><?php print $endResponseSource[6]; ?></div>
            <div id = "hidden7"><?php print $endResponseSource[7]; ?></div>
            <div id = "hidden8"><?php print $endResponseSource[8]; ?></div>
            <div id = "hidden9"><?php print $endResponseSource[9]; ?></div>
            <div id = "hidden10"><?php print $endResponseSource[10]; ?></div>
            <div id = "hidden11"><?php print $endResponseSource[11]; ?></div>
            <div id = "hidden12"><?php print $endResponseSource[12]; ?></div>
            <div id = "hidden13"><?php print $endResponseSource[13]; ?></div>
            <div id = "hidden14"><?php print $endResponseSource[14]; ?></div>
        </div>
        <div class = 'hidden'>
            <div class = "hidden" id = "hidden_1_2"><?php print $endResponseDesc[1]; ?></div>
            <div class = "hidden" id = "hidden_2_2"><?php print $endResponseDesc[2]; ?></div>
            <div class = "hidden" id = "hidden_3_2"><?php print $endResponseDesc[3]; ?></div>
            <div class = "hidden" id = "hidden_4_2"><?php print $endResponseDesc[4]; ?></div>
            <div class = "hidden" id = "hidden_5_2"><?php print $endResponseDesc[5]; ?></div>
            <div class = "hidden" id = "hidden_6_2"><?php print $endResponseDesc[6]; ?></div>
            <div class = "hidden" id = "hidden_7_2"><?php print $endResponseDesc[7]; ?></div>
            <div class = "hidden" id = "hidden_8_2"><?php print $endResponseDesc[8]; ?></div>
            <div class = "hidden" id = "hidden_9_2"><?php print $endResponseDesc[9]; ?></div>
            <div class = "hidden" id = "hidden_10_2"><?php print $endResponseDesc[10]; ?></div>
            <div class = "hidden" id = "hidden_11_2"><?php print $endResponseDesc[11]; ?></div>
            <div class = "hidden" id = "hidden_12_2"><?php print $endResponseDesc[12]; ?></div>
            <div class = "hidden" id = "hidden_13_2"><?php print $endResponseDesc[13]; ?></div>
            <div class = "hidden" id = "hidden_14_2"><?php print $endResponseDesc[14]; ?></div>
        </div>
       <div class = "hidden">
            <div id = "hidden1_1"><?php print getRank(1)."%"; ?></div>
            <div id = "hidden2_1"><?php print getRank(2)."%"; ?></div>
            <div id = "hidden3_1"><?php print getRank(3)."%"; ?></div>
            <div id = "hidden4_1"><?php print getRank(4)."%"; ?></div>
            <div id = "hidden5_1"><?php print getRank(5)."%"; ?></div>
            <div id = "hidden6_1"><?php print getRank(6)."%"; ?></div>
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
            var i = 11;
            var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
            var i = 2;
            var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
            var i = 13;
            var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
            var i = 4;
            var varStrText = "overlay"+i+"Txt";
                var varStrColor = "overlay"+i;
                var overlayTxt = document.getElementById(varStrText).innerHTML;
                if (overlayTxt.trim() == "Conservative".trim() || overlayTxt.trim() == "Cons.".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                }
                else if (overlayTxt.trim() == "Liberal".trim()){
                    document.getElementById(varStrColor).style.background = "rgba(9, 27, 188, 0.77)";
                }
                else{
                    document.getElementById(varStrColor).style.background = "rgba(85, 21, 168, 0.77)";
                }
            var count = 0;
            function slideMenu(){
                if (count % 2 == 0){
                    document.getElementById("hiddenMenu").style.left = "calc(100% - 200px)";
                }else{
                    document.getElementById("hiddenMenu").style.left = "100%";
                }
                count += 1;
            }
            var siteNum;
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
                } else{
                    originalSite = 0;
                }
                return originalSite;
            }

            function updateHidden(siteNum){
                document.getElementById('hiddenInp').value=siteNum; 
            }

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
                document.documentElement.style.overflow = 'hidden';  // firefox, chrome
                document.body.scroll = "no"; // ie only
                $("#modal").css({"visibility":"visible"});
                var filterVal = 'blur(5px) brightness(30%)';
               $('#blur')
        .css('filter',filterVal)
        .css('webkitFilter',filterVal)
        .css('mozFilter',filterVal)
        .css('oFilter',filterVal)
        .css('msFilter',filterVal);
        $("#modal").animate({ opacity: 1 }, 300, 'linear');
                file = "search.php?" + "q=&src=" + document.getElementById("hidden"+source).innerHTML;
                document.getElementById("title0").innerHTML = document.getElementById("title"+source).firstChild.innerHTML;
                document.getElementById("content0").innerHTML = document.getElementById("hidden_"+source+"_2").innerHTML;
                document.getElementById("img0").src = document.getElementById("img" + source).src;
                document.getElementById("fullLink").href = document.getElementById("hidden" + source).innerHTML;
                window.history.pushState("object or string", "Title", "/" + file );
                siteNum = findSite(document.getElementById("hidden"+source).innerHTML);
                //updateHidden(findSite(document.getElementById("hidden"+source).innerHTML));
                var varStrColor = "modal0";            
                var rank;
                var table;
                
                originalUrl = document.getElementById("hidden" + source).innerHTML;
                source = "";
                if (originalUrl.indexOf("bbc") !== -1){
                    source = "images/bbc.png";
                    rank = document.getElementById("hidden1_1").innerHTML;
                    rank = parseFloat(rank);
                    table = 'BBC';
                } else if (originalUrl.indexOf("breitbart") !== -1){
                    source = "images/Breitbart_News.png";
                    rank = document.getElementById("hidden2_1").innerHTML;
                    rank = parseFloat(rank);
                    table = 'Breit';
                } else if (originalUrl.indexOf("cnn") !== -1){
                    source = "images/Cnn.png";
                    rank = document.getElementById("hidden3_1").innerHTML;
                    rank = parseFloat(rank);
                    table = 'CNN';
                } else if (originalUrl.indexOf("ap") !== -1){
                    source = "images/ap.png";
                    rank = document.getElementById("hidden4_1").innerHTML;
                    rank = parseFloat(rank);
                    table = 'AP';
                } else if (originalUrl.indexOf("nytimes") !== -1){
                    source = "images/nyt_white.png";
                    rank = document.getElementById("hidden5_1").innerHTML;
                    rank = parseFloat(rank);
                    table = 'NYT';
                } else if (originalUrl.indexOf("wsj") !== -1){
                    source = "https://www.wsj.com/apple-touch-icon.png";
                    rank = document.getElementById("hidden6_1").innerHTML;
                    rank = parseFloat(rank);
                    table = 'WSJ';
                }
                $.ajax({
                    url: 'userController.php', 
                    type: "POST",
                    data: ({specPos: rank, 
                        articleURL: originalUrl, 
                        source: table})
                });    

                document.getElementById("modalLogo").src = source;
                if (rank > 60){
                    document.getElementById(varStrColor).style.background = "rgba(168, 1, 68, 0.77)";
                    document.getElementById("modalRank").innerHTML = "Cons.";
                    document.getElementById("fullLink").style.color = "rgba(168, 1, 68, 1)";
                    document.getElementById("modalVote").style.background = "rgba(168, 1, 68, 0.77)";
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
            $( document ).ready(function() {
            $( "#loader" ).fadeTo( "fast" , 0, function() {     
            $(this).css({"visibility":"hidden"});
            $("#BBC").animate({
                    left: $( "#hidden1_1" ).text(),                       
            }, 1500);
            $("#Breit").animate({
                    left: $( "#hidden2_1" ).text(),                       
            }, 1500);
            $("#CNN").animate({
                    left: $( "#hidden3_1" ).text(),                       
            }, 1500);
            $("#AP").animate({
                    left: $( "#hidden4_1" ).text(),                       
            }, 1500);
            $("#nyTimes").animate({
                    left: $( "#hidden5_1" ).text(),                       
            }, 1500);
            $("#wsj").animate({
                    left: $( "#hidden6_1" ).text(),                       
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
            //updateHidden(findSite(document.getElementById("hidden0").innerHTML));
            
            $('.links').click(function(){
            $("#loader").css({"visibility":"visible"});
            $("#loader").animate({ opacity: 1 }, 300, 'linear');
           });
           $(".forms").submit(function() {
            $("#loader").css({"visibility":"visible"});
            $("#loader").animate({ opacity: 1 }, 300, 'linear');
    });
 
        </script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-10361642-1', 'auto');
  ga('send', 'pageview');

</script>

    </body>
</html>




