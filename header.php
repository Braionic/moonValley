<?php 
        include 'includes/db.php';  
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Moon Valley">
    <meta name="author" content="Ansonika">
    <title>Moon Valley - Let's Help You Moon</title>

    <!-- FAVICONS-->
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  

    <!-- SPECIFIC CSS -->
    <link href="css/home.css" rel="stylesheet">
    <link href="css/author.css" rel="stylesheet">
    <link href="css/listing.css" rel="stylesheet">
     <link href="css/submit.css" rel="stylesheet">
     <link href="css/contacts.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <style></style>
</head>

<body>
	
	<!-- /Page Preload -->
				 <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
                            echo '
	<header class="header clearfix element_to_stick">
	    <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
	    <div class="container">
	        <div class="logo">
	            <a href="index.php"><img src="images/Logo.png" data-src="images/Logo.png" width="60" height="30" alt="" class="lazy"></a>
	        </div>
	        <ul class="top_menu">
	            <li><a href="promote.php" class="btn_access">Promote</a></li>
	        </ul>
	        <!-- /top_menu -->
	        <a href="#0" class="open_close">
	            <i class="bi bi-list"></i><span>Menu</span>
	        </a>
	        <nav class="main-menu">
	            <div id="header_menu">
	                <a href="#0" class="open_close">
	                    <i class="bi bi-x"></i>
	                </a>
	                <a href="index.php"><img src="images/Logo.png" data-src="images/Logo.png" width="60" height="30" alt="" class="lazy"></a>
	            </div>
	            <ul>
	                <li>
	                    <a href="promote.php" class="show-submenu">Promote</a>
	                </li>
	                <li>
	                    <a href="user.php" class="show-submenu">Find Influencers</a>
	                </li>
	                <li>
	                    <a href="my-profile.php" class="show-submenu">My Profile</a>
	                </li>
	                <li><a href="signout.php">Signout</a></li>
	            </ul>
	        </nav>
	    </div>
	</header>';
                        } else{
                             echo '
                             <header class="header clearfix element_to_stick">
	    <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
	    <div class="container">
	        <div class="logo">
	            <a href="index.php"><img src="images/Logo.png" data-src="images/Logo.png" width="60" height="30" alt="" class="lazy"></a>
	        </div>
	        <ul class="top_menu">
	            <li><a href="register.php" class="btn_access">Join</a></li>
	        </ul>
	        <!-- /top_menu -->
	        <a href="#0" class="open_close">
	            <i class="bi bi-list"></i><span>Menu</span>
	        </a>
	        <nav class="main-menu">
	            <div id="header_menu">
	                <a href="#0" class="open_close">
	                    <i class="bi bi-x"></i>
	                </a>
	                <a href="index.php"><img src="images/Logo.png" data-src="images/Logo.png" width="60" height="30" alt="" class="lazy"></a>
	            </div>
	            <ul>
	                <li>
	                    <a href="user.php">Find Influencer</a>
	                </li>
	                <li>
	                    <a href="register.php" class="show-submenu">Join</a>
	                    
	                </li>
	                <li><a href="login.php">Run Promotion</a></li>
	            </ul>
	        </nav>
	    </div>
	</header>';
                        }
                    ?>
	<!-- /header -->