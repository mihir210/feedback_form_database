<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
   <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'>
   <title>Display</title>
   <style>
      .delete{
         background-color: red;
         color: white;
         border-radius: 3px;
         width : 120px;
      }
      .update{
        background-color: green;
         color: white;
         border-radius: 3px;
         width : 120px;
      }
      .btn {
            background: #E8D426;
            border: #E8D426;
        }

      *{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
   </style>
</head>
<body>
   
</body>
</html>
<?php
include("connection.php");
error_reporting(0);
$user = $_SESSION['username'];

if ($user == true) {

}
else{
    echo "
         <script>
        window.location.assign('login.php')
          </script>";
}
$query = "SELECT * FROM form";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total!=0) {

   ?>
   <h1 align= "center">Display Records</h1>
   <div class = "table-wrapper">
     <table border = "1" cellspacing = "4" width ="100%" class = "fl-table" >
         <tr>
         <td width = "2%">id</td>
            <th width = "15%">Email</th>
            <th width = "10%">Name</th>
            <th width = "5%">Department</th>
            <th width = "10%">DDU ID</th>
            <th width = "30%">feedback</th>
            <th width= "15%" >Operation</th>

            
         </tr>
      
   <?php
   while ($result = mysqli_fetch_assoc($data)) {
      echo "
      <tr>
      <td>".$result['id']."</td>
      <td>".$result['email']."</td>
      <td>".$result['name']."</td>
      <td>".$result['department']."</td>
      <td>".$result['roll_no']."</td>
      <td>".$result['feedback_text']."</td>
      <td><a href = 'update.php?id=$result[id]'><input type = 'submit' value = 'Update' onclick  = 'return update()' class = 'update'></a></td>
      <td><a href = 'delete.php?id=$result[id]'><input type = 'submit' value = 'Delete' onclick  = 'return checkdelete()' class = 'delete' ></a></td>
      </tr>
      ";
   }
} 



else {
   echo "No data";
}
?>
</table>
</div>
<a href="logout.php"><input class="btn btn-primary btn-block" type="submit" value = "log Out", name = "login"></a>

<script>
   function checkdelete()
   {
      return confirm('Are you sure delete data');
   }

   function update()
   {
    return confirm('Are you sure update data');
   }
</script>