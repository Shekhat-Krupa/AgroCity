<?php
    //include('partitals/menu.php');
    include('../config/constant.php');
    //include('partitals/login-check.php');


?>
<html>
    <head>
        <title>Agrocity</title>
        <link rel="stylesheet" href="../css/add.css">
    </head>
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="main-page.php">Home</a></li>
                    <li><a href="manage-product.php">Product</a></li>
                    <!--<li><a href="manage-order.php">Order</a></li>
                    <a href="logout.php">Logout</a></li>-->
                </ul>
            </div>
        </div>
<div class="main-content">
    <div class="wrapper">
        <h1>Sell Crops</h1>
        <br/>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['unauthorized'])){
                echo $_SESSION['unauthorized'];
                unset($_SESSION['unauthorized']);
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
        <br/>
        <a href="add-category.php" class="btn-primary">Add Crops</a>
        <br/><br/><br/>
        <table class="tbl-full1">
            <tr>
                <th>ID</th>
                <th>Commodity</th>
                <th>Weight</th>
                <th>Quality</th>
                <th>Address</th>
                <th>Postal Code</th>
                <th>Contact No.</th>
                <th>Packed</th>
                <th>Organic</th>
                <th colspan="2">Image</th>
            </tr>
            <?php
                $sql = "SELECT * from category";


                //execute query
                $res = mysqli_query($conn, $sql);


                $count = mysqli_num_rows($res);

                $sn=1;
                if($count > 0){
                    //there is data
                    while( $row= mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $commodity = $row['commodity'];
                        $weight = $row['weight'];
                        $quality = $row['quality'];
                        $address = $row['address'];
                        $postal_code = $row['postal_code'];
                        $contactno = $row['contactno'];
                        $packed = $row['packed'];
                        $organic = $row['organic'];
                        $image = $row['image'];
                        ?>


                            <tr>
                                <td><?php echo $sn++?></td>
                                <td><?php echo $commodity?></td>
                                <td><?php echo $weight?></td>
                                <td><?php echo $quality?></td>
                                <td><?php echo $address?></td>
                                <td><?php echo $postal_code?></td>
                                <td><?php echo $contactno?></td>
                                <td><?php echo $packed?></td>
                                <td><?php echo $organic?></td>


                                <td>
                                    <?php
                                        //check image is there or not
                                        if($image != "" ){
                                            ?>
                                            <div class="img-add">
                                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image?>" width="100px">
                                            </div>
                                            <?php
                                        }
                                        else{
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                    ?>
                                </td>
                                <td>
                                    
                                    <a href="update-product.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Crop</a>
                                    <a href="delete-product.php?id=<?php echo $id; ?>&image=<?php echo $image; ?>" class="btn-secondary"> Delete Crop</a>
                                </td>
                            </tr>    


                        <?php
                    }
                }
                else{
                    //don't have data
                    ?>




                    <tr>
                        <td><div class="error">No Category to display.</div></td>
                    </tr>


                    <?php
                }
            ?>
           
           
        </table>
    </div>
</div>
