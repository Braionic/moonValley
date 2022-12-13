<?php include 'includes/timeoutable.php' ?>
<?php include 'includes/db.php'; ?>
<?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'login.php?login_error=session'; </script>";
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
    
<?php
    include 'header1.php';
    ?>
<?php
$user_id = $_SESSION['id'];
if(isset($_POST['update_profile'])){
   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile_no']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $youtube = mysqli_real_escape_string($conn, $_POST['youtube']);
    $discord = mysqli_real_escape_string($conn, $_POST['discord']);
    $telegram = mysqli_real_escape_string($conn, $_POST['telegram']);
    $telegram_and_discord = mysqli_real_escape_string($conn, $_POST['telegram_and_discord']);
    $telegram_and_instagram = mysqli_real_escape_string($conn, $_POST['telegram_and_instagram']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

   mysqli_query($conn, "UPDATE `users` SET name = '$update_name', email = '$update_email', phone_no = '$mobile', instagram = '$instagram', youtube = '$youtube', discord = '$discord', instagram = '$instagram', telegram = '$telegram', telegram_and_discord = '$telegram_and_discord', telegram_and_instagram = '$telegram_and_instagram', dob = '$dob' WHERE id = '$user_id'") or die('query failed');
     $message[] = 'Details inserted succssfully!';

    
   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;
    
   if(!empty($update_image)){
      if($update_image_size > 9000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
             
             $message[] = 'image updated succssfully!';
         }
         
      }
   }else{
       $image_insert_query = mysqli_query($conn, "INSERT INTO users (image) VALUES ('$update_image') WHERE id = '$user_id'");
         if($image_insert_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
            $message[] = 'image inserted succssfully!';
   }
       $update_cover = $_FILES['update_cover']['name'];
   $update_cover_size = $_FILES['update_cover']['size'];
   $update_image_tmp_name = $_FILES['update_cover']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_cover;

    if(!empty($update_cover)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $cover_update_query = mysqli_query($conn, "UPDATE `users` SET cover = '$update_cover' WHERE id = '$user_id'") or die('query failed');
         if($cover_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
             $message[] = 'Cover updated succssfully!';
         }
         
      }
   }else{
         $cover_insert_query = mysqli_query($conn, "INSERT INTO users (cover) VALUES ('$update_cover') WHERE id = '$user_id'");
         if($cover_insert_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
            $message[] = 'Cover inserted succssfully!';
         }
        
    }
}
}

