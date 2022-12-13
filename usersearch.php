<?php 
        include 'includes/db.php';  
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Magellano - NFT Marketplace Website Template by Ansonika">
    <meta name="author" content="Ansonika">
    <title>Moon Valley - Let's help you Moon!</title>

    <!-- FAVICONS-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/listing.css" rel="stylesheet">
    <!-- Boostrap CDN -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <style>
.container .pagination .active {
  background-color: #267fe6;
  color: white;
}


    </style>
   
</head>
        <header class="header_in clearfix">
        <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.svg" alt="" width="140" height="35">
                </a>
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
                    <a href="index.php"><img src="img/logo.svg" width="120" height="35" alt=""></a>
                </div>
                <ul>
                    <li class="submenu">
                        <a href="index.php" class="show-submenu">Home</a>
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
                        <a href="#" class="show-submenu">Forum</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /header -->
	<main>
<!--
	    <div class="hero_single inner_pages jarallax" data-jarallax>
	        <img class="jarallax-img" src="img/hero_general.jpg" alt="">
	        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
	            <div class="container">
	                <div class="row justify-content-center">
	                    <div class="col-xl-9 col-lg-10 col-md-8">
	                        <h1 class="slide-animated one">Pricing Tables</h1>
	                        <p class="slide-animated two">Collect and sell extraordinary NFTs</p>
	                    </div>
	                </div>
	                
	            </div>
	        </div>
	        <div class="wave hero"></div>
	    </div>
	    /hero_single -->
        
 <div class="container">
	    <div class="container">
                            <div class="container">
                                <div style="height:20px;"></div>
                                 <div class="row author_list">
                                <?php  
                            if(isset($_GET['search_submit'])){  //IF SEARCH BUTTON IS CLICKED, STATE WHAT WHAT IS SEARCHED
                                // SHOW POSTS
                                $sel_sql = "SELECT * FROM users WHERE service LIKE '%$_GET[search]%' OR name LIKE '%$_GET[search]%'";
                                $run_sql = mysqli_query($conn,$sel_sql);
                                   $i = 1;
while($data = mysqli_fetch_array($run_sql))
{ $i++;
 $smedia = $data['category'];
 $service = $data['service'];
switch($smedia){
    case "telegram":
        $smedia = "<i style='color:#0088CC'; class='bi bi-telegram'></i>";
        break;
    case "Telegram & Instagram":
        $smedia = "<i style='color:#0088CC'; class='bi bi-telegram'></i><i style='color:#0088CC'; class='bi bi-telegram'></i>";
        break;
    case "youtube":
        $smedia = "<i style='color: red'; class='bi bi-youtube'></i>";
        break;
         case "instagram":
        $smedia = "<i style='color: red'; class='bi bi-instagram'></i>";
        break;
         case "discord":
        $smedia = "<i style='color: red'; class='bi bi-discord'></i>";
        break;
         case "Telegram_and_Discord":
        $smedia = "<i style='color: red'; class='bi bi-discord'></i><i style='color:#0088CC'; class='bi bi-telegram'></i>";
        break;
        case "Discord & Youtube":
        $smedia = "<i style='color: red'; class='bi bi-discord'></i><i style='color: red'; class='bi bi-youtube'></i>";
        break;
    default:
        $smedia = "<i class='bi bi-hand-index-thumb'></i>";
        break;
}
 switch($service){
    case "AMA":
        $service = "<i class='bi bi-award'></i>";
        break;
    case "Shilling":
        $service = "<i class='bi bi-exclamation-lg'></i>";
        break;
    case "Calls":
        $service = "<i class='bi bi-telephone-fill'></i>";
        break;
    default:
        $service = "";
        break;
}
echo'
	               <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.php?person_id='.$data['id'].'" class="author">
	                        <strong><i class="bi bi-star unlike" id="hello" style="font-size:20px"></i></strong>
	                        <div class="author_thumb veryfied"><i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="uploaded_img/'.$data['image'].'" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>'.$data["name"].'</h6>
	                            <span> Votes: '. $data["votes"].'</span><br>'.$smedia.' '.$service.'
	                        </div>
	                    </a>
	                </div>';
}}
?>
	            </div>
	            <!-- /row -->
                            
    
                                    <!--AFTER CLICKING SEARCH ENDS-->

                            </div>

	    </div>

	    </div>
	    <!-- /bg_gray -->
	    
	</main>
	<!-- /main -->

	<?php 
include 'footer.php';    
?>
	<!--/footer-->
