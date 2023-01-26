<?php 
    include 'dataconnection.inc.php'; 
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
    <link rel="stylesheet" href="../css/dashboard-SuM.css">
    <!----------------------------------------------------------------------------->
    <title>IWP | My Orders</title>
</head>
<body>
    <?php include("navbar.inc.php"); ?>

    <h1 class="heading" style="text-align: center; margin: 0; padding: 0.75rem 0;">Hello, Sumedha</h1>
    <section class="tabs-button-section">
        <div class="tabs-button-container">
            <div class="tabs-button-layout">
                <button class="tabs-text tabs-button current-tabs">My Orders</button>
                <button class="tabs-text tabs-button">My Cart</button>
                <button class="tabs-text tabs-button">My Wishlist</button>
                <button class="tabs-text tabs-button">My History</button>
                <button class="tabs-text tabs-button">My Profile</button>
            </div>
        </div>
    </section>
    <main class="dashboard-section">
        <section class="dashboard-container">
            <div class="dashboard-item-container">
                <div class="dashboard-item-img">
                    <img  src="../assests/women/WB0001.png">
                </div>
                <div class="dashboard-item-details"> 
                    <h3 class="dashboard-text-1">OLD SKOOL MEN’S GRAPHIC TEE (MANGLISH SERIES) – YLW</h3>
                    <div>
                        <p class="dashboard-text-2">Color: Yellow</p>
                        <p class="dashboard-text-2">Size:  M</p>
                    </div>
                </div>
                <div class="dashboard-item-price">
                    <p class="dashboard-text-1">RM 23.00</p>
                </div>
                <div class="dashboard-item-qty">
                    <p class="dashboard-text-1">Qty: 1</p>
                </div>
                <div class="dashboard-item-info">
                    <p class="dashboard-text-1 status1">Delivering</p>
                    <p class="dashboard-text-2 date">Purchased On:<br> 17/11/2022</p>
                </div>
            </div>
            <div class="dashboard-item-container">
                <div class="dashboard-item-img">
                    <img  src="../assests/women/WB0001.png">
                </div>
                <div class="dashboard-item-details"> 
                    <h3 class="dashboard-text-1">OLD SKOOL MEN’S GRAPHIC TEE (MANGLISH SERIES) – YLW</h3>
                    <div>
                        <p class="dashboard-text-2">Color: Yellow</p>
                        <p class="dashboard-text-2">Size:  M</p>
                    </div>
                </div>
                <div class="dashboard-item-price">
                    <p class="dashboard-text-1">RM 23.00</p>
                </div>
                <div class="dashboard-item-qty">
                    <p class="dashboard-text-1">Qty: 1</p>
                </div>
                <div class="dashboard-item-info">
                    <p class="dashboard-text-1 status1">Delivering</p>
                    <p class="dashboard-text-2 date">Purchased On:<br> 17/11/2022</p>
                </div>
            </div>
            <div class="dashboard-item-container">
                <div class="dashboard-item-img">
                    <img  src="../assests/women/WB0001.png">
                </div>
                <div class="dashboard-item-details"> 
                    <h3 class="dashboard-text-1">OLD SKOOL MEN’S GRAPHIC TEE (MANGLISH SERIES) – YLW</h3>
                    <div>
                        <p class="dashboard-text-2">Color: Yellow</p>
                        <p class="dashboard-text-2">Size:  M</p>
                    </div>
                </div>
                <div class="dashboard-item-price">
                    <p class="dashboard-text-1">RM 23.00</p>
                </div>
                <div class="dashboard-item-qty">
                    <p class="dashboard-text-1">Qty: 1</p>
                </div>
                <div class="dashboard-item-info">
                    <p class="dashboard-text-1 status1">Delivering</p>
                    <p class="dashboard-text-2 date">Purchased On:<br> 17/11/2022</p>
                </div>
            </div>
        </section>
    </main>

    <?php include("footer.inc.php");?>
</body>
</html>