?>
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
         } ?>
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            </div>
            <div class="wave hero"></div>
        </div>
        <!-- /hero_single -->

        <div class="container margin_30_40">
            <div class="row">
                <div class="col-lg-3">
                    <div class="main_profile edit_section">
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
                        <h1><?php echo $fetch['name'];}?></h1>
                        <ul>
                            <li><a href="user-edit-profile.php" class="active"><i class="bi bi-person"></i>Edit</a></li>
                            <li><a href="promote.php"><i class="bi bi-person"></i>Promote</a></li>
                            <li><a href="change-password.php"><i class="bi bi-gear"></i>Change Password</a></li>
                            <li><a href="signout.php"><i class="bi bi-box-arrow-right"></i>Log out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 ps-lg-5">
                    <div class="main_title version_2">
                        <span><em></em></span>
                        <h2>Edit profile</h2>
                        <?php if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }?>
                    </div>
                    <form action="user-edit-profile.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <?php
                    $user_id = $_SESSION['id'];
                     $sel_sql= "SELECT * FROM users WHERE id ='$user_id'";
            $sql= mysqli_query($conn,$sel_sql);
            while($rows = mysqli_fetch_assoc($sql)){?>
            
                  
                                <input type="text" name="update_name" class="form-control" value="<?php echo $rows['name']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Email Address</label>
                                <input type="" name="update_email" class="form-control" value="<?php echo $rows['email']; ?>">
                            </div>
                        </div>
                         <div class="col-md-12">
                             <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control" placeholder="<?php echo $rows['about']; ?>"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Instagram Page</label>
                                <input type="text" name="instagram" class="form-control" value="<?php echo $rows['instagram']; ?>">
                            </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                <label>Telegram Account</label>
                                <input type="text" name="telegram" class="form-control" value="<?php echo $rows['telegram']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Discord Account</label>
                                <input type="text" name="discord" class="form-control" value="<?php echo $rows['discord']; ?>">
                            </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                <label>Youtube Account</label>
                                <input type="text" name="youtube" class="form-control" value="<?php echo $rows['youtube']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="number" name="mobile_no" class="form-control" value="<?php echo $rows['phone_no']; ?>">
                            </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                <label>Date Of Birth</label>
                                <input type="date" class="form-control" id="start" name="dob"
                   value="<?php echo $rows['dob']; ?>"
                   min="1950-01-01" max="2003-12-31">
					<i class="icon_pencil-edit"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>telegram/instagram</label>
                                <input type="number" name="telegram_and_instagram" class="form-control" value="<?php echo $rows['telegram_and_instagram']; ?>">
                            </div>
                        </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                <label>Telegram/Discord</label>
                                <input type="text" class="form-control" id="start" name="telegram_and_discord"
                   value="<?php echo $rows['telegram_and_discord']; }?>">
					<i class="icon_pencil-edit"></i>
                            </div>
                        </div>
                    </div>
                    
                     
                    <!-- /row -->
                    <hr class="mt-3 mb-5">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                               <label>Upload Avatar </label>
                                <div class="file_upload">
                                  <input type="file" name="update_image">
                                  <i class="bi bi-file-earmark-arrow-up"></i>
                                  <div>PNG, GIF, JPG. Max 2MB</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-group">
                               <label>Upload Cover</label>
                                <div class="file_upload">
                                  <input type="file" name="update_cover">
                                  <i class="bi bi-file-earmark-arrow-up"></i>
                                  <div>PNG, GIF, JPG. Max 1MB</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="text-end mt-4 btn_1" name="update_profile">Save changes</button>
                    
                                 </form>
                </div>
                
            </div>
            
            <!-- /row -->
        </div>
        
        <!-- /container -->
    </main>
    <!-- /main -->

   <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h3>Marketplace</h3>
                    <div class="links">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="grid-listing-1.html">Explore</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                        </ul>
                    </div>
            
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h3>Useful Links</h3>
                    <div class="links">
                        <ul>
                            <li><a href="help.html">Help Center</a></li>
                            <li><a href="connect-wallet.html">Connect Wallet</a></li>
                            <li><a href="help.html">Faq</a></li>
                            <li><a href="pricing-tables-2.html">Pricing</a></li>
                            <li><a href="contacts.html">Become an Author</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h3>Resources</h3>
                    <div class="links">
                        <ul>
                            <li><a href="#0">Blog</a></li>
                            <li><a href="#0">Community</a></li>
                            <li><a href="#0">Best Price</a></li>
                            <li><a href="#0">Latest Submissions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <h3>Keep in touch</h3>                      
                    <div id="newsletter">
                            <div id="message-newsletter"></div>
                            <form method="post" name="newsletter_form" id="newsletter_form">
                                <div class="form-group">
                                    <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                                    <button type="submit" id="submit-newsletter"><i class="bi bi-chevron-right"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="follow_us">
                            <ul>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/twitter_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/facebook_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/instagram_icon.svg" alt="" class="lazy"></a></li>
                                <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/youtube_icon.svg" alt="" class="lazy"></a></li>
                            </ul>
                        </div>
                    
                </div>
            </div>
            <!-- /row-->
            <hr>
            <div class="row add_bottom_25">
                <div class="col-md-6">
                    <ul class="footer-selector clearfix">
                        <li>
                            <div class="styled-select lang-selector">
                                <select>
                                    <option value="English" selected>English</option>
                                    <option value="French">French</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Russian">Russian</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="additional_links">
                        <li><a href="#0">Terms and conditions</a></li>
                        <li>© 2022 Magellano</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/footer-->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/common_func.js"></script>
    
</body>
</html>