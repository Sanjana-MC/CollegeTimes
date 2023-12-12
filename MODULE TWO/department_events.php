<?php
 //Establishment of connection
  $con=mysqli_connect("localhost","root","","college_times");
  $result = mysqli_query($con,"SELECT fest_type,event_id,college_name,event_info,events,date_event,time_event,cost,limit_event FROM event_registration WHERE fest_type='Department'");
?>
<html>
<head>
    <title>College Times-College Events</title>
    <!-- Favicons -->
    <link href="favicon.png" rel="icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!--Filter Table query-->
    <script>
    $(document).ready(function() 
    {
        $("#myInput").on("keyup", function()
         {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() 
            {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <!-- ======= Header Tabs ======= -->
    <header id="header" class="fixed-top">
        <div class="container">
            <div class="logo float-left">
                <font color="#007bff" size="6px">College Times</font>
            </div>
            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li><a href="http://localhost/COLLEGE_TIMES%20CODE/INDEX/index.html">Home</a></li>
                    <li class="drop-down"><a href="">Fests</a>
                        <ul>
                            <li class="active"><a href="http://localhost/COLLEGE_TIMES%20CODE/MODULE%20TWO/department_events.php">Department</a></li>
                            <li><a href="http://localhost/COLLEGE_TIMES%20CODE/MODULE%20TWO/college_events.php">College</a></li>
                        </ul>
                    </li>
                    <li><a href="http://localhost/COLLEGE_TIMES%20CODE/MODULE%20TWO/webinar.php">Webinars</a></li>
                    <li><a href="http://localhost/COLLEGE_TIMES%20CODE/MODULE%20TWO/seminars.php">Seminars</a></li>
                    <li><a href="http://localhost/COLLEGE_TIMES%20CODE/MODULE%20TWO/competitions.php">Events</a></li>
                    <li><a href="http://localhost/COLLEGE_TIMES%20CODE/MODULE%205/bot.php"><i style='font-size:30px;color:#007bff' class='fas'>&#xf4ad;</i></a></li>
                    <li><input id="myInput" class="form-control" type="text" placeholder="Search.."></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <font color="#007bff" size="6px">Departmental Events</font><br>
                </div>
            </div>
            <!--Department Events Table-->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>Event ID</th>
                                    <th>Fest Type</th>
                                    <th>College Name</th>
                                    <th>Information</th>
                                    <th>Events Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Cost</th>
                                    <th>Limit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <marquee>Click here to participate for the events</marquee>
                             <!--Fetching data from the database-->
                            <?php
                              while($row = mysqli_fetch_array($result))
                              {                                  
                              ?>
                            <tbody id="myTable">
                                <tr>
                                    <td><?php echo $row["event_id"]; ?></td>
                                    <td><?php echo $row["fest_type"]; ?></td>
                                    <td><?php echo $row["college_name"]; ?></td>
                                    <td><?php echo $row["event_info"]; ?></td>
                                    <td><?php echo $row["events"]; ?></td>
                                    <td><?php echo $row["date_event"]; ?></td>
                                    <td><?php echo $row["time_event"]; ?></td>
                                    <td><?php echo $row["cost"]; ?></td>
                                    <td><?php echo $row["limit_event"]; ?></td>
                                    <td><a href="http://localhost/COLLEGE_TIMES%20CODE/MODULE%203/student_confirmation.php?event_id=<?php echo $row["event_id"]?>"><input class="btn btn-success" type="submit" value=" Participate " /></a></td>
                                </tr>
                            </tbody>
                            <?php 
                              }
                            ?>