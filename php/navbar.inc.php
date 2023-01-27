<?php include 'navbar-footer.inc.php';?>

<?php
    require_once('config.inc.php');

    function headerToWhichCategory()
    {
        $whichCategory = [
            "Women",
            "Men",
            "Girls",
            "Boys"
        ];
        
        foreach($whichCategory as $thisCategory)
        {
            echo '<li class="nav-list-item">';
                echo '<a href="product-list.php?Category='.$thisCategory.'&Type=All" class="nav-list-link">'.$thisCategory.'</a>';
            echo '</li>';
        }
    }

    function wishListCount()
    {
        try{
            if($_SESSION['userType'] != 'Customer')
            {
                echo '<span class="nav-text">0</span>';
            }
            else
            {
                $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $userID = $_SESSION['userID'];

                $sql = "SELECT COUNT(Wish_ID) FROM wishlist WHERE Cus_ID='$userID'";
                $result = $pdo->query($sql);

                $row = $result->fetch();

                if($row)
                {
                    echo '<span class="nav-text">'.$row[0].'</span>';
                }
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    function cartCount()
    {
        try{
            if($_SESSION['userType'] != 'Customer')
            {
                echo '<span class="nav-text">0</span>';
            }
            else
            {
                $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $userID = $_SESSION['userID'];

                $sql = "SELECT COUNT(Cart_ID) FROM cart WHERE Cus_ID='$userID'";
                $result = $pdo->query($sql);

                $row = $result->fetch();

                if($row)
                {
                    echo '<span class="nav-text">'.$row[0].'</span>';
                }
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
?>

<header class="navbar">
    <div class="nav-container">
        <h1 class="logo-text">IWP</h1>
        <nav class="nav-text">
            <ul class="nav-list">
                <li class="nav-list-item"><a href="index.php" class="nav-list-link">Home</a></li>
                <?php headerToWhichCategory(); ?>
            </ul>
        </nav>
        <div class="nav-icon"> 
            <div>
                <a href="#"><i class="fa-solid fa-heart fa-lg"></i></a>
                <?php wishListCount(); ?>
            </div>
            <div>
                <a href="#"><i class="fa-solid fa-cart-plus fa-lg"></i></a>
                <?php cartCount(); ?>
            </div>
            <div>
                <a href=<?php echo toMyAccount($_SESSION["userType"]) ?>><i class="fa-solid fa-user fa-lg"></i></a>
            </div>
        </div>
    </div>
</header>
