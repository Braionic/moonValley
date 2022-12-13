<?php
include'header.php';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT * FROM users WHERE name LIKE :users';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['users' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['name'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/common_func.js"></script>

    <!-- SPECIFIC SCRIPTS -->
	<script src="js/carousel-home.js"></script>

</body>
</html>