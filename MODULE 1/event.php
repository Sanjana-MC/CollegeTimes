<?php
//Establishing the connection
$con=mysqli_connect("localhost","root","","college_times");
//User Inputs 
$rdFest_type=mysqli_real_escape_string($con,$_REQUEST['fest_type']);
$txtDepartment_name=mysqli_real_escape_string($con,$_REQUEST['department_name']);
$txtCollege_name=mysqli_real_escape_string($con,$_REQUEST['college_name']);
$txtEvent_info=mysqli_real_escape_string($con,$_REQUEST['event_info']);
$rdEvent_type=mysqli_real_escape_string($con,$_REQUEST['events']);
$date_event=mysqli_real_escape_string($con,$_REQUEST['date1']);
$time_event=mysqli_real_escape_string($con,$_REQUEST['time1']);
$intCost=mysqli_real_escape_string($con,$_REQUEST['cost']);
$intLimitEvent=mysqli_real_escape_string($con,$_REQUEST['limit1']);

//insert query execution 
if($txtDepartment_name==NULL)
{
$sql="INSERT INTO event_registration(fest_type, department_name, college_name, event_info,events,date_event,time_event,cost,limit_event) VALUES ('$rdFest_type','Not Applicable','$txtCollege_name','$txtEvent_info','$rdEvent_type','$date_event','$time_event','$intCost','$intLimitEvent')";
}
else
{
     $sql="INSERT INTO event_registration(fest_type, department_name, college_name, event_info,events,date_event,time_event,cost,limit_event) VALUES ('$rdFest_type','$txtDepartment_name','$txtCollege_name','$txtEvent_info','$rdEvent_type','$date_event','$time_event','$intCost','$intLimitEvent')";
}
//If connection is succesfull navigate to another page and display the alert box or throw an error
if (mysqli_query($con,$sql))
 {
     echo ("<script LANGUAGE='JavaScript'>
        window. alert(' Event Uploaded Sucessfully');
        window. location. href='clgview.php';
        </script>");
    
} else {
     echo "ERROR $sql". mysqli_error($con);
}
?>






