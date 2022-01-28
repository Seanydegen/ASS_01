<!--
@file		shoe_details.php
@author		Sean Yeo Degen (SDY459@uowmail.edu.au)
@course		ISIT307
@group 	    F21-B
@assignment	1
@date 		22/1/2021
@brief	    Shoe_details.php page is to display the information of the shoes selected by
            the user from the shoe_list.php page.
            Description: Multi-Dimensional Array is used to access the different shoe listings 
            into a nested array where the key is the"productNo". Afterwhich, each variable 
            of the product is tagged to the index of the array. Where it will be printed out
            accordingly.

            A while loop is used to count the number of entries in the ExpInterest.txt file.
            Where the count will be printed out everytime a user has submitted a form to
            express interest in the particular shoe.
-->

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
                    <li><a href="shoe_list.php">Home</a></li>
                    <li><a href="shoe_list.php">View Listings</a></li>
                    <li><a href="create_listing.php">Sell Your Shoes</a></li>
                    <li><a href="#">Contact Us</a></li> <!--This contact us page is stated here just for show. If we have time we can create a simple form that doesn't work-->
                </ul>
                </nav>
        </header>

        <!--------------Product Details -------------->
        <div class="small-cointainer shoe_details">
            <div class="row">
                <section id="photoArray">
                    <div class="col-2">
                        <img src="source/shoe_gallery/shoe_1.jfif" width="400px" height="400px">
                    </div>
                    <div class="col-2">
                        <img src="source/shoe_gallery/shoe_2.jfif" width="400px" height="400px">
                    </div>
                    <div class="col-2">
                        <img src="source/shoe_gallery/shoe_3.jfif" width="400px" height="400px">
                    </div>
                    <div class="col-2">
                        <img src="source/shoe_gallery/shoe_4.jfif" width="400px" height="400px">
                    </div>
                </section>
                <section id=productdetails>
                    <div class="col-2">
                        <?php 
                        /*----------------------Test Case-----------------------------------
                        $productno = date(" d-m-y")."-abc";
                        $productname = " Yellow Nike Running Shoes";
                        $productprice = 35.00;
                        $productshoetype = " Running Shoes";
                        $productcolor = " Yellow";
                        $productsize = " US 9.5";
                        $productcondition = " Worn";
                        $productbrand = " Nike";
                        $productdesc = " This shoe has been heavily worn for 3 years";
                        $interestcount = 70;
                        */

                        /*-------------------Test Case - Array ------------------------------
                        $product = ["22-01-22-abc","Yellow Running Shoes",35.00,"Running Shoes","Yellow","US 9.5","Worn","Nike",
                        "This shoe has been heavily worn for 3 years"];
                        $productno = $product[0];
                        $productname = $product[1];
                        $productprice = $product[2];
                        $productshoetype = $product[3];
                        $productcolor = $product[4];
                        $productsize = $product[5];
                        $productcondition = $product[6];
                        $productbrand = $product[7];
                        $productdesc = $product[8];
                        */
                        /*-----------------------------------------------------------------------------------*/
                        /*Using the File Acces Functions and Array Function */

                        /*Code to Read from Txt.File will be here*/
                        //Using the File Function to Access ShoesSale.txt File line by line
                        $lines = file('data/ShoesSale.txt');

                        //Definition of Empty Array
                        $product = array();

                        foreach($lines as $line){
                            /*Deliminter for the array is '~' usibng trim to cut out whitespaces.
                            List is being used to assign variables into the array.*/
                            list($productno,$product_owner_Fname,$product_owner_Lname,$product_owner_contact,$product_owner_email,$productname,
                            $productbrand,$productcolor,$productshoetype,$productsize,$productcondition,$productprice,$productdesc) 
                            = array_map('trim',explode('~',$line));

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
                            /*Array Format:productNo - FName - LName - Contact - Email - ProdName - Brand - color - ShoeType
                            -Size - Condition - Price - Desc*/
                            $product[$productno][] = $product_owner_Fname;
                            $product[$productno][] = $product_owner_Lname;
                            $product[$productno][] = $product_owner_contact;
                            $product[$productno][] = $product_owner_email;
                            $product[$productno][] = $productname;
                            $product[$productno][] = $productbrand;
                            $product[$productno][] = $productcolor;
                            $product[$productno][] = $productshoetype;
                            $product[$productno][] = $productsize;
                            $product[$productno][] = $productcondition;
                            $product[$productno][] = $productprice;
                            $product[$productno][] = $productdesc;
                        }
                        
                        /*---------- Test Case - User Input Search Product Selection in Array--------- */
                        /*!
                        @brief  The function is required to search for the specific productNo within the 
                        ShoeSales.txt where we will be able to retrieve the entire array and print the
                        relevant information for the user to view.
                        @param  $product - The Multi-Dimenstional Array that contains all the shoe listings
                                $search_term - The value that we want to search for which is the productNo.
                        @return $matches is an array where the results of the search will be stores. This 
                                will be used to display information using the Array index
                        *//*___________________________________________________________________________*/
                        function search($product, $search_term){
                            //Empty Array for Search
                            $matches = array();
                            //Trim Search to remove whitespaces
                            $search_term = trim($search_term);
                            //Loop through each line in the array to look for a match with the User Input.
                            foreach($product as $key => $value_array){
                                if(stristr($key,$search_term)){
                                    $matches[$key] = $value_array;
                                }
                            }
                            return $matches;
                        }

                        /*Empty Array to store Searched Array*/
                        $search_details = array();
                        /*Input Data 'productnoinput' is from shoe_list.php using $_POST by the user*/
                        //Test Case
                        //$inputproductNo = "23-01-22-abc";
                        $inputproductNo = $_POST['productnoinput'];
                        $search_details = search($product,$inputproductNo);

                        /*Variables are stored with information from searched productno*/
                        $product_owner_Fname = $search_details[$inputproductNo][0];
                        $product_owner_Lname = $search_details[$inputproductNo][1];
                        $product_owner_contact = $search_details[$inputproductNo][2];
                        $product_owner_email =$search_details[$inputproductNo][3];
                        $productname = $search_details[$inputproductNo][4];
                        $productbrand = $search_details[$inputproductNo][5];
                        $productcolor = $search_details[$inputproductNo][6];
                        $productshoetype = $search_details[$inputproductNo][7];
                        $productsize = $search_details[$inputproductNo][8];
                        $productcondition = $search_details[$inputproductNo][9];
                        $productprice = $search_details[$inputproductNo][10];
                        $productdesc = $search_details[$inputproductNo][11];
                
                        //Display Variables
                        /*Add product variable here*/
                        echo "<h2>Product Name: ". $productname ."</h2><br>";
                        echo "<h4>Product Number: ". $inputproductNo ."</h4><br>";
                        echo "<h4>Brand: ". $productbrand ."</h4><br>";
                        echo "<h4>Shoe Type: ". $productshoetype ."</h4><br>";
                        echo "<h4>Color: ". $productcolor ."</h4><br>";
                        echo "<h4>Size (US): ". $productsize ."</h4><br>";
                        echo "<h4>Condition: ". $productcondition ."</h4><br>";
                        echo "<h4>Description: ". $productdesc ."</h4><br>";
                        echo "<h4>Price (S$): ". "$". $productprice ."</h4><br>";
                        /*Owner's Contact Details */
                        echo "<h4>Owner's Name: ". $product_owner_Fname." ". $product_owner_Lname ."</h4><br>";
                        echo "<h4>Owner's Contact No: ". $product_owner_contact ."</h4><br>";
                        echo "<h4>Owner's Email: ". $product_owner_email ."</h4><br>";
                        ?>

                        <a href="express_interest.php" class ="btn">Express Interest</a>*/
                        <!-- Use a While Loop Count of all Listtings in ExpressInterest.txt -->
                        <div class = "interest_count">
                            <?php
                                /*File Directory of ExpInterest.txt*/
                                $exp_int = 'data/ExpInterest.txt';
                                /*Retreival of Contents from the file.*/
                                $contents = file_get_contents($exp_int);
                                $pattern = preg_quote($inputproductNo,'/');
                                $pattern = "/^.*$pattern.*\$/m";
                                if(preg_match_all($pattern,$contents,$search_results)){

                                   /*Test Check on the number of Entries of Elements within the searched array 
                                    echo"Found Matches:\n";
                                    echo "<br>";
                                    print_r($search_results);*/
                                }
                                else{
                                    /*Error Message when there are no existing interest listing within the ExpInterest.txt file*/
                                    echo "The are current no interest. Be the first!";
                                }
                                /*Using ForEach we take the count of the number of elements within the searched Array*/
                                $linecount = 0;
                                foreach($search_results as $type){
                                    $linecount += count($type);
                                }
                                echo "<p>". $linecount ." people are interested in this product right now.</p><br>";
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!----------------footer---------------------->
        <div class="fixed__footer">
            <!-- PHP function for date is used here -->
            <?php 
            echo "Date:". date(" d-m-y")."<br>";
            ?>
            <h3>© Trademarked by Shoe's Fever</h3>
        </div>
    </body>
</html>