<?php
include("connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin login</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'>
    <style>
        body {
            background: #E8D426 !important;
            font-family: 'Muli', sans-serif;
        }
        
        h1 {
            color: #fff;
            padding-bottom: 2rem;
            font-weight: bold;
        }
        
        a {
            color: #333;
        }
        
        a:hover {
            color: #E8D426;
            text-decoration: none;
        }
        
        .form-control:focus {
            color: #000;
            background-color: #fff;
            border: 2px solid #E8D426;
            outline: 0;
            box-shadow: none;
        }
        
        .btn {
            background: #E8D426;
            border: #E8D426;
        }
        
        .btn:hover {
            background: #E8D426;
            border: #E8D426;
        }
    </style>

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="pt-5">
        <h1 class="text-center">Admin login</h1>

        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card card-body">

                        <form id="submitForm" action="#" method="post" >
                            <div class="form-group required">
                                <lSabel for="username">Username / Email</lSabel>
                                <input type="text" class="form-control text-lowercase" id="username" required="" name="username" value="">
                            </div>
                            <div class="form-group required">
                                <label class="d-flex flex-row align-items-center" for="password">Password 
                                        <a class="ml-auto border-link small-xl" href="#">Forget?</a></label>
                                <input type="password" class="form-control" required="" id="password" name="password" value="">
                            </div>
                            
                            <div class="form-group pt-1">
                                <input class="btn btn-primary btn-block" type="submit" value = "login", name = "login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->

</body>

</html>

<?php
include("connection.php");
if (isset($_POST['login'])) {
   $email = $_POST['username'];
   $pass = $_POST['password'];

   $query = "SELECT * FROM `admin` WHERE `email` = '$email'&&  `password` = '$pass'";
   $data = mysqli_query($conn, $query);
   $total  = mysqli_num_rows($data);
   if ($total == 1) {
      $_SESSION['username'] = $email;
      $_SESSION['pass'] = $pass;
     echo "
         <script>
        window.location.assign('display.php')
          </script>";
   }
   else {
      echo "
         <script>
            alert('login faild')
          </script>";


          echo "
         <script>
        window.location.assign('login.php')
          </script>";

   }
}
?>