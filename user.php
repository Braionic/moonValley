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

<body>
    

    <!--<div id="preloader"><div data-loader="circle-side"></div></div> /Page Preload -->
    
    <header class="header_in clearfix">
        <div class="layer"></div><!-- Opacity Mask Menu Mobile -->
        <div class="container">
            <div class="logo">
                <a href="index.php">
                     <a href="index.php"><img src="images/Logo.png" data-src="images/Logo.png" width="60" height="30" alt="" class="lazy"></a>
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
                  
                    
                </ul>
            </nav>
        </div>
    </header>
    <!-- /header -->

   <main>
        <div class="filters_full element_to_stick">
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
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
                <!--<h1>All:</h1><span> 814 found</span>-->
            </div>
            <!-- /page_header -->
            <div id="searchresult"></div>
             <?php $res = mysqli_query($conn,"Select DISTINCT category from users WHERE status!='' ORDER BY votes DESC");
            
            ?>
             <div class="container">
    <select id="category" onChange="selectCategory()">
       <?php while($rows = mysqli_fetch_assoc($res)){ ?>
                        <option value="<?php echo $rows['category']; ?>"><?php echo $rows['category']; ?></option>
         <?php } ?>
                    </select>
    </div>
            <div class="bg_gray">
	        <div class="container margin_120_90">
	            <div class="main_title version_2">
	                <span><em></em></span>
	                <h2>Influencers</h2>
	                <p>Find Influencers from the List of active users below.</p>
	                <!--<a href="#0">View All <i class="bi bi-arrow-right"></i></a>-->
	            </div>
	            <!-- /main_title -->

	            	            <div class="row author_list">
                    <?php
                                    
    
                $limit = 15;

                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }

                $offset = ($page - 1) * $limit;
                
                    $records = mysqli_query($conn,"Select * from users WHERE status!='' AND status!='pending' AND status!='Voter' LIMIT $offset, $limit"); // fetch data from database
$i = 1;
while($data = mysqli_fetch_assoc($records))
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
        $service = "<i class='bi bi-award'></i>";
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
}
?>
	            </div>
	            <!-- /row -->
             

	        </div>
	        <!-- /container -->
                
                <?php
            
            $sql = "SELECT COUNT(*) from users WHERE status!=''";
            $res = mysqli_query($conn, $sql);
            $total_rows = mysqli_fetch_array($res)[0];
            $total_page = ceil($total_rows / $limit);
        ?>
<!-- /row -->
            <div class="pagination_fg mb-4 pagination">
                <a class="nav-link-left nav-link" href="?page=1">«</a>
                <a class="nav-link" href="<?php if($page <= 1){echo '#';}else{echo "?page=".$page -1;} ?>"></a>
                 <?php 
                for($i = 1; $i <= $total_page; $i++){
                    if($page == $i){
                        echo "<a class='active links' href='?page=$i'>".$i."</a>";
                    }else{
                        echo "<a class='links' href='?page=$i'>".$i."</a>";
                    }
                }
            ?>
                <a class="nav-link" href="<?php if($page == $total_page ){echo '#';}else{echo "?page=".$page + 1;} ?>"><i class="fas fa-caret-right"></i></a>
            <a class="nav-link-right nav-link" href="?page=<?php echo $total_page;?>">»</a>
                
            </div>
                <div class="container" style="align-center">
<form action="user.php" method="GET">
            <select name="page" onchange="this.form.submit()">
                <?php 
                    echo "<option value='$page'>Active:".$page."</option>";
                    for($i = 1; $i <= $total_page; $i++){
                        echo "<option value='$i'>".$i."</option>";
                    }
                ?>
            </select>
        </form>
                </div>
	    </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->
<?php 
include 'footer.php';    
?>