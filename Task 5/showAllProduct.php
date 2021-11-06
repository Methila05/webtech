<?php  
require_once 'controller/productInfo.php';

$products = fetchAllProduct();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Buying_Price</th>
			<th>Selling_Price</th>
			
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $i => $product): ?>
			<tr>
				<td><?php echo $product['name'] ?></td>
				<td><?php echo $product['bPrice'] ?></td>
				<td><?php echo $product['sPrice'] ?></td>
				<td><a href="editProduct.php?name=<?php echo $product['name'] ?>">Edit</a>&nbsp<a href="controller/deleteProduct.php?name=<?php echo $product['name'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>