<?php

//DB CONNECT
$dbh = mysql_connect ("localhost","findajob","Qhacjeadco02") or die ('Cannot connect to the database because: ' . mysql_error());
mysql_select_db("mharris") or die ('Cannot select the database because: ' . mysql_error());


//DETERMINE if user submitted a logout request
if (isset($_REQUEST["logout"])) { //user has requested logout
    unset($_SESSION['loggedin']);
}

//DETERMINE if user attempted login
if (isset($_REQUEST["formsubmit"])) { //user has requested login, process submitted data

    $access_code= "";

    if (strpos($_REQUEST["accesscode"], ";") === false) {
        $access_code= $_REQUEST["accesscode"];
    }

    $query = "SELECT * FROM users WHERE code='".$access_code."'";
    
    $result = mysql_query($query) or die("Unable to run query: " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_NUM);
    
    $userID = $row[0];
    $user_name = $row[1];
    
    if ($userID != "") {
    
        //USER HAS SUCCESSFULLY LOGGED IN!
        $_SESSION["loggedin"] = true;
        
        //update user table with last logged in date
        $query = "INSERT INTO login_hist (userID,name) VALUES ( '$userID', '$user_name')";
        $result2 = mysql_query($query) or die(mysql_error());
    }
}

//determine current page user is on
$current_page = "1";

if (isset($_REQUEST["id"])) {
	
	$temp_id = $_REQUEST["id"];
	
	if ($temp_id == "1" || $temp_id == "2" || $temp_id == "3" || $temp_id == "4" || $temp_id == "5" || $temp_id == "6" || $temp_id == "7" ) {
		$current_page = $temp_id;
	}
}
		
		
function mobile_nav() {

		$query = "SELECT * FROM content ORDER BY contentID ASC";
    		$result = mysql_query($query) or die("Unable to run query: " . mysql_error());
    		
    		while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    			
    			$highlighted = "";
    			if ( $GLOBALS["current_page"]  == $row[0] ) {
    				
    				$current_class = $row[3];
    				$current_content = $row[2];
    				$current_title = $row[1];
    				$highlighted = " highlighted";
    			} 
    			echo  "\n\t\t\t\t\t<div class='".$row[3]." $highlighted'><a href='?id=".$row[0]."'>".$row[1]."</a></div>"; 			
    		}
    		echo "\n\t\t\t\t\t<div class='logout'><form action='index.php' method='post' name='myform2'><input type='hidden' name='logout' value='true'><a href='javascript:document.myform2.submit();'>Logout</a></form></div>"; 						
}


function show_logout() {

	if ($_SESSION["loggedin"]) {
			echo "\n\t\t\t<form action='index.php' method='post' name='myform3'>".
			"\n\t\t\t\t<input type='hidden' name='logout' value='true'>".
			"\n\t\t\t\t<a href='javascript:document.myform3.submit();'><img src='img/logout.png'></a>".
			"\n\t\t\t</form>";
	
	} else {

		echo "&nbsp;";
	}
}


?>