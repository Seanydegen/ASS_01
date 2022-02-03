<!--
@file		index.php
@author		Sean Yeo Degen (SDY459@uowmail.edu.au)
@course		ISIT307
@group 	    G2 - T27
@assignment	1
@date 		30/1/2021
@brief	    index.php is the landing page where users will first arrive in the website. There will be 2 buttons provided for the user
            to decide whether they would want to view the listings of the shoe or choose to sell a pair of their shoes.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Shoes Fever</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"><!--Please remember to change style sheet for each page-->
        <link rel= "stylesheet" href="styles/index.css" type="text/css"/> 
    </head>
    <body>
        <header>
            <img class="logo" src ="source/images/nav_logo.png" alt="logo">
                <!------------Nav Bar-------------------->
                <nav>
                <ul class ="nav__links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shoe_list.php">View Listings</a></li>
                    <li><a href="create_listing.php">Sell Your Shoes</a></li>
                    <li><a href="#">Contact Us</a></li> <!--This contact us page is stated here just for show. If we have time we can create a simple form that doesn't work-->
                </ul>
                </nav>
        </header>
            <div class= "photo-contain">
                <img class="photo" src ="source/slider/skate.jpg">
            </div>
        <!-- Navigation Button-->
        <a href="shoe_list.php" class ="btn">View Our Shoes</a>
        <a href="create_listing.php" class ="btn">Create a New Listing</a>

        <!----------------footer---------------------->
        <div class="fixed__footer">
            <!-- PHP function for date is used here -->
            <?php 
            echo "Date:". date(" d-m-y")."<br>"
            ?>
        </div>
    </body>
</html>