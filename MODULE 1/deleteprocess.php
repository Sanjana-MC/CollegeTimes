<?php
include_once 'dbconfig.php';
//Delete all the event information from database
$sql = "DELETE FROM event_registration WHERE event_id='" . $_GET["event_id"] . "'";
//Deleteing all the student information corresponding to the event from the database
$sql1 = "DELETE FROM student_participation WHERE event_id='" . $_GET["event_id"] . "'";
//If connection is succesfull navigate to another page and display the alert box or throw an error
if(mysqli_query($conn,$sql1)){
    if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'>
                    window. alert('Deleted both event and Student data Sucesssfully');
                    window. location. href='adminview.php';
                    </script>");  
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }    
}
else
{
    echo "Error deleting record: " . mysqli_error($conn);
}
//Close the connection
mysqli_close($conn);
?>