<!DOCTYPE html>
<html>
<head>  
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>MelodieHarris.com</title>
	
	<!--Slick Carousel-->
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

	
	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
      	
      	<!--My style sheet-->
    	<link href="css/styles.css" rel="stylesheet"> 

</head> 
<body>
<div class="container">    
	<div class='row row-content spacer'>&nbsp;</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 titlebox"> 
			<div class="pull-left">
				<img src="img/title.png">
			</div>
			<div class="pull-right hidden-sm hidden-xs">
<?php
show_logout();
?>            
			</div>
			<div class="pull-right hidden-md hidden-lg hidden-xl">
				<a href="#" onclick="toggler('mobileNav');"><img src="img/hamburger.png"></a>
			</div>

		</div>				
	</div>  


	<div class="row" id="mobileNav">
		<div class="col-md-8 col-md-offset-2 contentbox">
			<div class="row">	 
 				<div class='col-md-2 navigation' id="links">
<?php
mobile_nav();
?> 
				</div>	
			</div>
		</div>
	</div>			
				
	<div class="row">
		<div class="col-md-8 col-md-offset-2 contentbox">
			<div class="row">	 
    				<!--START PAGE CONTENT-->
<?php
display_content();
?>                           
				<!--END PAGE CONTENT-->
			</div>
		</div>
	</div>
</div>
	
<footer>
    <div class="container">
        <div class="row row-footer">            
            <div class='col-xs-12 col-sm-11 col-sm-offset-1'>
                <p align=center>© 2016 MelodieHarris.com</p>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript">

	var pic = ["DSCN8842.JPG","DSCN0130.JPG","DSCN0215.JPG","DSCN0606.JPG","P1020461.JPG","P1020471.JPG","P1040188.JPG","P1050753.JPG","P1090897.JPG","P1090986.JPG","DSCN8268.JPG","DSCN8654.JPG"];
	var i = Math.floor((Math.random() * 12)); 
	var myElement = document.querySelector("html");
	//myElement.style.background = "url(../img/" + pic[i] + ") no-repeat fixed center / 100% border-box content-box";
    	myElement.style.background = "url(../img/" + pic[i] + ")";
    	
	$(document).ready(function(){
		$('.single-item').slick({
	  		centerMode: true,
	  		variableWidth: true,
	  		arrows: true
		});	
	});
	
	function toggler(divId) {
    		$("#" + divId).toggle();
	}

</script>  
</body>
</html>    