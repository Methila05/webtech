<?php 

require_once '../model/model.php';

if (deleteProduct($_GET['name'])) {
    header('Location: ../showAllProduct.php');
}

 ?>