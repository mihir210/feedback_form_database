<?php
include("connection.php");
error_reporting(0);

$id = $_GET['id'];

$query = "SELECT * FROM `form` WHERE `id` = '$id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
?>

    <!DOCTYPE html>


    <html lang="en">

    <head>

        <title>Update</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
        <!--Stylesheet-->
        <style media="screen">
            *,
            *:before,
            *:after {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            
            body {
                background-color: #000000;
                min-block-size: 4ch;
            }
            
            .background {
                width: 430px;
                height: 520px;
                position: absolute;
                transform: translate(-50%, -50%);
                left: 50%;
                top: 50%;
            }
            
            .background .shape {
                height: 200px;
                width: 200px;
                position: absolute;
                border-radius: 50%;
            }
            
            .shape:first-child {
                background: linear-gradient(#24269b, #0f19cc);
                left: -150px;
                top: -250px;
            }
            
            .shape:last-child {
                background: linear-gradient(to right, #ff512f, #e98c0a);
                right: -110px;
                bottom: -150px;
            }
            
            form {
                height: auto;
                width: auto;
                background-color: rgba(255, 255, 255, 0.062);
                position: absolute;
                transform: translate(-50%, -50%);
                top: 50%;
                left: 50%;
                border-radius: 20px;
                backdrop-filter: blur(50px);
                border: 2px solid rgba(255, 255, 255, 0);
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.6);
                padding: 50px 35px;
            }
            
            form * {
                font-family: "Poppins", sans-serif;
                color: #ffffff;
                letter-spacing: 1px;
                outline: none;
                border: none;
            }
            
            form h3 {
                font-size: 32px;
                font-weight: 500;
                line-height: 42px;
                text-align: center;
            }
            
            form h4 {
                font-size: 32px;
                font-weight: 500;
                line-height: 42px;
                text-align: center;
            }
            
            label {
                display: block;
                margin-top: 30px;
                font-size: 16px;
                font-weight: 500;
            }
            
            input {
                display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(235, 232, 232, 0.096);
                border-radius: 3px;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;
            }
            
            textarea {
                display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(235, 232, 232, 0.096);
                border-radius: 3px;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;
            }
            
             ::placeholder {
                color: #f3f3f371;
            }
            
            .button {
                margin-top: 50px;
                width: 100%;
                background-color: #8a8a8a62;
                color: #ffffff;
                padding: 15px 0;
                font-size: 18px;
                font-weight: 600;
                border-radius: 5px;
                cursor: pointer;
                transition: all 0.5s;
                cursor: pointer;
            }
            
            .button span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
            }
            
            .button span:after {
                content: '\00bb';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }
            
            .button:hover span {
                padding-right: 25px;
            }
            
            .button:hover span:after {
                opacity: 1;
                right: 0;
            }
            
            .social {
                margin-top: 30px;
                display: flex;
            }
            
            .social div {
                background: red;
                width: 150px;
                border-radius: 4px;
                padding: 5px 10px 10px 5px;
                background-color: rgba(255, 255, 255, 0.27);
                color: #eaf0fb;
                text-align: center;
            }
            
            .social div:hover {
                background-color: rgba(97, 71, 71, 0.47);
            }
            
            .social .fb {
                margin-left: 25px;
            }
            
            .social i {
                margin-right: 4px;
            }
            
            form select {
                text-align: left;
                display: block;
                margin-top: 30px;
                font-size: 20px;
                font-weight: 500;
                align-self: center;
                background-color: rgba(51, 50, 50, 0.801);
                border-radius: 3px;
                padding: 0 100px;
                margin-top: 9px;
                margin-left: 80px;
            }
        </style>

        <!-- <script type="text/javascript"> var infolinks_pid = 3359994; var infolinks_wsid = 0; </script>
    <script type="text/javascript" src="//resources.infolinks.com/js/infolinks_main.js"></script> -->

    </head>

    <body>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <form>
            <h3>Update</h3>

            <label for="email">Email</label>
            <input type="email" placeholder="abc@gmail.com" id="email" name="email" value = "<?php echo $result['email']; ?>">

            <label for="name">Name</label>
            <input type="text" placeholder="Name" id="name" name="name" value = "<?php echo $result['name']; ?>">

            <label for="department">Department</label>
            <select name="department" id="department" placeholder="department">
            <h4>
                <option value="none" id="department" >SELECT BRANCH</option>
                <option value="IT" id="department" <?php if($result['department'] == 'IT'){
                    echo "selected";
                } ?> >IT</option>
                <option value="CE" id="department"<?php if($result['department'] == 'CE'){
                    echo "selected";
                } ?> >CE</option>
                <option value="EC" id="department" <?php if($result['department'] == 'EC'){
                    echo "selected";
                } ?> <?php if($result['department'] == 'IT'){
                    echo "selected";
                } ?> >EC</option>
                <option value="CH" id="department" <?php if($result['department'] == 'CH'){
                    echo "selected";
                } ?> >CH</option>
                <option value="CIVIL" id="department" <?php if($result['department'] == 'CIVIL'){
                    echo "selected";
                } ?> >CIVIL</option>
                <option value="MH" id="department" <?php if($result['department'] == 'MH'){
                    echo "selected";
                } ?> >MH</option>
                <option value="IC" id="department" <?php if($result['department'] == 'IC'){
                    echo "selected";
                } ?> >IC</option>

            </h4>
        </select>

            <label for="rollno">DDU ID</label>
            <input type="text" name="roll_no" id="roll_no" placeholder="21ITUOS000" value = "<?php echo $result['roll_no']; ?>">
            <label for="feedback_text">Feedback</label>
            <!--<input type="text" value="" id="feedback_text" , width="50%", name="feedback_text">-->
            <textarea name="feedback_text" id="feedback_text" cols="30" rows="10" , placeholder="Give your Feedback">
                <?php
                    echo $result['feedback_text'];
                ?>
            </textarea>

            <span><input type="submit" name="update" , class="button" , id="update">update</span>
            <!-- <button name="update" , class="button" , id="update"><span>update</span></button> -->
            <!--<label for="submit">Submit</label>
        <input type="submit" value="Login" name="submit" id="submit">-->
        </form>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </body>

    <?php
    include("connection.php");
        
    if($_GET['update'])
    {
        $id = $_GET['id'];
      $email = $_GET['email'];
      $name = $_GET['name'];
      $department = $_GET['department'];
      $roll_no = $_GET['roll_no'];
      $feedback_text = $_GET['feedback_text'];


       // $ds = "UPDATE `form` SET `email` = 'dsvfdvvvf',  WHERE `form`.`id` ='$id'";
      $query3 = "UPDATE `form` SET `email`='$email', `name`='$name', `department`='$department', `roll_no`='$roll_no', `feedback_text`='$feedback_text' WHERE `form`.`id`='$id'";
      $data =mysqli_query($conn, $query3);
      if ($data) {
        echo "<script>
        alert('Record updated');
        </script>";
        mysqli_close($conn);
      }
      else {
        echo "<script>
        alert('Re');
        </script>";
      }
      echo "<script>
      window.location.assign('display.php')</script>";
    }
    ?>


</html>