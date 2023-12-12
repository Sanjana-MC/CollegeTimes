<?php
    //Session start and session variable initialization
    session_start();
    $id=$_SESSION['id'];
    $regno=$_SESSION['regno'];
    $_SESSION['eid']=$id;
    $_SESSION['rno']=$regno;
?>
                <!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>

                                <title>College Times - Payment</title>
                                <meta content="" name="description">
                                <meta content="" name="keywords">

                                <link href="favicon.png" rel="icon">
                                <link href="apple-touch-icon.png" rel="apple-touch-icon">

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
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        
                                <style>
                                    body {                                    
                                        background: #007bff
                                    }

                                    .rounded {
                                        border-radius: 1rem
                                    }

                                    .nav-pills .nav-link {
                                        color: #555
                                    }

                                    .nav-pills .nav-link.active {
                                        color: white
                                    }

                                    input[type="radio"] {
                                        margin-right: 5px
                                    }

                                    .bold {
                                        font-weight: bold
                                    }
                                </style>
                            </head>                             
                            <body oncontextmenu='return false' class='snippet-body'>
                                <div class="container py-5">    
                                        <div class="row mb-4">
                                            <div class="col-lg-8 mx-auto text-center">
                                                <h1 class="display-6">College Times Payment</h1>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-lg-6 mx-auto">
                                                <div class="card ">
                                                    <div class="card-header">
                                                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">

                                                            <!-- Credit card form tabs -->
                                                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i>Card Details </a> </li>                                                                
                                                            </ul>
                                                        </div> 

                                                        <!-- Credit card form content -->
                                                        <div class="tab-content">

                                                            <!-- credit card info-->
                                                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                                                <form action="payment.php" method="POST">   
                                                                    <div class="form-group"> <label for="username">
                                                                            <h6>Card Holders Name</h6>
                                                                        </label> <input type="text" name="card_name" id="card_name" required pattern="[a-zA-Z ]*$" title="Only letters and Spaces" placeholder="Card Holders Name" required class="form-control "> </div>
                                                                    <div class="form-group"> <label for="cardNumber">
                                                                            <h6>Card number</h6>
                                                                        </label>
                                                                        <div class="input-group"> 
                                                                            <input type="text"  placeholder="Valid card number" class="form-control"  maxlength="16" required pattern="^\d{16}$" title="Must Have 16 digits"  name="card_no" id="card_no">
                                                                            <div class="input-group-append"> 
                                                                                <span class="input-group-text text-muted"> 
                                                                                    <i class="fab fa-cc-visa mx-1"></i>                                                                                     
                                                                                    <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-8">
                                                                            <div class="form-group"> <label><span class="hidden-xs">
                                                                                        <h6>Expiration Date</h6>
                                                                                    </span></label>
                                                                                <div class="input-group"> <input maxlength="5" type="text" placeholder="MM YY" pattern="^\d{5}$" title="Enter the date" name="exp_date" class="form-control" required  title="Must follow MM YY Pattern"> </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                                                </label> <input type="password" name="cvv" required class="form-control" pattern="^\d{3}$" title="Enter 3 digit CVV number" maxlength="3"> </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer"> <input type="submit" class="subscribe btn btn-light btn-block shadow-sm"> </input>
                                                                </form>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript'>
            $(function()
            {
            $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
 </body>
 </html>