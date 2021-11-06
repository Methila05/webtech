<?php  
require_once '../model/model.php';


if (isset($_POST['updateProduct'])) {
	$data['name'] = $_POST['name'];
	$data['bPrice'] = $_POST['bPrice'];
	$data['sPrice'] = $_POST['sPrice'];
	if (isset($_POST['display'])){
		$data['display'] = $_POST['display'];
	}
	else{
		$data['display'] = 'no';
	}


  if (updateProduct($_POST['name'], $data)) {
  	echo 'Successfully updated!!';
  	//redirect to showStudent
  	header('Location: ../showAllProduct.php?id=' . $_POST["name"]);
  }
} else {
	echo 'Sorry you are not allowed to access this page';
}


?>