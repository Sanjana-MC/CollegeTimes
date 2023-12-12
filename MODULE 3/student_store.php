<?php
    //Session start
    session_start();
    //Attempt MySQL server connection
    $link = mysqli_connect("localhost", "root", "", "college_times");
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // user inputs 
    $eventid = mysqli_real_escape_string($link, $_REQUEST['id']);
    $cost = mysqli_real_escape_string($link, $_REQUEST['cost']);
    $pname = mysqli_real_escape_string($link, $_REQUEST['partici_name']);
    $course = mysqli_real_escape_string($link, $_REQUEST['course']);
    $regno = mysqli_real_escape_string($link, $_REQUEST['reg_no']);
    $year = mysqli_real_escape_string($link, $_REQUEST['year']);
    $pclgname = mysqli_real_escape_string($link, $_REQUEST['partici_college_name']);
    $cno = mysqli_real_escape_string($link, $_REQUEST['contact_no']);
    $mail = mysqli_real_escape_string($link, $_REQUEST['email']);

    //Insert query execution
    $sql1 = "INSERT INTO student_participation(event_id, sp_name, reg_no,course, year,sp_college_name,phone_no,email) 
    VALUES ('$eventid',  '$pname', '$regno', '$course', '$year', '$pclgname', '$cno', '$mail')";
    
    //Navigation based on result of the query
    if(mysqli_query($link, $sql1))
    {
        //cost check
        if ($cost != 0)
        {
            $_SESSION['id']="$eventid";
            $_SESSION['regno']="$regno";
            echo("<script LANGUAGE='JavaScript'>
            window. location. href='http://localhost/COLLEGE_TIMES CODE/MODULE 4/College_Times_Payment.php';
            </script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>    
            window. location. href='http://localhost/COLLEGE_TIMES%20CODE/MODULE%204/registered_successfully.html';
            </script>");
        }
    } 
    else
    {
        echo "ERROR: Could not able to execute $sql1. ". mysqli_error($link);
    }
    // Close connection
    mysqli_close($link);   
    ?>