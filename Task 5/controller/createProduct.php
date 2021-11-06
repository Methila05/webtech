<?php  
require_once '../model/model.php';


if (isset($_POST['createProduct'])) {
	$data['name'] = $_POST['name'];
	$data['bPrice'] = $_POST['bPrice'];
	$data['sPrice'] = $_POST['sPrice'];
	if (isset($_POST['display'])){
		$data['display'] = $_POST['display'];
	}
	else{
		$data['display'] = 'no';
	}
	
  if (addProduct($data)) {
  	header('Location: ../showAllProduct.php');
  }
} else {
	echo 'Sorry you are not allowed to access this page';
}

?>