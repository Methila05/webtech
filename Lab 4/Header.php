<!DOCTYPE html>
<html>

<head>
    <!-- <style>
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
        }

        /* Create two equal columns that sits next to each other */
        .column {
            flex: 50%;
            padding: 10px;
            height: 10%;
            /* Should be removed. Only for demonstration */
        }
    </style> -->
</head>

<body>

    <hr>
    <div class="row">
        <div class="column">
            <img src="xcompany.png" alt="XCompany" height="10%">
        </div>
        <span style="display:inline-block; width:100%; height:10%; text-align:right">
            <div class="column">
                <br>

                <?php

                if (isset($_SESSION['userName'])) {
                    echo " Logged in as ";
                    echo '<a href="VIEW PROFILE.php">';
                    echo $_SESSION["userName"];
                    echo '</a> | ';
                    echo "<a href='logout.php'>Logout</a>";
                } else {
                    echo '<a href="PUBLIC HOME.php">Home</a> |
                        <a href="LOGIN.php">Login</a> |
                        <a href="REGISTRATION.php">Registration</a> ';
                }
                ?>
            </div>
        </span>
    </div>
    <hr>
</body>

</html>