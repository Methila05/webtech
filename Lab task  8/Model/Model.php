<?php

require_once 'db_connect.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addTrainManager($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into train_manager (tm_email, tm_password) VALUES (:email,  :password)";
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

function addTrain($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into train (t_name, t_location) VALUES (:trainName, :trainLocation)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':trainName'              =>         test_input($data['trainName']),
            ':trainLocation'          =>         test_input($data['trainLocation']),
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Train added successfully</span>';
    }
}


function updateTrain($data){
    $conn = db_conn();
    $selectQuery = "UPDATE train set t_name = ?, t_location = ? where t_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['trainName']), test_input($data['trainLocation']), test_input($data['trainId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated successfully</span>';
}

function deletetrain($trainId)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `train` WHERE `t_id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$trainId]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return '<span class="green">Deleted successfully</span>';



}


//Ticket information upadte /delete / insert

function addTrainTicket($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into tickets (location_to, location_from, date, time, price, transportType, bookedBy, t_id) VALUES (:trainTo, :trainFrom, :date , :time, :price, :tType, :bookedBy, :trainId)";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':trainTo'                 =>        test_input($data["trainTo"]),
            ':trainFrom'               =>        test_input($data["trainFrom"]),     
            ':date'                  =>        test_input($data["date"]),
            ':time'                  =>        test_input($data["time"]),
            ':price'                 =>        test_input($data["price"]),
            ':tType'                 =>        "Train",
            ':bookedBy'              =>        "",
             ':trainId'                 =>        test_input($data["trainId"])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();

        $conn = null;
        return '<span class="green">Ticket added successfully</span>';
    }
}


function deletetraintickes( $ticketId)
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
function updateTrainTicket($data, $ticketId)
{
    $conn = db_conn();
    $selectQuery = "UPDATE tickets set location_from = ?, location_to = ?, date= ?, time = ?, price = ?, t_id = ? where ticket_id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            test_input($data['trainFrom']), test_input($data['trainTo']), test_input($data['date']), test_input($data['time']), test_input($data['price']),test_input($data['trainId']),  test_input($data['ticketId'])
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return '<span class="green">Updated ticket successfully</span>';
}


