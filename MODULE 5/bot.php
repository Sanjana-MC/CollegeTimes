<!-- Created By CodingNepal -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Times Online Chatbot<</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body class="bg-primary text-dark">
    <div class="wrapper">
        <div class="title">College Times Online Chatbot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <!--Initial Help-->
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <div class="in">
                    <!--Dropdown box creation-->
                    <select class="form-control" id="data" type="text">
                        <option disabled selected>-- Select your query --</option>
                        <?php
                            //Establishng the connection
                            $conn = mysqli_connect("localhost", "root", "", "college_times");  
                            //Select query execution
                            $records = mysqli_query($conn, "SELECT queries From chatbot"); 
                            //Fetching records from the database
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['queries'] ."'>" .$data['queries'] ."</option>";  // displaying data in option menu
                            }	
                        ?>
                    </select>
                 </div>
            </div>
            <button id="send-btn" type="button" class="btn btn-success">Ask</button><a href="http://localhost/COLLEGE_TIMES%20CODE/INDEX/index.html"><button type="button" class="btn btn-danger">Back</button></a>
            <script>
            //fetching the selected messages and appending it to the previous data
            $(document).ready(function() 
            {
                $("#send-btn").on("click", function() 
                {
                    $value = $("#data").val();
                    $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value +
                        '</p></div></div>';
                    $(".form").append($msg);
                    $("#data").val('');
                    $.ajax({
                        url: 'message.php',
                        type: 'POST',
                        data: 'text=' + $value,
                        success: function(result) 
                        {
                            $replay =
                                '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' +
                                result + '</p></div></div>';
                            $(".form").append($replay);

                            // when chat goes down the scroll bar automatically comes to the bottom
                            $(".form").scrollTop($(".form")[0].scrollHeight);
                        }
                    });
                });
            });
            </script>
        </body>
</html>