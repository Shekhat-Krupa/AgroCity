<?php
 
    include('config/constant.php'); 
    //include('login-check.php');

?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login From Here</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login">
        <h1>Who are you?</h1>
        <form>
            <a href="company/add-farmer.php"><button type="button" class="login-btn">Farmer</button></a>
            <a href="company/add-company.php"><button type="button" class="login-btn">Company</button></a>
        </form>
    </div>
</body>
</html>