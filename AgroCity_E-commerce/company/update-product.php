<?php
    include('partitals/menu.php');
?>
<?php
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        //query for get selected food
        /*$sql1="SELECT *from category WHERE id=$id";

        $res=mysqli_query($conn,$sql1);

        //get value based on query execution
        $row=mysqli_fetch_assoc($res);

        $commodity = $row['commodity'];
        $weight = $row['weight'];
        $quality = $row['quality'];
        $address = $row['address'];
        $postal_code = $row['postal_code'];
        $contactno = $row['contactno'];
        $packed = $row['packed'];
        $organic = $row['organic'];
        $image = $row['image'];*/
    }
    else
    {
        header('location:'.SITEURL.'company/manage-product.php');
    }
?>
<div class="main-content">
    <div class="wrapper">
    <div class="add-formc">
        <h1>Update Crops</h1>
        <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>
                    Commodity
                </td>
                <td><input type="text" name="commodity" class="input-box2" placeholder="Ex. Rice Groundnut etc." value="<?php //echo $commodity?>"></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><input type="text" name="weight" class="input-box2" placeholder="in kilogram" value="<?php //echo $weight?>"></td>
            </tr>
            <tr>
                <td>Quality</td>
                <td><input type="text" name="quality" class="input-box2" placeholder="Ex. Good or Average .." value="<?php //echo $quality?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" class="input-box2" value="<?php //echo $address?>" placeholder="Address"></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><input type="text" name="postal_code" class="input-box2" value="<?php //echo $postal_code ?>" placeholder="enter 6 digit"></td>
            </tr>
            <tr>
                <td>Contact No.</td>
                <td><input type="text" name="contactno" class="input-box2" placeholder="enter contact no." value="<?php //echo $contactno?>"></td>
            </tr>
            <tr>
                <td>Is it packed in Bags?</td>
                <td>
                    <input <?php //if($packed=="True"){echo "checked";}?> type="radio" name="packed" class="radio-custom" value="True">Yes
                    <input <?php //if($packed=="False"){echo "checked";}?> type="radio" name="packed" class="radio-custom" value="False">No
                </td>
            </tr>
            <tr>
                <td>Is it Organic product?</td>
                <td>
                    <input <?php //if($organic=="True"){echo "checked";}?> type="radio" name="organic" value="True">Yes
                    <input <?php //if($organic=="False"){echo "checked";}?> type="radio" name="organic" value="False">No


                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td> <input type="file" name= "image"></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <td colspan="2"><input type="submit" name="submit" class="signup-btn1" value="Update Crops" class="btn-secondary"></td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['submit']))
        {
            //get details
            $id=$_GET['id'];
            $commodity = $_POST['commodity'];
            $weight = $_POST['weight'];
            $quality = $_POST['quality'];
            $address = $_POST['address'];
            $postal_code = $_POST['postal_code'];
            $contactno = $_POST['contactno'];
            $packed = $_POST['packed'];
            $organic = $_POST['organic'];
            $image = $_POST['image'];

            //upload image if selected
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
                    header('location:'.SITEURL.'company/update-product.php');

                    die();
                }
                //remove if image is avialbe
                if($image!="")
                {
                    $remove_path="../images/category".$image;

                    $remove=unlink($remove_path);

                    if($remove==false)
                    {
                        $_SESSION['remove-failed']="<div class='error'>Fail to remove current image.</div>";
                        header('location:'.SITEURL.'company/manage-product.php');
                        die();
                    }
                }
            }
            else{
                //do not uplode
                $image_name = $image;
            }

            //update database
            $sql = "UPDATE category SET
                commodity = '$commodity',
                weight = '$weight',
                quality = '$quality',
                address = '$address',
                postal_code = '$postal_code',
                contactno='$contactno',
                packed = '$packed',
                organic = '$organic',
                image = '$image_name'
                WHERE id=$id
            ";

            $res1=mysqli_query($conn,$sql);

            if($res1==true)
            {
                $_SESSION['update']="<div class='success'>Crops Update Successfully.</div>";
                header('location:'.SITEURL.'company/manage-product.php');
            }
            else{
                $_SESSION['update'] = "<div class='error'>Failed to Update Crops.</div>";
                header('location:'.SITEURL.'company/update-product.php');
            }
        }
    ?>
    </div>