<?php
session_start();

include 'functions.php';
include 'template.php';

function display_content() {
	
	//determine login status
	if ($_SESSION["loggedin"]) { //logged in
	
		//echo "\n\t\t\t<div class='col-md-2'>".
		//	"\n\t\t\t\t<ul class='navigation'>";
		echo "\n\t\t\t\t<div class='col-md-2 navigation hidden-xs hidden-sm'>";
			
		$query = "SELECT * FROM content ORDER BY contentID ASC";
    		$result = mysql_query($query) or die("Unable to run query: " . mysql_error());
    		
    		while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    			
    			$highlighted = "";
    			if ( $GLOBALS["current_page"] == $row[0] ) {
    				
    				$current_class = $row[3];
    				$current_content = $row[2];
    				$current_title = $row[1];
    				$highlighted = " highlighted";
    			} 
    			echo  "\n\t\t\t\t\t<div class='".$row[3]." $highlighted'><a href='?id=".$row[0]."'>".$row[1]."</a></div>"; 			
    		}
			
		echo "\n\t\t\t\t</div>".
			"\n\t\t\t\t<div class='col-md-10 ".$current_class."-content'>\n" . $current_content . "\n\t\t\t\t</div>";
	
	} else { //not logged in, show form

		echo "\n\t\t<div class='col-md-12 padding10'>".
			"\n\t\t\t<p>Login to this site using your access code below:</p>".
			"\n\t\t\t<form action='index.php' method='post' name='myform'>".
			"\n\t\t\t<input type='password' name='accesscode' placeholder='access code' size='12' class='textfield'>".
			"\n\t\t\t<input type='hidden' name='formsubmit' value='true'>".
			"\n\t\t\t<a href='javascript:document.myform.submit();'><img src='img/logon.png'></a>".
			"\n\t\t\t</form>".
			"\n\t\t</div>";
	
	} //end determine login status
}
?>

   