
<?php include('partitals/menu.php'); ?>
        <div class="main-content">
            <div class="wrapper">
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset ($_SESSION['login']);
                }
            ?>
                <h1>DASHBOARD</h1>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Product
                </div>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Product
                </div>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Product
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </body>
</html>