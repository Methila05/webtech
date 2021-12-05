<!DOCTYPE html>
<html>

<head>
    <title>Add Plane </title>
    <style type="text/css">
        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <?php require_once 'Controller/addPlaneController.php'; ?>

    <?php include 'Header.php'; ?>

    <?php
    if (!isset($_SESSION['email'])) {
        header("location:Login.php");
    }
    ?>

    <form method="post">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>

        Go back to : <a href="Plane_Manager_Home.php">Home</a><br><br>

      
            <legend><b>ADD  PLANE</b></legend><br>

            <label>Plane Name: </label>
            <input type="text" name="planeName"><span class="red">
                <?php
                if (isset($planeNameErr)) {
                    echo $planeNameErr;
                }
                ?></span>
            
<br><br>
            <label>Plane Location: </label>
            <select name="PlaneLocation">
                <option value="" disabled selected>Select a location</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Barishal">Barishal</option>
                <option value="Cumilla">Cumilla</option>
                <option value="Sylet">Sylet</option>
                <option value="Bagura">Bagura</option>
                <option value="khulna">khulna</option>
                <option value="Chittagong">Chittagong</option>
            </select><span class="red">
                <?php
                if ($PlaneLocationErr) {
                    echo $PlaneLocationErr;
                }
                ?></span>
                <br><br>
        <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            <input type="reset" name="reset" value="Reset" class="btn btn-info" /><br />
        </fieldset>

        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <?php include 'Footer.php'; ?>
    </form>
    </div>
    <br />

</body>

</html>