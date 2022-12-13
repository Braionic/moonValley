<?php include 'includes/timeoutable.php' ?>
<?php include 'includes/db.php'; ?>
<?php include"header1.php"; ?>

                <?php 
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
                        $Telegram = $rows['telegram'];
                        $Instagram = $rows['instagram'];
                        $Youtube = $rows['youtube'];
                         $Discord = $rows['discord'];
                        $smedia = $rows['category'];
                        $Telegram_and_Discord = $rows['telegram_and_discord'];
                        $Telegram_and_Instagram = $rows['telegram_and_instagram'];
                        switch($smedia){
                            case "Telegram":
                                $smedia = "<a style='background-color: #0088cc;' href='$Telegram' class='btn_1 full-width mb-2'>Telegram</a>";
                                break;
                            case "Youtube":
                                $smedia = "<a style='background-color: red;' target='_blank' href='$Youtube' class='btn_1 full-width mb-2'>Youtube</a>";
                                break;
                            case "Discord":
                                $smedia = "<a style='background-color: red;' target='_blank' href='$Discord' class='btn_1 full-width mb-2'>Youtube</a>";
                                break;
                            case "Telegram_and_Discord":
                                $smedia = "<a style='background-color: red;' target='_blank' href='$Telegram_and_Discord' class='btn_1 full-width mb-2'>Telegram/Discord</a>";
                                break;
                            case "Telegram_and_Instagram":
                                $smedia = "<a style='background-color: red;' target='_blank' href='$Telegram_and_Instagram' class='btn_1 full-width mb-2'>Telegram/Discord</a>";
                                break;
                            case "Instagram":
                                $smedia = "<a style='background-color: red;' target='_blank' href='$Instagram' class='btn_1 full-width mb-2'>Telegram/Discord</a>";
                                break;
                            default:
                                $smedia = "<p>you are a Voter</p>";
                                break;
                        } ?>
                        <h1><?php echo $rows['name']; ?></h1>
                        <p class=""><a href="#0"><small style="color: white; background-color: green; border-radius: 2px; padding: 4px;"><?php echo $rows['status']; ?></small></a></p>
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
                               <!-- <a id="tab-C" href="#pane-C" class="nav-link" data-bs-toggle="tab" role="tab">Wishlist</a>
                            </li>-->
                            <li class="nav-item">
                                <a id="tab-D" href="#pane-D" class="nav-link" data-bs-toggle="tab" role="tab">My Last 4 Voters</a>
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
                    $records = mysqli_query($conn,"Select * from users WHERE status='promoted' ORDER BY name DESC"); // fetch data from database
$i = 1;
while($data = mysqli_fetch_array($records))
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
                                   <div class="row author_list">
                                        <ul>
                                            <?php
                    $records = mysqli_query($conn,"Select * from voters WHERE user_id = '$_SESSION[id]' ORDER BY name DESC LIMIT 4"); // fetch data from database
$i = 1;
while($data = mysqli_fetch_array($records))
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
	                    <a href="#" class="author">
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
        <!-- /container -->
    </main>
    <!-- /main -->

    <?php 
include 'footer.php';    
?>

    <div id="toTop"></div><!-- Back to top button -->

    <!-- Modal Bid -->
