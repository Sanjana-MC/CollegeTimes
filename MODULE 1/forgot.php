<?php
   //Establishing the connection
   $con=mysqli_connect("localhost","root","","college_times");
  
   //Importing the required files
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   require 'C:\xampp\htdocs\COLLEGE_TIMES CODE\MODULE 1\phpmailer\vendor\autoload.php';
   //Fetching email
     $email = mysqli_real_escape_string($con, $_REQUEST['email']);  
     //Fetching password
     $q=mysqli_query($con,"select pwd from college_registration where mail_id='$email'") or die(mysqli_error($con));
     $data=mysqli_fetch_assoc($q); 
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
        $mail->setFrom('collegetimes21@gmail.com', 'College Times Forgot Password');
        $mail->addAddress($email);     
        $mail->addReplyTo('collegetimes21@gmail.com', 'Information');
        $mail->addCC('collegetimes21@gmail.com');
        $mail->addBCC('collegetimes21@gmail.com');
    
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Forgot Password ';
        $mail->Body    = "Greetings!! <br> <br> Please use this password to login <i> " . $data['pwd']."  </i><br> <br> <b>Important</b> <i>Don't share this with anyone and keep it confidential. This mail is intended to recepient(s) only. If you have received this email by mistake, please notify the sender immediately and do not disclose the contents to anyone or make copies of this</i>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';    
        if(!$mail->send())
            echo "Mailer error: ".$mail->ErrorInFo;
        else
            echo ("<script LANGUAGE='JavaScript'>
            window. alert(' Mail Sent!! Please check and Sign In Again!!');
            window. location. href='http://localhost/COLLEGE_TIMES%20CODE/MODULE%201/signin.html';
            </script>");      
      }
     else
     //alert and navigation on wrong entry
     {
        echo ("<script LANGUAGE='JavaScript'>
        window. alert('Email not found');
        window. location. href='forgot.html';
        </script>");
     }
?>


