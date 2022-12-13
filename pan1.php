<?php include 'includes/timeoutable.php' ?>
        <body  style="background-color: black;" onload="blinktext();">
        <?php include 'includes/db.php'; ?>
            <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
    } else { //IF NO USER LOGGED IN
        echo "<script type='text/javascript'> document.location = 'index.php?login_error=session'; </script>";
      //  header('Location: login.php?login_error=wrong');
    }
?>
                <?php include 'header1.php';  ?><br>
            <style>
            .panel-default{
  border-color: transparent;
}

.panel-default>.panel-heading,
.panel{
  background-color: #e6e6e6; 
  border:0 none;
  box-shadow:none;
}

.panel-default>.panel-heading+.panel-collapse .panel-body{
  background: #fff;
  color: #858586;
}

.panel-body{
  padding: 20px 20px 10px;
}

.panel-group .panel+.panel{
  margin-top: 0;
  border-top: 1px solid #d9d9d9;
}

.panel-group .panel{
  border-radius: 0;
}

.panel-heading{
  border-radius: 0;
}

.panel-title>a{
  color: #4e4e4e;
}
            </style>               <!-- <div style="background-color: black;">-->
                <div style="height:23px;"></div>
                <br><br>
            
                <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

<div class="container home">
<p class="text-right" style="color: white;"><?php echo date("d/m/Y h:i:s a", time()); ?></p>
<!--if user clicks the mining activated button-->

    <?php
                      if(isset($_GET['imf_correct'])) {
                     echo '<div class="alert alert-success text-center alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                     <strong>Request Received successfully!</strong><br> Thank you for chosing CAiXCREDiTOS</div>';
                        }
                        ?>
    
    <div class="container">
    <?php
                                 $sel_sql = "SELECT * FROM users WHERE id = '$_SESSION[id]'";
                            $run_sql = mysqli_query($conn,$sel_sql);
                            while($rows = mysqli_fetch_assoc($run_sql)){
                             echo '
                                    <p class="alert text-center" style="background-color: #005eb8; color: white;">Hi, <strong> '.$rows['name'].' Welcome back</strong></p>
                             ';
                            }
                             ?></div>
<?php
     if (isset($_POST['m_submit'])){
            $sel_sql= "SELECT * FROM mavro WHERE user_id = '$_SESSION[id]'";
            $sql= mysqli_query($conn,$sel_sql);
                if(mysqli_num_rows($sql) <= 0){
                    echo '
                       <div class="alert alert-danger text-center">
  <strong>Sorry!</strong> insufficient funds to purchase Asset.
</div>
                    ';
                }else{
                     $date = date('Y-m-d H:i:s'); 
                            //INVENTOR SUBMIT
                       
                            $role = $_SESSION['role'];
                            if($role == "user"){ //CHECK IF PASSWORDS MATCH
                          // INSERT INTO INVENTOR DATABASE
                            $ins_sql = "INSERT INTO active ( id, name, created_at ) VALUES ('$_SESSION[id]' '$_SESSION[name]', '$date' )";
                            $run_sql = mysqli_query($conn,$ins_sql);
                                echo "<div class='alert alert-success text-center'>
  <b>Asset selected!</b> Please hold...
</div>"; 
                               //   header('Location: panel.php');
                    }
                        }
                    }else{
                    echo '
                       <!-- <div class="alert alert-danger text-center">
  Please select an<strong>"asset"</strong> to trade.
</div>-->
                    ';
     
                }
            
    ?>
    <!--if user clicks the mining activated button-->
                   <?php
                      if(isset($_GET['imf_correct=successful'])) {
                     echo '<div class="alert alert-success text-center alert-dismissable">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                     <strong>Request Received successfully!</strong><br> Thank you for chosing BankRCU</div>';
                        }
                        ?>
                    
                            <!--OLD ONE-->
                            <div class="container home">
                               <!-- <h3 class="text-center" style="margin-top:0px;"><u>MY LOCKER</u></h3>
                                <li class=" text-right"><a href="invest_capital" data-toggle="tooltip" data-placement="top" class=" text-center btn btn-success btn-xm" title="invest capital" style="color:white; background-color: #880000">Fund Account</a>-->
                                
                             
 <?php
                                     $provide_sql = "SELECT * FROM users WHERE id = '$_SESSION[id]' ORDER BY id DESC";
                        $sql = mysqli_query($conn,$provide_sql);
                        if(mysqli_num_rows($sql) == 1){ //IF NO. OF ROWS WITH ABOVE QUERY IS JUST ONE
                        while($rows = mysqli_fetch_assoc($sql)){
                             echo '
                             <div class="panel panel-default style="background-color: #005eb8;">
<div class="alert alert-info text-center"><strong>Account Status: '.$rows['account'].'</strong></div>
    <div class="row container-fluid">
        <div class="col-sm-12">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-6">
                <div class="well" style="background-color: #005eb8;">
                 <h5 style="color: white;"> <b>Main Balance</b><span class="label pull-right" style="background-color: black">'.$rows['currency'].'  '.$rows['amount'].' </span><p class="donationmsg"></p></h5>
                </div>
            </div>
      <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="well" style="background-color: #005eb8;">
          <h5 style="color: white;"><b>Go Easy</b><span class="label pull-right" style="background-color: black">'.$rows['currency'].'  0.00 </span><p class="donationmsg"></p></h5></div>
      </div>
      <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="well" style="background-color: #005eb8;">
          <h5 style="color: white;"><b>Goal save</b><span class="label pull-right" style="background-color: black">'.$rows['currency'].'  0.00</span><p class="donationmsg"></p></h5>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-xs-6">
        <div class="well" style="background-color: #005eb8;">
          <h5 style="color: white;"><b>Stock</b><span class="label pull-right" style="background-color: black">'.$rows['currency'].' 0.00 </span><p class="donationmsg"></p></h5>
        </div>
          </div>
            </div><!--/row-->    
       </div><!--/col-12-->
    </div><!--/row-->
          </div>
     </div>
     </div>
                                    ';
                           }

                            } ?>
                            
        <div class="container-fluid trade-room-bg"
             style="margin-top: 0px; background-color: black; padding-bottom: 0vh">
            <div class="row">
                <div class="col-sm-12 col-lg-10">
                    <div class="text-right" style="margin-top: 0px; margin-bottom: 0px">
                    </div>
                    <!--<li class="text-right"><a href="fundme.php" data-toggle="tooltip" data-placement="top" class=" text-right btn btn-success btn-xm" style="background-color: blue;" title="Top Up">Deposit</a></li>-->
                                           
                    
                    
                </div>
            </div>
                                </div>
                                
                    

      </div>

                          
                                <div>
                                  

                                </div>
                            
