<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "college_times");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$email = mysqli_real_escape_string($link, $_REQUEST['email']);

$sql1 = "SELECT * FROM subscription WHERE email='$email'";
$r = mysqli_query($link, $sql1);
if (mysqli_num_rows($r) > 0)
 {
    echo ("<script LANGUAGE='JavaScript'>
    window. alert(' Subscribed Already');
    window. location. href='index.html';
    </script>");
 }
 else{
$sql = "INSERT INTO subscription (email) VALUES ('$email')";
if(mysqli_query($link, $sql))
{
    echo ("<script LANGUAGE='JavaScript'>

    window. alert(' Subscribed');

    window. location. href='http://localhost/COLLEGE_TIMES%20CODE/INDEX/index.html';

    </script>");
}
else
{
    echo "ERROR: Could not able to execute $sql. ". mysqli_error($link);
}
}
 ?>