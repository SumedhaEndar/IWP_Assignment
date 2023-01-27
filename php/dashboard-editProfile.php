<?php
include("session.inc.php");
include("dataconnection.inc.php");
require_once('config.inc.php');

function updateCustomerProfile()
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
                        <td class="name-label">
                            Name<br>
                                <input name="cusName" type="text" placeholder="Enter Name">
                        </td>
                        <td style="padding-left: 100px;">
                            Mobile<br>
                                <input name="cusMobile" type="text" placeholder="Enter Mobile">
                        </td>
                        <br><br>
                    </tr>
                </table>

                <table style="padding-top: 20px;">
                    <tr>
                        <td>
                            Email Address<br>
                                <input name="cusEmail" type="email" value="' . $row["Cus_Email"] . '" disabled>
                        </td>
                        <td style="padding-left: 100px;">
                            Shipping Address<br>
                                <input name="cusShipAddress" type="text" placeholder="Enter Address" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input name="updateProfileBtn" placeholder="Save Profile" type="submit" id="save_profile_button">
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

if (isset($_POST["updateProfileBtn"])) 
{
    $cusName = $_POST["cusName"];
    $cusMobile = $_POST["cusMobile"];
    $cusShipAddress = $_POST["cusShipAddress"];

    $sql = "UPDATE customer SET Cus_Name = '$cusName', Cus_Mobile = '$cusMobile', Cus_Address = '$cusShipAddress' WHERE Cus_ID = '$CusID'";
    $pdo->query($sql);
?>
    <script>
        alert("Profile Updated Successfully!");
    </script>
<?php
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
    <title>IWP | My Profile 1</title>
</head>

<body>
    <?php include 'navbar.inc.php'; ?>

    <?php include('dashboard-tabs.inc.php'); ?>

    <main class="dashboard-section">
        <section class="dashboard-container">
            <div class="dashboard-item-container">
                <form method="post">
                    <?php updateCustomerProfile(); ?>
                </form>
            </div>
        </section>
    </main>
    <?php include 'footer.inc.php'; ?>
</body>

</html>