<?php

require_once 'Model/Model.php';

session_start();

$msg = $planeIdErr = $planeNameErr = $planeLocationErr='';
$valid = 1;

if (isset($_POST["submit"])) {
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
        $msg = addplane($_POST);
    } else {
        $msg = '<span class="red">Adding plane </span>';
    }
}
