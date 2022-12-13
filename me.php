<?php include 'includes/timeoutable.php' ?>
<?php include 'includes/db.php'; ?>
<?php include"header.php"; ?>

            < <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'login.php?login_error=wrong'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Magellano - NFT Marketplace Website Template by Ansonika">
    <meta name="author" content="Ansonika">
    <title>MoonValley - Link up with renowned influencers</title>

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
    <link href="css/author.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>

    <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->

    <main>

         <div class="hero_single inner_pages author_page jarallax" data-jarallax><?php
         $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$_SESSION[id]'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
      ?><?php
                                 if($fetch['cover'] == ''){
            echo '<img src="images/default-avatar.png" class="jarallax-img">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['cover'].'" alt="" class="lazy" width="100%" height="100%">';
         } }?>
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            </div>
            <div class="wave hero"></div>
        </div>
        <!-- /hero_single -->
        
        
        <div class="container margin_30_40">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="main_profile">
                        <div class="author">           
                            <div class="author_thumb veryfied">
                                <i class="bi bi-check"></i>
                                <figure>
                                    <?php
         $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$_SESSION[id]'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
      ?>
                    <?php
                                 if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'" alt="" class="lazy" width="100" height="100">';
         } }?>
                                
                                </figure>
                            </div>
                        </div>
                        <?php  
                        $sel_sql = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                        $run_sql = mysqli_query($conn,$sel_sql);
                        while($rows = mysqli_fetch_assoc($run_sql)){
                        $telegram = $rows['telegram'];
                        $youtube = $rows['youtube'];
                        $instagram = $rows['instagram'];
                        $smedia = $rows['category'];
                        switch($smedia){
                            case "telegram":
                                $smedia = "<a style='background-color: #0088cc;' href='$telegram;' class='btn_1 full-width mb-2'>Telegram</a>";
                                break;
                            case "youtube":
                                $smedia = "<a style='background-color: red;' target='_blank' href='$youtube;' class='btn_1 full-width mb-2'>Youtube</a>";
                                break;
                            default:
                                $smedia = "<a style='background-color: red;' target='_blank' href='$instagram;' class='btn_1 full-width mb-2'>Instagram</a>";
                                break;
                        } ?>
                        <h1><?php echo $rows['name']; ?></h1>
                        <p class="author_number">1673784990938<a href="#0"><i class="bi bi-clipboard"></i></a></p>
                        <p><?php echo $rows['about']; ?></p>
                        
                            <?php echo $smedia; ?>
                         
                        <a style='background-color: green;' target='_self' href='user-edit-profile.php' class='btn_1 full-width mb-2'>Edit</a>
                        
                        
                        <ul>
                            <li>Email <span><?php echo $rows['email']; ?></span></li>
                            <li>Country <span><?php echo $rows['country']; ?></span></li>
                            <li>Mobile <span><?php echo $rows['phone_no']; ?></span></li>
                            <li>Gender <span><?php echo $rows['gender']; ?></span></li>
                        </ul>
                        <small>Member since <?php echo $rows['created_at']; }?></small>
                        <div class="follow_buttons">
                            <ul>
                                <li><a href="#0"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#0"><i class="bi bi-facebook"></i></a></li>
                                <li><a href="#0"><i class="bi bi-twitter"></i></a></li>
                                <li><a href="#0"><i class="bi bi-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 ps-lg-5">
                    <div class="tabs_detail">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a id="tab-C" href="#pane-C" class="nav-link" data-bs-toggle="tab" role="tab">Wishlist</a>
                            </li>
                            <li class="nav-item">
                                <a id="tab-D" href="#pane-D" class="nav-link" data-bs-toggle="tab" role="tab">Voters</a>
                            </li>
                        </ul>
                        <div class="tab-content" role="tablist">
                            <div id="pane-A" class="card tab-pane fade show active" role="tabpanel">
                                <div class="card-header" role="tab" id="heading-A">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A">
                                            Influencers
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-A" class="collapse" role="tabpanel">
                                   <div class="row author_list">
                    <?php
                    $records = mysqli_query($conn,"Select * from users ORDER BY name DESC"); // fetch data from database
$i = 1;
while($data = mysqli_fetch_array($records))
{ $i++;
 $smedia = $data['category'];
switch($smedia){
    case "telegram":
        $smedia = "<i style='color:#0088CC'; class='bi bi-telegram'></i>";
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
    default:
        $smedia = "<i class='bi bi-instagram'></i>";
        break;
}
echo'
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.php?person_id='.$data['id'].'" class="author">
	                        <strong><i class="bi bi-star unlike" id="hello" style="font-size:25px"></i></strong>
	                        <div class="author_thumb veryfied"><i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="uploaded_img/'.$data['image'].'" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>'.$data["name"].'</h6>
	                            <span> Votes: '. $data["votes"].'</span><br>'.$smedia.'
	                        </div>
	                    </a>
	                </div>';
}
?>
	            </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <div id="pane-C" class="card tab-pane fade" role="tabpanel">
                                <div class="card-header" role="tab" id="heading-E">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-C">
                                            Watchlist
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-C" class="collapse" role="tabpanel">
                                    <div class="follow_list mt-lg-3">
                                        <ul>
                                            
                                                 <?php
                    $records = mysqli_query($conn,"Select * from users ORDER BY name DESC"); // fetch data from database
