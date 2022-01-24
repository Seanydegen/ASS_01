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

            // Validate input product number in shoe_list.php
            if ($inputproductno == "21-01-22-abc") {
                include 'shoe_details.php';
            }
            else {
                include 'shoe_list.php';
                echo "Invalid product number";
            }
        ?>
    </body>
</html>