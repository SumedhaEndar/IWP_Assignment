<?php
include 'session.inc.php';

require_once('config.inc.php');

function outputOrderList()
{
	try {
		$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = ('SELECT * FROM ordertable WHERE isShipped = 0 ORDER BY Order_ID DESC');
		$result = $pdo->query($sql);

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
        {
            $status = $row['isShipped']==0 ? "Shipping" : " ";
			echo '<tr>';
                echo '<td class="medium">' . $row['Order_ID'] . '</td>';
                echo '<td class="big">' . $row['Cus_ID'] . '</td>';
                echo '<td class="big">' . $row['Product_Code'] . '</td>';
                echo '<td class="medium">Qty: 1</td>';
                echo '<td class="big">' . $status . '</td>';
                echo '<td class="small"><a href="?del&OrderId='.$row["Order_ID"].'">Ship</a></td>';
			echo '</tr>';
		}

		$pdo = null;
	} 
    catch (PDOException $e) {
		die($e->getMessage());
	}
}

function updateOrderStatus()
{
    try{
        if(isset($_GET['del']))
        {
            $orderID = $_GET['OrderId'];

            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $pdo->query("UPDATE ordertable SET isShipped = 1 WHERE Order_ID = $orderID");
        
            echo '<script>window.location.href="admin-orderList.php"</script>';
        }
    }
    catch (PDOException $e) {
		die($e->getMessage());
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- This Part need to always exist when needed the navbar and the footer -->
	<script src="https://kit.fontawesome.com/cc2ad1b11c.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&family=Raleway:wght@600&family=Roboto:wght@700&display=swap" rel="stylesheet">
	<!-- Alert!!! The href to the css may need to change a bit -->
	<link rel="stylesheet" href="../css/text.css">
	<link rel="stylesheet" href="../css/color.css">
	<link rel="stylesheet" href="../css/others.css">
	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="../css/footer.css">
	<link rel="stylesheet" href="../css/buttonLikeAnchor.css">
	<link rel="stylesheet" href="../css/dashboard-tabs.css">
	<link rel="stylesheet" href="../css/admin-leftNav.css">
	<link rel="stylesheet" href="../css/admin-orderList.css">
	<!----------------------------------------------------------------------------->
	<title>Admin | Product List</title>
</head>

<body>
	<?php include("navbar.inc.php"); ?>
	<main>
		<?php include("admin-leftNav.inc.php"); ?>
		<div class="orderListContainer">
			<div class="orderListTable">
				<table>
					<thead>
						<tr>
							<th>Order ID</th>
							<th>Customer ID</th>
							<th>Product ID</th>
							<th>Qty</th>
							<th>Status</th>
							<th>Shipped</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                            outputOrderList();
                            updateOrderStatus();
                         ?>
					</tbody>
				</table>
				<!-- <form method="get">
					<input name="shipped" type="submit" value="Update Orders">
				</form> -->
			</div>
		</div>
	</main>
	<?php include("footer.inc.php"); ?>
</body>

<?php 
// if(isset($_GET['del'])) {
	// $orderId = $_GET['OrderId'];
	// $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// $pdo->query("UPDATE ordertable SET isShipped = 1 WHERE Order_ID = $orderId");

	// header("Location: admin-orderList.php");
// }
?>