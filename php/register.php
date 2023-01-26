<?php 
    include 'dataconnection.inc.php'; 
    include 'session.inc.php';
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
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&family=Raleway:wght@600&family=Roboto:wght@700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="../css/text.css">
    <link rel="stylesheet" href="../css/color.css">
    <link rel="stylesheet" href="../css/others.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/buttonLikeAnchor.css">
    <link rel="stylesheet" href="../css/register.css">
    <title> IWP | Register</title>
</head>

<body>
    <?php include 'navbar.inc.php'; ?>

    <main>
        <div class="register">
            <h1>Register</h1>
        </div>
        <form method="POST">
            <div id="userDetailsAndRegister">
                <div class="register-username">
                    <label>Name</label>
                    <input name="cusName"type="text" placeholder="Name" required>
                </div>
    
                <div class="register-email">
                    <label>Email Address</label>
                    <input name="cusEmail" type="email" placeholder="Email Address" required>
                </div>
    
                <div class="register-password">
                    <label>Password</label>
                    <input name="cusPassword" type="password" placeholder="Password" required>
                </div>
    
                <div class="register-confirmedpassword">
                    <label>Confirm Password</label>
                    <input name="cusConfirmPassword" type="password" placeholder="Confirm Password" required>
                </div>
    
                <input name="registerBtn" type="submit" value="Register" class="register-button"></input>
                <div id="login">
                    <p>Already have an account?<a href="login.php">Log in</a></p>
                </div>
            </div>
        </form>
    </main>

    <?php include 'footer.inc.php';?>
</body>

</html>


<?php 
    if(isset($_POST["registerBtn"]))
    {
        $cusName = $_POST["cusName"];
        $cusEmail = $_POST["cusEmail"];
        $cusPassword = $_POST["cusPassword"];
        $cusConfirmPassword = $_POST["cusConfirmPassword"];

        if($cusPassword == $cusConfirmPassword)
        {
            $result = $pdo->query("SELECT * from customer WHERE Cus_Email='$cusEmail' ");
            $row = $result->fetch();
            if($row)
            {
?>
                <script>
                    alert("The Email is already in use. Please Change.");
                </script>
<?php
            }
            else
            {
                $pdo->query("INSERT INTO customer (Cus_Name, Cus_Email, Cus_Password)
                VALUES('$cusName','$cusEmail', '$cusPassword')");
                $pdo = null;
?>
                <script>
                    alert("Registered");
                    window.location.href="login.php";
                </script>
<?php
            }
        }
        else
        {
?>
            <script>
                alert("Password is not the same as confirmed password");
            </script>
<?php
        }
    }
?>