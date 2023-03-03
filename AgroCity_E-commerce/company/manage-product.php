<?php
 
    include('../config/constant.php'); 
    include('partitals/login-check.php');

?>
<html>
    <head>
        <title>Agrocity</title>
        <link rel="stylesheet" href="../css/company.css">
    </head>
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-product.php">Product</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li> 
                </ul>
            </div>
        </div>
<div class="main-content">
    <div class="wrapper">
        <h1>Manager Product</h1>
        <br/>
        <a href="#" class="btn-primary">Add Crops</a>
        <br/><br/><br/>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>

            <tr>
                <td>1</td>
                <td>Wheat</td>
                <td>500 KG.</td>
                <td>
                    <a href="#" class="btn-secondary"> Update Crop</a>
                    <a href="#" class="btn-secondary"> Delete Crop</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Rice</td>
                <td>300 KG.</td>
                <td>
                    <a href="#" class="btn-secondary"> Update Crop</a>
                    <a href="#" class="btn-secondary"> Delete Crop</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Peanuts</td>
                <td>450 KG.</td>
                <td>
                    <a href="#" class="btn-secondary"> Update Crop</a>
                    <a href="#" class="btn-secondary"> Delete Crop</a>
                </td>
            </tr>
        </table>
    </div>
</div>