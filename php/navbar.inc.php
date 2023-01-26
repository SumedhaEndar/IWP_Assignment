<?php include 'navbar-footer.inc.php';?>

<?php
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
?>

<header class="navbar">
    <div class="nav-container">
        <h1 class="logo-text">IWP</h1>
        <nav class="nav-text">
            <ul class="nav-list">
                <li class="nav-list-item"><a href="index.php" class="nav-list-link">Home</a></li>
                <?php headerToWhichCategory();?>
            </ul>
        </nav>
        <div class="nav-icon"> 
            <div>
                <a href="#"><i class="fa-solid fa-heart fa-lg"></i></a>
                <span class="nav-text">0</span>
            </div>
            <div>
                <a href="#"><i class="fa-solid fa-cart-plus fa-lg"></i></a>
                <span class="nav-text">0</span>
            </div>
            <div>
                <a href=<?php echo toMyAccount($_SESSION["userType"]) ?>><i class="fa-solid fa-user fa-lg"></i></a>
            </div>
        </div>
    </div>
</header>
