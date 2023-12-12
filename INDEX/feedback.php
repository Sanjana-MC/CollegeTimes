<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "college_times");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$sub = mysqli_real_escape_string($link, $_REQUEST['subject']);
$msg = mysqli_real_escape_string($link, $_REQUEST['message']);

    
// Attempt insert query execution
$sql= "INSERT INTO feedback (name,email,subject,message) VALUES ('$name', '$email', '$sub', '$msg')";
if(mysqli_query($link, $sql))
{
    echo ("<script LANGUAGE='JavaScript'>
    window. alert('Thank You for the Feedback!');
    window. location. href='index.html';
    </script>");
} 
else
{
    echo "ERROR: Could not able to execute $sql. ". mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
    
?>

