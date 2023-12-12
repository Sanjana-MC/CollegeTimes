<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">        
        <a class="navbar-brand ps-3">COLLEGE TIMES</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
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
    </nav>
    <!-- Side Tabs-->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="adminview.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="#college">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            College List
                        </a>

                        <a class="nav-link" href="#event">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Event List
                        </a>

                        <a class="nav-link" href="#student">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Student List
                        </a>
                        <a class="nav-link" href="#feedback">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Feedback
                        </a>
                        <a class="nav-link" href="#subscribers">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Subscribers List
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <!--Headings-->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">COLLEGE TIMES</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">College Registered</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <h6 class="small text-white stretched-link">150</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Events Uploaded</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <h6 class="small text-white stretched-link">989</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Students Participated</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <h6 class="small text-white stretched-link">1020</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    College Registered Chart
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Events Updated Chart
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>

                    <!--Registred College Table-->
                    <section id="college">
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">COLLEGE TIMES</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Registered College List</li>
                            </ol>
                            <?php
                                include_once 'dbconfig.php';
                                $result = mysqli_query($conn,"SELECT college_name,mail_id,cno FROM college_registration");
                            ?>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>College Name</th>
                                            <th>Email Id</th>
                                            <th>Phone Number</th>
                                        </tr>
                                    </thead>

                                    <!--Fetching data from the database-->
                                    <?php
                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                     <tfoot>
                                        <tr>
                                            <td><?php echo $row["college_name"]; ?></td>
                                            <td><?php echo $row["mail_id"]; ?></td>
                                            <td><?php echo $row["cno"]; ?></td>
                                        </tr>
                                     </tfoot>
                                    <?php
                                     }
                                    ?>
                                </table>
                     </section>

                     <!--Event List Table-->
                     <section id="event">
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">COLLEGE TIMES</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Events List</li>
                            </ol>
                            <?php
                            include_once 'dbconfig.php';
                            $result = mysqli_query($conn,"SELECT fest_type,event_id,college_name,events,date_event,time_event,cost,limit_event FROM event_registration");
                            ?>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Event ID</th>
                                            <th>Fest Type</th>
                                            <th>College Name</th>
                                            <th>Events Type</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Cost</th>
                                            <th>Limit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <!--Fetching data from the database-->
                                    <?php
                                      while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <td><?php echo $row["event_id"]; ?></td>
                                            <td><?php echo $row["fest_type"]; ?></td>
                                            <td><?php echo $row["college_name"]; ?></td>
                                            <td><?php echo $row["events"]; ?></td>
                                            <td><?php echo $row["date_event"]; ?></td>
                                            <td><?php echo $row["time_event"]; ?></td>
                                            <td><?php echo $row["cost"]; ?></td>
                                            <td><?php echo $row["limit_event"]; ?></td>
                                            <td><a href="deleteprocess.php?event_id=<?php echo $row["event_id"]; ?>"><input class="btn btn-danger" type="submit" value=" Delete " /></a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <?php
                                      }
                                    ?>
                                </table>
                      </section>

                      <!--Partcipant's Table-->
                      <section id="student">
                         <div class="container-fluid px-4">
                            <h1 class="mt-4">COLLEGE TIMES</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Student Participated List</li>
                            </ol>
                            <?php
                              include_once 'dbconfig.php';
                              $result = mysqli_query($conn,"SELECT sp_name,course,reg_no,sp_college_name FROM student_participation");
                            ?>
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
                                     while($row = mysqli_fetch_array($result)){
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
                                    ?>
                                </table>
                       </section>

                       <!--Feedback Table-->
                    <section id="feedback">
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">COLLEGE TIMES</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Feedback</li>
                            </ol>
                            <?php
                             include_once 'dbconfig.php';
                             $result = mysqli_query($conn,"SELECT name,email,subject,message FROM feedback");
                            ?>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>

                                    <!--Fetching data from the database-->
                                    <?php
                                      while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <td><?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            <td><?php echo $row["subject"]; ?></td>
                                            <td><?php echo $row["message"]; ?></td>
                                        </tr>
                                    </tfoot>
                                    <?php
                                      }
                                    ?>
                                </table>
                     </section>

                     <!--Subscribers Table-->
                    <section id="subscribers">
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">COLLEGE TIMES</h1> <a href="sendnewsletter.php"><input type="submit" style="float: right;" class="btn btn-warning" value=" Send Newsletter for Today" /></a>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Subscribers</li>
                            </ol>
                            <?php
                             include_once 'dbconfig.php';
                             $result = mysqli_query($conn,"SELECT id,email FROM subscription");
                            ?>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>

                                    <!--Fetching data from the database-->
                                    <?php
                                      while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <tfoot>
                                        <tr>
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                        </tr>
                                    </tfoot>
                                    <?php
                                     }
                                    ?>
                                </table>
                     </section>
            </main>
            
            <!--Footer-->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; COLLEGE TIMES 2021</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--Script for charts-->
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