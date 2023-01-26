<?php 
    include 'dataconnection.inc.php'; 
    include 'session.inc.php';
?>

<?php
    function indexToWhichCategory()
    {
        $whichCategory = [
            ["Women","../assests/home_women_category.png"],
            ["Men","../assests/home_men_category.png"],
            ["Girls","../assests/home_girls_category.png"],
            ["Boys","../assests/home_boys_category.png"],
        ];
        
        foreach($whichCategory as $thisCategory)
        {
             echo '<a href="product-list.php?Category='.$thisCategory[0].'&Type=All" class="home-category-link">';
                echo '<div class="home-category-img">';
                    echo '<div class="overlay">'; 
                        echo '<h3 class="card-heading top-left" style="font-size: 16px;">'.$thisCategory[0].'</h3>';
                    echo '</div>';
                    echo '<img src="'.$thisCategory[1].'" alt="'.$thisCategory[0].'">';
                echo '</div>';
            echo '</a>';
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&family=Raleway:wght@600&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/text.css">
    <link rel="stylesheet" href="../css/color.css">
    <link rel="stylesheet" href="../css/others.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/buttonLikeAnchor.css">
    <link rel="stylesheet" href="../css/hero-carousel.css">
    <link rel="stylesheet" href="../css/home-category.css">
    <!----------------------------------------------------------------------------->
    <title>IWP | Home</title>
</head>
<body>
    <?php include 'navbar.inc.php'; ?>

    <div class="hero-carousel-container">
        <section class="hero-carousel hero-carousel-1 hero-item hero-item-visible">
            <img src="../assests/iwp_spy_family_1.jpg" alt="Spy Family">
        </section>
        <section class="hero-carousel hero-carousel-2 hero-item">
            <img src="../assests/iwp_spy_family_2.jpg" alt="Spy Family">
        </section>
        <section class="hero-carousel hero-carousel-3 hero-item">
            <img src="../assests/iwp_spy_family_3.jpg" alt="Spy Family">
        </section>
        <div class="hero-carousel-nav">
            <button class="carousel-indicator current-slide"></button>
            <button class="carousel-indicator"></button>
            <button class="carousel-indicator"></button>
        </div>
    </div>

    <main class=" home-main">
        <h2 class="section-heading" style="text-align: center; margin-top: 0; margin-bottom: 1.5rem;">Category</h2>
        <div class="standardize-container home-category-container">
            <?php indexToWhichCategory(); ?>
        </div>
    </main>

    <?php include 'footer.inc.php'; ?>

    <script src="../js/hero-carousel.js"></script>
</body>
</html>