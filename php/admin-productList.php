<?php 
    include 'session.inc.php';

    require_once('config.inc.php');

    function outputProductList()
    {
        try {
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM product ORDER BY Product_Category DESC, Product_Type ASC";
            $result = $pdo->query($sql);

            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $stockAvailable = 'In Stock';
                if($row['Product_Stock'] < 0)
                {
                    $stockAvailable = 'No Stock';
                }
                echo '<tr>';
                    echo '<td class="big">'.$row['Product_Code'].'</td>';
                    echo '<td class="medium">'.$row['Product_Category'].'</td>';
                    echo '<td class="medium">'.$row['Product_Type'].'</td>';
                    echo '<td><img src="../assests/Products/'.$row['Product_Category']."/".$row['Product_Type']."/".$row['Product_Code'].'.jpg" width="70px"></td>';
                    echo '<td class="big">'.$row['Product_Name'].'</td>';
                    echo '<td class="medium">RM'.$row['Product_Price'].'</td>';
                    echo '<td class="small">'.$row['Product_Stock'].'</td>';
                    echo '<td class="medium">'.$stockAvailable.'</td>';
                echo '</tr>';
            }

            $pdo = null;
        }
        catch (PDOException $e)
        {
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
    <link rel="stylesheet" href="../css/admin-productList.css">
    <!----------------------------------------------------------------------------->
    <title>Admin | Product List</title>
</head>
<body>
    <?php include("navbar.inc.php");?>
    <main>
        <?php include("admin-leftNav.inc.php"); ?>
        <div class="productListContainer">
            <div class="productListTable">
                <table>
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th colspan="2">Title</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Available</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php outputProductList();?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php include("footer.inc.php"); ?>
</body>
</html>