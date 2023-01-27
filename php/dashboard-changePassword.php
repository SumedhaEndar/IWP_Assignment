<?php
include 'session.inc.php';
include("dataconnection.inc.php");
require_once('config.inc.php');

function changePassword()
{
    $CusID = $_SESSION['userID'];

    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM customer WHERE Cus_ID = '$CusID'";
        $result = $pdo->query($sql);
        $row = $result->fetch();

        if ($row) {
            echo '
            <table>
                    <tr>
                        <td style="padding-bottom: 10px; padding-top: 30px;">
                            Current Password
                            <br>
                                <input name="currentPassword" type="password" placeholder="Password" class="userChangePassword">
                        </td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td style="padding-bottom: 10px; padding-top: 10px;">
                            New Password
                            <br>
                                <input name="newPassword" type="password" placeholder="New Password" class="userChangePassword">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 10px; padding-top: 10px;">
                            Confirmation New Password
                            <br>
                                <input name="confirmPassword" type="password" placeholder="Confirmation New Password" class="userChangePassword">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="changePasswordBtn" placeholder="Change Password" type="submit" id="save_profile_button">
                        </td>
                    </tr>
                </table>';
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

$CusID = $_SESSION["userID"];

$result = $pdo->query("SELECT * FROM customer WHERE Cus_ID = '$CusID'");
$row = $result->fetch();

if (isset($_POST["changePasswordBtn"])) {
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($currentPassword == $row["Cus_Password"]) {
        if ($newPassword == $confirmPassword) {
            $sql = "UPDATE customer SET Cus_Password = '$newPassword' WHERE Cus_ID = '$CusID'";
            $pdo->query($sql);
?>
            <script>
                alert("Password Changed Successfully!")
            </script>;
        <?php
        } else {
        ?>
            <script>
                alert("New Password and Confirmation New Password are not the same!")
            </script>;
        <?php
        }
    } else {
        ?>
        <script>
            alert("Current Password is incorrect!")
        </script>;
<?php
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
    <link rel="stylesheet" href="../css/dashboard-ProfilE.css">
    <link rel="stylesheet" href="../css/userChangePassword.css">
    <!----------------------------------------------------------------------------->
    <title>IWP | My Profile 3</title>
</head>

<body>
    <?php include 'navbar.inc.php'; ?>

    <?php include('dashboard-tabs.inc.php'); ?>


    <main class="dashboard-section">
        <section class="dashboard-container">
            <div class="dashboard-item-container">
                <form method="post">
                    <?php changePassword(); ?>
                </form>
            </div>
        </section>
    </main>

    <?php include 'footer.inc.php'; ?>
</body>

</html>