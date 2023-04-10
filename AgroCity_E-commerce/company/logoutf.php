<?php
    //Include costans.php for siteurl
    include('../config/constant.php');
    //1. Display the session
    session_destroy();//unsets $_session['user']
    //2.redirect to login page
    header('location:'.SITEURL.'index.php');
?>
