<?php 
    include('session.inc.php');
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
            <div class="main label-text">
                <section class="sec1">
                    <img src="../assests/Products/Women/Blouses/WBL-0001.jpg"></img>
                </section>
                <section class="sec2">
                    <div class="link">
                        Home / Category / Main / Sub
                    </div>
                    <div>
                        <h2>OLD SKOOL MEN'S GRAPHIC TEE (MANGLISH SERIES) - YLW</h2>
                    </div>
                    <div class="right">
                        <h2 class="price">RM 23.00</h2>
                        <button class="like-button"></button>
                        <script>
                            document.querySelector('.like-button').addEventListener('click', (e) => {e.currentTarget.classList.toggle('liked');});
                        </script>
                        <form>
                            <div class="quan-add">
                                <div class="add">
                                    <!-- If Submit the page will refresh -->
                                    <!-- <input class="buttonLike-MyAccount footer-heading button" type="submit" value="Add To Cart"></input> -->
                                    <input class="buttonLike-MyAccount footer-heading button" type="button" value="Add To Cart"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
        
        <?php include('footer.inc.php'); ?>
        
        <div class="addCartAnime">
            <button>
                <i class="fa-solid fa-x fa-xl dismissBtn"></i>
            </button>
            <h1 class="nav-text"></h1>
        </div>
        <script src="../js/add-to-cart-2.js"></script>
    </body>

</html>
