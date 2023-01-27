<?php
    function footerToWhichCategory()
    {
        $whichCategory = [
            "Women",
            "Men",
            "Girls",
            "Boys"
        ];
        
        foreach($whichCategory as $thisCategory)
        {
            echo '<li class="footer-list-item">';
                echo '<a href="product-list.php?Category='.$thisCategory.'&Type=All" class="footer-list-link">'.$thisCategory.'</a>';
            echo '</li>';
        }
    }
?>

<footer>
    <div class="footer-container">
        <div class="footer-layout-1">
            <div class="footer-layout-1-sub1">
                <h1 class="logo-text">IWP</h1>
            </div>
            <div class="footer-layout-1-sub2">
                <h4 class="footer-heading">Category</h4>
                <ul class="footer-text footer-list">
                    <?php footerToWhichCategory(); ?>
                </ul>
            </div>
            <div class="footer-layout-1-sub2">
                <h4 class="footer-heading">Information</h4>
                <ul class="footer-text footer-list">
                    <li class="footer-list-item"><a href="about.us.php" class="footer-list-link">About Us</a></li>
                    <li class="footer-list-item"><a href="contact-us.php" class="footer-list-link">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-layout-1-sub2">
                <h4 class="footer-heading">Help</h4>
                <ul class="footer-text footer-list">
                    <li class="footer-list-item"><a href="#" class="footer-list-link">FAQ</a></li>
                    <li class="footer-list-item"><a href="#" class="footer-list-link">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="footer-layout-1-sub3">
                <a class="buttonLike-MyAccount footer-heading" href=<?php echo toMyAccount($_SESSION["userType"]) ?>>My Account</a>
            </div>
        </div>
        <hr style="
            border: none; 
            border-top: 1px solid white;
            margin: 1.5rem 0 1rem 0;">
        <div class="footer-layout-2">
            <small class="small-text">&copy; I.W.P 2022. We love our customer!</small>
            <div class="footer-layout-2-sub1">
                <small class="small-text">Follow Us: </small>
                <a href="https://www.facebook.com/" class="follow-us-link">
                    <img src="../assests/facebook-icon.svg" alt="follow us on facebook" class="follow-us-icon">
                </a>
                <a href="https://www.facebook.com/" class="follow-us-link">
                    <img src="../assests/twitter-icon.svg" alt="follow us on twitter" class="follow-us-icon">
                </a>
            </div>
        </div>
    </div>
</footer>