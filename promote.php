<?php include 'includes/timeoutable.php' ?>
<?php include 'includes/db.php'; ?>
<?php include 'header1.php';  ?>
<?php
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'login.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
	
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
     <?php //CONFIRM USER
                             if(isset($_POST["verify_free"])){
                                 $status = "pending";
                                 $select = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                                 $result = mysqli_query($conn, $select);
                                 while($rows = mysqli_fetch_assoc($result)){
                                       if($rows['status'] == $status){
                                           echo '<div class="alert alert-warning">your profile has already been sent for verification, please hold while we review your profile</div>';
                                       }elseif($rows['status'] == 'influencer'){
                                           echo '<div class="alert alert-warning">You have already been approved</div>';
                                       }elseif($rows['status'] == 'promoted'){
                                          echo '<div class="alert alert-warning">You have already been approved and have a premium status</div>';
                                       }else{
                                 $ins_sql = "UPDATE users SET status='$status' WHERE id = '$_SESSION[id]'";
                                     $run_sql = mysqli_query($conn,$ins_sql);
                                 echo '<div class="alert alert-success">Your profile has been sent for verification and will be available in Influencers Section once approved, You will be notified of your result</div>';
                                       }
                                 }
                             }
                        ?>
	    <div class="container">
               <!-- /hero_single -->
<h2 class="text-center">Promote Your Profile</h2>
	    <div class="container margin_60_40">
	        <div class="row justify-content-center">
	              <div class="col-lg-4 col-md-6 add_bottom_25">
	                <div class="box_contacts">
	                    <i class="bi bi-megaphone"></i>
	                    <h2>over 7K Daily Users</h2>
	                    <p>From Google analytics</p>
	                    <small>G.Analytics statistics</small>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 add_bottom_25">
	                <div class="box_contacts">
	                    <i class="bi bi-people"></i>
	                    <h2>over 5K Registered Users already</h2>
	                    <p>Via Google Firebase</p>
	                    <small>G.Firebase statistics</small>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /container -->
            <div class="container text-center">
  <div class="row">
    <div class="col-sm">
        <p><a href="mail:info@moonvalley.visit" target="_blank"><i class="bi bi-envelope-open"></i> <b>info@moonvalley.visit</b></a></p>
    </div>
    <div class="col-sm">
        <p><a href="https://t.me/moonvalleyofficial" target="_blank"><i class="bi bi-telegram"></i> <b>https://t.me/moonvalleyOfficial</b></a></p>
    </div>
    <div class="col-sm">
        <p><a href="https://discord.gg/czBDsWM" target="_blank"><i class="bi bi-discord"></i> <b>https://discord.gg/czBDsWM</b></a></p>
    </div>
  </div>
