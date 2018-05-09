<?php
function MYSQLConnect () {
    $host = 'localhost';
    $un = 'teacher_mjturner';
    $pw = 'P2P.437913';
    $db = 'teach_mjturner';
  
	// connect to the mySQL server
	$link = @mysql_connect($host, $un, $pw) or die (mysql_error());
	
	// select the database
	mysql_select_db($db, $link) or die (mysql_error());

	// return link to the connection (to be used to close it later)
	return $link;
}

function MYSQLQuery ($query) {
	// send query
	$result = mysql_query ($query) or die (mysql_error());

	// check for a success that does not return rows
	if ($result === true) return array();
	
	// if there are results, collect them into an array and return them	
	$resArr = array();
	while (($row = mysql_fetch_assoc ($result)) != false) {
		$resArr[] = $row;
	}	
	return $resArr;
}

function MYSQLClose ($link) {
	mysql_close ($link);
}

$qy=isset($_POST['qy'])?$_POST['qy']:"";    // query

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Query: <br>
<textarea rows="5" cols="80" name="qy"><?php echo $qy; ?></textarea><br>
<input type="submit" name="submit" value="submit">
</form>
<br>
Result:
<br>
<?php

?>