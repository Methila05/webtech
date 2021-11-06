<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="controller/createProduct.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name: </label><br>
  <input type="text" id="name" name="name"><br>
  <label for="bPrice">Buying Price: </label><br>
  <input type="text" id="bPrice" name="bPrice"><br>
  <label for="sPrice">Selling Price: </label><br>
  <input type="text" id="sPrice" name="sPrice"><br>
  <input type="checkbox" id="display" name="display" value="yes">
  <label for="display">Display</label><br><br>
  <input type="submit" name = "createProduct" value="Create">

</form> 

</body>
</html>

