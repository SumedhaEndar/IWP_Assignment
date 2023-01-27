<?php 
    require_once('config.inc.php');

    function showUserName()
    {
        $CusID = $_SESSION['userID'];

        try {
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM customer WHERE Cus_ID = $CusID";
            $result = $pdo->query($sql);
            $row = $result->fetch();

            if($row)
            {
                echo '<h1 class="heading" style="text-align: center; margin: 0; padding: 0.75rem 0;">Hello, '.$row['Cus_Name'].'</h1>';
            }
            $pdo = null;
        }
        catch (PDOException $e) 
        {
            die( $e->getMessage() );
        }
    }
?>

<?php showUserName();?>
<section class="tabs-button-section">
    <div class="tabs-button-container">
        <div class="tabs-button-layout">
            <button class="tabs-text tabs-button" onclick="location.href='dashboard-myOrders.php';">My Orders</button>
            <button class="tabs-text tabs-button" onclick="location.href='dashboard-myCart.php';">My Cart</button>
            <button class="tabs-text tabs-button" onclick="location.href='dashboard-myWishlist.php';">My Wishlist</button>
            <button class="tabs-text tabs-button" onclick="location.href='dashboard-myHistory.php';">My History</button>
            <button class="tabs-text tabs-button" onclick="location.href='dashboard-myProfile.php';">My Profile</button>
        </div>
    </div>
</section>