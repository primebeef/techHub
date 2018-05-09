<?php
    $mysqli = new mysqli("localhost", "kjxbrzwctm", "JVWQ73XG7V9HZ", "kjxbrzwctm");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    //Run cURL multi to run simultaneous API calls
    $nodes = array("https://newsapi.org/v1/articles?source=bbc-news&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa",
      "https://newsapi.org/v1/articles?source=breitbart-news&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa",
      "https://newsapi.org/v1/articles?source=cnn&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa",
      "https://newsapi.org/v1/articles?source=associated-press&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa",
      "https://newsapi.org/v1/articles?source=the-new-york-times&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa",
      "https://newsapi.org/v1/articles?source=the-wall-street-journal&sortBy=top&apiKey=8631ac336df04e9b89e23b64c18408aa");
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
            insertRequests('BBC', $results);
        }
        //Breitbart
        else if ($i == 1){
            insertRequests('Breit', $results);
        }
        else if ($i == 2){
            insertRequests('CNN', $results);
        }
        else if ($i == 3){
            insertRequests('AP', $results);
        }
        else if ($i == 4){
            insertRequests('NYT', $results);
        }
        else if ($i == 5){
            insertRequests('WSJ', $results);
        }
    }

    //Creates array of URLs to run cURL multi
    $extractURLs = array();

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
    function getContent($response){
        $content = get_string_between($response, '"summary":["', '"],"source"');
        $content = str_replace ('","', ' ' , $content);
        $content = json_decode('"' . str_replace('"', '\"', $content) . '"');
        return $content;
    }
    function checkPolitics($url){
        if (strpos($url, 'bbc') == true) {
                    if (strpos($url, 'news/world-us-canada') == false){
                        return false;
                    }
                }else if (strpos($url, 'cnn') == true) {
                    if (strpos($url, 'politics/') == false){
                        return false;
                    }
                }else if (strpos($url, 'nytimes') == true) {
                    if (strpos($url, '/us/politics/') == false){
                        return false;
                    }
                } else if (strpos($url, 'breitbart') == true) {
                    if (strpos($url, 'big-government/') == false){
                        return false;
                    }
                }
                return true;
    }

    function get_data($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    function RemoveBS($Str) {  
      $StrArr = str_split($Str); $NewStr = '';
      foreach ($StrArr as $Char) {    
        $CharNo = ord($Char);
        if ($CharNo == 163) { $NewStr .= $Char; continue; } // keep £ 
        if ($CharNo > 31 && $CharNo < 127) {
          $NewStr .= $Char;    
        }
      }  
      return $NewStr;
    }
    function insertRequests($table, $response){
        global $mysqli, $endResponseTitle, $endResponseContent, $endResponseImg, $endResponseSource, $endResponseDesc, $end;
        $response = json_decode($response, TRUE);
        for ($i = 0; $i < count($response['articles']); $i++){
            if (checkPolitics(stripcslashes($response['articles'][$i]['url'])) == true){
                $title = mysqli_real_escape_string($mysqli, RemoveBS($response['articles'][$i]['title']));
                $url = mysqli_real_escape_string($mysqli, $response['articles'][$i]['url']);
                $date = mysqli_real_escape_string($mysqli, $response['articles'][$i]['publishedAt']);
                $image = mysqli_real_escape_string($mysqli, $response['articles'][$i]['urlToImage']);
                $desc = mysqli_real_escape_string($mysqli, RemoveBS(getContent(get_data('http://clipped.me/algorithm/clippedapi.php?url='.$url))));
                if (trim($desc) == ""){
                    $desc = mysqli_real_escape_string($mysqli, $response['articles'][$i]['description']);
                }
                $sql = "INSERT IGNORE INTO `$table` (`title`, `description`, `url`, `imgSrc`, `date`) VALUES ('$title', '$desc', '$url', '$image', '$date')";
                $result = $mysqli->query($sql);
                if ($result === FALSE) {
                    echo "Error: " . $sql . "<br><br>" . $mysqli->error;
                } 
            }
        }
        $sql = "UPDATE `$table` SET imgSrc = 'images/placeholderpolispectrum.png' WHERE imgSrc IS NULL OR '';";
        $result = $mysqli->query($sql);
        if ($result === FALSE) {
            echo "Error: " . $sql . "<br><br>" . $mysqli->error;
        } 
    }
?>