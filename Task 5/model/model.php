<?php 

require_once 'db_connect.php';

function showAllProduct(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `products` WHERE display = "yes"';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showProduct($Name){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `products` where name = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$Name]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function searchProduct($name)

{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `products` WHERE name LIKE '%$name%'";
    try {
    $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
    echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addProduct($data){
	$conn = db_conn();
    $selectQuery = "INSERT into products (name, bPrice, sPrice, display)
VALUES (:name, :bPrice, :sPrice, :display)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':bPrice' => $data['bPrice'],
        	':sPrice' => $data['sPrice'],
            ':display' => $data['display'],
        	
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateProduct($Name, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE products set name = ?, bPrice = ?, sPrice = ?, display = ? where name = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['bPrice'], $data['sPrice'], $data['display'], $Name
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    } 
    $conn = null;
    return true;
}

function deleteProduct($Name){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `products` WHERE `name` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$Name]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}