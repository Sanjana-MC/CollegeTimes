<?php
    session_start();
    include_once 'dbconfig.php';          
    $un= $_SESSION["un"] ;
    //Fetching college_name through user_id 
    $id = mysqli_query($conn,"SELECT college_name FROM college_registration WHERE user_id = '$un'");
    $i = mysqli_fetch_assoc($id);
    $cname = $i["college_name"];
    //Fetching event_id through college_name 
    $eid = mysqli_query($conn, "SELECT event_id FROM event_registration WHERE college_name='$cname'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="C:\xampp\htdocs\COLLEGE_TIMES CODE\INDEX\assets\img\CTlogo.jpeg" rel="icon">
    <link href="C:\xampp\htdocs\COLLEGE_TIMES CODE\INDEX\assets\img\CTlogo.jpeg" rel="apple-touch-icon">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>College Authority Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">COLLEGE TIMES</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i
                class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item"
                            href="http://localhost/COLLEGE_TIMES%20CODE/INDEX/index.html">Logout</a></li>
                </ul>
            </li>
        </ul>
        <a class="navbar-brand ps-3" href="index.html">Welcome <?php echo $cname ?></a>
    </nav>
    <!--Tabs-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="clgview.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Register a new Event
                        </a>
                        <a class="nav-link" href="#student">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Student List
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Upload a event</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <!--Disabling the textbox on clicking radio button-->
                    <script type="text/javascript">
                    function func() {
                        var department = document.getElementById("department");
                        var department_name = document.getElementById("department_name");
                        department_name.disabled = department.checked ? false : true;
                        if (!department_name.disabled) {
                            department_name.focus();
                        }
                    }

                    /*Check if the checkbox is ticked*/
                    function foo() {
                        var checkbox = document.getElementById("terms");
                        if (!checkbox.checked) {
                            alert("Please read the disclaimer");
                        };
                    };
                    </script>

                    <!--Event Upload Form-->
                    <body>
                        <form action="event.php" method="POST">
                            <label for="Fest type">Fest Type &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
                                &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</label>

                            <input class="form-check-input" type="radio" name="fest_type" id="college" value="College"
                                onclick="func()">College Event </label>

                            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input class="form-check-input"
                                type="radio" name="fest_type" id="department" value="Department"
                                onclick="func()">Departmental Event</label><br><br>

                            <label for="departmentName">Department Name &nbsp; &nbsp; </label>
                            <input type="text" id="department_name" value="NULL" placeholder="Enter the Department name"
                                pattern="[a-zA-Z ]*$" disabled=disabled name="department_name"><br><br>

                            <label for="collegeName">College Name&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;</label>
                            <input type="text" id="rep" placeholder="Enter College name" required pattern="[a-zA-Z ]*$"
                                value="<?php echo $cname?>" name="college_name"><br><br>

                            <label for="event_info">Event Information</label>&nbsp; &nbsp; <textarea name="event_info"
                                id="event_info" rows="5" cols="100" placeholder="Enter Event description"
                                required></textarea><br><br>

                            <label for="event_type">Event &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp;</label>
                            <label for="radio1">
                                &nbsp; &nbsp; &nbsp; &nbsp;<input class="form-check-input" type="radio" id="events"
                                    name="events" value="Seminars" checked>Seminar
                            </label>

                            &nbsp; &nbsp; &nbsp; &nbsp;<label class="form-check-label" for="radio2">
                                <input class="form-check-input" type="radio" id="events" name="events"
                                    value="Webinars">Webinar
                            </label>

                            &nbsp; &nbsp; &nbsp; &nbsp;<label class="form-check-label">
                                <input class="form-check-input" type="radio" id="events" name="events"
                                    value="Competitions">Competitions
                            </label> <br><br>

                            <label for="date">Date&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                &nbsp; &nbsp;&nbsp; &nbsp; </label>
                            <input type="date" id="date1" placeholder="Event on" name="date1" required><br><br>

                            <label for="time">Time&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                &nbsp; &nbsp;&nbsp; &nbsp; </label>
                            <input type="time" id="time1" placeholder="At what time" name="time1" required><br><br>

                            <label for="cost">Cost&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                &nbsp; &nbsp;&nbsp; &nbsp;</label>
                            <input type="number" id="rep" placeholder="Enter cost for individual" name="cost"
                                required><br><br>

                            <label for="limit">Limit&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                &nbsp; &nbsp;&nbsp;</label>
                            <input type="number" id="rep" placeholder="Enter maximum number of students from a college"
                                name="limit1" required><br><br>

                            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <input class="form-check-input"
                                type="checkbox" id="terms" required>&nbsp;&nbsp; <b>
                                <font color="#007bff" size="3px" face="Comic MS sans">I accept I have read the
                                    disclaimer and I am responsible for the information given.</font></input>
                            </b>
                            <br><br>
                            <input type="submit" class="btn btn-success" value="Submit"></input>
                            <br>
                            <br>
                            <br>
                            <font color="red" size="2px" face="Comic MS sans"><b>Disclaimer: </b> Incase there are more
                                than one event then for each of the events separate form must be filled.
                                In case of college events each of then events will have different forms filled as
                                college under the fest type </font>
                        </form>
                    </body>

</html>
<br>
<br>
<br>

<!--Participants List Table-->
<section id="student">
    <div class="container-fluid px-4">
        <h3 class="mt-4">Participated Student List</h3>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Register Number</th>
                        <th>College Name</th>
                    </tr>
                </thead>

                <!--Fetching data from the database-->
                <?php
                    include_once 'dbconfig.php';
                    while($e = mysqli_fetch_assoc($eid))
                    {
                    $eventid = $e["event_id"];
                    $result = mysqli_query($conn,"SELECT sp_name,course,reg_no,sp_college_name FROM student_participation WHERE event_id ='$eventid'");                                    
                    while($row = mysqli_fetch_array($result))
                    {
                ?>
                <tfoot>
                    <tr>
                        <td><?php echo $row["sp_name"]; ?></td>
                        <td><?php echo $row["course"]; ?></td>
                        <td><?php echo $row["reg_no"]; ?></td>
                        <td><?php echo $row["sp_college_name"]; ?></td>
                    </tr>
                </tfoot>
                <?php
                }
                }
                ?>
            </table>
</section>
</main>

<!--footer-->
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; COLLEGE TIMES 2021</div>

        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>