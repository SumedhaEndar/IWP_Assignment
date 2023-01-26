<?php 
    include 'session.inc.php';

    require_once('config.inc.php');

    function outputFeedbackDetails()
    {
        try {
            if(isset($_GET['FeedID']))
            {
                $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = 'SELECT * FROM feedback WHERE Feed_ID='.$_GET['FeedID'];
                $result = $pdo->query($sql);
                $row = $result->fetch();

                if($row)
                {
                    echo '<h2>Feedback Details</h2>';
                    echo '<p><span>ID: </span>'.$row['Feed_ID'].'</p>';
                    echo '<p><span>Name: </span>'.$row['Feed_Name'].'</p>';
                    echo '<p><span>Email: </span>'.$row['Feed_Email'].'</p>';
                    echo '<p><span>Mobile: </span>'.$row['Feed_Mobile'].'</p>';
                    echo '<p><span>Type: </span>'.$row['Feed_Type'].'</p>';
                    echo '<p><span>Subject:</span>'.$row['Feed_Subject'].'</p>';
                    echo '<div class="msg">';
                        echo '<p><span>Message :</span></p>';
                        echo '<p>'.$row['Feed_Messenge'].'</p>';
                    echo '</div>';
                }
            }
            $pdo = null;
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
    <link rel="stylesheet" href="../css/admin-leftNav.css">
    <link rel="stylesheet" href="../css/admin-feedback.css">
    <!----------------------------------------------------------------------------->
    <title>Admin | Feedback Details</title>
</head>
<body>
    <?php include('navbar.inc.php'); ?>
    <main>
        <?php include("admin-leftNav.inc.php"); ?>
        <div class="feedbackDetailsContainer">
            <div class="feedbackDetails">
                <?php outputFeedbackDetails();?>
            </div>
        </div>
    </main>
    <?php include("footer.inc.php"); ?>
</body>
</html>