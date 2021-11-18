<?php
session_start();
$msg = $planeIdErr = $planeNameErr = $ticketIdErr = $planeLocationErr = $fromErr = $toErr = '';
$valid = 1;
if (isset($_POST["submit"])) {

    if (empty($_POST["planeId"])) {
        $planeIdErr = "*Please enter plane ID";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{5}$/', $_POST["planeId"])) {
        $planeIdErr = "Plane ID must be five (5) digits";
        $valid = 0;
    }

    if (empty($_POST["planeName"])) {
        $planeNameErr = "*Please enter plane name";
        $valid = 0;
    } else if (str_word_count($_POST["planeName"]) != 1) {
        $planeNameErr = "*Plane name must be a single word";
        $valid = 0;
    } else if (!preg_match("/^[A-Za-z]*$/", $_POST["planeName"])) {
        $planeNameErr = "*For plane name only upper/lower case alphabets are allowed";
        $valid = 0;
    }

    if (empty($_POST["planeLocation"])) {
        $planeLocationErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["ticketId"])) {
        $ticketIdErr = "*Please enter ticket ID";
        $valid = 0;
    } else if (!preg_match('/^[0-9]{8}$/', $_POST["ticketId"])) {
        $ticketIdErr = "*Ticket ID must be eight (8) digits";
        $valid = 0;
    }

    if (empty($_POST["planeFrom"])) {
        $fromErr = "*Please select a location";
        $valid = 0;
    }

    if (empty($_POST["planeTo"])) {
        $toErr = "*Please select a location";
        $valid = 0;
    }

    if ($valid) {
        if (file_exists('Plane_Ticket_Data.json')) {
            $current_data = file_get_contents('Plane_Ticket_Data.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                'B_ID'                  =>        test_input($_POST["planeId"]),
                'B_Name'                =>        test_input($_POST["planeName"]),
                'B_Location'            =>        test_input($_POST["planeLocation"]),
                'Ticket_ID'             =>        test_input($_POST["ticketId"]),
                'From'                  =>        test_input($_POST["planeFrom"]),
                'To'                    =>        test_input($_POST["planeTo"]),
                'Price'                 =>        test_input($_POST["price"]),
                'Date'                  =>        test_input($_POST["date"]),
                'Time'                  =>        test_input($_POST["time"]),
                'Booked_By'             =>        "",
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if (file_put_contents('Plane_Ticket_Data.json', $final_data)) {
                $msg = '<span class="green">Plane ticket added successfully</span>';
            } else {
                $msg = '<span class="red">Adding plane ticket failed</span>';
            }
        } else {
            $msg = '<span class="red">JSON file does not exit</span>';
        }
    } else {
        $msg = '<span class="red">Adding plane ticket failed</span>';
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
