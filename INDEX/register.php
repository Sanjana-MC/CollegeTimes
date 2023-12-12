<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "collegetimes");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$rpassword = mysqli_real_escape_string($link, $_REQUEST['rpassword']);
$clgname = mysqli_real_escape_string($link, $_REQUEST['clgname']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$contactno = mysqli_real_escape_string($link, $_REQUEST['contactno']);
    $sql = "SELECT * FROM registration WHERE clgname='$clgname'";
    $results = mysqli_query($link, $sql);
    $sql1 = "SELECT * FROM registration WHERE userid='$username'";
    $r = mysqli_query($link, $sql1);
    if (mysqli_num_rows($results) > 0)
     {
        echo ("<script LANGUAGE='JavaScript'>
        window. alert(' College Name Already exists');
        window. location. href='http://localhost/College Times Website/College_Times_Website/clgsignup.html';
        </script>");
    }
    elseif (mysqli_num_rows($r) > 0)
     {
                                                                                                                                                                                                                                                                                                                                                                
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('UserID Taken! Create Another');
        window. location. href='http://localhost/College Times Website/College_Times_Website/clgsignup.html';
        </script>");
    }
    else{
// Attempt insert query execution
$sql1 = "INSERT INTO registration (userid, pwd, rpwd, clgname, mailid, cno) VALUES ('$username', '$password', '$rpassword', '$clgname', '$email', '$contactno')";
if(mysqli_query($link, $sql1))
{
    echo ("<script LANGUAGE='JavaScript'>
    window. alert('Succesfully Registered');
    window. location. href='http://localhost/College Times Website/College_Times_Website/clgsignin.html';
    </script>");
} 
else
{
    echo "ERROR: Could not able to execute $sql. ". mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
    }
?>

