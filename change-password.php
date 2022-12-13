<?php include 'includes/timeoutable.php' ?>
<?php include 'includes/db.php'; ?>
<?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'login.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
<?php include"header.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Magellano - NFT Marketplace Website Template by Ansonika">
    <meta name="author" content="Ansonika">
    <title>Moon Valley - Meet renowned influencers</title>

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
    
<?php include 'header.php'; ?>
    <!-- /header -->

    <main>
        <div class="hero_single inner_pages author_page jarallax" data-jarallax>
            <img class="jarallax-img" src="img/hero_general.jpg" alt="">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.4)">
            </div>
            <div class="wave hero"></div>
        </div>
        <!-- /hero_single -->
        <!-- /to echo out password change result -->
 <?php if (isset($_GET['error'])) { ?>
     		<div class="alert alert-warning text-center"><?php echo $_GET['error']; ?></div>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="alert alert-success text-center"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <!-- /password result end here -->
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
         } ?>
                                </figure>
                            </div>
                        </div>
                        <h1><?php echo $fetch['name']; }?></h1>
                        <ul>
                             <li><a href="change-password.php" class="active"><i class="bi bi-gear"></i>Change Password</a></li>
                            <li><a href="user-edit-profile.php"><i class="bi bi-person"></i>Edit profile</a></li>
                            <li><a href="signout.php"><i class="bi bi-box-arrow-right"></i>Log out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 ps-lg-5">
                    <form action="np.php" method="post">
                    <div class="main_title version_2">
                        <span><em></em></span>
                        <h2>Change Password</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Old Password</label>
                                 
                                <input type="text" name="old_pwd" class="form-control" placeholder="Fill in old password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
                             <div class="form-group">
                                <label>New Password</label>
                                <input type="text" name="new_pwd" class="form-control" placeholder="New Password">
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Repeat Password</label>
                                <input type="text" name="new_pwdc" class="form-control" placeholder="Repeat Password">
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                    <hr class="mt-3 mb-5">
                    <button type="submit" class="text-end mt-4 btn_1">Save changes</button>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->

<?php include 'footer.php'; ?>
    <!--/footer-->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/common_func.js"></script>

</body>
</html>