$i = 1;
while($data = mysqli_fetch_array($records))
{ $i++;
 $smedia = $data['gender'];
switch($smedia){
    case "Male":
        $smedia = "<i style='color:#0088CC'; class='bi bi-telegram'></i>";
        break;
    case "Female":
        $smedia = "<i style='color: red'; class='bi bi-youtube'></i>";
        break;
    default:
        $smedia = "<i class='bi bi-instagram'></i>";
        break;
}
echo'
                                                <li>
                                                <div class="author">
                                                    <div class="author_thumb veryfied"><i class="bi bi-check"></i>
                                                        <figure>
                                                            <img src="img/avatar-placeholder.png" data-src="img/avatar1.jpg" alt="" class="lazy" width="100" height="100"></figure>
                                                    </div>
                                                    <div>
                                                        <h6>'.$data["name"].'</h6>
                                                        <a href="#0">Unfollow</a>
                                                    </div>
                                                </div>
                                                <div class="thumbs_artwork">
                                                    <figure>
                                                        <img src="img/items/item-1-placeholder.png" data-src="img/follow_list_pic_1.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="img/items/item-1-placeholder.png" data-src="img/follow_list_pic_2.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="img/items/item-1-placeholder.png" data-src="img/follow_list_pic_3.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="img/items/item-1-placeholder.png" data-src="img/follow_list_pic_4.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                </div>
                                            </li>
                                            ';
}
?>
                                           
                                        </ul>
                                    </div>
                                    <!-- /follow_list -->
                                </div>
                            </div>
                            <!-- /tab -->
                            <div id="pane-D" class="card tab-pane fade" role="tabpanel">
                                <div class="card-header" role="tab" id="heading-D">
                                    <h5>
                                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-D">
                                            Voters
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-D" class="collapse" role="tabpanel">
                                    <div class="follow_list mt-lg-3">
                                        <ul>
                                            <?php
                    $records = mysqli_query($conn,"Select * from voters WHERE user_id = '$_SESSION[id]' ORDER BY name DESC"); // fetch data from database
$i = 1;
while($data = mysqli_fetch_array($records))
{ $i++;
 $smedia = $data['votes'];
switch($smedia){
    case "2":
        $smedia = "<i style='color:#0088CC'; class='bi bi-telegram'></i>";
        break;
    case "3":
        $smedia = "<i style='color: red'; class='bi bi-youtube'></i>";
        break;
    default:
        $smedia = "<i class='bi bi-instagram'></i>";
        break;
}
echo'
                                            <li>
                                                
                                                <a href="author.php?person_id='.$data['id'].'" class="author">
                                                    <div class="author_thumb veryfied"><i class="bi bi-check"></i>
                                                        <figure>
                                                            <img src="img/avatar-placeholder.png" data-src="img/avatar1.jpg" alt="" class="lazy" width="100" height="100">
                                                        </figure>
                                                    </div>
                                                    <h6>'.$data["name"]. '</h6>
                                                </a>
                                                <div class="thumbs_artwork">
                                                    <figure>
                                                        <img src="img/items/item-1-placeholder.png" data-src="img/follow_list_pic_1.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="img/items/item-1-placeholder.png" data-src="img/follow_list_pic_2.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="img/items/item-1-placeholder.png" data-src="img/follow_list_pic_3.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                    <figure>
                                                        <img src="img/items/item-1-placeholder.png" data-src="img/follow_list_pic_4.jpg" alt="" class="lazy img-fluid" width="220" height="170">
                                                    </figure>
                                                </div>
                                            </li>';
}
?>
                                            
                                            
                                        </ul>
                                    </div>
                                    <!-- /follow_list -->
                                </div>
                            </div>
                            <!-- /tab -->
                        </div>
                        <!-- /tab-content -->
                    </div>
                    <!-- /tabs_detail -->
                </div>
            </div>
            <!-- /row -->
        </div>
    </main>
    <!-- /main -->

    <?php 
include 'footer.php';    
?>

    <div id="toTop"></div><!-- Back to top button -->

    <!-- Modal Bid -->
    <div id="modal-dialog" class="zoom-anim-dialog mfp-hide">
        <div class="modal_header">
            <h3>Place a bid</h3>
        </div>
        <form>
            <div class="sign-in-wrapper">
                <p>You are about to purchase <strong>"Amazing Art" #304</strong> from <strong>George Lucas</strong></p>
                <div class="form-group">
                    <label>Your bid (ETH)</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Enter quantity <small>(10 available)</small></label>
                    <input type="text" class="form-control">
                </div>
                    <ul>
                        <li>
                            Your balance <span>8.498 ETH</span>
                        </li>
                        <li>
                            Service fee 1.5%<span>0.125 ETH</span>
                        </li>
                        <li>
                            You will pay<span>8.798 ETH</span>
                        </li>
                    </ul>
                <div class="text-center">
                    <input type="submit" value="Place a bid" class="btn_1 full-width mb-2">
                </div>
            </div>
        </form>
        <!--form -->
    </div>
    <!-- Modal Bid -->

    <!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/common_func.js"></script>


</body>
</html>