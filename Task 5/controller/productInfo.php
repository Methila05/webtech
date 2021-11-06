<?php 

require_once ('model/model.php');

function fetchAllProduct(){
	return showAllProduct();

}
function fetchProduct($name){
	return showProduct($name);

}
function fetchSearchedProduct($name){
	return searchProduct($name);
}
?>