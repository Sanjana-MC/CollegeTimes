
<?php
        //Session Start and session variable initialization
        session_start();
        $id=$_SESSION['eid'];
        $regno=$_SESSION['rno'];
        $_SESSION['eeid']=$id;
        $_SESSION['regnum']=$regno;
        //Connection establishment
        $con=mysqli_connect("localhost","root","","college_times");
        //Input from User 
        $txtCardName=mysqli_real_escape_string($con,$_REQUEST['card_name']);
        $txtCardNo=mysqli_real_escape_string($con,$_REQUEST['card_no']);
        $txtExpDate=mysqli_real_escape_string($con,$_REQUEST['exp_date']);
        $txtCVV=mysqli_real_escape_string($con,$_REQUEST['cvv']);
        //Insert query execution
        $sql="INSERT INTO payment(card_name,card_no,exp_date,cvv) VALUES ('$txtCardName','$txtCardNo','$txtExpDate','$txtCVV')" ;
        //navigation based on query
        if (mysqli_query($con,$sql))
        { 
            header('Location:receipt.php');
        } else {
            echo "ERROR $sql". mysqli_error($con);
        }

?>