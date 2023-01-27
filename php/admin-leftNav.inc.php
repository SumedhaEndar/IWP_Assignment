<?php 
    require_once('config.inc.php');

    function outputAdminHead()
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
                echo '<div class="admin-head">';
                    echo '<img src="../assests/Employees/'.$row['Emp_ID'].'.jpg">';
                    echo '<h3 class="section-heading">'.$row['Emp_Name'].'</h3>';
                echo '</div>';
            }
        }

        catch (PDOException $e) 
        {
            die( $e->getMessage() );
        }
    }
?>

<aside class="left-dashNav">
    <?php outputAdminHead()?>
    <div class="sidenav nav-text">    
        <a href="admin-myProfile.php">My Profile</a>
        <a href="admin-employeeList.php">Employee List</a>
        <a href="admin-addEmployee.php">Add Employee</a>
        <a href="admin-productList.php">Product List</a>
        <a href="admin-addProduct.php">Add Product</a>
        <a href="admin-orderList.php">Order List</a>
        <a href="admin-feedbackList.php">Feedback List</a>
    </div>
</aside>