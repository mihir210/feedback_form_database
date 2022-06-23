<?php

// $servername = "sql5.freesqldatabase.com";
// $username = "sql5501283";
// $password = "gxLDpreGF1";
// $dbname = "sql5501283";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";


// $servername = "sql107.epizy.com";
// $username = "epiz_32000466";
// $password = "yl6917eoZHi";
// $dbname = "epiz_32000466_login";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
   
}
else {
   echo "faild".mysqli_connect_error();
}

?>