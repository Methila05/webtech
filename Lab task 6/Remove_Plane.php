<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delte Plane infromation</title>
    <style type="text/css">
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
    <title></title>
</head>

<body>
    <?php require_once 'Controller/deletePlanecontroller.php'; ?>

    <?php include 'Header.php'; ?>

    <?php
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <form method="post">

        Go back to : <a href="Plane_Manager_Home.php">Home</a><br><br>

        <fieldset>
            <legend><b>DELETE_INFO</b></legend><br>
            <label>Plane Id: </label>
            <input type="text" name="PlaneId"><span class="red">
                <?php
                if ($PlaneIdErr) {
                    echo $PlaneIdErr;
                }
                ?></span>
            <hr>


            <input type="submit" name="submit" value="DELETE">

            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?><br>
        </fieldset>


        <?php include 'Footer.php'; ?>

    </form>

</body>

</html>