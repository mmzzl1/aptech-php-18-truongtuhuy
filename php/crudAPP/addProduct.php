<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<form action="addProduct.php" class="form-control" method="POST">
		<div class="form-group">
			<label for="email">Name</label>
			<input type="text" class="form-control" name="name">
		</div>
		<div class="form-group">
			<label for="pwd">Detail</label>
			<input type="text" class="form-control" name="detail">
		</div>
		<div class="form-group">
			<label for="pwd">Price</label>
			<input type="text" class="form-control" name="price">
		</div>
		<div class="form-group">
			<label for="pwd">Num</label>
			<input type="text" class="form-control" name="num">
		</div>
		<button type="submit" class="btn btn-primary" onclick="addProduct()">Submit</button>
	</form>
	<?php
function addProduct()
{
	$name = $_POST['name'];
	$detail = $_POST['detail'];
	$price = $_POST['price'];
	$num = $_POST['num'];

//add to db
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";
//check connection
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//sql command
		$sql = "INSERT INTO products (name, detail, price, num)
		VALUES ($name, $detail, $price, $num)";

		$conn->exec($sql);
		echo "đã add thành công sản phẩm";
	}
catch(PDOException $e)
{
	echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
}

?>
</body>
</html>
