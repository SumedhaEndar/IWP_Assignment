<?php 
    include 'session.inc.php';

    require_once('config.inc.php');

    function outputEmployeeList()
    {
        try {
            $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM employee ORDER BY Emp_Name";
            $result = $pdo->query($sql);

            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                echo '<tr>';
                    echo '<td>'.$row['Emp_ID'].'</td>';
                    echo '<td>'.$row['Emp_Name'].'</td>';
                    echo '<td>'.$row['Emp_Position'].'</td>';
                    echo '<td>'.$row['Emp_Email'].'</td>';
                    echo '<td>'.$row['Emp_Mobile'].'</td>';
                    echo '<td><a href="'.$_SERVER["SCRIPT_NAME"].'?EmpID='.$row['Emp_ID'].'">View Details</a></td>';
                echo '</tr>';
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    function outputEmployeeDetail()
    {
        try {
            if(isset($_GET['EmpID']))
            {
                $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'SELECT * FROM employee WHERE Emp_ID = '.$_GET['EmpID'];
                $result = $pdo->query($sql); 
                $row = $result->fetch();

                if($row)
                {
                    echo '<div class="business-card">';
                        echo '<img class="img-profile" src="../assests/Employees/'.$row['Emp_ID'].'.jpg">';
                        echo '<div class="intro">';
                            echo '<h3 class="intro-text">'.$row['Emp_Name'].'</h3>';
                            echo '<p class="intro-text">'.$row['Emp_Position'].'</p>';
                            echo '<h4 class="intro-text">'.$row['Emp_ID'].'</h4>';
                            echo '<div class="intro-left">';
                                echo '<p><span>Mobile:</span>'.$row['Emp_Mobile'].'</p>';
                                echo '<p><span>Email:</span>'.$row['Emp_Email'].'</p>';
                                echo '<p><span>Address:</span><br>'.$row['Emp_Address'].'</p>';
                            echo '</div>';
                        echo '</div>';
                    echo "</div>";
                }
                $pdo = null;
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
    <link rel="stylesheet" href="../css/admin-employeeList.css">
    <!----------------------------------------------------------------------------->
    <title>Admin | Employee List</title>
</head>
<body>
    <?php include("navbar.inc.php");?>
    <main>
        <?php include("admin-leftnav.inc.php");?>
        <div class="EmployeeListContainer">
            <div class="EmployeeListTable">
                <table>
                    <thead>
                        <tr>
                            <th>Emp ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php outputEmployeeList();?>
                    </tbody>
                </table>
            </div>
            <?php outputEmployeeDetail();?>
        </div>
    </main>
    <?php include("footer.inc.php");?>
</body>
</html>