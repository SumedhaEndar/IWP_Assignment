<?php 
    include 'session.inc.php';
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
    <link rel="stylesheet" href="../css/admin-addProduct.css">
    <!----------------------------------------------------------------------------->
    <title>Admin | Add Product</title>
</head>
<body>
    <?php include("navbar.inc.php"); ?>
    
    <main>
        <?php include("admin-leftNav.inc.php"); ?>
        <div class="addProductContainer">
            <div class="addProduct">
                <h3>Add Product</h3>
                <form method="post">
                    <div>
                        <label for="ProductCode">Code:</label>
                        <input type="text" name="ProductCode" id="ProductCode">
                    </div>
                    <div>
                        <label for="ProductName">Name:</label>
                        <input type="text" name="ProductName" id="ProductName">
                    </div>
                    <div>
                        <label for="ProductCategory">Category:</label>
                        <select name="ProductCategory" id="ProductCategory">
                            <option value="Women">Women</option>
                            <option value="Men">Men</option>
                            <option value="Girls">Girls</option>
                            <option value="Boys">Boys</option>
                        </select>
                    </div>
                    <div>
                        <label for="ProductType">Type:</label>
                        <select name="ProductType" id="ProductType">
                            <option value="Blouses">Blouses</option>
                            <option value="Dresses">Dresses</option>
                            <option value="Pants">Pants</option>
                            <option value="Polo Tees">Polo Tees</option>
                            <option value="Skirts">Skirts</option>
                            <option value="Sweaters">Sweaters</option>
                            <option value="Tees">Tees</option>
                        </select>
                    </div>
                    <div>
                        <label for="ProductPrice">Price:</label>
                        <input type="text" name="ProductPrice" id="ProductPrice">
                    </div>
                    <div>
                        <label for="ProductStock">Stock:</label>
                        <input type="text" name="ProductStock" id="ProductStock">
                    </div>
                    <input type="submit" value="Add Product" name="addProductBtn">
                </form>
            </div>
        </div>
    </main>

    <?php include("footer.inc.php"); ?>
</body>
</html>

<?php 
    include('dataconnection.inc.php');

    if(isset($_POST['addProductBtn']))
    {
        $ProductCode = $_POST["ProductCode"];
        $ProductName = $_POST["ProductName"];
        $ProductCategory = $_POST["ProductCategory"];
        $ProductType = $_POST["ProductType"];
        $ProductPrice = $_POST["ProductPrice"];
        $ProductStock = $_POST["ProductStock"];

        $sql = "SELECT * FROM product WHERE Product_Code='$ProductCode'";
        $result = $pdo->query($sql);
        $row = $result->fetch();

        if($row)
        {
?>
            <script>alert("The Product Code is already in use. Please Change.")</script>
<?php
        }
        else
        {
            $sql = "INSERT INTO product(Product_Code, Product_Name, Product_Category, Product_Type,
            Product_Price, Product_Stock) VALUES ('$ProductCode', '$ProductName', '$ProductCategory',
            '$ProductType', '$ProductPrice', '$ProductStock')";

            $pdo->query($sql);
?>
            <script>alert("Add Successful")</script>
<?php
        }

        $pdo = null;
    }
?>