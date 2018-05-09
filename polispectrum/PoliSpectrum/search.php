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
        <title>Search Results</title>
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
<?php 
    ///Add new news sites - instructions:
    ///1) Add new url to $nodes
    ///2) Edit cURL Multi (First use of it)
    ///3) Add new getRequests call

    $endResponseTitle = array();
    $endResponseTitle[] = '';
    $endResponseContent = array();
    $endResponseContent[] = '';
    $endResponseImg = array();
    $endResponseImg[0] = '';
    $endResponseDate = array();
    $endResponseDate[] = '';
    $endResponseSource = array();
    $endResponseSource[] = '';
    $endResponseUrl = array();
    $searchUrl = $_GET['src'];
    $firstImg = '';
    $usedNums = array();
    $loc = 0;
    $mysqli = new mysqli("localhost", "kjxbrzwctm", "JVWQ73XG7V9HZ", "kjxbrzwctm");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if ($searchUrl !== ""){
        if (strpos($searchUrl, "nytimes") !== false){
            $db = "NYT";
        } else if (strpos($searchUrl, "bbc") !== false){
            $db = "BBC";                        
        } else if (strpos($searchUrl, "cnn") !== false){
            $db = "CNN";
        } else if (strpos($searchUrl, "ap") !== false){
            $db = "AP";
        } else if (strpos($searchUrl, "breitbart") !== false){
            $db = "Breit";
        } else if (strpos($searchUrl, "wsj") !== false){
            $db = "WSJ";
        }
        $sql = "SELECT * FROM $db WHERE url = '$searchUrl'";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()){
            $firstImg = $row['imgSrc'];
            $endResponseContent[0] = $row['description'];
            $endResponseTitle[0] = $row['title'];
        }
        $endResponseImg[0] = $firstImg;
        $endResponseSource[0] = $searchUrl;
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
    

    $pos = 0;
    $searchTerm = "";
    
    $searchTerm = $_GET['q'];
    $_SESSION['query']=$searchTerm;
    function getRequests($table){
        global $mysqli, $searchTerm, $endResponseSource, $endResponseImg, $endResponseContent, $endResponseDate, $endResponseTitle;
        $searchTerm = mysqli_real_escape_string($mysqli, $searchTerm);

        $sql = "SELECT * FROM $table WHERE description LIKE '%$searchTerm%' ORDER BY id DESC LIMIT 1;";
        $result = $mysqli->query($sql);
        if ($result === FALSE) {
            echo "Error: " . $sql . "<br><br>" . $mysqli->error;
        } 
        else{
            $row = $result->fetch_assoc();
            array_push($endResponseSource, $row["url"]);
            array_push($endResponseImg, $row["imgSrc"]);
            $endResponseContent[] = $row["description"];
            $endResponseTitle[] = $row["title"];
            $t = strtotime($row["date"]);
            if ($t < strtotime('-10 year')){
                $date = date('M d');
                $endResponseDate[] = $date;
            } else{
                $endResponseDate[] = date('M d',$t);
            } 
        }
    }
    function submitForm(){
        getRequests('BBC');
        getRequests('Breit');
        getRequests('CNN');
        getRequests('AP');
        getRequests('NYT');
        getRequests('WSJ');
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

    submitForm();
    if (isset($_GET['logout']) == true){
        if ($_GET['logout']==1) {
            $_SESSION['isLoggedIn'] = NULL;
            $_SESSION['fullName'] = NULL;
        }
    }

?>
        <div class = "hidden" id = "logs"><?php echo $_SESSION['isLoggedIn'] ?></div>
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
                        echo '<a href = "index.php?logout=1" class = "links"><img class = "signupButtons" src = "images/logout.png"/></a>';
                    } else{
                        echo '<a href = "index.php?login=1" class = "links"><img class = "signupButtons" src = "images/login.png"/></a>';
                    }?>
                    <?php if ($_SESSION['fullName'] == NULL){
                        echo '<a href = "index.php?login=1" class = "links"><img class = "signupButtons" src = "images/signup.png"/></a>';
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
        <div id = "breaking"><span><?php print "Search Results for ".$searchTerm; ?></span></div>
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
        </div>
    <?php if ($endResponseTitle[1] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('1')">
                <div class = "searchResult">
                    <?php echo '<img src = "'.$endResponseImg[1].'" id = "img1"/>';?>
                    <div class = "searchOverlay" id = "overlay1">
                        <img src = "images/bbc.png" class = "logo"/>
                        <span id = "overlay1Txt"><?php 
                                $rank = getRank(1);
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
                    <h1 id = "title1"><?php echo htmlspecialchars($endResponseTitle[1]); ?></h1>
                    <h4><?php echo "BBC - ".$endResponseDate[1]; ?></h4>
                    <p><?php echo substr($endResponseContent[1], 0, 150)."..."; ?></p>
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
    <?php } ?>
         
    <?php if ($endResponseTitle[2] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('2')">
                <div class = "searchResult">
                    <?php echo '<img src = "'.$endResponseImg[2].'" id = "img2"/>';?>
                    <div class = "searchOverlay" id = "overlay2">
                        <img src = "images/Breitbart_News.png" class = "logo"/>
                        <span id = "overlay2Txt"><?php 
                                $rank = getRank(2);
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
                    <h1 id = "title2"><?php echo htmlspecialchars($endResponseTitle[2]); ?></h1>
                    <h4><?php echo "Breitbart - ".$endResponseDate[2]; ?></h4>
                    <p><?php echo substr($endResponseContent[2], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 2;
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
    <?php } ?>
        
        <?php if ($endResponseTitle[3] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('3')">
                <div class = "searchResult">
                    <?php echo '<img src = "'.$endResponseImg[3].'" id = "img3"/>';?>
                    <div class = "searchOverlay" id = "overlay3">
                        <img src = "images/Cnn.png" class = "logo"/>
                        <span id = "overlay3Txt"><?php 
                                $rank = getRank(3);
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
                    <h1 id = "title3"><?php echo htmlspecialchars($endResponseTitle[3]); ?></h1>
                    <h4><?php echo "CNN - ".$endResponseDate[3]; ?></h4>
                    <p><?php echo substr($endResponseContent[3], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 3;
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
    <?php } ?>
        
        <?php if ($endResponseTitle[4] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('4')">
                <div class = "searchResult">
                    <?php echo '<img src = "'.$endResponseImg[4].'" id = "img4"/>';?>
                    <div class = "searchOverlay" id = "overlay4">
                        <img src = "images/ap.png" class = "logo"/>
                        <span id = "overlay4Txt"><?php 
                                $rank = getRank(4);
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
                    <h1 id = "title4"><?php echo htmlspecialchars($endResponseTitle[4]); ?></h1>
                    <h4><?php echo "AP - ".$endResponseDate[4]; ?></h4>
                    <p><?php echo substr($endResponseContent[4], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 4;
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
    <?php } ?>
    
    <?php if ($endResponseTitle[5] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('5')">
                <div class = "searchResult">
                    <?php echo '<img src = "'.$endResponseImg[5].'" id = "img5"/>';?>
                    <div class = "searchOverlay" id = "overlay5">
                        <img src = "images/nyt_white.png" class = "logo"/>
                        <span id = "overlay5Txt"><?php 
                                $rank = getRank(5);
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
                    <h1 id = "title5"><?php echo htmlspecialchars($endResponseTitle[5]); ?></h1>
                    <h4><?php echo "New York Times - ".$endResponseDate[5]; ?></h4>
                    <p><?php echo substr($endResponseContent[5], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 5;
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
    <?php } ?>

    <?php if ($endResponseTitle[6] == true){ ?>
        <div class = "searchContainer" onclick = "openModal('6')">
                <div class = "searchResult">
                    <?php echo '<img src = "'.$endResponseImg[6].'" id = "img6"/>';?>
                    <div class = "searchOverlay" id = "overlay6">
                        <img src = "https://www.wsj.com/apple-touch-icon.png" class = "logo"/>
                        <span id = "overlay6Txt"><?php 
                                $rank = getRank(6);
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
                    <h1 id = "title6"><?php echo htmlspecialchars($endResponseTitle[6]); ?></h1>
                    <h4><?php echo "Wall Street Journal - ".$endResponseDate[6]; ?></h4>
                    <p><?php echo substr($endResponseContent[6], 0, 150)."..."; ?></p>
                </div>
                <script type = "text/javascript">
                    var i = 6;
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
    <?php } ?>

    <div id = "button" class = "moreNewsImg">
                <span>Load More Articles</span>
            </div>
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
        </div>
        <?php if ($searchUrl !== ''){ echo '<div id = "modal">';} else { echo '<div id = "modal" style = "visibility: hidden;">';}?>
        <img src = "images/closebutton.png" id = "close" onclick = "closeModal()" />
            <h1 id = "title0">
                <?php if (isset($endResponseTitle[0])){
                    echo $endResponseTitle[0];
                }else{
                    echo 'Title';
                } ?>
            </h1>
            
            
            <div class = "container">
                
                
                <div class  = "wrapper">
                    
                <div class = "modalOverlay">
                <div id = "modalVote">Vote</div>
                <?php if (isset($endResponseImg[0])){
                    echo '<img src = "'.$endResponseImg[0].'" id = "img0"/>';
                } else{
                    echo '<img src = "" id = "img0"/>';
                } ?>
                <div class = "modalBanner" id = "modal0">
                    <img src = "" id = "modalLogo"/>
                    <h2 id = "modalRank"></h2>
                </div>
            </div><div id = "contentWrap">
                <h2 id = "modalTitle"><img src = "images/polispectrumSummaryLgo.png" />Summary</h2>
                <p id = "content0">
                    <?php if (isset($endResponseContent[0])){
                        echo $endResponseContent[0];
                    }else{
                        echo 'Title';
                    } ?>
                </p><?php if (isset($endResponseSource[0])){ echo '<a href = "'.$endResponseSource[0].'" id = "fullLink" target = "_blank">Read the Full Article</a></div>'; } 
                        else { echo '<a href = "" id = "fullLink" target = "_blank">Read the Full Article</a></div>'; } ?>
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
    
            
            
            
            <div class = "hidden">
            <div id = "hidden1_1"><?php print getRank(1)."%"; ?></div>
            <div id = "hidden2_1"><?php print getRank(2)."%"; ?></div>
            <div id = "hidden3_1"><?php print getRank(3)."%"; ?></div>
            <div id = "hidden4_1"><?php print getRank(4)."%"; ?></div>
            <div id = "hidden5_1"><?php print getRank(5)."%"; ?></div>
            <div id = "hidden6_1"><?php print getRank(6)."%"; ?></div>
        </div>

        <div class = "hidden">
            <div id = "hidden1"><?php print $endResponseSource[1]; ?></div>
            <div id = "hidden2"><?php print $endResponseSource[2]; ?></div>
            <div id = "hidden3"><?php print $endResponseSource[3]; ?></div>
            <div id = "hidden4"><?php print $endResponseSource[4]; ?></div>
            <div id = "hidden5"><?php print $endResponseSource[5]; ?></div>
            <div id = "hidden6"><?php print $endResponseSource[6]; ?></div>
            <div id = "hidden0"><?php print $endResponseSource[0]; ?></div>
            <div id = "hidden-1"><?php print $searchTerm; ?></div>
        </div>

        <div class = "hidden">
            <div class = "hidden" id = "hidden1_2"><?php print $endResponseContent[1]; ?></div>
            <div class = "hidden" id = "hidden2_2"><?php print $endResponseContent[2]; ?></div>
            <div class = "hidden" id = "hidden3_2"><?php print $endResponseContent[3]; ?></div>
            <div class = "hidden" id = "hidden4_2"><?php print $endResponseContent[4]; ?></div>
            <div class = "hidden" id = "hidden5_2"><?php print $endResponseContent[5]; ?></div>
            <div class = "hidden" id = "hidden6_2"><?php print $endResponseContent[6]; ?></div>
        </div>


        <script type = 'text/javascript'>
            function colorOverlay(i){
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
            var count = 0;
            var siteNum;
            function slideMenu(){
                if (count % 2 == 0){
                    document.getElementById("hiddenMenu").style.left = "calc(100% - 200px)";
                }else{
                    document.getElementById("hiddenMenu").style.left = "100%";
                }
                count += 1;
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
                }else{
                    originalSite = 0;
                }
                return originalSite;
            }
            var insertCode;
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
                file = (document.URL).split("&src=")[0];
                file = file.split("search.php?").pop();
                file = "search.php?" + file + "&src="
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
                file = (document.URL).split("&src=")[0];
                file = file.split("search.php?").pop();
                file = "search.php?" + file + "&src=" + document.getElementById("hidden"+source).innerHTML;
                document.getElementById("title0").innerHTML = document.getElementById("title"+source).innerHTML;
                document.getElementById("content0").innerHTML = document.getElementById("hidden"+source+"_2").innerHTML;
                document.getElementById("img0").src = document.getElementById("img" + source).src;
                document.getElementById("fullLink").href = document.getElementById("hidden" + source).innerHTML;
                window.history.pushState("object or string", "Title", "/" + file );
                siteNum = findSite(document.getElementById("hidden"+source).innerHTML);
            var varStrText = "hidden" + source + "_1";
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
   
                document.getElementById("modal").style.opacity = "1.0";
            }
            var offsetCount =  1;
            $( document ).ready(function() {

                             $.ajax({
                 url : 'moreSearchResults.php',
                 type : 'GET',
                 data     : 'offset=' + encodeURIComponent(offsetCount),
                dataType : "html",
                 success : function (result) {
                    insertCode = result;
                 },

               });

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
    
                $("#searchBar").attr("placeholder", document.getElementById("hidden-1").innerHTML);
                if ((document.URL).slice(-1) !== "="){
                    var originalUrl = document.getElementById("hidden0").innerHTML; 
                    var varStrColor = "modal0";
                    var rank;
                    var source = "";
               document.getElementById("modal").style.visibility = "visible";
                    document.getElementById("blur").style.filter = "blur(5px) brightness(30%)";
                    document.getElementById("modal").style.opacity = "1";;
                    if (originalUrl.indexOf("bbc") !== -1){
                        source = "images/bbc.png";
                        rank = document.getElementById("hidden1_1").innerHTML;
                        rank = parseFloat(rank);
                    } else if (originalUrl.indexOf("breitbart") !== -1){
                        source = "images/Breitbart_News.png";
                        rank = document.getElementById("hidden2_1").innerHTML;
                        rank = parseFloat(rank);
                    } else if (originalUrl.indexOf("cnn") !== -1){
                        source = "images/Cnn.png";
                        rank = document.getElementById("hidden3_1").innerHTML;
                        rank = parseFloat(rank);
                    } else if (originalUrl.indexOf("ap") !== -1){
                        source = "images/ap.png";
                        rank = document.getElementById("hidden4_1").innerHTML;
                        rank = parseFloat(rank);
                    } else if (originalUrl.indexOf("nytimes") !== -1){
                        source = "images/nyt_white.png";
                        rank = document.getElementById("hidden5_1").innerHTML;
                        rank = parseFloat(rank);
                    } else if (originalUrl.indexOf("wsj") !== -1){
                        source = "https://www.wsj.com/apple-touch-icon.png";
                        rank = document.getElementById("hidden6_1").innerHTML;
                        rank = parseFloat(rank);
                    }
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

            $("#main").on("click", "#button.moreNewsImg", function(){
                offsetCount += 1;
                $(insertCode).insertBefore($("#button.moreNewsImg"));
                 $.ajax({
     url : 'moreSearchResults.php',
     type : 'GET',
     data     : 'offset=' + encodeURIComponent(offsetCount),
                dataType : "html",
     success : function (result) {
        insertCode = result;
     },
   });
                //$("#button.moreNewsImg").hide();
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

  ga('create', 'UA-103611642-1', 'auto');
  ga('send', 'pageview');

</script>

    </body>
</html>




