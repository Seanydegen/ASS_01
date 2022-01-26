<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Shoes Fever</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"><!--Please remember to change style sheet for each page-->
        <link rel= "stylesheet" href="./styles/shoe_details.css" type="text/css"/> 
    </head>
    <body>
        <!----------------process shoe list page------>
        <?php
            $inputproductno = $_POST['productnoinput'];

            // testing retrieving of input
            //echo "the product number entered is $inputproductno";

            // Access ShoesSale.txt File
            $lines = file('./data/ShoesSale.txt');

            // Definition of Empty Array
            $product = array();

            foreach($lines as $line){
                //Deliminter for the array is '~' usibng trim to cut out whitespaces.
                list($productno,$product_owner_name,$product_owner_contact,$product_owner_email,
                $productname,$productbrand,$productsize,$productcondition,$productshoetype, $productcolor, 
                $productprice, $productdesc) 
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
            }

            $inShoesSale = FALSE;

            // Check if $inputproductno matches data in ShoesSale.txt
            foreach($product as $productno => $productname) {
                if($inputproductno == $productno) {
                    $inShoesSale = TRUE;
                }
            }

            // Validate input product number in shoe_list.php using regular expression
            if ((preg_match("/^\d{2}-\d{2}-\d{2}-.{3}$/", $inputproductno) == 1) && ($inShoesSale == TRUE)) {
                include 'shoe_details.php';
            }
            else {
                include 'shoe_list.php';
                echo "Invalid product number";
            }
        ?>
    </body>
</html>