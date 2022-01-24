<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Shoes Fever</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"><!--Please remember to change style sheet for each page-->
        <link rel= "stylesheet" href="./styles/shoe_list.css" type="text/css"/> 
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
        <div class="list_table">
        <?php
            /* original test data
            $listCount = 1;
            $productno = date(" d-m-y")."-abc";
            $productname = " Yellow Nike Running Shoes";
            $productshoetype = " Running Shoes";
            $productbrand = " Nike";
            */

            //Access ShoesSale.txt File
            $lines = file('./data/ShoesSale.txt');

            //Definition of Empty Array
            $product = array();

            foreach($lines as $line){
                //Deliminter for the array is ',' usibng trim to cut out whitespaces.
                list($productno,$productname,$productprice,$productshoetype,
                $productcolor,$productsize,$productcondition,$productbrand,$productdesc) 
                = array_map('trim',explode(',',$line));

                //Check if array key exist
                if(!array_key_exists($productno,$product))
                {
                    //ProductNo will be the Array Key for the nested array within the Product Array.
                    $product[$productno] = array();
                }

                //Check if productNo is already in the array.
                if(in_array($productno,$product[$productno])){
                    continue;
                }

                //This is where we append the nested array elements.
                $product[$productno][] = $productname;
                $product[$productno][] = $productshoetype;
                $product[$productno][] = $productbrand;
            }
            
            /*Check to see the structure of the array.*/
            //print_r($product);

            /* original shoe list display
            echo "<h2>$listCount. " . "$productno, " . "$productbrand, " . 
                 "$productshoetype, " . "$productname</h2>";
            */

            $productcounter = 1;

            echo "<table><tr><th>No</th><th>Product Number</th><th>Brand</th><th>Type</th><th>Name</th></tr>";
            foreach($product as $productno => $productname) {
                echo "<tr><td>$productcounter</td>" . 
                     "<td>$productno</td>" . 
                     "<td>$productname[2]</td>" . 
                     "<td>$productname[1]</td>" . 
                     "<td>$productname[0]</td></tr>";

                $productcounter++;
            }
            echo "</table>";
        ?>
        </div>

        <!---------------- Enter Product Number ----------->
        <div class="product_number_input">
        <form name="productnodetails" action="process_shoe_list.php" method="post">
        <p>Enter product number for more details: <input type="text" name="productnoinput" /></p>
        <input type="submit" name="Submit" value="Submit product no">
        </form>
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