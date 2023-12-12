<?php
    //MySQL server connection
    $link = mysqli_connect("localhost", "root", "", "college_times");
    
    // Check connection
    if($link === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
 
    // user inputs 
    $id = mysqli_real_escape_string($link, $_REQUEST['id']);
    $name = mysqli_real_escape_string($link, $_REQUEST['name']);
    $cost = mysqli_real_escape_string($link, $_REQUEST['cost']);
    $lim = mysqli_real_escape_string($link, $_REQUEST['lim']);
    $pclgname = mysqli_real_escape_string($link, $_REQUEST['pclgname']);
    $sql = "SELECT COUNT(*) FROM student_participation WHERE event_id = '$id' AND sp_college_name = '$pclgname'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_fetch_assoc($result)['COUNT(*)'];

    //Evaluating limit
    if ($lim == 0 || $count < $lim || $count != $lim) 
    {
?>
<DOCTYPE html>
    <meta charset="utf-8">
    <title>Student_Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/linearicons/style.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="inner">
                <img src="images/image-1.png" alt="" class="image-1">
                <!--Participant's Form-->
                <form action="student_store.php" method="GET">
                    <h2>Participant Details</h2><br>

                    <div class="form-holder">
                        <label>Event ID:</label>
                        <input type=text class="form-control" name="id" placeholder="Event Id" value="<?php echo $id ?>" />
                    </div>

                    <div class="form-holder">
                        <label>College Name:</label>
                        <input type=text class="form-control" name="name" value="<?php echo $name ?>">
                    </div>

                    <div class="form-holder">
                        <label>Cost:</label>
                        <input type=text class="form-control" name="cost" value="<?php echo $cost ?>">
                    </div>


                    <div class="form-holder">
                        <label>Limit:</label>
                        <input type=text class="form-control" name="lim" value="<?php echo $lim ?>">
                    </div>


                    <div class="form-holder">
                        <span class="lnr lnr-user"></span>
                        <input type="text" name="partici_name" id="partici_name" pattern="[a-zA-Z ]*$" title="Only Letters and Spaces" required class="form-control" placeholder="Student Name">
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-book"></span>
                        <input type="text" name="course" id="course" class="form-control" required pattern="[a-zA-Z ]*$" title="Only Letters and Spaces" placeholder="Course">
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-question-circle"></span>
                        <input type="text" name="reg_no" id="reg_no" class="form-control" required placeholder="Register No.">
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-question-circle"></span>
                        <input type="number" name="year" class="form-control" id="year" required placeholder="Enter your year of studies(1,2,3)">
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-graduation-hat"></span>
                        <input type="text" name="partici_college_name" placeholder="College Name" required class="form-control" value="<?php echo $pclgname ?>" id="partici_college_name">
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-phone-handset"></span>
                        <input type=tel name="contact_no" id="contact_no" class="form-control" required pattern="^\d{10}$" title="Must Have 10 digits" placeholder="Contact number">
                    </div>

                    <div class="form-holder">
                        <span class="lnr lnr-envelope"></span>
                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="abc@gmail.com" name="email" id="email" class="form-control" required placeholder="Email Id">
                    </div>

                    <button type="submit">
                        <span>Register</span>
                    </button>
                </form>
                <img src="images/image-2.png" alt="" class="image-2">
               </div>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/main.js"></script>
    </body>
  </html>

  <?php
    }
    //if condition fails navigate to limited page
    else
    {
  ?>
        <script LANGUAGE='JavaScript'>
        window.location.href = 'http://localhost/COLLEGE_TIMES%20CODE/MODULE%203/limited.html';
        </script>
        <?php
    }
  ?>