<?php
    //include('partitals/menu.php');
    include('config/constant.php');
    //include('partitals/login-check.php');


?>
<html>
    <head>
        <title>Agrocity</title>
        <link rel="stylesheet" href="css/add.css">
    </head>
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="company/main-page.php">Home</a></li>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="company/manage-product.php">Manage-Product</a></li>
                    <!--<li><a href="logout.php">Logout</a></li>-->
                </ul>
            </div>
        </div>
<div class="main-content">
    <div class="wrapper">
        <h1>Product</h1>
        <br/>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <br/>
        
        <table class="tbl-full1">
            <tr>
                ̌<!--<th>ID</th>-->
                <th>Commodity</th>
                <th>Weight</th>
                <th>Quality</th>
                <th>Address</th>
                <th>Postal Code</th>
                <th>Contact No.</th>
                <th>Packed</th>
                <th>Organic</th>
                <th>Image</th>
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
                        //$id = $row['id'];
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
                                <!--<td><?php echo $sn++?></td>-->
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
