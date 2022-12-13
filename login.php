<?php include 'includes/timeoutable.php' ?>

    <?php 
        include 'includes/db.php';  
    ?>
    <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
        echo "<script type='text/javascript'> document.location = 'promote.php'; </script>";
      //  header('Location: panel.php');
    } else { //IF NO USER LOGGED IN
    }
?>

 <?php
if(isset($_POST{'submit'})){ //IF LOGIN BTN HAS BEEN CLICKED
    if(!empty($_POST{'user_email'}) && !empty($_POST{'user_password'})){ //CHECK IF EMAIL AND PASSWORD IS EMPTY 
        $get_user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $get_user_email = mysqli_real_escape_string($conn,$get_user_email);
        $get_password = mysqli_real_escape_string($conn, $_POST['user_password']);
        $sql = "SELECT * FROM users WHERE email = '$get_user_email' AND password = '$get_password'"; //FOR USERS
        if($result1 = mysqli_query($conn,$sql)){ //FOR USERS IF THERE IS CONNECTION TO THE DATABASE WHERE EMAIL AND PASSWORD IS AVAILABLE
            if(mysqli_num_rows($result1) == 1){ //IF NO. OF ROWS WITH ABOVE QUERY IS JUST ONE
                 $_SESSION['loggedin'] = true;
                $_SESSION['user_email'] = $get_user_email; // $username coming from the form, such as $_POST['username']
                $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
               // $inno_sql = mysqli_query($conn,$sql);
                while($rows = mysqli_fetch_assoc($result1)){ //RETRIEVE INVENTOR DETAILS
                    $_SESSION['name'] = $rows['name'];
                    //$_SESSION['nickname'] = $rows['nickname'];
                    $_SESSION['gender'] = $rows['gender'];
                    //$_SESSION['bank'] = $rows['bank'];
                    $_SESSION['image'] = $rows['image'];
                    $_SESSION['phone_no'] = $rows['phone_no'];
                    $_SESSION['country'] = $rows['country'];
                    //$_SESSION['walletcode'] = $rows['walletcode'];
                    $_SESSION['created_at'] = $rows['created_at'];
                    $_SESSION['updated_at'] = $rows['updated_at'];
                    $_SESSION['id'] = $rows['id'];
                    $_GLOBAL['id'] = $rows['id'];
                }
                echo "<script type='text/javascript'> document.location = 'promote.php'; </script>"; 
             //   header('Location: panel.php');
                    
            } else{
                echo "<script type='text/javascript'> document.location = 'login.php?login_error=wrong'; </script>"; 
              //  header('Location: signin.php?login_error=wrong');
            } //
        } else{
            echo "<script type='text/javascript'> document.location = 'login.php?login_error=query_error'; </script>"; 
           // header('Location: signin.php?login_error=query_error');
        }
    }else{
        echo "<script type='text/javascript'> document.location = 'login.php?login_error=empty'; </script>";
     //   header('Location: signin.php?login_error=empty');
    } 
}else{
    $login_err = '';
    
}
        if(isset($_GET['login_error'])){ //TO OUTPUT LOGIN ERROR
    if($_GET['login_error'] == 'empty'){  //LOGIN ERROR FOR EMPTY
        $login_err = "<div class='alert alert-danger'>Email or password was empty!</div>";
    }elseif($_GET['login_error'] == 'wrong'){ //LOGIN ERROR FOR INVALID DETAILS
        $login_err = "<div class='alert alert-warning'>Invalid email or password!</div>";
    }
}
       
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MoonValley - Link up with renowned influencers">
    <meta name="author" content="Ansonika">
    <title>MoonValley - Link up with renowned influencers</title>

    <!-- Favicons-->
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
    <link href="css/account.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body id="login_bg">
	
	<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="index.php"><img src="images/Logo.png" alt="" width="70" height="35"></a>
			</figure>
			  <form action="login.php" method="POST">
                  <?php
      if(isset($message)){
         foreach($message as $messages){
            echo '<div class="message">'.$messages.'</div>';
         }
      }
      ?>
                   <?php
                      if(isset($_GET['registered'])) {
                     echo '<div class="alert alert-success text-center">
                     <strong>Registration Successful!</strong></div>';
                        }
                        ?>
                  <?php echo $login_err; ?>
				<div class="access_social">
					<!--<a href="#0" class="social_bt facebook">Login with Facebook</a>
					<a href="#0" class="social_bt google">Login with Google</a>-->
				</div>
				<div class="divider"><span>Or</span></div>
				<div class="form-group mb-3">
					<input type="email" class="form-control" name="user_email" id="email" placeholder="Email">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="user_password" id="password" value="" placeholder="Password">
				</div>
				<div class="clearfix add_bottom_30">
					<div class="checkboxes float-start">
						<label class="container_check">Remember me
						  <input type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-end"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<input type="submit" name="submit" value="Signin" class="btn_1 full-width">
				<div class="text-center add_top_10">New to Moon Valley? <strong><a href="register.php">Sign up!</a></strong></div>
			</form>
			<div class="copy">© 2022 Moon valley</div>
		</aside>
	</div>
	<!-- /login -->
		
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/common_func.js"></script>
  
</body>
</html>