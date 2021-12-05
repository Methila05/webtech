<?php

require_once 'Model/Model.php';

session_start();

$msg = $planeIdErr  = $ticketIdErr  = $fromErr = $toErr = '';
$valid = 1;

if (isset($_POST["submit"])) {
    

    if (empty($_POST["planeFrom"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["planeTo"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        $msg = addplaneTicket($_POST);
    } else {
        $msg = '<span class="red">Adding plane ticket failed</span>';
    }
}
