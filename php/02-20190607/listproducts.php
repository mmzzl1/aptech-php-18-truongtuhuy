<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php 
	$products = [
		["iphone", 999],
		["ipad", 1000],
		["xiaomi", 100],
		["fpt", 40]	
	]
 ?>
 <table class="table">
 	<tr>
 		<th>id</th>
 		<th>name</th>
 		<th>price</th>
 	</tr>
 	<?php
 		$total = 0;
 		for ($i = 0; $i < count($products) ; $i++) {
 			//tang thue 
 			$lastPrice = addTax($products,$i, 500);
 			echo "<tr>
				<td>".( $i + 1 )."</td>
				<td>".$products[$i][0]."</td>
				<td>$".$lastPrice."</td>
 			</tr>";
 			$total += $lastPrice;
 		}
 		echo 
 			"<td>Total</td>
 			<td></td>
			<td>".$total."</td>";
 //function tang thue 10% cac san phan > 500$ và 5% với các sản phẩm dưới 500
			//value là số mốc muốn tăng giảm
function addTax($products, $i, $value){
		if ($products[$i][1] > $value) {
			return $products[$i][1] + $products[$i][1] *10/100;
		}else {
			return $products[$i][1] +$products[$i][1] *5/100;
		}
}
		 	 ?>
 </table>
</body>
</html>
