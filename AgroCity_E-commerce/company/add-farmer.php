<?php
 
    include('../config/constant.php'); 
    //include('login-check.php');

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
                    <li><a href="../index.php">Home</a></li>
                    <!--<li><a href="manage-company.php">Company</a></li>-->
                    <!--<li><a href="manage-product.php">Product</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>  -->
                </ul>
            </div>
        </div>
<div class="main-content">
    <div class="wrapper">
        <!--<h1>Add Your Company</h1>-->
        <br/>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];//display
                unset($_SESSION['add']);//removie after one time
            }
        ?>
        <div class="sign-up-formc">
        <form action="" method="post">
        <img src="../images/user-icon.png" alt="Avatar">
            <h1>Sign Up</h1>
            <table class="tbl">
                <tr>
                    <td><input type="text" name="username" class="input-box1" placeholder="Username"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" class="input-box1" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><input type="text" name="contactno" class="input-box1" placeholder="Contact Number"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Farmer" class="signup-btn">
                    </td>
                </tr>
                <tr>
                    <td>
                        <hr>
                        <br><br>
                        <p class="or">Or</p>
                        <p align="center">Already have Account?</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="loginf.php"><input type="button" name="button" value="Login" class="signup-btn"></a>
                    </td>
                </tr>
            </table>
        </form>
        </div>
<?php
    //check submit is clicked or not
    if(isset($_POST['submit']))
    {
        $username= $_POST['username'];
        $password= md5($_POST['password']);
        $contactno=$_POST['contactno'];

        //Query for database
        $sql = "INSERT INTO farmer SET
            username='$username',
            password='$password',
            contactno='$contactno'
        ";
        //res give query exectue or not
        //config
        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            //echo "data";
            //create session
            $_SESSION['add']= "Company Add Successfully";
            header("location:".SITEURL.'company/home-page.php');
        }
        else
        {
            //echo "no data";
            $_SESSION['add']= "Company Add Failed";
            header("location:".SITEURL.'company/add-farmer.php');
        }
    }
?>