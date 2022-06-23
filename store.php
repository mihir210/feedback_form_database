<?php
include("connection.php");

$email = $_GET['email'];
      $name = $_GET['name'];
      $department = $_GET['department'];
      $roll_no = $_GET['roll_no'];
      $feedback_text = $_GET['feedback_text'];

      $query = "INSERT INTO form VALUES('$email', '$name', '$department', '$roll_no', '$feedback_text')";
      $data =mysqli_query($conn, $query);
      if ($data) {
        echo "thanks";
      }
      else {
         echo "faild";
      }
      header("Location : form.php");
?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>