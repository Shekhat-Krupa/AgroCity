<?php
    include('partitals/menu.php');
?>
<!-- <html>
    <head>
        <title>Agrocity</title>
        <link rel="stylesheet" href="../css/company.css">
    </head>
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="manage-product.php">Product</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                     <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div> -->
<div class="main-content">
    <div class="wrapper">
    <div class="add-formc">
        <h1>Add Crops</h1>
        


        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
       
        <!-- Add category  -->
    <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>
                    Commodity
                </td>
                <td><input type="text" name="commodity" class="input-box2" placeholder="Ex. Rice Groundnut etc."></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><input type="text" name="weight" class="input-box2" placeholder="in kilogram"></td>
            </tr>
            <tr>
                <td>Quality</td>
                <td><input type="text" name="quality" class="input-box2" placeholder="Ex. Good or Average .."></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" class="input-box2"></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><input type="text" name="postal_code" class="input-box2" placeholder="enter 6 digit"></td>
            </tr>
            <tr>
                <td>Contact No.</td>
                <td><input type="text" name="contactno" class="input-box2" placeholder="enter contact no."></td>
            </tr>
            <tr>
                <td>Is it packed in Bags?</td>
                <td>
                    <input type="radio" name="packed" class="radio-custom" value="True">Yes
                    <input type="radio" name="packed" class="radio-custom" value="False">No
                </td>
            </tr>
            <tr>
                <td>Is it Organic product?</td>
                <td>
                    <input type="radio" name="organic" value="True">Yes
                    <input type="radio" name="organic" value="False">No


                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td> <input type="file" name= "image"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" class="signup-btn1" value="Add category" class="btn-secondary"></td>
            </tr>
        </table>
    </form>
    </div>


    <?php
        if(isset($_POST['submit']))
        {
            //echo $_GET['id'];
            //echo "clicked";
            //get the value from category
            $commodity = $_POST['commodity'];
            if(isset($_POST['weight'])){
                $weight = $_POST['weight'];
            }
            else{
                $weight=null;
            }
            if(isset($_POST['quality'])){
                $quality = $_POST['quality'];
            }
            else{
                $quality=null;
            }
            //for address
            if(isset($_POST['address'])){
                $address = $_POST['address'];
            }
            else{
                $address=null;
            }
            //postal_code
            if(isset($_POST['postal_code'])){
                $postal_code = $_POST['postal_code'];
            }
            else{
                $postal_code=null;
            }
            if(isset($_POST['contactno'])){
                $contactno = $_POST['contactno'];
            }
            else{
                $contactno=null;
            }
            //for radio
            if(isset($_POST['packed'])){
                $packed=$_POST['packed'];
            }
            else{
                $packed = "False";
            }
            if(isset($_POST['organic'])){
                $organic=$_POST['organic'];
            }
            else{
                $organic = "False";
            }
            // check for image
            //print_r($_FILES[]);
            //die();//break out
            if(isset($_FILES['image']['name'])){
                //uplode image
                $image_name = $_FILES['image']['name'];
                //rename
                //$ext = explode('.', $image_name);
                //$image_name ="category_".rand(000,999).'.'.$ext;


                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/".$image_name;


                $uplode=move_uploaded_file($source_path, $destination_path);


                //check image is uploded or not
                if($uplode==false){
                    $_SESSION['upload']="<div class='error'> failed to upload image</div>";
                    header('location:'.SITEURL.'company/add-category.php');


                    die();
                }
            }
            else{
                //do not uplode
                $image_name = "";
            }


            //sql quary ti insert into db
            $sql = "insert into category set
                commodity = '$commodity',
                weight = '$weight',
                quality = '$quality',
                address = '$address',
                postal_code = '$postal_code',
                contactno='$contactno',
                packed = '$packed',
                organic = '$organic',
                image = '$image_name'
            ";
            $res = mysqli_query($conn, $sql);


            if($res == true){
                $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                header('location:'.SITEURL.'company/manage-product.php');
            }
            else{
                $_SESSION['add'] = "<div class='error'>Failed to Add Successfully.</div>";
                header('location:'.SITEURL.'company/add-category.php');
            }
            //check
        }
    ?>






    </div>
</div>




<!-- footer.php added -->
<!-- <?php    include('partials/menu.php'); ?> -->


