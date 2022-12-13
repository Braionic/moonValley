<?php
include 'header.php';

  if (isset($_POST['submit'])) {
    $countryName = $_POST['search'];

    $sql = 'SELECT * FROM users WHERE name = :name';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => $countryName]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-5 mx-auto">
        <div class="card shadow text-center">
          <div class="card-header">
            <h1><?= $row['name'] ?></h1>
          </div>
          <div class="card-body">
            <h4><b>Country Code :</b> <?= $row['name'] ?></h4>
            <h4><b>City :</b> <?= $row['dob'] ?></h4>
            <h4><b>Country ID :</b> <?= $row['id'] ?></h4>
          </div>
        </div>
      </div>
    </div>
  </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/common_func.js"></script>

    <!-- SPECIFIC SCRIPTS -->
	<script src="js/carousel-home.js"></script>

</body>
</html>