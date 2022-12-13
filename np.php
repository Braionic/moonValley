<?php include 'includes/timeoutable.php' ?>
        <body  style="background-color: black;" onload="blinktext();">
        <?php include 'includes/db.php'; ?>
            <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
      

if (isset($_POST['old_pwd']) && isset($_POST['new_pwd'])
    && isset($_POST['new_pwdc'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$old_pwd = validate($_POST['old_pwd']);
	$new_pwd = validate($_POST['new_pwd']);
	$new_pwdc = validate($_POST['new_pwdc']);
    
    if(empty($old_pwd)){
      header("Location: change-password.php?error=Old Password is required");
	  exit();
    }else if(empty($new_pwd)){
      header("Location: change-password.php?error=New Password is required");
	  exit();
    }else if($new_pwd !== $new_pwdc){
      header("Location: change-password.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$old_pwd = $old_pwd;
    	$new_pwd = $new_pwd;
        $id = $_SESSION['id'];

        $sql = "SELECT *
                FROM users WHERE 
                id='$id' AND password='$old_pwd'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET password='$new_pwd'
        	          WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
        	     //TO SEND EMAIL TO NEW USER BEGINS
            $name = $_SESSION["name"];// this is your Email address
            $email = $_SESSION["email"];
                $from = "info@moonvalley.live"; // this is the sender's Email address
                $to = $email; 
                $first_name = $name;
                $subject2 = "New password Update";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $message = '<html><body>';
                    $message = '<div class="navbar-brand"  style="text-align: center;" href=""><img src="https://i.postimg.cc/SswSncHP/Logo-Makr-7-UDZOV-1.png" alt="Caixa Creditos" class="logo">';
                       $message .= '<div  style="background-color: #f3f3f3;">';
                       $message .= '<h2 style="text-align: left;">Hi <strong>'. $first_name . '</strong></h2>';
                       $message .= '<p>This is a notification email of a recent password change on your account, find details bellow</p>';
                       $message .= '<p>Don’t recognise this activity? Please ignore</p>';
                       $message .= '<div style="background-color: #005eb8; color: white;"><a href="https://www.moonvalley.live" style="color: white"><b>Moonvalley!</b></a> Always giving you extra. Get a little extra help from the <a href="https://www.moonvalley.live"><b>Moonvalley</b></a>.</div>';
$message .= '</div></div></body></html>';
                      $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
                mail($to,$subject2,$message,$headers);  // sends a copy of the message to the sender
                //TO SEND EMAIL ENDS
        	header("Location: change-password.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: change-password.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: change-password.php");
	exit();
}

