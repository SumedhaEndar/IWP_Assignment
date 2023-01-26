<?php 
    function toMyAccount($userType)
    {
        $href = "#";
        if($userType == "Guest")
        {
            $href = 'login.php';
        }
        else if($userType == "Customer")
        {
            $href = 'dashboard-myOrders.php';
        }
        else if($userType == "Admin")
        {
            $href = 'admin-myProfile.php';
        }

        return $href;
    }
?>