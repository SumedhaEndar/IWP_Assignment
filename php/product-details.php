<?php 
    include('session.inc.php');
?>

<?php 
    require_once('config.inc.php');

    function outputProductDetails()
    {
        try{
            if(isset($_GET['ProCode']))
            {
                $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $ProCode = $_GET['ProCode'];

                $sql = "SELECT * FROM product WHERE Product_Code='$ProCode'";
                $result = $pdo->query($sql);
                $row = $result->fetch();

                if($row)
                {
                    echo '<div class="main label-text">';
                        echo '<section class="sec1">';
                            echo '<img width="500px" src="../assests/Products/'.$row['Product_Category'].'/'.$row['Product_Type'].'/'.$row['Product_Code'].'.jpg"></img>';
                        echo '</section>';
                        echo '<section class="sec2">';
                            echo '<div class="link">';
                                echo 'Home / '.$row['Product_Category'].' / '.$row['Product_Type'].' / '.$row['Product_Code'];
                            echo '</div>';
                            echo '<div>';
                                echo '<h2>'.$row['Product_Name'].'</h2>';
                            echo '</div>';
                            echo '<div class="right">';
                                echo '<h2 class="price">RM'.$row['Product_Price'];
                                    addWishList($row);
                                echo '</h2>';
                                addToCart($row);
                            echo '</div>';
                        echo '</section>';
                    echo '</div>';
                }
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    function addWishList($productRow)
    {
        try{
            if(isset($_GET['ProCode']))
            {
                if($_SESSION['userType'] != 'Customer')
                {
                    echo '<a class="heart" href="product-details.php?Category='.$productRow['Product_Category'].'&Type='.$productRow['Product_Type'].'&ProCode='.$productRow['Product_Code'].'&Wish">';
                        echo '<i class="fa-solid fa-heart fa-2xl"></i>';
                    echo '</a>';

                    if(isset($_GET['Wish']))
                    {
                        echo '<script>alert("Please Login To Your Account !")</script>';
                    }
                }
                else
                {
                    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $ProCode = $_GET['ProCode'];
                    $userID = $_SESSION['userID'];

                    $sql = "SELECT * FROM wishlist WHERE Product_Code='$ProCode' AND Cus_ID='$userID'";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();

                    if($row)
                    {
                        echo '<a class="heart active" href="product-details.php?Category='.$productRow['Product_Category'].'&Type='.$productRow['Product_Type'].'&ProCode='.$productRow['Product_Code'].'">';
                            echo '<i class="fa-solid fa-heart fa-2xl"></i>';
                        echo '</a>';
                    }

                    else
                    {
                        echo '<a class="heart" href="product-details.php?Category='.$productRow['Product_Category'].'&Type='.$productRow['Product_Type'].'&ProCode='.$productRow['Product_Code'].'&Wish">';
                            echo '<i class="fa-solid fa-heart fa-2xl"></i>';
                        echo '</a>';         
                        
                        if(isset($_GET['Wish']))
                        {
                            $sql = "INSERT INTO wishlist (Product_Code, Cus_ID) VALUES ('$ProCode', '$userID')";
                            $pdo->query($sql);

                            echo '<script>alert("Added To Wishlist.")</script>';
                            echo '<script>window.location.href="product-details.php?Category='.$productRow['Product_Category'].'&Type='.$productRow['Product_Type'].'&ProCode='.$productRow['Product_Code'].'"</script>';
                        }
                    }

                    $pdo = null;
                }
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    function addToCart($productRow)
    {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo '<form method="POST">';
            echo '<div class="quan-add">';
                echo '<div class="add">';
                    echo '<input name="addCart" class="buttonLike-MyAccount footer-heading button" type="submit" value="Add To Cart"></input>';
                echo '</div>';
            echo '</div>';
        echo '</form>';

        try{
            if(isset($_POST['addCart']))
            {
                $ProCode = $_GET['ProCode'];
                $userID = $_SESSION['userID'];

                if($_SESSION['userType'] != 'Customer')
                {
                    echo '<script>alert("Please Login To Your Account !")</script>';
                }
                else
                {
                    $sql = "INSERT INTO cart (Product_Code, Cus_ID) VALUES('$ProCode', '$userID')";
                    $pdo->query($sql);

                    echo '<script>alert("Added To Cart.")</script>';
                    echo '<script>window.location.href="product-details.php?Category='.$productRow['Product_Category'].'&Type='.$productRow['Product_Type'].'&ProCode='.$productRow['Product_Code'].'"</script>';
                }
                $pdo = null;
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>IWP | Product Details</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/cc2ad1b11c.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&family=Raleway:wght@600&family=Roboto:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/text.css">
        <link rel="stylesheet" href="../css/color.css">
        <link rel="stylesheet" href="../css/others.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/buttonLikeAnchor.css">
        <link rel="stylesheet" href="../css/product-details.css">
        <link rel="stylesheet" href="../css/addCartAnime.css">
    </head>
    
    <body style="overflow-x: hidden;">
        <?php include('navbar.inc.php');?>
        
        <main>
            <?php outputProductDetails();?>
        </main>
        
        <?php include('footer.inc.php'); ?>
        
        <!-- <div class="addCartAnime">
            <button>
                <i class="fa-solid fa-x fa-xl dismissBtn"></i>
            </button>
            <h1 class="nav-text"></h1>
        </div>
        <script src="../js/add-to-cart-2.js"></script> -->
    </body>

</html>
