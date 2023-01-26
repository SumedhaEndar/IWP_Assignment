<?php 
    include 'session.inc.php';

    require_once('config.inc.php');

    function outputBusinessCard()
    {
        $EmpID = $_SESSION['userID'];

        try {
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
            $sql = "SELECT * FROM employee WHERE Emp_ID = $EmpID";
            $result = $pdo->query($sql);
            $row = $result->fetch();

            if($row)
            {
                echo '<div class="business-card">';
                    echo '<img class="img-profile" src="../assests/Employees/'.$row['Emp_ID'].'.jpg">';
                    echo '<div class="intro">';
                        echo '<h3 class="intro-text">'.$row["Emp_Name"].'</h3>';
                        echo '<p class="intro-text">'.$row["Emp_Position"].'</p>';
                        echo '<h4 class="intro-text">'.$row["Emp_ID"].'</h4>';
                        echo '<div class="intro-left">';
                            echo '<p><span>Mobile:</span>'.$row["Emp_Mobile"].'</p>';
                            echo '<p><span>Email:</span>'.$row["Emp_Email"].'</p>';
                            echo '<p><span>Address:</span><br>'.$row["Emp_Address"].'</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        }
        catch (PDOException $e) 
        {
            die( $e->getMessage() );
        }
    }

    function outputMyProfileDetails()
    {
        $EmpID = $_SESSION['userID'];

        try {
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
            $sql = "SELECT * FROM employee WHERE Emp_ID = $EmpID";
            $result = $pdo->query($sql);
            $row = $result->fetch();

            if($row)
            {
                echo '<div class="item1">';
                    echo '<label>ID:</label>';
                    echo '<input type="text" value="'.$row["Emp_ID"].'" disabled>';
                echo '</div>';
                echo '<div class="item2">';
                    echo '<label>Email:</label>';
                    echo '<input type="email" value="'.$row["Emp_Email"].'" disabled>';
                echo '</div>';
                echo '<div class="item3">';
                    echo '<label>Name:</label>';
                    echo '<input type="text" value="'.$row["Emp_Name"].'" disabled>';
                echo '</div>';
                echo '<div class="item4">';
                    echo '<label>Position:</label>';
                    echo '<input type="text" value="'.$row["Emp_Position"].'" disabled>';
                echo '</div>';
                echo '<div class="item5">';
                    echo '<label for="EmpMobile">Mobile:</label>';
                    echo '<input type="tel" name="EmpMobile" id="EmpMobile" value="'.$row["Emp_Mobile"].'">';
                echo '</div>';
                echo '<div class="item6">';
                    echo '<label for="EmpAddress">Address:</label><br>';
                    echo '<textarea id="EmpAddress" name="EmpAddress" rows="3" cols="60">'.$row["Emp_Address"].'</textarea>';
                echo '</div>';
                echo '<div class="item7">';
                    echo '<label for="EmpPassword">Current Password:</label>';
                    echo '<input type="password" name="EmpPassword" id="EmpPassword">';
                echo '</div>';
                echo '<div class="item8">';
                    echo '<label for="NewPassword">New Password:</label>';
                    echo '<input type="password" name="NewPassword" id="NewPassword">';
                echo '</div>';
                echo '<div class="item9">';
                    echo '<label for="ConfirmPassword">Confirm Password:</label>';
                    echo '<input type="password" name="ConfirmPassword" id="ConfirmPassword">';
                echo '</div>';
                echo '<input name="updateBtn" class="item10" type="submit" value="Update My Profile">';
            }
        }
        catch (PDOException $e) 
        {
            die( $e->getMessage() );
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
    <link rel="stylesheet" href="../css/admin-myProfile.css">
    <!----------------------------------------------------------------------------->
    <title>Admin | My Profile</title>
</head>
<body>
    <?php include("navbar.inc.php");?>

    <main>
        <?php include("admin-leftNav.inc.php"); ?>
        <div class="adminMyProfileContainer">
            <?php outputBusinessCard(); ?>
            <div class="editMyProfile">
                <h3>Update My Profile</h3>
                <form method="post">
                    <?php outputMyProfileDetails();?>
                </form>
            </div>
        </div>
    </main>
    
    <?php include("footer.inc.php"); ?>
</body>
</html>

<?php 
    include("dataconnection.inc.php");

    $EmpID = $_SESSION['userID'];
    
    $result = $pdo->query("SELECT * from employee WHERE Emp_ID='$EmpID' ");
    $row = $result->fetch();

    if(isset($_POST["updateBtn"]))
    {
        $EmpID = $row["Emp_ID"];
        $EmpMobile = $_POST["EmpMobile"];
        $EmpAddress = $_POST["EmpAddress"];
        $EmpPassword = $_POST["EmpPassword"];
        $NewPassword = $_POST["NewPassword"];
        $ConfirmPassword = $_POST["ConfirmPassword"];

        if($EmpPassword=="")
        {
            $sql = "UPDATE employee SET Emp_Mobile='$EmpMobile', Emp_Address='$EmpAddress' 
            WHERE Emp_ID='$EmpID'";
            
            $pdo->query($sql);
?>
            <script>alert("Update Successful")</script>
<?php
        }
        else if($EmpPassword == $row["Emp_Password"])
        {
            if($NewPassword == $ConfirmPassword)
            {
                $sql = "UPDATE employee SET Emp_Mobile='$EmpMobile', Emp_Address='$EmpAddress',
                Emp_Password='$NewPassword' WHERE Emp_ID='$EmpID'";
            
                $pdo->query($sql);
?>
                <script>alert("Update Successful")</script>
<?php
            }
            else
            {
?>
                <script>alert("Password is not the same as confirmed password")</script>
<?php
            }
        }
        else
        {
?>
            <script>alert("Wrong Password")</script>
<?php
        }

?>
        <script>
            window.location.href = "admin-myProfile.php";
        </script>
<?php
    }    
?>