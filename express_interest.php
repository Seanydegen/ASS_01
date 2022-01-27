<!--Please note that this is just a template for the Navigation Bar and Logo. Please make another copy of this file and rename it. 
Then, add the following HTML & PHP codes wherever you see fit. :) -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Shoes Fever</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"><!--Please remember to change style sheet for each page-->
        <link rel= "stylesheet" href="styles/express_interest.css" type="text/css"/> 
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
        
        <!-- This is where the main content for your webpages are going to be-->
		<!-- This is where the main content for your webpages are going to be-->
		<!-- This is where the main content for your webpages are going to be-->
		<!-- This is where the main content for your webpages are going to be-->
		<!-- This is where the main content for your webpages are going to be-->
		<!-- This is where the main content for your webpages are going to be-->
		<!-- This is where the main content for your webpages are going to be-->
		

		<body>
		
					<?php
			
			$errorMessage = null;

			$shoeListingsFile = "./data/ExpInterest.txt";
			if (isset($_POST['submit'])) {

					$firstName = stripslashes($_POST['fName']);
					$lastName = stripslashes($_POST['lName']);
					$contactNum = stripslashes($_POST['contactNum']);
					$email = stripslashes($_POST['email']);

					
					//This following code to replace all '~' with '-', as '~' will be used  
					//to seperate the different values in the text file
					$firstName = str_replace("~", "-", $firstName);
					$lastName = str_replace("~", "-", $lastName);
					$contactNum = str_replace("~", "-", $contactNum);
					$email = str_replace("~", "-", $email);

					$ExistingProductNum = array();	
					
					//Adds current date to productno format to match 'dd-mm-yy-ccc'
					$productNo = date("d-m-y-") . (string)$productNo;
				
					//Code below checks if there is a listing with the same product number
					//Finds the 4th text as it is where the product number is saved
					if (file_exists($shoeListingsFile) && filesize($shoeListingsFile) > 0)
					{
						$MessageArray = file($shoeListingsFile);
						$count = count($MessageArray);
						for ($i = 0; $i < $count; ++$i) {
						$CurrMsg = explode("~", $MessageArray[$i]);
						$ExistingProductNum[] = $CurrMsg[0];
						}
					}
					
					//If they product numbers match, do not save and empty the productNo variable
					if (in_array($productNo, $ExistingProductNum))
					{
						$errorMessage = "Product number already exists, please choose another.";
						$productNo = "";

					}
					
					else
					{
						$listingInfo = "$productNo~$firstName~$lastName~$contactNum~$email~$listingName~$brand~$colour~$shoeType~$size~$condition~$price~$description\n";
						$shoeSalesFile = fopen($shoeListingsFile, "ab");// opens file for writing only and places the pointer at the end
						if ($shoeSalesFile === FALSE)
						{
							$errorMessage = "There was an error saving your listing";
						}
						
						else {
							// Writes into shoeSalesFile, the listingInfo
							fwrite ($shoeSalesFile, $listingInfo);
							fclose($shoeSalesFile);
							$errorMessage = "Sucess!";
							
							//Resets values
							$firstName = "";
							$lastName = "";
							$contactNum = "";
							$email = "";

						}
					}
			}
					else {
							//Resets values
							$firstName = "";
							$lastName = "";
							$contactNum = "";
							$email = "";

					}
			?>
		
			<div class="expressInterest">
			
				<h1> Express Interest </h1>
				<form>
					<p>Name: <input type="text" name="name" /></p>
					<p>Contact Number: <input type="text" name="contactNum" /></p>
					<p>Email: <input type="email" name="email" /></p>
					<p>Product Number: <input type="text" name="productNum" /></p>
					<p>Offer: <input type="number" name="offer"  /></p>

				</form>
				<p><input type="reset" value="Reset" />&nbsp;&nbsp;
				<input type="submit" name="Submit" value="Send Form" />
			</div>
		</body>
		
        <!----------------footer---------------------->
        <div class="fixed__footer">
            <!-- PHP function for date is used here -->
            <?php 
            echo "Date:". date(" d-m-y")."<br>"
            ?>
        </div>
    </body>
</html>


