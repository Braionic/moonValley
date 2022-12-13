<?php include 'includes/timeoutable.php' ?>
<?php include 'includes/db.php'; ?>
<!-- /main_title -->
<?php
$k = $_POST['id'];
$k = trim($k);


?>
<div class="row author_list">
                    <?php
                    $records = mysqli_query($conn,"Select DISTINCT * from users WHERE category='{$k}' AND status!='' AND status!='Voter' AND status!='pending'"); // fetch data from database
$i = 1;
while($data = mysqli_fetch_array($records))
{ $i++;
 $smedia = $data['category'];
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
        $service = "<i class='bi bi-award'></i>";
        break;
}
echo'
	                <div class="col-sm-12 col-lg-12 col-md-6" data-cue="">
	                    <a href="author.php?person_id='.$data['id'].'" class="author">
	                        <strong><i class="bi bi-star unlike" id="hello" style="font-size:25px"></i></strong>
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
