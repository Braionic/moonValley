<?php
  include 'includes/db.php';
    ?>
    <div>
    <div class="bg_gray">
	        <div class="container">
<div class="row author_list">
    
    <?php
    if(isset($_POST['input'])){

    $input = $_POST['input'];
    $query = "SELECT * FROM users WHERE name LIKE '{$input}%' or name LIKE '{$input}%'";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
$i = 1;
while($data = mysqli_fetch_array($result))
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
	                <div class="col-sm-12 col-lg-12 col-md-12" data-cue="">
	                    <a href="author.php?person_id='.$data['id'].'" class="author">
	                        <strong><i class="bi bi-star unlike" id="hello" style="font-size:25px"></i></strong>
	                        <div class="author_thumb veryfied"><i class="bi bi-check"></i>
	                            <figure>
	                                <img src="uploaded_img/'.$data['image'].'" data-src="uploaded_img/'.$data['image'].'" alt="" class="lazy" width="100" height="100">
	                            </figure>
	                        </div>
	                        <div>
	                            <h6>'.$data["name"].'</h6>
	                            <span> Votes: '. $data["votes"].'</span><br>'.$smedia.'
	                        </div>
	                    </a>
	                </div>';
}}}
?>
                </div></div></div></div>