<div class="container">
                                   

                            </div></div>
     <div>
	        <div class="container">
	            <div class="main_title version_2">
	                <span><em></em></span>
	                <h1>Promoted</h1>
	                <a href="users.php">View All <i class="bi bi-arrow-right"></i></a>
	            </div>
	            <!-- /main_title -->

	            	            <div class="row author_list">
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
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.php?person_id='.$data['id'].'" class="author">
	                        <strong>'.$i.'</strong>
	                        <div class="author_thumb veryfied"><i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="https://i.ibb.co/18PZkVk/tymebank-thumbnail-05-1080x1080-1.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>'.$data["name"].'</h6>
	                            <span> Votes: '. $data["amount"].'</span><br>'.$smedia.'
	                        </div>
	                    </a>
	                </div>';
}
?>
	            </div>
	            <!-- /row -->
                <!-- /main_title -->

	            <div class="row author_list">
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.html" class="author">
	                        <strong>1</strong>
	                        <div class="author_thumb veryfied">
	                            <i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="img/avatar1.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>@Jhonny_Bet</h6>
	                            <span>3.2 ETH</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.html" class="author">
	                        <strong>2</strong>
	                        <div class="author_thumb veryfied">
	                            <i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="img/avatar2.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>@George_bite</h6>
	                            <span>2.2 ETH</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.html" class="author">
	                        <strong>3</strong>
	                        <div class="author_thumb veryfied">
	                            <i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="img/avatar3.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>@Monica_claus</h6>
	                            <span>1.9 ETH</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.html" class="author">
	                        <strong>4</strong>
	                        <div class="author_thumb veryfied">
	                            <i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="img/avatar4.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>@Mad_max</h6>
	                            <span>1.8 ETH</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.html" class="author">
	                        <strong>5</strong>
	                        <div class="author_thumb veryfied">
	                            <i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="img/avatar5.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>@Fredrick_green</h6>
	                            <span>1.5 ETH</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.html" class="author">
	                        <strong>6</strong>
	                        <div class="author_thumb veryfied">
	                            <i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="img/avatar6.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>@Paul_best</h6>
	                            <span>1.2 ETH</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.html" class="author">
	                        <strong>7</strong>
	                        <div class="author_thumb veryfied">
	                            <i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="img/avatar7.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>@Mike_ansonika</h6>
	                            <span>1.0 ETH</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.html" class="author">
	                        <strong>8</strong>
	                        <div class="author_thumb veryfied">
	                            <i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="img/avatar8.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>@Robert_gain</h6>
	                            <span>0.9 ETH</span>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-lg-4 col-md-6" data-cue="slideInUp">
	                    <a href="author.html" class="author">
	                        <strong>9</strong>
	                        <div class="author_thumb veryfied">
	                            <i class="bi bi-check"></i>
	                            <figure>
	                                <img src="img/avatar-placeholder.png" data-src="img/avatar9.jpg" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>@Luca_george</h6>
	                            <span>0.7 ETH</span>
	                        </div>
	                    </a>
	                </div>
	            </div>
	            <!-- /row -->


	        </div>
	        <!-- /container -->
	    </div>
	    <!-- /bg_gray -->
<!--<div style="height:200px;"></div>--></div>

                            <?php include 'footer.php' ?>
    </body>