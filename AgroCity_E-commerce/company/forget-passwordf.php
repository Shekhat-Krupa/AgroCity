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
            if(isset($_SESSION['forget'])){
                echo $_SESSION['forget'];
                unset($_SESSION['forget']);
            }
        ?>
        
        <form action="" method="post">
            <table class="tbl">
                <tr>
                    <td><input type="username" name="username" class="input-box1" placeholder="Username"></td>
                </tr>
                <!--tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Change Password" class="signup-btn">
                    </td>
                </tr>-->
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
        //process for login form
        //1.get from login from
        $username = $_POST['username'];
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);
        //$passwors = md5($_POST['password']);


        //2.check to check user and passwors exist or not
        $sql = "SELECT * FROM farmer WHERE username='$username'";
        /*AND password='$passwors'";*/
        //3.execute the query
        $res = mysqli_query($conn, $sql);


        //4. count rows to check whether the user exist or not
        $count =mysqli_num_rows($res);

        if($count==1)
        {
                //echo "user found";
            if($new_password==$confirm_password)
            {
                    //echo "password match";
                        $sql2="UPDATE farmer SET 
                        password='$new_password'
                        WHERE username='$username'
                        ";

                        $res2=mysqli_query($conn,$sql2);

                        if($res2==true)
                        {
                            $_SESSION['change-pwd']="<div class='success'>Password Changed Successfully!!.</div>";
                            header("location:".SITEURL.'company/loginf.php');
                        }
                        else
                        {
                            $_SESSION['change-pwd']="<div class='error'>Failed to Password Change!!</div>";
                            header("location:".SITEURL.'company/forget-passwordf.php');
                        }
            }
        }
        else{
            //user not exist and logged in failed
            $_SESSION['forget'] = "<div class='error text-center'>Username  is not correct!!</div>";
            //redirect to home page
            header('Location:'.SITEURL.'company/forget-passwordf.php');
        }
    }
?>