<?php

require_once 'db_connect.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addPlaneManager($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into Plane_manager (pm_email, pm_password) VALUES (:email,  :password)";
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

function addPlane($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into Plane (p_name, p_location) VALUES (:PlaneName, :PlaneLocation)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':PlaneName'              =>         test_input($data['PlaneName']),
            ':PlaneLocation'          =>         test_input($data['PlaneLocation']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Plane added successfully</span>';
    }
}


function updatePlane($data){
    $conn = db_conn();
    $selectQuery = "UPDATE Plane set p_name = ?, p_location = ? where p_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['PlaneName']), test_input($data['PlaneLocation']), test_input($data['PlaneId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated successfully</span>';
}

function deletePlane($PlaneId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `Plane` WHERE `p_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$PlaneId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted successfully</span>';



}


//Ticket information upadte /delete / insert

function addPlaneTicket($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into tickets (location_to, location_from, date, time, price, transportType, bookedBy, p_id) VALUES (:PlaneTo, :PlaneFrom, :date , :time, :price, :pType, :bookedBy, :PlaneId)";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':PlaneTo'                 =>        test_input($data["PlaneTo"]),
            ':PlaneFrom'               =>        test_input($data["PlaneFrom"]),     
            ':date'                  =>        test_input($data["date"]),
            ':time'                  =>        test_input($data["time"]),
            ':price'                 =>        test_input($data["price"]),
            ':tType'                 =>        "Plane",
            ':bookedBy'              =>        "",
             ':PlaneId'                 =>        test_input($data["PlaneId"])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Ticket added successfully</span>';
    }
}


function deletePlanetickes( $ticketId)
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
function updatePlaneTicket($data, $ticketId)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set location_from = ?, location_to = ?, date= ?, time = ?, price = ?, p_id = ? where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['PlaneFrom']), test_input($data['PlaneTo']), test_input($data['date']), test_input($data['time']), test_input($data['price']),test_input($data['PlaneId']),  test_input($data['ticketId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated ticket successfully</span>';
}


