<?php
 
    include('config/constant.php'); 
    //include('login-check.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroCity Home page</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/1babb89c8e.js" crossorigin="anonymous"></script>
</head>
<body>
    <!---------------------- header ------------------------>
    <div id="header">
        <div class="container">
            <nav>
                <!--<a href="index.html"><i class="fa-solid fa-house"></i></a>-->
                <img src="images/Agrocity.png">
                <ul id="sidemenu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="askingpage.php">Product</a></li>
                    <!--<li><a href="#">Team</a></li>-->
                    <li><a href="#contact">Contact</a></li>
                    <?php
                        if(isset($_SESSION['login']))
                        {
                            ?>
                                
                                <li><?php echo $_SESSION['user']; ?><li>
                                <li><a href="company/logout.php">Logout</a></li>
                            <?php
                            unset ($_SESSION['user']);
                        }
                        else{
                            ?>
                            <li><a href="askingpage.php">Login</a></li>
                             <?php
                        }
                    ?>
                </ul>
            </nav>
            <div class="header-text">
                <h1>Agro<span>City</span></h1>
                <p>Intermediator for seller and buyer of crops.</p>
            </div>
        </div>
    </div>
    <!-- --------------------- About ---------------------- -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/aboutus.jpg">
                </div>
                <div class="about-col-2">
                    <h1 class="sub-title">About <span>Us</span></h1>
                    <p>AgroCity does not buy or sell crops and is not a broker. Instead, we offer you the ability to effortlessly market your crop via our platform.<br></p>
                </div>
            </div>
        </div>
    </div>
    <!-- contact -->
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="contact-left">
                    <h1 class="sub-title">Contact <span>Us</span></h1>
                    <p><i class="fas fa-paper-plane"></i>21ce118@charusat.edu.in</p>
                    <p><i class="fas fa-paper-plane"></i>21ce133@charusat.edu.in</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter-square"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/krupa-shekhat-69453b22b?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BbQbVX2hjTumMgJqYdRSkdQ%3D%3D"><i class="fab fa-linkedin"></i></a> 
                    </div>
                    <!-- <a href="doc/resume.pdf" download class="btn btn2">Download Resume</a> -->
                </div>
                <div class="contact-right">
                    <form>
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        
                        <textarea name="Massage" rows="5" placeholder="Your Massage"></textarea>
                        <button type="submit" class="btn btn2">Send Massage</button>
                    </form>
                    <span id="msg"></span>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p >Copyright  &copy; 2023 <span class="span-1">Agro<span class="span2">City</span></span></p>
        </div>
    </div>
    <?php
        if(isset($_POST['submit']))
        {
            //echo "clicked";
            //get the value from category
            $name = $_POST['name'];
            $email = $_POST['email'];

            //for address
            
            //for radio
            
            // check for image
            //print_r($_FILES[]);
            //die();//break out
            


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
    <script>
        constmsg =document.getElementById("msg")
        const scriptURL = '<SCRIPT URL>'
        const form = document.forms['submit-to-google-sheet']

        form.addEventListener('submit', e => {e.preventDefault()
            fetch(scriptURL, { method: 'POST', body: new FormData(form)})
            .then(response => {
                msg.innerHTML="Massage sent successfully"
                setTimeout(function(){
                    msg.innerHTML=""
                },5000)
                form.reset()
            })
            .catch(error => console.error('Error!', error.message))
        })
    </script>
</body>
</html>