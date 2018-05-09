<?php 
    
    ///Add new news sites - instructions:
    ///1) Add new url to $nodes
    ///2) Edit cURL Multi (First use of it)
    ///3) Add new getRequests call

    $time_start = microtime(true);
    $endResponseTitle = array();
    $endResponseContent = array();
    $endResponseImg = array();
    $endResponseSource = array();
    $usedNums = array();
    $loc = 0;
    $mysqli = new mysqli("127.0.0.1", "root", "testingpass", "testdb");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    //Run cURL multi to run simultaneous API calls
    $nodes = array("https://newsapi.org/v1/articles?source=bbc-news&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa",
      "https://newsapi.org/v1/articles?source=breitbart-news&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa",
      "https://newsapi.org/v1/articles?source=cnn&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa",
      "https://newsapi.org/v1/articles?source=associated-press&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa",
      "https://newsapi.org/v1/articles?source=the-new-york-times&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa");
    $node_count = count($nodes);
    $curl_arr = array();
    $master = curl_multi_init();
    for($i = 0; $i < $node_count; $i++){
        $url =$nodes[$i];
        $curl_arr[$i] = curl_init($url);
        curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
        curl_multi_add_handle($master, $curl_arr[$i]);
    }
    do {
        curl_multi_exec($master,$running);
    } while($running > 0);
    for($i = 0; $i < $node_count; $i++)
    {
        $results = curl_multi_getcontent  ( $curl_arr[$i]  );
        //BBC
        if ($i == 0){
            insertRequests('test2table3BBC', $results);
        }
        //Breitbart
        else if ($i == 1){
            insertRequests('test2table3Breit', $results);
        }
        else if ($i == 2){
            insertRequests('test2table3CNN', $results);
        }
        else if ($i == 3){
            insertRequests('test2table3AP', $results);
        }
        else if ($i == 4){
            insertRequests('test2table3NY', $results);
        }
    }

    function getContent($response, $startCut, $endCut){
        $pos = strpos($response, ':["');
        $section = "";
        $curChar = $response[$pos];
        $pos += 1;
        while ($curChar != "}"){
            $curChar = $response[$pos];
            if ($curChar == '\\'){
                $pos+=5;
                $curChar = "";
            }
            else if ($curChar == '.'){
                $pos+=3;
                $curChar = ". ";
            }
            $pos +=1;
            $section = $section.$curChar;
        }
        $section = substr($section, $startCut, strpos($section, '"source"') - strlen($section));
        return $section;
    }

    function getTitle($response, $startCut, $endCut){
        $pos = strpos($response, '"title"');
        $section = "";
        $curChar = $response[$pos];
        $pos += 1;
        $quoteCount = 0;
        while ($quoteCount < 4){
            if ($curChar == '"'){
                $quoteCount += 1;
            }
            $curChar = $response[$pos];
            if ($curChar == '\\'){
                $pos+=5;
                $curChar = "";
            }
            $pos +=1;
            $section = $section.$curChar;
        }
        $section = substr($section, $startCut, $endCut);
        return $section;
    }

    $pos = 0;
    $searchTerm = "";
    function returnTitle($response, $startCut, $endCut){
        global $pos;
        $pos = strpos($response, '"title"', $pos);
        $section = "";
        $curChar = $response[$pos];
        $pos += 1;
        $quoteCount = 0;
        while ($quoteCount < 4){
            if ($curChar == '"'){
                $quoteCount += 1;
            }
            $curChar = $response[$pos];
            if ($curChar == '\\'){
                $pos+=1;
                $curChar = "";
            }
            $pos +=1;
            $section = $section.$curChar;
        }
        $section = substr($section, $startCut, $endCut);
        return $section;
    }
    function returnDesc($response, $startCut, $endCut){
        global $pos;
        $pos = strpos($response, '"description"', $pos);
        $section = "";
        $curChar = $response[$pos];
        $pos += 1;
        $quoteCount = 0;
        while ($quoteCount < 4){
            if ($curChar == '"'){
                $quoteCount += 1;
            }
            $curChar = $response[$pos];
            if ($curChar == '\\'){
                $pos+=1;
                $curChar = "";
            }
            $pos +=1;
            $section = $section.$curChar;
        }
        $section = substr($section, $startCut, $endCut);
        return $section;
    }
    function returnUrl($response, $startCut, $endCut){
        global $pos;
        $pos = strpos($response, '"url"', $pos);
        $section = "";
        $curChar = $response[$pos];
        $pos += 1;
        $quoteCount = 0;
        while ($quoteCount < 4){
            if ($curChar == '"'){
                $quoteCount += 1;
            }
            $curChar = $response[$pos];
            if ($curChar == '\\'){
                $pos+=1;
                $curChar = "";
            }
            $pos +=1;
            $section = $section.$curChar;
        }
        $section = substr($section, $startCut, $endCut);
        return $section;
    }
    function returnImage($response, $startCut, $endCut){
        global $pos;
        $pos = strpos($response, '"urlToImage"', $pos);
        $section = "";
        $curChar = $response[$pos];
        $pos += 1;
        $quoteCount = 0;
        while ($quoteCount < 4){
            if ($curChar == '"'){
                $quoteCount += 1;
            }
            $curChar = $response[$pos];
            if ($curChar == '\\'){
                $pos+=1;
                $curChar = "";
            }
            $pos +=1;
            $section = $section.$curChar;
        }
        $section = substr($section, $startCut, $endCut);
        return $section;
    }
    function insertRequests($table, $response){
        global $mysqli, $endResponseTitle, $endResponseContent, $endResponseImg, $endResponseSource;
        for ($i = 0; $i < substr_count ($response, '"url"'); $i++){
            // //Find title of article
            $title = mysqli_real_escape_string($mysqli, returnTitle($response, 8, -2));

            if ($title !== ':\\"ok'){
                //Find description
                $desc = mysqli_real_escape_string($mysqli, returnDesc($response, 14, -2));
                //Find keywords
                $keys = mysqli_real_escape_string($mysqli, 'nothing');
                // //Find URL of article
                $url = mysqli_real_escape_string($mysqli, returnUrl($response, 6, -2));

                $image = mysqli_real_escape_string($mysqli, returnImage($response, 13, -2));

                if (ctype_space($image) || $image == '') {
                    $image = 'none';
                }

                array_push($endResponseTitle, stripcslashes($title));
                array_push($endResponseContent, stripcslashes($desc));
                array_push($endResponseImg, stripcslashes($image));
                array_push($endResponseSource, stripcslashes($url));

                if (strpos($url, 'bbc') !== false) {
                    if (strpos($url, 'news/world-us-canada') !== false){
                        $sql = "INSERT IGNORE INTO `$table` (`title`, `description`, `keywords`, `url`) VALUES ('$title', '$desc', '$keys', '$url')";
                        $result = $mysqli->query($sql);
                        if ($result === FALSE) {
                            echo "Error: " . $sql . "<br><br>" . $mysqli->error;
                        }
                    }
                } else{
                    $sql = "INSERT IGNORE INTO `$table` (`title`, `description`, `keywords`, `url`) VALUES ('$title', '$desc', '$keys', '$url')";
                    $result = $mysqli->query($sql);
                    if ($result === FALSE) {
                        echo "Error: " . $sql . "<br><br>" . $mysqli->error;
                    } 
                }
            }
        }
    }


    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['search'])){
        header('Location: search.php?q='.$_POST['search'].'&src=');
    } 


