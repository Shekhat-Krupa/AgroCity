<?php
    //include('partitals/menu.php');
    include('../config/constant.php');
    //include('partitals/login-check.php');


?>
<?php
    //echo "delete Product";
    if(isset($_GET['id']) && isset($_GET['image']))
    {
        //Process to delete product

        //get id and image name
        $id=$_GET['id'];
        $image=$_GET['image'];

        //remove image if availble
        if($image!="")
        {
            //if image into the folder then need to delte it
            //delete image from folder
            $path="../images/category/".$image;
            $remove=unlink($path);
            
            //check image is delete or not
            if($remove==false)
            {
                $_SESSION['upload']="<div class='error'>Failed to remove image from folder</div>";
                header('location:'.SITEURL.'company/manage-product.php');
                die();
            }
        }
        //delete product from database
        $sql="DELETE from category where id=$id";

        $res=mysqli_query($conn,$sql);

        if($res==true)
        {
            $_SESSION['delete']="<div class='success'>Product Deleted Successfully!</div>";
            header('location:'.SITEURL.'company/manage-product.php');
        }
        else
        {
            $_SESSION['delete']="<div class='error'>Product Not Deleted!</div>";
            header('location:'.SITEURL.'company/manage-product.php');
        }

        //redirect to manageproduct.php page

    }
    else
    {
        //redirect to manage product
        $_SESSION['unauthorized']="<div class='error'>Unauthorized Access</div>";
        header('location:'.SITEURL.'company/manage-prduct.php');
    }
?>