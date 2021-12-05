<?php

require_once 'Model/Model.php';
require_once 'Model/db_connect.php';

session_start();
 $planeId =  $planeName = $planeLocation ='';
$msg =   $planeIdErr = $planeNameErr =    $planeLocationErr = '';
$valid = 1;

if (isset($_POST['search'])) {
    if (empty($_POST["planeId"])) {
        $planeIdErr = "*Please enter ticket ID";
        $valid = 0;
    }
    $planeId = $_POST["planeId"];

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `plane` where t_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$_POST['planeId']]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    $planeName = $row["t_name"];
    $planeLocation = $row["t_location"];
}

if (isset($_POST['submit'])) {
    if (empty($_POST["planeName"])) {
        $planeNameErr = "*Please enter plane name";
        $valid = 0;
    } else if (str_word_count($_POST["planeName"]) != 1) {
        $planeNameErr = "*plane name must be a single word";
        $valid = 0;
    } else if (!preg_match("/^[A-Za-z]*$/", $_POST["planeName"])) {
        $planeNameErr = "*For plane name only upper/lower case alphabets are allowed";
        $valid = 0;
    }

    if (empty($_POST["planeLocation"])) {
        $planeLocationErr = "*Please select a location";
        $valid = 0;
    }

   

    if ($valid) {
        $msg = updateplane($_POST);
    } else {
        $msg = '<span class="red">Update Failed</span>';
    }
}
