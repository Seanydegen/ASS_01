<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Shoes Fever</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"><!--Please remember to change style sheet for each page-->
        <link rel= "stylesheet" href="styles/shoes_list.css" type="text/css"/> 
    </head>
    <body>
        <header>
            <img class="logo" src ="source/images/nav_logo.png" alt="logo">
                <!------------Nav Bar-------------------->
                <nav>
                <ul class ="nav__links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">View Listings</a></li>
                    <li><a href="#">Sell Your Shoes</a></li>
                    <li><a href="#">Contact Us</a></li> 
                </ul>
                </nav>
        </header>

        <!---------------- Product listing ----------->
        <div class="small-cointainer shoes_list">
            <section id=productlisting>
                <div class="listing">
                    <?php
                        $listCount = 1;
                        $productno = date(" d-m-y")."-abc";
                        $productname = " Yellow Nike Running Shoes";
                        $productshoetype = " Running Shoes";
                        $productbrand = " Nike";

                        echo "<h1>$listCount. " . "$productno, " . "$productbrand, " . 
                             "$productshoetype, " . "$productname</h1>";
                    ?>
                </div>
            </section>
        </div>

        <!----------------footer---------------------->
        <div class="fixed__footer">
            <!-- PHP function for date is used here -->
            <?php 
            echo "Date:". date(" d-m-y")."<br>"
            ?>
            <h3>© Trademarked by Shoe's Fever</h3>
        </div>
    </body>
</html>