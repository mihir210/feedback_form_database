<?php
include("connection.php");
error_reporting(0);
$id = $_GET['id'];


$query = "DELETE FROM `form` WHERE `id` = '$id'";
$data = mysqli_query($conn, $query);
if($data)
{
   echo "
   <script>
   alert('record deleted');
   </script>";
   echo "
   <script>
        window.location.assign('display.php')
    </script>";
   //header("refresh: 5; url =  display.php");
}
else {
   
echo "<script>
alert('faild to delete');
</script>";
}

?>

