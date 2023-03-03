<?php
//Authorization
    //check whether user is logged in or not
    if(!isset($_SESSION['user']))//if user session is not set
    {
        //user is not logged in
        //Redirect to login page with massage
        $_SESSION['nologin-massage'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        //Redirect to login page
        header('Location:'.SITEURL.'company/login.php');
    }
?>
