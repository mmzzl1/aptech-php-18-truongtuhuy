<?php
 session_start();
?>
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
		<button type="submit" class="btn btn-primary" name="addProduct">Submit</button>
		<button type="submit" class="btn btn-primary" name="backHome"><--Way Back Home </button>
	</form>
	<?php
		if (isset($_SESSION['products'])) {
			session_destroy();
			$messErr = "Thêm thành công sản phẩm"; ?>
		<div class="alert alert-success" role="alert">
 	 		<?php echo $messErr; ?>
		</div>
<?php

	}
	if(isset($_POST['addProduct'])){
		$_SESSION['products'] = 1;
		$name = $_POST['name'];
		$detail = $_POST['detail'];
		$price = $_POST['price'];
		$num = $_POST['num'];
// //add to db
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myDB";
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      	// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 		//sql command
			$sql = "INSERT INTO products (name, detail, price, num)
			VALUES ('$name', '$detail', '$price', '$num')";
			$conn->exec($sql);
			$location = "/aptech-php-18-truongtuhuy/php/crudAPP/addProduct.php";
			header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
			$conn = null;
			die();
		}
	}

	if(isset($_POST['backHome'])){
		echo 'da bam back';
		$location = "/aptech-php-18-truongtuhuy/php/crudAPP/";
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);
	}
	?>
</body>
</html>