</div>
	        <div class="main_title center">
                
	            <span style="color: red"><strong>ND: </strong>For more understanding of our AD and promotion system please scroll to the bottom of this page</span>
	            <h2>Our Pricing Plans</h2>
	        </div>
	        <div class="row plans">
	            <div class="plan col-md-4">
	                <div class="plan-title">
	                    <h3>Regular</h3>
	                    <p>Push your profile on our list of influencers</p>
	                </div>
	                <p class="plan-price">Free</p>
	                <ul class="plan-features">
	                    <li>Get seen by<strong> Thousands</strong> of clients</li>
	                    <li>Get connected in <strong>two</strong> clicks</li>
	                    <li><strong>Start your </strong>influencing journey </li>
	                </ul>
                    <form method="POST" action="promote.php">
                         <?php //CONFIRM USER
                                 $status = "pending";
                                 $select = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                                 $result = mysqli_query($conn, $select);
                                 while($rows = mysqli_fetch_assoc($result)){
                                       if($rows['status'] == $status){
	               echo'<input type="submit" name="verify_free" id="verify_free" value="Wait for verification result" class="btn_1 green">';
                        }else{
                            echo '<input type="submit" name="verify_free" id="verify_free" value="Apply for Verification" class="btn_1 green" style="background-color: green">';
                                       }
                                 }
                        ?>
                </form>
	            </div> <!-- End col-md-4 -->
	            <div class="plan plan-tall col-md-4">
	                <div class="plan-title">
	                    <h3>Premium Listing</h3>
	                    <p>0.2-1 BNB for a One time fee for one listing, highlighted in search results</p>
	                </div>
	                <p class="plan-price">Premium</p>
	                <ul class="plan-features">
	                    <li>Get seen by even<strong> more people</strong>,
	                    <li>get profile placement on <strong> strategic areas</strong> on our website and be the first to be seen by prospective Clients</li>
	                </ul>
	                <a href="https://t.me/war_9stricks" class="btn_1 medium">Premium Membership</a>
	            </div><!-- End col-md-4 -->
	            <div class="plan col-md-4">
	                <div class="plan-title">
	                    <h3>Promotions</h3>
	                    <p> Capitalize on our ever growing reach and get the awarenes that you need.</p>
	                </div>
	                <p class="plan-price">Adverts</p>
	                 <ul class="plan-features">
                        <li><b>Promoted List:</b> 0.2 BNB / day</li>
	                    <li><b>Banner:</b> 0.2 BNB / day</li>
	                    <li><b>Wide Banner:</b> 0.2 BNB / day</li>
	                    <li><b>POP Up:</b> 1 BNB / day</li>
                         <li><span style="color: red">NEW </span><b>Mooving text:</b> 1 BNB / day</li>
	                </ul>
	                <a href="https://t.me/war_9stricks" class="btn_1 gray">Run Promotion</a>
	            </div><!-- End col-md-4 -->
	        </div><!-- End row plans-->
	    </div>
	    <!-- /container -->

	    <div class="bg_gray">
	        <div class="container margin_90_60">
	            <div class="main_title version_2">
	                <span><em></em></span>
	                <h2>Subscription Faq</h2>
	                <p>Frequently Asked Questions.</p>
	                <a href="#0">View All <i class="bi bi-arrow-right"></i></a>
	            </div>
	            <div class="row mt-5">
	                <div class="col-sm-6">
	                    <div class="box_faq">
	                        <i class="bi bi-question-square"></i>
	                        <h3>What happens after applying for verification?</h3>
                            <p>Your profile will be reviewed to accertain you are actually who you say you are, if found otherwise, your account will be rejected and probably blocked if guilty of impersonation, users with valid profile will be approved and profile will become visible to visitors</p>
	                    </div>
	                </div>
	                <div class="col-sm-6">
	                   <div class="box_faq">
	                        <i class="bi bi-question-square"></i>
	                        <h3>Can i get seen by even more people?</h3>
                            <p>Yes you can, your can attain a premium membership and get seen by even more people, in strategic areas on our website. To be on our premium or Promoted list, simply click on the "premium membership" button on this page or click <a href="#">HERE</a> to get connected with an Agent, it's fast and very convenient, we charge just 0.2 BNB/ Day</p>
	                    </div>
	                    </div>
	                </div>
	            </div><!-- /row  -->
	            <div class="row">
	                <div class="col-sm-6">
	                    <div class="box_faq">
	                        <i class="bi bi-question-square"></i>
	                        <h3>How can i use the Advert section to run a promotion?</h3>
	                        <p>It's easy, with our ever growing reach, your promotion can be seen by hundreds and thousands of our daily visitor, to run a paid promotion, simply click on the "Run a promotion" Button above or click <a href="#">HERE</a> to get connected with a representative, it's fast, easy and convenient</p>
	                <ul class="plan-features">
                        <li><b>Promoted List:</b> 0.2 BNB / day</li>
	                    <li><b>Banner:</b> 0.2 BNB / day</li>
	                    <li><b>Wide Banner:</b> 0.2 BNB / day</li>
	                    <li><b>POP Up:</b> 1 BNB / day</li>
                         <li><span style="color: red">NEW </span><b>Mooving text:</b> 1 BNB / day</li>
	                </ul>
                            </div>
	                </div>
	                <div class="col-sm-6">
	                    <div class="box_faq">
	                        <i class="bi bi-question-square"></i>
	                        <h3>What should i do if a have a complaint or need more assistance</h3>
	                        <p>We have around the clock customer support always ready to assist with your every needs, kindly click <a href="#">HERE</a> to chat with a live chat agent or send us an email to support@moonvalley.site</p>
	                    </div>
	                </div>
	            </div><!-- /row  -->
	        </div>
	        <!-- /container -->
	    </div>
	    <!-- /bg_gray -->
	    
	</main>
	<!-- /main -->

	<?php 
include 'footer.php';    
?>
	<!--/footer-->
