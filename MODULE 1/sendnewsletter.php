<?php
   //Establishing the connection
    $con=mysqli_connect("localhost","root","","college_times");
    //Importing the required files
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'C:\xampp\htdocs\COLLEGE_TIMES CODE\MODULE 1\phpmailer\vendor\autoload.php';

    //Fetching all the emails from the table
    $email =mysqli_query($con, "SELECT * FROM subscription");
    while($rowemail = mysqli_fetch_array($email))
    {
       $q=mysqli_query($con,"select * from event_registration where date_event>=CURDATE()") or die(mysqli_error($con));
       $data=mysqli_fetch_array($q);

     if($data>0)
     {      
        $mail=new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'collegetimes21@gmail.com';                     //SMTP username
        $mail->Password   = 'college@times';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to
    
        //Recipients
        $mail->setFrom('collegetimes21@gmail.com', 'Events Update - COLLEGE TIMES ');
        $mail->addAddress($rowemail['email']);     //Add a recipient
        $mail->addReplyTo('collegetimes21@gmail.com', 'Information');
        $mail->addCC('collegetimes21@gmail.com');
        $mail->addBCC('collegetimes21@gmail.com');
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Upcoming Events" ;
        $body="<html>
                <head>
                 <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th, td {
                        border: 1px solid #ddd;
                        text-align: left;
                        padding: 8px;
                        color:black
                    }

                    tr:nth-child(even) {background-color: #f2f2f2;}

                    th {
                        background-color: #007bff;
                        color: white;
                    }
                </style>
                </head>
                    <table>
                    <thead>
                        <tr>
                            <th>College Name</th>
                            <th>Event Information</th>
                            <th>Date</th>                          
                        </tr>
                    </thead>";
            while($row = mysqli_fetch_array($q))
            {
                $body.="<tfoot>
                <tr>
                <td>".$row["college_name"]."</td>
                <td>".$row["event_info"]." </td>
                <td>".$row["date_event"]."</td>
                </tr>
                </tfoot>";
            }
        $body.="    </table>";
        $mail->Body    = "Greetings!! <br> <br> Here are the upcoming events from all the colleges. Have a nice time participating. Enjoy!! <br><br> Check our website to participate <br> <br> ".$body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';    
        if(!$mail->send())
          echo "Mailer error: ".$mail->ErrorInFo;
        else
          echo ("<script LANGUAGE='JavaScript'>
          window. alert(' Newsletters sent for Today ADMIN! Welldone');
          window. location. href='http://localhost/COLLEGE_TIMES%20CODE/MODULE%201/adminview.php';
          </script>");      
     }
     else
     //alert and navigation on wrong entry
     {
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('Error! Please try again letter');
        window. location. href='forgot.html';
        </script>");
     }
    } 
?>