?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PoliSpectrum</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href = "styles.css" rel = "stylesheet">
    </head>
    <body>
        <div id = "notOptimized">
            <div class = "container">
                <h1>Sorry!</h1>
                <p>Our current Alpha version is not optimized for mobile sites yet!</p>
            </div>
        </div>
        <!-- Navigation Bar -->
        <nav>
            <a href = "index.php"><img id = "logo" src = "images/polispectrum_logo.png"/></a>
                <ul>
                    <li><a href = "construction.html">Top Stories</a></li>
                    <li><a href = "construction.html">Spectrum</a></li>
                    <li><a href = "construction.html">Hot Topics</a></li>
                    <li><a href = "construction.html">Videos</a></li>
                    <li><a href = "about.php">About</a></li>
                    <li>
                        <form method = "POST">
                            <input type = "text" value = "Search" name = "search"/>
                        </form>
                    </li>
                </ul>
                <div class = "buttonContainer">
                    <a href = "construction.html"><img class = "signupButtons" src = "images/login.png"/></a>
                    <a href = "construction.html"><img class = "signupButtons" src = "images/signup.png"/></a>
                </div>
            <div class = "hamburger">
                <span onclick = "slideMenu()">&#9776;</span>
                <div class = "container" id = "hiddenMenu">
                    <ul>
                        <li><a href = "construction.html">Top Stories</a></li>
                        <li><a href = "construction.html">Spectrum</a></li>
                        <li><a href = "construction.html">Hot Topics</a></li>
                        <li><a href = "construction.html">Videos</a></li>
                        <li><a href = "about.php">About</a></li>
                        <li><a href = "construction.html">Log In</a></li>
                        <li><form method = "POST">
                        <input type = "text" value = "Search" name = "search"/>
                    </form></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Breaking News Bar -->
        <div id = "breaking"><span>About Us</span></div>

        <div class = "container about">
            <img src = "images/polispectlogo.png" />
            <h2>Who Are We?</h2>
            <p>We are a team of MIT Launch students looking to give readers a holistic review of critical issues in politics by consciously compiling news outlets
from across the political spectrum. Given the current political climate and the omnipresent distrust in media, we think it is important to empower
Americans to form well rounded opinions by exposing them to a diverse set of perspectives.</p>
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

        <script type = 'text/javascript'>
            var count = 0;
            function slideMenu(){
                if (count % 2 == 0){
                    document.getElementById("hiddenMenu").style.bottom = "calc(100% - 400px)";
                }else{
                    document.getElementById("hiddenMenu").style.bottom = "calc(100% + 100px)";
                }
                count += 1;
            }
        </script>

    </body>
</html>



