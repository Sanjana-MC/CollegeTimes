<?php
    //Connection Establishment
    $link = mysqli_connect("localhost", "root", "", "college_times");
    $sql = "SELECT event_id,college_name,cost,limit_event FROM event_registration WHERE event_id='" . $_GET["event_id"] . "'";
    // Check connection
    if($link === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } 
    $r=mysqli_query($link,$sql);
?>
<html>
<head>
    <title>Confirmation Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="C:\xampp\htdocs\COLLEGE_TIMES CODE\MODULE 3\images\icons\1-removebg-preview.png" width="100px" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <?php
        while($row = mysqli_fetch_array($r))
        {
    ?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <!--Confirmation Check Partcipants Collefe name form-->
                <form action="students_detail_limit.PHP" method="GET" class="login100-form validate-form">
                    <span class="login100-form-title p-b-55">
                        Confirmation
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="College Name is Required">
                        <input type=text class="input100" placeholder="Enter your College Name" pattern="[a-zA-Z ]*$"
                            title="Only Letters and Spaces" name="pclgname" />
                        <span class="symbol-input100">
                            <span class="lnr lnr-question-circle"></span>
                        </span>
                    </div>
                    <div class="wrap-input100 m-b-16">
                        <input type=text class="input100" name="id" placeholder="Event ID"
                            value="<?php echo $row["event_id"]; ?>" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-lock"></span>
                        </span>
                    </div>

                    <div class="wrap-input100 m-b-16">
                        <input type=text class="input100" placeholder="Event College Name" name="name"
                            value="<?php echo $row["college_name"]; ?>" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-lock"></span>
                        </span>
                    </div>

                    <div class="wrap-input100 m-b-16">
                        <input type=text class="input100" placeholder="Cost" name="cost"
                            value="<?php echo $row["cost"]; ?>" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-lock"></span>
                        </span>
                    </div>

                    <div class="wrap-input100 m-b-16">
                        <input type=text class="input100" placeholder="Limit" name="lim"
                            value="<?php echo $row["limit_event"]; ?>" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-lock"></span>
                        </span>
                    </div>

                    <br><br>
                    <div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn" type="submit">
                            Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>