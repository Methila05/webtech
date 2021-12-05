<?php

require_once 'db_connect.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addplaneManager($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into plane_manager (tm_email, tm_password) VALUES (:email,  :password)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([

            ':email'            =>      test_input($data['email']),
            ':password'         =>      test_input($data['password']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Registered successfully</span>';
    }
}

function addplane($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into plane (t_name, t_location) VALUES (:planeName, :planeLocation)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':planeName'              =>         test_input($data['planeName']),
            ':planeLocation'          =>         test_input($data['planeLocation']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">plane added successfully</span>';
    }
}


function updateplane($data){
    $conn = db_conn();
    $selectQuery = "UPDATE plane set t_name = ?, t_location = ? where t_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['planeName']), test_input($data['planeLocation']), test_input($data['planeId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated successfully</span>';
}

function deleteplane($planeId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `plane` WHERE `t_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$planeId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted successfully</span>';



}


//Ticket information upadte /delete / insert

function addplaneTicket($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into tickets (location_to, location_from, date, time, price, transportType, bookedBy, t_id) VALUES (:planeTo, :planeFrom, :date , :time, :price, :tType, :bookedBy, :planeId)";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':planeTo'                 =>        test_input($data["planeTo"]),
            ':planeFrom'               =>        test_input($data["planeFrom"]),     
            ':date'                  =>        test_input($data["date"]),
            ':time'                  =>        test_input($data["time"]),
            ':price'                 =>        test_input($data["price"]),
            ':tType'                 =>        "plane",
            ':bookedBy'              =>        "",
             ':planeId'                 =>        test_input($data["planeId"])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Ticket added successfully</span>';
    }
}


function deleteplanetickes( $ticketId)
{
     $conn = db_conn();
    $selectQuery = "DELETE FROM `tickets` WHERE `ticket_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$ticketId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted  Ticket successfully</span>';



}
function updateplaneTicket($data, $ticketId)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set location_from = ?, location_to = ?, date= ?, time = ?, price = ?, t_id = ? where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['planeFrom']), test_input($data['planeTo']), test_input($data['date']), test_input($data['time']), test_input($data['price']),test_input($data['planeId']),  test_input($data['ticketId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated ticket successfully</span>';
}


