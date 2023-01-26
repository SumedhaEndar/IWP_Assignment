<?php 
    include 'session.inc.php';

    require_once('config.inc.php');

    function outputFeedbackList()
    {
        try {
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM feedback";
            $result = $pdo->query($sql);

            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                echo '<tr>';
                    echo '<td>'.$row['Feed_ID'].'</td>';
                    echo '<td>'.$row['Feed_Name'].'</td>';
                    echo '<td>'.$row['Feed_Email'].'</td>';
                    echo '<td>'.$row['Feed_Type'].'</td>';
                    echo '<td>'.$row['Feed_Subject'].'</td>';
                    echo '<td><a href="admin-feedbackDetails.php?FeedID='.$row['Feed_ID'].'">View Details</a></td>';
                echo '</tr>';
            }
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
    <title>Admin | Feedback List</title>
</head>
<body>
    <?php include('navbar.inc.php'); ?>
    <main>
        <?php include('admin-leftNav.inc.php'); ?>
        <div class="feedbackListContainer">
            <div class="feedbackListTable">
                <table>
                    <thead>
                        <tr>
                            <th>Feedback ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php outputFeedbackList();?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php include('footer.inc.php'); ?>
</body>
</html>