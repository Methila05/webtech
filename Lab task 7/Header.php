<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>plane Header</title>
</head>

<body>
    <h1>plane Manager </h1>
    <h1 style="padding: 5px;"> Transport Managements  </h1><br>
    <span style="display:inline-block; width:100%; height:5%; text-align:right">
        <?php

        if (isset($_SESSION['email'])) {
            echo " Logged in: ";
            echo '<a href="plane_Manager_Home.php">';
            echo $_SESSION["email"];
            echo '</a> | ';
            echo "<a href='Logout.php'>Logout</a>  ";
        } else {
            echo '<a href="Public_Home.php">Home</a> | <a href="Login.php">Login</a> |<a href="Registration.php">Registration</a>';
        }

        ?>
    </span>
    <hr>
</body>

</html>