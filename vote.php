<?php include 'includes/timeoutable.php' ?>
<?php include 'includes/db.php'; ?>

<?php



$voter_id = $_SESSION['name'];
if(isset($_POST['vote_submit'])){
    $person_id = $_GET['person_id'];
    $voter_id = $_SESSION['id'];
    $voter_name = $_SESSION['name'];
     $image = $_SESSION['image'];
    $voter_email = $_SESSION['user_email'];
    $sql = "SELECT * FROM users WHERE id= $person_id";
    $result = mysqli_query($conn, $sql) or die( mysqli_error($conn));
    while($row = mysqli_fetch_assoc($result)){
        $user_id = $row['id'];
        $vote = $row['votes'];
        $votes = $vote + 1;
        $sql_u = "SELECT * FROM voters WHERE voter_id = '$voter_id'";
        $sql_query1 = mysqli_query($conn, $sql_u);
        if(mysqli_num_rows($sql_query1) < 1000){
         $update_votes = mysqli_query($conn, "update users set votes='$votes' where id='$user_id'"); 
            $sql = "INSERT INTO voters (name, voter_id, user_id, email, image, votes)
            VALUES ('$voter_name', '$voter_id', '$user_id', '$voter_email', '$image', '$votes')";
            $sql_query = mysqli_query($conn, $sql);
            header('Location: /html/author.php?person_id='.$row['id']);
        }else{
            echo "<script type='text/javascript'> document.location = 'vote.php?bad'; </script>";
        }
    
    }
    
}
?>
<?php  $voter_id; ?>