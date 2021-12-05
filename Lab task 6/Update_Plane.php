<!DOCTYPE html>
<html>

<head>
    <title>Update Plane information</title>
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
    <?php require_once 'Controller/updatePlaneController.php'; ?>

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

       
            <legend><b>UPDATE FOR Plane</b></legend><br>
             <label>Plane ID : </label>
            <input type="text" name="PlaneId" value="<?php echo $PlaneId ?>"><span class="red">
                <?php
                if ($PlaneIdErr) {
                    echo $PlaneIdErr;
                }
                ?></span>
            <input type="submit" name="search" value="Search" class="btn btn-info" />
            <hr>
        <label>Plane Name: </label>
            <input type="text" name="PlaneName" value="<?php echo $PlaneName ?>"><span class="red">
                <?php
                if ($PlaneNameErr) {
                    echo $PlaneNameErr;
                }
                ?></span>
      <br>

 
<label>Plane Location: </label>
<select name="PlaneLocation">
<option value="<?php echo $PlaneLocation ?>"><?php echo $PlaneLocation ?></option>
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
<hr>
    <br>

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