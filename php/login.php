<?php
    include "session.inc.php"; 
?>

<?php 
    include "dataconnection.inc.php";

    if(isset($_POST["loginBtn"]))
    {
        $userEmail = $_POST["userEmail"];
        $userPassword = $_POST["userPassword"];

        $iwpDomainPattern = "/@iwp.com/i";
        $isAdmin = preg_match($iwpDomainPattern, $userEmail);
        
        if(!$isAdmin)
        {      
            $result = $pdo->query("SELECT * FROM customer WHERE Cus_Email = '$userEmail'");
            $row = $result->fetch();
            if($row)
            {
                if($userPassword == $row["Cus_Password"])
                {
                    $_SESSION["userType"] = "Customer";
                    $_SESSION["userID"] = $row["Cus_ID"];
                    header("Location:dashboard-myOrders.php");
                }
                else
                {
?>
                    <script>
                        alert("Password is incorrect")
                        window.location.href="login.php";
                    </script>
<?php
                }
            }
            else
            {
?>
                <script>
                    alert("User does not exists. Please register")
                    window.location.href="register.php";
                </script>
<?php
            }
        }
    
        else
        {
            $result = $pdo->query("SELECT * FROM employee WHERE Emp_Email = '$userEmail'");
            $row = $result->fetch();
            if($row)
            {
                if($userPassword == $row["Emp_Password"])
                {
                    $_SESSION["userType"] = "Admin";
                    $_SESSION["userID"] = $row["Emp_ID"];
                    header("Location:admin-myProfile.php");
                }
                else
                {
?>
                    <script>
                        alert("Password is incorrect")
                        window.location.href="login.php";
                    </script>
<?php
                }
            }
            else
            {
?>
                <script>
                    alert("User does not exists. Please contact the manager.")
                    window.location.href="index.php";
                </script>
<?php
            }

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
    <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&family=Raleway:wght@600&family=Roboto:wght@700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="../css/text.css">
    <link rel="stylesheet" href="../css/color.css">
    <link rel="stylesheet" href="../css/others.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/buttonLikeAnchor.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>IWP | Login</title>
</head>

<body>
    <?php include 'navbar.inc.php'; ?>

    <main>
        <div class="login-heading">
            <h1>Login</h1>
        </div>
        <form id="userLoginForm" method="POST" onsubmit="prevalidateLoginUser()">
            <div id="userDetailsAndLogin">
                <!-- Need to add RegEx to work on the input for username and email address -->
                <div class="login-username-email">
                    <label>Email Address</label>
                    <input id="usernameOrEmail" name="userEmail" type="text" placeholder="Email Address" required>
                </div>
                <div class="login-password">
                    <label>Password</label>
                    <input id="passwordLogin" name="userPassword" type="password" placeholder="Password" required>
                </div>
                <div id="forgot-password">
                    <a href="http://">Forgot Password</a>
                </div>
                <input type="submit" name="loginBtn" value="Login" class="login-button"></input>
                <div id="register">
                    <p>
                        Don't have an account yet?
                        <a href='register.php'>Register here</a>
                    </p>
                </div>
            </div>
        </form>
    </main>

    <?php include 'footer.inc.php';?>
    <script src="../js/prevalidate.js"></script>
</body>
</html>


