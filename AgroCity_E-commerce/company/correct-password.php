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
                </ul>
            </div>
        </div>
        <div class="main-content">
    <div class="wrapper">
        <div class="sign-up-formc">
        <h1>Change Password</h1>
        <?php
            if(isset($_GET['user']))
            {
                $id=$_GET['user'];
            }
        ?>
        
        <form action="" method="post">
            <table class="tbl">
                <tr>
                    <td><input type="password" name="new_password" class="input-box1" placeholder="New Password"></td>
                </tr>
                <tr>
                    <td><input type="password" name="confirm_password" class="input-box1" placeholder="Confirm Password"></td>
                </tr>
                    <td colspan="2">
                        <!--<input type="hidden" name="username" value="<?php echo $username?>">-->
                        <input type="submit" name="submit" value="Change Password" class="signup-btn">
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
</div>
<?php

    if(isset($_POST['submit']))
    {
        $username=$_GET['username'];
        //$current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);

        //check current password is exists or not
        // $sql="SELECT * FROM company WHERE username='$username'";// AND password='$current_password'";

        //$res=mysqli_query($conn, $sql);

        if(isset($_SESSION['forget']))
        {
            //$count=mysqli_num_rows($res);

            //if($count==1)
            //{
                //echo "user found";
                if($new_password==$confirm_password)
                {
                    //echo "password match";
                    $sql2="UPDATE company SET 
                    password='$new_password'
                    WHERE username='$username'
                    ";

                    $res2=mysqli_query($conn,$sql2);

                    if($res2==true)
                    {
                        $_SESSION['change-pwd']="<div class='success'>Password Changed Successfully!!.</div>";
                        header("location:".SITEURL.'company/login.php');
                    }
                    else
                    {
                        $_SESSION['change-pwd']="<div class='error'>Failed to Password Change!!</div>";
                        header("location:".SITEURL.'company/forget-password.php');
                    }
                }
                /*else
                {
                    $_SESSION['pwd-not-match']="<div class='error'>Password Not Match.</div>";
                    header("location:".SITEURL.'company/manage-company.php');
                }*/
            //}
            
        }
        else
        {
            $_SESSION['user-not-found']="<div class='error'>User Not Found.</div>";
            header("location:".SITEURL.'company/forget-password.php');
        }
    }

?>