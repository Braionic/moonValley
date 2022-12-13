<?php include 'includes/timeoutable.php' ?>
<?php include 'includes/db.php'; ?>
<?php include 'header.php'; ?>

<style>
 *{
    margin:0; padding:0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}


.banner-container{
    display: flex;
    align-items: center;
    justify-content: center;
}

.banner-container .banner{
    background:linear-gradient(-55deg, #ff7675 29%, #d63031 29.1%, #d63031 68%, #ff7675 68.1%);
    border-radius: 5px;
    margin:10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    box-shadow: 0 5px 10px #0005;
    overflow: hidden;
}

.banner-container .banner .shoe{
    flex:1 1 250px;
    padding:15px;
    text-align: center;
}

.banner-container .banner .shoe img{
    width:80%;
}

.banner-container .banner .content{
    flex:1 1 250px;
    text-align: center;
    padding:10px;
    text-transform: uppercase;
}

.banner-container .banner .content span{
    color:#eee;
    font-size: 25px;
}

.banner-container .banner .content h3{
    color:#fff;
    font-size: 40px;
}

.banner-container .banner .content p{
    color:#eee;
    font-size: 20px;
    padding:10px 0;
}

.banner-container .banner .content .btn{
    display: block;
    height:40px;
    width:150px;
    line-height: 40px;
    background: #fff;
    color:#d63031;
    margin:5px auto;
    text-decoration: none;
}

.banner-container .banner .women{
    position: relative;
    bottom: -33px;
    padding:10px;
    flex:1 1 250px;
}

.banner-container .banner .women img{
    width:100%;
}

@media (max-width:768px){
    .banner-container .banner .women{
        display: none;
    }
}
    /** flex box **/
    .flex-container {
  display: flex;
  align-items: stretch;
  background-color: black;
        
        
}

.flex-container > div {
  color: white;
  margin: 10px 5px;
  text-align: center;
  font-size: 30px;
    border-radius: 5px;
   
}
    video{
    border: 1px solid black;
   border-radius: 25px;
        padding: 5px;
}
    @media (max-width: 800px) {
  .flex-container {
    display: none;
  }
}
    @media (max-width: 800px) {
  .container1 {
    flex-direction: column;
  }
}
    

    
    /** slider **/
    body {
  margin: 0;
}

.dj-slider {
  background-image: url('images/slide-backgrnd.jpg');
  min-height: 200px;
  background-size: cover;
  display: flex;
  overflow: hidden;
  -webkit-overflow-scrolling: touch;
  border: 1px solid black;
    
}

.dj-slide img {
    border-radius: 5px;
    max-width: 500px;
    max-height: 200px;
    background-color: DodgerBlue;
  color: white;
}

.dj-slide {
  width: calc(100% - 100px);    /*  added, full width - margin  */
  flex-shrink: 0;               /*  added, so it won't shrink  */
  /*border: 1px solid red;        /*  added, for demo purpose  */
  margin: 10px 50px;                 /*  added, instead of padding on parent  */
  border-radius: 5px;
  display: flex;                /*  added  */
  align-items: center;          /*  added  */
  justify-content: center;      /*  added  */
  
  animation: slide-it 30s 5s infinite;
}
    @media (min-width: 800px) {
  .dj-slider {
    display: none;
  }
}
    .container1 {
          width: calc(100% - 100px);    /*  added, full width - margin  */
  flex-shrink: 0;               /*  added, so it won't shrink  */
  /*border: 1px solid red;        /*  added, for demo purpose  */
  margin: 20px 50px;                 /*  added, instead of padding on parent  */
  border-radius: 5px;
  display: flex;
  flex-direction: column;/*  added  */
  align-items: center;          /*  added  */
  justify-content: center;
        
      }
    
.container1 video {
    border-radius: 5px;
    max-width: 500px;
    max-height: 200px;
    background-color: white;
  color: white;
    margin: auto;
    padding: 5px 5px;
    object-fit: contain;
}
@keyframes slide-it {
  0%    { transform: translateX(0); }
  25%   { transform: translateX( calc(-100% - 100px) ); }
  50%   { transform: translateX( calc(-200% - 200px) ); }
  100%  { transform: translateX( calc(-300% - 300px) ); }
}
    


.item {
    width: 100%;
    min-height: 120px;
    max-height: 500px;
}
</style>
	<main>
        
	    <div class="container-fluid margin_120_90">
             <section style="background-color: black;"> 
            <div>
                        <?php 
		 $sql = "SELECT * FROM marquee_ad WHERE status = 'active' ORDER BY id DESC";
		 $res = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($res) > 0) {
		 	while ($text = mysqli_fetch_assoc($res)) { 
		 ?>
               <div style="background: gold;color: black;left: 0;z-index: 1030;" ><div class="container"> <a style="color: black" href="<?=$text['ad_link']?>" target="_blank"><marquee behavior="scroll" direction="left" scrollamount="7"><?=$text['name']?></marquee></a></div></div> <?php 
	     }
		 }else {
		 	echo "<div style='background: gold;color: black;left: 0;z-index: 1030;' ><div class='container'> <a style='color: black' href='https://www.moonvalley.site' target='_blank'><marquee behavior='scroll' direction='left' scrollamount='7'>This Field is available for <b>Advert placement</b></marquee></a></div></div>";
		 }
		 ?>
                        <br>
          
                        <!--Column Add-->
                            <?php 
		 $sql = "SELECT * FROM video_ad2 WHERE status = 'active' ORDER BY id DESC";
		 $res = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($res) > 0) {
		 	while ($video = mysqli_fetch_assoc($res)) { 
		 ?>
                        <div class="container1 text-center">
  <a href="<?=$video['ad_link']?>" target="_blank"><video width="450" height="80" class="videoof" autoplay playsinline muted loop>
  <source src="../mvalley/uploads/<?=$video['name']?>" type="video/mp4">
      <source src="../mvalley/uploads/<?=$video['name']?>" type="video/oog">
Your browser does not support the video tag.
      </video></a></div>
                             <?php 
	     }
		 }else {
		 	echo '<div class="container1 text-center">
  <a href="https://www.moonvalley.site.com" target="_blank"><video width="450" height="80" class="videoof" autoplay playsinline muted loop>
  <source src="../mvalley/uploads/strt_wide_1.mp4" type="video/mp4">
      <source src="../mvalley/uploads/strt_wide_1.mp4" type="video/oog">
Your browser does not support the video tag.
      </video></a>
      <a href="https://www.moonvalley.site.com" target="_blank"><video width="450" height="80" class="videoof" autoplay playsinline muted loop>
  <source src="../mvalley/uploads/puli-wide.mp4" type="video/mp4">
      <source src="../mvalley/uploads/puli-wide.mp4" type="video/oog">
Your browser does not support the video tag.
      </video></a></div>';
		 }
		 ?>

                         <!--/Column Add-->    
                         <!--Row Add-->
                        <div class="flex-container">
                            <?php 
		 $sql = "SELECT * FROM video_ad WHERE status = 'active' ORDER BY end_date DESC LIMIT 4";
		 $res = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($res) > 0) {
		 	while ($video = mysqli_fetch_assoc($res)) { 
		 ?>
  <div style="flex-grow: 1;"><a href="<?=$video['ad_link']?>" target="_blank"><video width="280" height="130" autoplay playinline muted loop>
  <source src="../mvalley/uploads/<?=$video['name']?>" type="video/mp4">
      <source src="../mvalley/uploads/<?=$video['name']?>" type="video/oog">
Your browser does not support the video tag.
      </video></a></div>
                             <?php 
	     }
		 }
		 ?>

                            
