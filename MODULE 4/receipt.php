<?php
    //connection establishment
    $con=mysqli_connect("localhost","root","","college_times");

    //session start and session variable initialization
    session_start();
    $id=$_SESSION['eeid'];
    $regno=$_SESSION['regnum'];

    //select query execution
    $sql = "SELECT  college_name,cost FROM event_registration WHERE event_id=$id";
    $sql1="SELECT sp_name,sp_college_name FROM student_participation WHERE reg_no='$regno'";

    $erd=mysqli_query($con,$sql);
    $spd=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_array($erd);
    $row2=mysqli_fetch_array($spd);

    //fetching current date
    $month = date('m');
    $day = date('d');
    $year = date('Y');
    $today = $year . '-' . $month . '-' . $day;

    //check connection
    if($con==false)
    {
        die("ERROR: Could not connect.".mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>College Times | Receipt</title>
    <style>
    input[type=text] {
        border: none;
    }
    </style>
</head>

<body>
   <!--Receipt--> 
    <br>
    <br>
    <br>
    <center>
        <h4>Payment Successfull!</h4>
        <p class="text-center">Your payment has been confirmed. Download the receipt for future reference. </p>
    </center>

    <div id="invoice">
        <center>
            <h2>
                <font color="#007bff">COLLEGE TIMES | RECEIPT</font>
            </h2>
            
            <table width="500px">
                <tr>
                    <td>
                        <font face="Comic Sans Ms" color="Black">Participant Name</font>
                    </td>
                    <td>
                        <center>
                            <font face="Comic Sans Ms"><input type="text" name="spname"
                                    style="height:fit-content; width:fit-content"
                                    value="<?php echo $row2['sp_name'];?>"></font>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td>
                        <font face="Comic Sans Ms" color="Black">Participant College Name</font>
                    </td>
                    <td>
                        <center>
                            <font face="Comic Sans Ms"><input type="text" name="sp_college_name"
                                    value="<?php echo $row2['sp_college_name'];?>"></font>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td>
                        <font face="Comic Sans Ms" color="Black">Payment Date</font>
                    </td>
                    <td>
                        <center>
                            <font face="Comic Sans Ms"><input type="text" name="sp_college_name"
                                    value="<?php echo $today; ?>"></font>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td>
                        <font face="Comic Sans Ms" color="Black">College Name</font>
                    </td>
                    <td>
                        <center>
                            <font face="Comic Sans Ms" color="Black"><input type="text" name="event_college"
                                    value="<?php echo $row1['college_name'];?>">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td><b>
                            <font face="Comic Sans Ms" color="blue">Event Cost</font>
                        </b></td>
                    <td>
                        <center>
                            <font face="Comic Sans Ms" color="Black"><input type=text name="cost"
                                    value="<?php echo $row1['cost'];?>">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td><b>
                            <font face="Comic Sans Ms" color="green">Total Amount Received</font>
                        </b></td>
                    <td>
                        <center>
                            <font face="Comic Sans Ms" color="Black"><input type=text name="cost"
                                    value="<?php echo $row1['cost'];?>">
                    </td>
                </tr>

            </table>
        </center>
    </div>
    <br>
    <center><button class="waves-effect waves-light" onclick="generatePDF()">
            <font face="Comic Sans Ms" color="red">Download Receipt</font>
        </button></center>
    <br>
    <br>
    <center>
        <a href="http://localhost/COLLEGE_TIMES%20CODE/MODULE%204/registered_successfully.html"><button
                style="background: #007bff; color:cornsilk; width: 100px;">Done</button></a>
    </center>

    <!--Invoice PDF generation-->
    <script>
    function generatePDF()
     {
        const element = document.getElementById('invoice');
        html2pdf()
            .from(element)
            .save();

    }
    </script>
</body>
</html>