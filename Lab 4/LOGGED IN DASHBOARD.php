<html>

<head>
    <style>
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
        }

        .column {
            flex: 50%;
            padding: 10px;
            height: 50%;
        }
    </style>
</head>

<body>

    <?php
    session_start();

    include 'header.php'; ?>

    <span style="display:inline-block; width:100%;text-align:left; height: 40%;">


        <?php

        if (isset($_SESSION['userName'])) {
            echo '<div class="row">';
            echo '<span style = "display:inline-block; width:36%; height:100%; text-align:left">';
            echo '<div class="column" >';
            include 'Account.php';
            echo '</div>';
            echo '</span>';
            echo '<div class="column" >';
            echo "<h2> Welcome " . $_SESSION['name'] . "</h2>";
            echo '</div>';
            echo '</div>';
        } else {
            $msg = "Error";
            header("location:LOGIN.php");
        }

        ?>
    </span>
    <?php include 'footer.php'; ?>

</body>

</html>