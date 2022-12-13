<?php include 'includes/timeoutable.php' ?>

    <?php include 'includes/db.php'; ?>
    <?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //ALL CODE RUNS INSIDE THIS IF A USER IS LOGGED IN
        echo "<script type='text/javascript'> document.location = 'panel.php'; </script>";
      //  header('Location: panel.php');
    } else { //IF NO USER LOGGED IN
    }
?>

 <?php 
                $date = date('Y-m-d H:i:s'); 
   
    
                    //INVENTOR SUBMIT
        if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
   $dob = mysqli_real_escape_string($conn, $_POST['dob']);
   $phone_no = '92839928';
   $about = mysqli_real_escape_string($conn, $_POST['about']);
   $tg_link = mysqli_real_escape_string($conn, $_POST['tg_link']);
   $yt_link = mysqli_real_escape_string($conn, $_POST['yt_link']);
   $ig_link = mysqli_real_escape_string($conn, $_POST['ig_link']);
   $dc_link = mysqli_real_escape_string($conn, $_POST['dc_link']);
    $td_link = mysqli_real_escape_string($conn, $_POST['td_link']);
    $ti_link = mysqli_real_escape_string($conn, $_POST['ti_link']);
   $country = $_POST['country'];
    $service = $_POST['service'];
   $gender = $_POST['gender'];
   $category = $_POST['category'];
   $currency = "¥";
   $amount = 0;
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
   $role = "user";

   $select = "SELECT * FROM `users` WHERE email = '$email'";
            $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = "INSERT INTO `users`(name, email, password, dob, phone_no, about, telegram, youtube, instagram, discord, telegram_and_discord, telegram_and_instagram, country, gender, category, currency, amount, created_at, image, service, status) VALUES('$name', '$email', '$pass', '$dob', '$phone_no', '$about', '$tg_link', '$yt_link', '$ig_link', '$dc_link','$td_link', '$ti_link', '$country', '$gender', '$category', '$currency', '$amount', '$date', '$image', '$service', 'Voter')";
          $result = mysqli_query($conn, $insert);

         if($result){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php?registered');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Moon Valley">
    <meta name="author" content="Ansonika">
    <title>Moon Valley - Find renowned influencers to promote your goals</title>

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
<style>
    .data{
        display: none;
    } 
    .data1{
        display: none;
    } 
    .data2{
        display: none;
    } 
</style>
<body id="register_bg">

	<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="login">
		<aside>
			<figure>
				<a href="index.php"><img src="https://i.ibb.co/jDRZp1d/Logo-Makr-5aqs0s.png" alt="" width="140" height="35"></a>
			</figure>
			<div class="access_social">
					<!--<a href="#0" class="social_bt facebook">Register with Facebook</a>
					<a href="#0" class="social_bt google">Register with Google</a> -->
				</div>
            <div class="divider"><span>Or</span></div>
			<form method="POST" action="register.php" autocomplete="off" enctype="multipart/form-data">
              
                <?php
      if(isset($message)){
         foreach($message as $messages){
            echo '<div class="alert alert-danger message">'.$messages.'</div>';
         }
      }
      ?>
                <div class="form-group mb-3">
					<input class="form-control" name="name" type="text" placeholder="Name" required>
					<i class="icon_pencil-edit"></i>
				</div>
			    <div class="form-group mb-3">
					<input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                
                <div class="form-group mb-3">
                <input type="date" class="form-control" id="start" name="dob"
                   value="2000-07-22"
                   min="1950-01-01" max="2003-12-31" required>
					<i class="icon_pencil-edit"></i>
				</div>
                
                <div class="form-group mb-3">
                <select class="form-control" style="background-color:black" id="Gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
					<i class="icon_pencil-edit"></i>
				</div>
                <div class="form-group mb-3">
                <select class="form-control" style="background-color:black" id="category" onchange="changeStatus()" name="category" required>
                    <option value="" disabled selected>Select Category</option>
                    <option value="Voter">Just Voting</option>
                    <option value="Telegram">Telegram</option>
                    <option value="Youtube">Youtube</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Discord">Discord</option>
                    <option value="Telegram_and_Instagram">Telegram & Instagram</option>
                    <option value="Telegram_and_Discord">Telegram & Discord</option>
                </select>
					<i class="icon_pencil-edit"></i>
				</div>
                 <div class="form-group mb-3 data" id="Telegram">
					<input id="Telegram" class="form-control" type="text" name="tg_link" placeholder="Telegram Link eg https://telegram">
					<i class="icon_pencil-edit"></i>
				</div>
                
                <div class="form-group mb-3 data1" id="Youtube" >
					<input class="form-control" type="text" id="Youtube" name="yt_link" placeholder="Youtube Link eg https://telegram">
					<i class="icon_pencil-edit"></i>
				</div>
                <div class="form-group mb-3 data2" id="Instagram">
					<input class="form-control" type="text" id="Instagram" name="ig_link" placeholder="Instagram Link eg https://instagram">
					<i class="icon_pencil-edit"></i>
                </div>
                <div class="form-group mb-3 data3" id="Discord">
					<input class="form-control" type="text" id="Discord" name="dc_link" placeholder="Full Discored Link">
					<i class="icon_pencil-edit"></i>
                </div>
                <div class="form-group mb-3 data4" id="Telegram_and_Discord">
					<input class="form-control" type="text" id="Telegram_and_Discord" name="td_link" placeholder="Full Telegram or Discord Link">
					<i class="icon_pencil-edit"></i>
                </div>
                <div class="form-group mb-3 data5" id="Telegram_and_Instagram">
					<input class="form-control" type="text" id="Telegram_and_Instagram" name="ti_link" placeholder="Full Telegram or Instagram Link">
					<i class="icon_pencil-edit"></i>
                </div>
                <div class="form-group mb-3">
                <select class="form-control" style="background-color:black" id="service" name="service" required>
                    <option value="" disabled selected>Select Service</option>
                    <option value="None">None</option>
                    <option value="AMA">AMA</option>
                    <option value="Calls">Calls</option>
                    <option value="Shilling">Shilling</option>
                </select>
					<i class="icon_pencil-edit"></i>
				</div>
                <div class="form-group mb-3">
                <select class="form-control" style="background-color:black" id="country" name="country" required>
                    <option value="" disabled selected>Select country</option>
                     <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                </select>
					<i class="icon_pencil-edit"></i>
				</div>
                <div class="form-group mb-3">
                <textarea class="form-control" id="about" name="about" rows="6" cols="50" placeholder="Tell us a liitle about yourself" required></textarea>
					<i class="icon_pencil-edit"></i>
				</div>
                <div class="form-group mb-3">
					<input class="form-control" type="password" name="password" id="password1" placeholder="Password">
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="cpassword" id="password2" placeholder="Confirm Password">
				</div>
                <div class="form-group mb-3">
                <input type="file" class="form-control" name="image" class="box" accept="image/jpg, image/jpeg, image/png" required>
					<i class="icon_pencil-edit"></i>
				</div>
				<div id="pass-info" class="clearfix"></div>
				<input type="submit" value="Register Now" name="submit" class="btn_1 rounded full-width">
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="login.php">Sign In</a></strong></div>
			</form>
			<div class="copy">© 2022 MoonValley</div>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/common_func.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>	
    
                         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
          $("#category").on('change', function(){

              //var input = $(this).val();
              //alert($(this).val());
              $(".data").hide();
              $("#" + $(this).val()).fadeIn(700);
                }).change();

      });
        $(document).ready(function(){
          $("#category").on('change', function(){

              //var input = $(this).val();
              //alert($(this).val());
              $(".data1").hide();
              $("#" + $(this).val()).fadeIn(700);
                }).change();

      });
    
        $(document).ready(function(){
          $("#category").on('change', function(){

              //var input = $(this).val();
              //alert($(this).val());
              $(".data2").hide();
              $("#" + $(this).val()).fadeIn(700);
                }).change();
      });
    
     $(document).ready(function(){
          $("#category").on('change', function(){

              //var input = $(this).val();
              //alert($(this).val());
              $(".data3").hide();
              $("#" + $(this).val()).fadeIn(700);
                }).change();
      });
    $(document).ready(function(){
          $("#category").on('change', function(){

              //var input = $(this).val();
              //alert($(this).val());
              $(".data4").hide();
              $("#" + $(this).val()).fadeIn(700);
                }).change();
      });
     $(document).ready(function(){
          $("#category").on('change', function(){

              //var input = $(this).val();
              //alert($(this).val());
              $(".data5").hide();
              $("#" + $(this).val()).fadeIn(700);
                }).change();
      });
          </script>
  
</body>
</html>