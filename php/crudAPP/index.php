<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crud App</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
	<?php
	//show all product in db
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$stmt = $conn->prepare("SELECT * FROM products");
		$stmt->execute(); 
		$data = $stmt->fetchAll();
		//var_dump($data);
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
	?>
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
		<?php 
		for($i = 0; $i < count($data); $i++){ ?>
			<tr>

				<th scope="row"><?php echo $data[$i][1] ?></th>
				<td><?php echo $data[$i][1] ?></td>
				<td><?php echo $data[$i][2] ?></td>
				<td><?php echo $data[$i][3] ?></td>
				<td><?php 
				if (1 <= $data[$i][4] && $data[$i][4] < 10) {
					echo 'sắp hết hàng';
				}else if(($data[$i][4]) == '0'){
					echo 'hết hàng';
				}else {
					echo 'còn hàng';
				}

				?></td>
				<td>
					<div class="">
						<button type="button" class="btn btn-outline-primary btn-sm">EDIT</button>
						<button type="button" class="btn btn-outline-primary btn-sm">DELETE</button>
						<button type="button" class="btn btn-outline-primary btn-sm">DETAIL</button>
					</div>
				</td>
			</tr><?php
			}
?>
		</tbody>
	</table>

	<hr>
	<button type="button" class="btn btn-outline-primary btn-sm btn-block" onclick="window.location.href='addProduct.php'">Create</button>
</body>
</html>