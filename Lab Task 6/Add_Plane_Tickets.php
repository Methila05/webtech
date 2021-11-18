<!DOCTYPE html>
<html>

<head>
    <title>Add Plane Ticket</title>
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
    <?php require_once 'Controller/addPlaneTicketsController.php'; ?>

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

        <fieldset>
            <legend><b>ADD TICKETS FOR PLANE</b></legend><br>
            <label>Plane ID: </label>
            <input type="text" name="planeId"><span class="red">
                <?php
                if ($planeIdErr) {
                    echo $planeIdErr;
                }
                ?></span>
            <hr>

            <label>Plane Name: </label>
            <input type="text" name="planeName"><span class="red">
                <?php
                if ($planeNameErr) {
                    echo $planeNameErr;
                }
                ?></span>
            <hr>

            <label>Plane Location: </label>
            <select name="planeLocation">
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
                if ($planeLocationErr) {
                    echo $planeLocationErr;
                }
                ?></span>
            <hr>

            <label>Ticket ID: </label>
            <input type="text" name="ticketId"><span class="red">
                <?php
                if ($ticketIdErr) {
                    echo $ticketIdErr;
                }
                ?></span>
            <hr>

            <label>From: </label>
            <select name="planeFrom">
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
                if ($fromErr) {
                    echo $fromErr;
                }
                ?></span>
            <hr>

            <label>To: </label>
            <select name="planeTo">
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
                if ($toErr) {
                    echo $toErr;
                }
                ?></span>
            <hr>

            <label>Price: </label>
            <input type="text" name="price" /><br />
            <hr>

            <fieldset>
                <legend>
                    <label>Date: </label>
                </legend>
                <input type="Date" name="date" /> (mm/dd/yyyy)<br />
            </fieldset>

            <fieldset>
                <legend>
                    <label>Time: </label>
                </legend>
                <input type="time" name="time" /> (mm:ss am/pm)<br />
            </fieldset>
            <hr>

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