</div>

                           
                       
                         <!--Slider Add-->
                        <div class="dj-slider item">
<?php 
		 $sql = "SELECT * FROM video_ad WHERE status = 'active' ORDER BY id DESC LIMIT 4";
		 $res = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($res) > 0) {
		 	while ($video = mysqli_fetch_assoc($res)) { 
		 ?>
  <div class="dj-slide">
    <a href="<?=$video['ad_link']?>" target="_blank"><video width="280" height="130" autoplay playsinline muted loop>
  <source src="../mvalley/uploads/<?=$video['name']?>" type="video/mp4">
      <source src="../mvalley/uploads/<?=$video['name']?>" type="video/oog">
Your browser does not support the video tag.
      </video></a>
  </div>
<?php 
	     }
		 }else {
		 	echo '<div class="dj-slide"><a href="https://goal.com" target="_blank"><video width="280" height="130" autoplay playsinline muted loop>
  <source src="../mvalley/uploads/Coinscope.mp4" type="video/mp4">
      <source src="../mvalley/uploads/Coinscope.oog" type="video/oog">
Your browser does not support the video tag.
      </video></a>
      </div>';
		 }
		 ?>

</div>
   <!--/Slider Add--> 
                        <!-- Place somewhere in the <body> of your page -->
<!-- Place somewhere in the <body> of your page -->


                        
                        <div class="gp-leader" style="width: 100%; background: #e0e0e0; color: #c7c7c7; padding: 20px 15px; text-align: center; text-transform: uppercase; font-size: 20px; font-weight: 500; letter-spacing: 1px;">Moon Valley</div>
                        
    <div class="hero_single version_2 jarallax" data-jarallax>
	    	<img class="jarallax-img" src="img/hero_general" alt="">
	        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
	            <div class="container">
	                <div class="row">
	                    <div class="col-xl-9 col-lg-10">
	                        <h1 class="slide-animated one">Discover, connect,<br>and moon your product</h1>
	                        <p class="slide-animated two">with our renowned Influencers</p>
	                        <form method="GET" action="usersearch.php" class="slide-animated three">
	                            <div class="row g-0 custom-search-input">
	                                <div class="col-md-9">
	                                    <div class="form-group">
	                                        <input class="form-control" type="text" id="live_search" name="search" autocomplete="off" placeholder="Search item...">
	                                    </div>
                                        
	                                </div>
	                                <div class="col-md-3">
	                                    <input type="submit" name="search_submit" value="Find">
	                                </div>
	                            </div>
	                            <!-- /row -->
	                            <div class="search_trends">
	                                
	                                <ul>
                                        <div id="searchresult"></div>
	                                    <li>Easily find your favoutite influencer</li>
	                                </ul>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	                <!-- /row -->
	            </div>
	        </div>
	        <div class="wave hero"></div>
	    </div>
  
	    <div class="container">
	        
	        <!-- /carousel 
	        <p class="text-center mt-4" data-cue="slideInUp"><a href="grid-listing-1.html" class="btn_1 medium pulse_bt">Start Searching</a></p>
	    </div>
	    <!-- /container -->
           <?php $res = mysqli_query($conn,"Select DISTINCT category from users WHERE status!='' AND status!='voter' ORDER BY votes DESC"); 
            
            ?>
