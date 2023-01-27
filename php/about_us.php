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
    <link rel="stylesheet" href="../css/about_us.css">

    <title>About Us</title>
</head>
    <body>
        <?php include 'navbar.inc.php'; ?>
        <h1 class="heading-1" style="text-align: center; margin: 0; padding: 0.75rem 0;">Our Team</h1>
        <div class="container1">
            <div class="image-container">
                <img src="../assests/sumedha.jpg" alt="Image 1" class="image-1">
                <p class="description-1">Sumedha Endar</p>
                <p class="description-1">1211200546</p>
            </div>
            <div class="image-container">
                <img src="../assests/dongyu.jpeg" alt="Image 2" class="image-1">
                <p class="description-1">Tan Dong Yu</p>
                <p class="description-1">1211200835</p>
            </div>
            <div class="image-container">
                <img src="../assests/lys.jpeg" alt="Image 3" class="image-1">
                <p class="description-1">Lai Yie Shuen</p>
                <p class="description-1">1211201165</p>
            </div>
            <div class="image-container">
                <img src="../assests/jaden.jpeg" alt="Image 4" class="image-1">
                <p class="description-1">Jaden Sujay Martin</p>
                <p class="description-1">1211102830</p>
            </div>
        </div>
        <h1 class="heading-2" style="text-align: center; margin: 0; padding: 0.75rem 0;">Our 3 Main Pillars</h1>
        <div class="container2">
            <div class="box">
              <h2 class="title">Ideal</h2>
              <img src="../assests/ideal.jpeg" alt="ideal" class="image-2">
              <p class="description-2">Our Designers work extremly hard to figure out the ideal design for you.</p>
            </div>
            <div class="box">
              <h2 class="title">Worthy</h2>
              <img src="../assests/worthy.jpeg" alt="worthy" class="image-2">
              <p class="description-2">We use durable fabric to manufacture our clothes. So that they aren’t easily torn.</p>
            </div>
            <div class="box">
              <h2 class="title">Pleasent</h2>
              <img src="../assests/pleasent.jpeg" alt="assests" class="image-2">
              <p class="description-2">Wearing our clothes and spending your time with your loved ones is the best compliment to us.</p>
            </div>
          </div>
        
        <?php include 'footer.inc.php'; ?>
    </body>
</html>