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
    <title>Magellano - NFT Marketplace Website Template</title>

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
    
    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
   
</head>

<body>
    

    <!-- /Page Preload -->
    
    <header class="header_in clearfix">
        <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <img src="img/logo.svg" alt="" width="140" height="35">
                </a>
            </div>
            <ul class="top_menu">
                <li><a href="login.html" class="btn_access">Log In</a></li>
                <li><a href="connect-wallet.html" class="btn_access">Connect Wallet</a></li>
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
                        <a href="#0" class="show-submenu">Home</a>
                        <ul>
                            <li><a href="index.html">Default</a></li>
                            <li><a href="index-2.html">Experimental Particles</a></li>
                            <li><a href="index-3.html">Video Background</a></li>
                            <li><a href="index-4.html">Vertical Slider</a></li>
                            <li><a href="index-5.html">Slider</a></li>
                            <li><a href="index-6.html">Hero Categories</a></li>
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
                        <a href="#0" class="show-submenu">Pages</a>
                        <ul>
                            <li><a href="404.html">404 Error</a></li>
                            <li><a href="help.html">Help and Faq</a></li>
                            <li class="third-level"><a href="#0">Pricing Tables</a>
                                <ul>
                                    <li><a href="pricing-tables-1.html">Version 1</a></li>
                                    <li><a href="pricing-tables-2.html">Version 2</a></li>
                                    <li><a href="pricing-tables-3.html">Version 3</a></li>
                                </ul>
                            </li>
                            <li><a href="become-author.html">Become an Author</a></li>
                            <li><a href="author-edit-profile.html">Edit profile</a></li>
                            <li><a href="upload-artwork.html">Upload Artwork</a></li>
                            <li><a href="account-settings.html">Account Settings</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul>
                    </li>
                    <li><a href="#0">Buy this template</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /header -->

   <main>
        <div class="filters_full element_to_stick">
            <div class="container">
                <div class="add_bottom_20 clearfix">
                <div class="custom_select" id="filter">
                    <select name="fetchval" id="fetchval">
                        <option value="" disabled="" selected>Sort by Trending</option>
                        <option value="">Male</option>
                        <option value="Female">Sort by Newness</option>
                    </select>
                </div>
                <a href="#collapseFilters" data-bs-toggle="collapse" class="btn_filters"><i class="bi bi-filter"></i><span>Filters</span></a>
                <div class="search_bar_list">
                    <input type="text" class="form-control" id="live_search" placeholder="Search again...">
                </div>
                <a class="btn_search_mobile btn_filters" data-bs-toggle="collapse" href="#collapseSearch"><i class="bi bi-search"></i></a>
            </div>
            </div>
            <div class="collapse filters_2" id="collapseFilters">
                <div class="container margin_detail">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="filter_type">
                                <h6>Categories</h6>
                                <ul>
                                    <li>
                                        <label class="container_check">Art <small>112</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Game <small>90</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Photography <small>140</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Music <small>43</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Video <small>23</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter_type">
                                <h6>Colors</h6>
                                <ul>
                                    <li>
                                        <label class="container_check">Black <small>12</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Green <small>25</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Purple <small>56</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Blue <small>87</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">White <small>43</small>
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter_type">
                                <h6>Status</h6>
                                <ul>
                                    <li>
                                        <label class="container_radio">Buy Now<small>11</small>
                                            <input type="radio" name="filter_4">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_radio">On Auction<small>08</small>
                                            <input type="radio" name="filter_4">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_radio">Has Offers<small>05</small>
                                            <input type="radio" name="filter_4">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="filter_type">
                                <h6>Price</h6>
                                <div class="range_input">Price range from 0 to <span></span> ETH</div>
                                <div><input type="range" min="1" max="5" step="0.2" value="4" data-orientation="horizontal"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- /filters -->
            <div class="collapse" id="collapseSearch">
                <div class="search_bar_list">
                    <input type="text" class="form-control" id="live_search" placeholder="Search again...">
                </div>
            </div>
            <!-- /collapseSearch -->
        </div>
        <!-- /filters_full -->
        <div class="container margin_30_40">
         
	            </div>
	            <!-- /row -->
             

	        		<!--/carousel-->
<?php
if(isset($_POST['request'])){
        $request = $_POST['request'];
    $records = mysqli_query($conn,"Select * from users WHERE category = '$request'");
    $count = mysqli_num_rows($records);
?>
<?php
    if($count){
        
    ?>

 <div>
     <h2>HELLO WORLD</h2>
     <select name="fetchval" id="fetchval">
                        <option value="" disabled="" selected>Sort by Trending</option>
                        <option value="telegram">Telegram</option>
                        <option value="instagram">Instagram</option>
        <option value="youtube">youtube</option>
                    </select>
</div>
<?php
}else{
echo "<div style='color= red';>sorry no recored</div>";
} ?>
<div>
<?php
    while($data = mysqli_fetch_array($records)){ ?>
    <p><?php echo $data['name'] ?></p>
<p><?php echo $data['name'] ?></p>
<p><?php echo $data['category'] ?></p>
<?php } } ?>
    
                        </div>
    
            <!-- /row -->
            <div class="pagination_fg mb-4">
                <a href="#">«</a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">»</a>
            </div>
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->
<?php 
include 'footer.php';    
?>