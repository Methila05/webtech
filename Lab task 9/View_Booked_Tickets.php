<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Mid Project</title>
    <script>
       
        function showBookedPlaneTickets() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("displayBookedTickets").innerHTML = this.responseText;
                document.getElementById("viewBookedBusTickets").style.color = "white";
                document.getElementById("viewBookedPlaneTickets").style.color = "white";
                document.getElementById("viewBookedPlaneTickets").style.color = "violet";
                document.getElementById("viewBookedBusTickets").style.boxShadow = "";
                document.getElementById("viewBookedPlaneTickets").style.boxShadow = "";
                document.getElementById("viewBookedPlaneTickets").style.boxShadow = "0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19)";
            }
            xhttp.open("POST", "Controller/showBookedPlaneTicketsController.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
        }
    </script>
</head>

<body>
    <?php
    session_start();
    include 'Header.php';
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    require_once 'Model/db_connect.php';
    ?>

    <form method="post">

        <br>
        <label style='color:whitesmoke'>Go back to :</label><a href="Customer_Home.php">Home</a><br><br>

        <h2>SELECT BELOW TO VIEW BOOKED TICKETS</h2>

        <div style="padding: 10px;">
            
            <button type="button" class="button" id="viewBookedPlaneTickets" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;" onmouseover="showBookedPlaneTickets()">VIEW BOOKED Plane TICKET</button>
        </div>

        <div id="displayBookedTickets"></div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 style="text-align: center;">HAPPY TRAVELLING !!!</h1>
        <br><br>

        <?php include 'Footer.php'; ?>
</body>

</html>