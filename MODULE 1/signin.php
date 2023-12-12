<?php
session_start();
/* Attempt MySQL server connection.*/
$link = mysqli_connect("localhost", "root", "", "college_times");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//User Input
        $username = mysqli_real_escape_string($link, $_REQUEST['username']);
        $password = mysqli_real_escape_string($link, $_REQUEST['password']);
        $sql = "select * from college_registration where user_id = '$username' and pwd = '$password'";  
        $result = mysqli_query($link, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        //College View Login check  
        if($count == 1)
        {  
            echo ("<script LANGUAGE='JavaScript'>
            window. alert('LOGIN SUCESSFULL, Welcome!!');
            window. location. href='clgview.php';
            </script>");
            $_SESSION["un"] = "$username";
        }
        //Admin View Login check
        elseif ($username == "COLLEGEtimes2021" and $password == "COLLEGE@times"){
            echo ("<script LANGUAGE='JavaScript'>
                window. alert(' Session Started');
                window. location. href='adminview.php';
                </script>");  
        }
        //Wrong Value navigation to other page
        else{  
            echo ("<script LANGUAGE='JavaScript'>
                window. alert('Invalid Credentials, Try Again!!');
                window. location. href='signin.html';
                </script>"); 
        }  
          
?>  

