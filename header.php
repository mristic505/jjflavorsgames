<!DOCTYPE html>
<html>
<head>
<?php
if (strpos($url_string, 'page') !== false) {
    
    $page = $_GET['page'];

    if ($page == 'spin') {  
        $page_title = 'Spin the Wheel';                  
    }
    if ($page == 'hidden-pictures') {
         $page_title = 'Hidden Pictures';        
    }
    if ($page == 'memory-match') {
        $page_title = 'Fruity Match';       
    }
    if ($page == 'pop-a-fruit') {
          $page_title = 'Pop a Fruit';       
    }
    if ($page == 'matching-numbers') {
		$page_title = 'Matching Numbers';                   
    }
    if ($page == 'laugh-factory') {
		$page_title = 'Laugh Factory';                   
    }
    if ($page == 'prize-claim-form') {
        $page_title = 'Prize Claim Form';          
    }
    if ($page == 'official-rules') {
        $page_title = 'Official Rules';          
    }
    if ($page == 'faq') {
        $page_title = 'FAQ';          
    }
    if ($page == 'coupon') {
        $page_title = 'Offer';          
    }
    if ($page == 'prizes') {
        $page_title = 'Prizes';          
    }
        
} else {
   $page_title = 'Register';
   $page = 'register';
}
?>	
<title><?php echo $page_title; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" media="all" href="css/style.css?ver=1.0.1"></link>
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/all-ie-only.css" />
<![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery.fortune.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/subprices-ccw.js?ver=1.0.3"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="page-<?php echo $page; ?>">
<header>
	<!-- nav -->
	<div class="nav-holder">
		<nav class="navbar navbar-default">
			  <div class="container-fluid">			  	
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">			      
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    <img class="logo menu-logo" src="img/mobile-menu-logo.png">
			      <nav class="nav">
					<div>
						<ul>
							<li><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?'); ?>">HOME</a></li>
							<li><a href="?page=prizes">PRIZES</a></li>
							<li><a href="?page=official-rules">RULES</a></li>
							<li><a href="?page=faq">FAQS</a></li>
						</ul>
					</div>
				</nav>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
		</nav>
	</div>
	<!-- /nav -->	
</header>
<img class="logo small_logo" src="img/jj-logo.png">
<main>