<div class="container">
    <div class="container">
    <select id="category" onChange="selectCategory()" style="background-color: grey; color: white">
       <?php while($rows = mysqli_fetch_assoc($res)){ ?>
                        <option value="<?php echo $rows['category']; ?>"><?php echo $rows['category']; ?></option>
         <?php } ?>
                    </select>
    </div>
	    <div class="bg_gray">
	        <div class="container">
	            <div class="main_title version_2">
	                <span><em></em></span>
	                <h2>Promoted</h2>
	                <a href="user.php">View All <i class="bi bi-arrow-right"></i></a>
	            </div>
	            <!-- /main_title -->

	            	            <div class="row author_list">
                    <?php
                    $records = mysqli_query($conn,"Select * from users WHERE status='promoted' ORDER BY votes DESC"); // fetch data from database
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
	                                <img src="uploaded_img/'.$data['image'].'" data-src="uploaded_img/'.$data['image'].'" alt="" class="lazy" width="100" height="100">
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
                <!-- /main_title -->

	            <div class="banner mt-5 lazy" data-bg="url()" data-cue="slideInUp" style="background-color: black;">
	            	<div class="d-flex align-items-center opacity-mask justify-content-between p-5" data-opacity-mask="rgba(0, 0, 0, 0.2)">
						<div>
							<small>Want to Join our Community?</small>
							<h3>Become an Influencer</h3>
							<p>Start promoting!</p>
						</div>
						<div><a href="register.php" class="btn_1 medium pulse_bt">Join Now</a></div>
					</div>
					<!-- /wrapper -->
	            </div>
	            <!-- /banner -->
	        </div>
	        <!-- /container -->
	    </div>
	    <!-- /bg_gray -->
 <!-- /main_title -->

	    <div class="container">
	        <!-- /main_title -->

	         <!-- /container -->

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
                                    
    
                $limit = 21;

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
	        <!-- /container -->
                
                <?php
            
            $sql = "SELECT COUNT(*) from users";
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
              <!--  <div class="container" style="align-center">
<form action="index.php" method="GET">
            <select name="page" onchange="this.form.submit()">
                <?php 
                    echo "<option value='$page'>Active:".$page."</option>";
                    for($i = 1; $i <= $total_page; $i++){
                        echo "<option value='$i'>".$i."</option>";
                    }
                ?>
            </select>
        </form>
                </div>-->
	    </div>
	    <!-- /bg_gray -->
	        <!-- /row -->
        
	        <p class="text-center mt-4" data-cue="slideInUp"><a href="user.php" class="btn_1 gradient pulse_bt">Find More Influencers</a></p>
	    </div>
	    <!-- /container -->

	    <div class="bg_gray">
	        <div class="container margin_120_90">
	            <div class="main_title center mb-5">
	                <span><em></em></span>
	                <h2>Do you have the right reach or Audience</h2>
	                <p>Join our Community Today .</p>
	            </div>
	            <div class="row justify-content-md-center how_2">
	                <div class="col-lg-5 text-center">
	                    <figure class="mb-5">
	                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/web_wireframe.svg" alt="" class="img-fluid lazy" width="360" height="380">
	                    </figure>
	                </div>
	                <div class="col-lg-5">
	                    <ul>
	                        <li data-cue="slideInUp">
	                            <h3><span>#01.</span> Create a free Account</h3>
	                            <p>Click on register and fill in your genuine information as your account will be verified.</p>
	                        </li>
	                        <li data-cue="slideInUp">
	                            <h3><span>#02.</span> Apply for Verification</h3>
	                            <p>After registration, sign into your newly created account and click on Apply, then wait for a result on your profile verification.</p>
	                        </li>
	                        <li data-cue="slideInUp">
	                            <h3><span>#03.</span> Prospective Clients can now see you</h3>
	                            <p>Wen Approved, prospective clients can now find and connect to you, fast and easy.</p>
	                        </li>
	                    </ul>
	                    <p class="add_top_30" data-cue="slideInUp"><a href="register.php" class="btn_1">Start Influencing</a></p>
	                </div>
	                <!-- /row -->
	            </div>
	        </div>
	        <!-- /container -->
	    </div>
	    <!-- /bg_gray -->
            </div>
	    
	    <!-- /container -->
                        
	</main>
	<!-- /main -->

	<?php 
    include 'footer.php';                    
    ?>