<?php
    include('../config/constant.php'); 
    //include('login-check.php');
    //include('partitals/login-check.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroCity Home page</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/1babb89c8e.js" crossorigin="anonymous"></script>
</head>
<body>
    <!---------------------- header ------------------------>
    <div id="header">
        <div class="container">
            <nav>
                <!--<a href="index.html"><i class="fa-solid fa-house"></i></a>-->
                <img src="../images/Agrocity.png">
                <ul id="sidemenu">
                    <li><a href="#">Home</a></li>
                    <li><a href="../product.php">Product</a></li>
                    <li><a href="manage-product.php">Manage-Product</a></li>
                    <!--<li><a href="#">Team</a></li>-->
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    
                    <!--<li><?php echo $_SESSION['login']; ?><li>-->
                </ul>
            </nav>
            <?php
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];//display
                            unset($_SESSION['add']);//removie after one time
                        }
                    ?>
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
                    <img src="../images/aboutus.jpg">
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
                        <input type="text" name="Name" placeholder="Your Name" required>
                        <input type="email" name="Email" placeholder="Your Email" required>
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