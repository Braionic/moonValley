<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Magellano - Moon Valley">
    <meta name="author" content="Ansonika">
    <title>Moon Valley - Meet renowned influencers</title>

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
    
    <!--home css -->
    <link href="css/home.css" rel="stylesheet">
    <link href="css/author.css" rel="stylesheet">
    <link href="css/listing.css" rel="stylesheet">
     <link href="css/submit.css" rel="stylesheet">
     <link href="css/contacts.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/detail-page.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
</head>

<body>
	
	
				<?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                            
	<header class="header_in clearfix element_to_stick">
	    <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
	    <div class="container">
	        <div class="logo">
	            <a href="index.php"><img src="images/logo.png" data-src="images/Logo.png" width="60" height="30" alt="" class="lazy"></a>
	        </div>
	        <ul class="top_menu drop_user">
				<li>
					<div class="dropdown user clearfix">
					    <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <?php
         $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$_SESSION[id]'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         
        
      ?>
					        <figure><?php
                                 if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         } ?>
                                </figure>
					        <div class="balance">
					        		<h6 class="mb-0">Balance</h6>
					        		<span><?php echo $fetch["amount"]; ?></span>
					        	</div>
					    </a>
					    <div class="dropdown-menu dropdown-menu-end animate fadeIn">
					        <div class="dropdown-menu-content">
					        	<figure><?php
                                 if($fetch['cover'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['cover'].'">';
         } ?></figure>
					        	<h4><?php echo $fetch["name"]; ?></h4>
					        	 <p class=""><a href="#0"><small style="color: white; background-color: green; border-radius: 2px; padding: 4px;"><?php echo $fetch['status']; ?></small></a></p>
					        	<div class="balance">
					        		<h4>Balance</h4>
					        		<span><?php echo $fetch["amount"]; } ?></span>
					        	</div>
					            <ul>
					            	<li><a href="my-profile.php"><i class="bi bi-person"></i>My profile</a></li>
					            	<li><a href="user-edit-profile.php"><i class="bi bi-pen"></i>Edit profile</a></li>
					            	<li><a href="change-password.php"><i class="bi bi-gear"></i>Change Password</a></li>
					            	<li><a href="signout.php"><i class="bi bi-box-arrow-right"></i>Log out</a></li>
					            </ul>
					        </div>
					    </div>
					</div>
					<!-- /dropdown -->
				</li>
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
                    <li class="submenu">
	                    <a href="promote.php" class="show-submenu">Dashboard</a>
	                </li>
	                <li class="submenu">
	                    <a href="index.php" class="show-submenu">Home</a>
	                </li>
	                <li class="submenu">
	                    <a href="user.php" class="show-submenu">Find Influencers</a>
	                </li>
	            </ul>
	        </nav>
	    </div>
	</header>
                      <?php  } else{
                             echo '
                             <header class="header clearfix element_to_stick">
	    <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
	    <div class="container">
	        <div class="logo">
	            <a href="index.php">
	                <img src="images/Logo.png" alt="MoonValley" width="140" height="35">
	            </a>
	        </div>
	        <ul class="top_menu">
	            <li><a href="login.php" class="btn_access">Log In</a></li>
	            <li><a href="register.php" class="btn_access">Become an Influencer</a></li>
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
	                <li class="submenu">
	                    <a href="index.php" class="show-submenu">Home</a>
	                    <ul>
	                        <li><a href="index.php">Default</a></li>
	                        <li><a href="index-2.html">Experimental Particles</a></li>
	                        <li><a href="index-10.html">Particles</a></li>
	                        <li><a href="index-3.html">Video Background</a></li>
	                        <li><a href="index-4.html">Vertical Slider</a></li>
	                        <li><a href="index-5.html">Slider</a></li>
	                        <li><a href="index-6.html">Hero Categories</a></li>
	                        <li><a href="index-11.html">Hero Vesion 2</a></li>
	                        <li><a href="index-7.html">GDPR Cookie Bar EU Law</a></li>
	                        <li><a href="index-8.html">Modal Advertise</a></li>
	                        <li><a href="index-9.html">Modal Newsletter</a></li>
	                    </ul>
	                </li>
	                <li class="submenu">
	                    <a href="#0" class="show-submenu">Explore</a>
	                    <ul>
	                        <li><a href="grid-listing-1.html">Grid Listing Default</a></li>
	                        <li><a href="grid-listing-2.html">Grid Listing Isotope Sort</a></li>
	                        <li><a href="grid-listing-3.html">Grid Listing Filters Left</a></li>
	                        <li><a href="detail-page.html">Detail page 1</a></li>
	                        <li><a href="detail-page-2.html">Detail page 2</a></li>
	                        <li><a href="author.html">Author page</a></li>
	                    </ul>
	                </li>
	                <li class="submenu">
	                    <a href="user.php" class="show-submenu">Influencers</a>
	                </li>
	                <li><a href="#0">To the Moon</a></li>
	            </ul>
	        </nav>
	    </div>
	</header>';
                        }
                    ?>
	<!-- /header -->