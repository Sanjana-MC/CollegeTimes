<?php
/* MySQL server connection*/
$link = mysqli_connect("localhost", "root", "", "college_times"); 
// Check connection
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
//user inputs 
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$rpassword = mysqli_real_escape_string($link, $_REQUEST['rpassword']);
$clgname = mysqli_real_escape_string($link, $_REQUEST['clgname']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$contactno = mysqli_real_escape_string($link, $_REQUEST['contactno']);
   //Checking for repeatition for college name and user id
   //Select query execution
    $sql = "SELECT * FROM college_registration WHERE college_name='$clgname'";
    $results = mysqli_query($link, $sql);
    //Select query execution
    $sql1 = "SELECT * FROM college_registration WHERE user_id='$username'";
    $r = mysqli_query($link, $sql1);
    //User name and college name repeatition check
    if (mysqli_num_rows($results) > 0)
     {
        echo ("<script LANGUAGE='JavaScript'>
        window. alert(' College Name Already exists');
        window. location. href='signup.html';
        </script>");
     }
    else if(mysqli_num_rows($r) > 0)
     {
                                                                                                                                                                                                                                                                                                                                                                
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('UserID Taken! Create Another');
        window. location. href='signup.html';
        </script>");
    }
    else{
 //insert query execution
$sql1 = "INSERT INTO college_registration (user_id, pwd, rpwd, college_name, mail_id, cno) VALUES ('$username', '$password', '$rpassword', '$clgname', '$email', '$contactno')";
if(mysqli_query($link, $sql1))
{
    echo ("<script LANGUAGE='JavaScript'>
    window. alert('Succesfully Registered');
    window. location. href='signin.html';
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