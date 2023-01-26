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
    <link rel="stylesheet" href="../css/dashboard-tabs.css">
    <link rel="stylesheet" href="../css/admin-leftNav.css">
    <link rel="stylesheet" href="../css/admin-addEmployee.css">
    <!----------------------------------------------------------------------------->
    <title>Admin | Add Employee</title>
</head>
<body>
    <?php include("navbar.inc.php");?>

    <main>
        <?php include("admin-leftNav.inc.php");?>
        <div class="addEmployeeContainer">
            <div class="addEmployee">
                <h3>Add Employee</h3>
                <form method="post">
                    <div class="item1">
                        <label for="EmpName">Name:</label>
                        <input type="text" name="EmpName" id="EmpName">
                    </div>
                    <div class="item2">
                        <label for="EmpPos">Position:</label>
                        <input type="text" name="EmpPos" id="EmpPos">
                    </div>
                    <div class="item3">
                        <label for="EmpEmail">Email:</label>
                        <input type="tel" name="EmpEmail" id="EmpEmail">
                    </div>
                    <div class="item4">
                        <label for="EmpMobile">Mobile:</label>
                        <input type="tel" name="EmpMobile" id="EmpMobile">
                    </div>
                    <div class="item5">
                        <label for="EmpAddress">Address:</label><br>
                        <textarea id="EmpAddress" name="EmpAddress" rows="3" cols="60"></textarea>
                    </div>
                    <input name="addBtn" class="item6" type="submit" value="Add">
                </form>
            </div>
        </div>
    </main>

    <?php include("footer.inc.php") ?>
</body>
</html>

<?php 
    include 'dataconnection.inc.php'; 

    if(isset($_POST["addBtn"]))
    {
        $EmpName = $_POST["EmpName"];
        $EmpPos = $_POST["EmpPos"];
        $EmpEmail = $_POST["EmpEmail"];
        $EmpMobile = $_POST["EmpMobile"];
        $EmpAddress = $_POST["EmpAddress"];
        
        $sql = "SELECT * FROM employee WHERE Emp_Email='$EmpEmail'";
        $result = $pdo->query($sql);
        $row = $result->fetch();

        if($row)
        {
?>
            <script>
                alert("The Email is already in use. Please Change.")
            </script>
<?php
        }
        else
        {
            $sql = "INSERT INTO employee (Emp_Name, Emp_Position, Emp_Mobile, Emp_Email, Emp_Address) 
            VALUES('$EmpName','$EmpPos', '$EmpMobile', '$EmpEmail','$EmpAddress')";
            $pdo->query($sql);
?>
            <script>
                alert("Add Successful")
            </script>
<?php
            $pdo = null;
        }
    }
?>