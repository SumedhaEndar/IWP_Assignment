<?php
include 'dataconnection.inc.php';
include 'session.inc.php';

function outputCustomerProfile()
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
                        <td style="padding-bottom: 10px; padding-top: 10px;">Name: ' . $row["Cus_Name"] . '</td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 10px; padding-top: 10px;">Mobile: ' . ($row["Cus_Mobile"] ?? "Mobile Number Not Found. Please Update At Edit Profile") . '</td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 10px; padding-top: 10px;">Email Address: ' . $row["Cus_Email"] . '</td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 10px; padding-top: 10px;">Shipping Address: ' . ($row["Cus_Address"] ?? "Address Not Found. Please Update At Edit Profile") . '</td>
                    </tr>
                </table>';
        }
    } catch (PDOException $e) {
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
    <link rel="stylesheet" href="../css/dashboard-ProfilE.css">
    <!----------------------------------------------------------------------------->
    <title>IWP | My Profile 2</title>
</head>

<body>
    <?php include 'navbar.inc.php'; ?>

    <?php include('dashboard-tabs.inc.php');?>

    <main class="dashboard-section">
        <section class="dashboard-container">
            <div class="dashboard-item-container">
                <?php outputCustomerProfile(); ?>
                <table>
                    <tr>
                        <td>
                            <form action="dashboard-editProfile.php">
                                <input type="submit" value="Edit Profile" id="edit_button" />
                            </form>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="dashboard-changePassword.php">
                                <input type="submit" value="Change Password" id="change_pass_button" />
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </main>

    <?php include('footer.inc.php');?>
</body>

</html>