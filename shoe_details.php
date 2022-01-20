<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Shoes Fever</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!--Please remember to change style sheet for each page-->
        <link rel= "stylesheet" href="styles/shoe_details.css" type="text/css"/> 
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
                    <li><a href="#">Contact Us</a></li> <!--This contact us page is stated here just for show. If we have time we can create a simple form that doesn't work-->
                </ul>
                </nav>
        </header>

        <!--------------Product Details -------------->
        <div class="small-cointainer shoe_details">
            <div class="row">
                <div class="col-2">
                    <img src="source/shoe_gallery/shoe_1.jfif" >
                </div>
                <div class="col-2">
                    <?php 
                    /*----------------------Test Case-----------------------------------*/
                    $productno = date("d-m-y")."-abc";
                    $productname = " Yellow Nike Running Shoes";
                    $productprice = 35.00;
                    $productshoetype = " Running Shoes";
                    $productcolor = " Yellow";
                    $productsize = " US 9.5";
                    $productcondition = " Worn";
                    $productbrand = " Nike";
                    $productdesc = " This shoe has been heavily worn for 3 years";
                    

                    /*Code to Read from Txt.File will be here*/
                    /*Add product variable here*/ 
                    echo "<h2>Product Name:". $productname ."</h2><br>";
                    echo "<h4>Product Number:". $productno ."</h4><br>";
                    echo "<h4>Shoe Type:". $productshoetype ."</h4><br>";
                    echo "<h4>Color:". $productcolor ."</h4><br>";
                    echo "<h4>Size (US):". $productsize ."</h4><br>";
                    echo "<h4>Condition:". $productcondition ."</h4><br>";
                    echo "<h4>Description:". $productdesc ."</h4><br>";
                    echo "<h4>Price (S$):". "$". $productprice ."</h4><br>";
                    ?>
                    <a href="#" class ="btn">Express Interest</a>
                </div>
            </div>
        </div>

        <!----------------footer---------------------->
        <div class="fixed__footer">
            <!-- PHP function for date is used here -->
            <?php 
            echo "Date:". date(" d-m-y")."<br>";
            ?>
        </div>
    </body>
</html>