<?php include 'includes/db.php'; ?>
<?php
                                 
                                 
$sql1 = "UPDATE users SET status='influencer' WHERE status = 'promoted' AND end_date < NOW()";
$delete_sql = mysqli_query($conn,$sql1);
$sql1 = "UPDATE video_ad SET status='deactivated' WHERE status = 'active' AND end_date < NOW()";
$delete_sql = mysqli_query($conn,$sql1);
$sql1 = "UPDATE video_ad2 SET status='deactivated' WHERE status = 'active' AND end_date < NOW()";
$delete_sql = mysqli_query($conn,$sql1);
                                 ?>