<?php 
    include 'session.inc.php';
?>

<?php 
    require_once('config.inc.php');

    function outputHistory()
    {
        $CusID = $_SESSION['userID'];

        try {
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM ordertable WHERE Cus_ID='$CusID' AND isShipped=1 LIMIT 10";
            $result = $pdo->query($sql);

            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                echo '<div class="dashboard-item-container">';
                        outputProductInfo($row['Product_Code']);
                    echo '<div class="dashboard-item-qty">';
                        echo '<p class="dashboard-text-1">Qty: 1</p>';
                    echo '</div>';
                    echo '<div class="dashboard-item-info">';
                        echo '<p class="dashboard-text-1 status2">Delivered</p>';
                    echo '</div>';
                echo '</div>';
            }
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }

    function outputProductInfo($productCode)
    {
        try{
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM product WHERE Product_Code='$productCode'";
            $result = $pdo->query($sql);

            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                echo '<div class="dashboard-item-img">';
                    echo '<img src="../assests/Products/'.$row['Product_Category'].'/'.$row['Product_Type'].'/'.$row['Product_Code'].'.jpg" alt="">';
                echo '</div>';
                echo '<div class="dashboard-item-details">'; 
                    echo '<h3 class="dashboard-text-1">'.$row['Product_Name'].'</h3>';
                echo '</div>';
                echo '<div class="dashboard-item-price">';
                    echo '<p class="dashboard-text-1">RM'.$row['Product_Price'].'</p>';
                echo '</div>';
            }
        }
        catch(PDOException $e)
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
    <link rel="stylesheet" href="../css/dashboard-SuM.css">
    <!----------------------------------------------------------------------------->
    <title>IWP | My Orders</title>
</head>
<body>
    <?php include("navbar.inc.php"); ?>

    <?php include("dashboard-tabs.inc.php"); ?>
    
    <main class="dashboard-section">
        <section class="dashboard-container">
            <?php outputHistory();?>
        </section>
    </main>

    <?php include("footer.inc.php");?>
</body>
</html>