<?php 
    include('session.inc.php');
?>

<?php
    require_once('config.inc.php');

    $dropdownData = [
        "Women" => ["Women","Blouses","Pants","Skirts","Sweaters","Tees"],
        "Men" => ["Men","Pants","Polo Tees","Sweaters","Tees"],
        "Girls" => ["Girls","Dresses", "Pants", "Tees"],
        "Boys" => ["Boys","Pants", "Tees"]
    ];

    function dropDown($dropdownData)
    {
        $whichCategory = isset($_GET['Category']) ? $_GET['Category'] : "Women";
        $thisDropdownData = $dropdownData[$whichCategory];

        foreach($thisDropdownData as $thisData)
        {
            $type = $thisData == $whichCategory ? "All" : $thisData;

            echo '<a href="product-list.php?Category='.$whichCategory.'&Type='.$type.'">'.$thisData.'</a>';
        }
    }

    function outputCatalog()
    {
        try{
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $productCategory = "Women";
            $productType = "All";

            if(isset($_GET['Category']))
            {
                $productCategory = $_GET['Category'];

                if($_GET['Type'] == 'All')
                {
                    $sql = "SELECT * FROM product WHERE Product_Category='$productCategory' 
                    ORDER BY Product_Category DESC, Product_Type ASC";
                }
                else
                {
                    $productType = $_GET['Type'];
                    $sql = "SELECT * FROM product WHERE Product_Category='$productCategory' 
                    AND Product_Type='$productType' ORDER BY Product_Category DESC, Product_Type ASC";
                }

                $result = $pdo->query($sql);
                while($row=$result->fetch(PDO::FETCH_ASSOC))
                {
                    echo '<div class="card">';
                        echo '<a href="product-details.php?Category='.$row['Product_Category'].'&Type='.$row['Product_Type'].'&ProCode='.$row['Product_Code'].'">';
                            echo '<img src="../assests/Products/'.$row['Product_Category'].'/'.$row['Product_Type'].'/'.$row['Product_Code'].'.jpg" alt="">';
                            echo '<div class="card-details">';
                                echo '<p class="detail-name">'.$row['Product_Name'].'</p>';
                                echo '<p class="detail-price">RM'.$row['Product_Price'].'</p>';
                            echo '</div>';
                        echo '</a>';
                    echo '</div>';
                }
            }
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
    <script src="https://kit.fontawesome.com/cc2ad1b11c.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&family=Raleway:wght@600&family=Roboto:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/text.css">
    <link rel="stylesheet" href="../css/color.css">
    <link rel="stylesheet" href="../css/others.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/buttonLikeAnchor.css">
    <link rel="stylesheet" href="../css/productList.css">
    <title>IWP | Product List</title>
</head>

<body>
    <?php 
        include("navbar.inc.php");
    ?>

    <main>
        <!-- Create a drop down menu-->
        <div class="dropdown-container">
            <div class="dropdown">
                <?php dropDown($dropdownData)?>
            </div>
        </div>

        <!-- Menu -->
        <section class="card-container">
            <h1 class="mainpage-heading"><?php echo $_GET["Category"];?></h1>
            <div class="cards">
                <?php outputCatalog();?>
            </div>
        </section>
    </main>

    <?php include('footer.inc.php'); ?>
</body>

</html>