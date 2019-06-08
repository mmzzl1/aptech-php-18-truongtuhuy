<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crud App</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Detail</th>
				<th scope="col">Price</th>
				<th scope="col">Status</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>Giầy MC QUEEN</td>
				<td>Giày china chất lượng cao</td>
				<td>185.000đ</td>
				<td>Còn hàng</td>
				<td>
					<div class="">
						<button type="button" class="btn btn-outline-primary btn-sm">EDIT</button>
						<button type="button" class="btn btn-outline-primary btn-sm">DELETE</button>
						<button type="button" class="btn btn-outline-primary btn-sm">DETAIL</button>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<hr>
	<button type="button" class="btn btn-outline-primary btn-sm btn-block" onclick="window.location.href='addProduct.php'">Create</button>
	<?php
	function connectDB()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		try {
			$conn = new PDO("mysql:host=$servername", $username, $password);
// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected successfully";    	
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
	}
		?>

	</body>
	</html>