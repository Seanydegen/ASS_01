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

			//ShoesSale to check if product number exists
			$shoeListingsFile = "./data/ShoesSale.txt";
			//ExpInterest to put the data in
			$expressInterest = "./data/ExpInterest.txt";
			
			if (isset($_POST['submit'])) {

					$name = stripslashes($_POST['name']);
					$contactNum = stripslashes($_POST['contactNum']);
					$email = stripslashes($_POST['email']);
					$productNum = stripslashes($_POST['productNum']);
					$offer = stripslashes($_POST['offer']);

					
					//This following code to replace all '~' with '-', as '~' will be used  
					//to seperate the different values in the text file
					$name = str_replace("~", "-", $name);
					$contactNum = str_replace("~", "-", $contactNum);
					$email = str_replace("~", "-", $email);
					$productNum = str_replace("~", "-", $productNum);
					$offer = str_replace("~", "-", $offer);

					$ExistingProductNum = array();	
						
					//Code below checks if there is a listing with the same product number
					//Finds the 1st text as it is where the product number is saved
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
					if (in_array($productNum, $ExistingProductNum) == false)
					{
						$errorMessage = "Product number does not exist please input another";
						$productNum = "";

					}
					
					else
					{
						$expressInfo = "$productNum~$name~$contactNum~$email~$offer\n";
						$expressInterest = fopen($expressInterest, "ab");// opens file for writing only and places the pointer at the end
						if ($expressInterest === FALSE)
						{
							$errorMessage = "There was an error saving your listing";
						}
						
						else {
							// Writes into ExpInterest File, the expressInfo
							fwrite ($expressInterest, $expressInfo);
							fclose($expressInterest);
							$errorMessage = "Sucess!";
							
							//Resets values
							$name = "";
							$contactNum = "";
							$email = "";
							$productNum = "";
							$offer = "";

						}
					}
			}

			?>
		
			<div class="expressInterest">
			
				<h1> Express Interest </h1>
				<form name="expressInterest" action="express_interest.php" method="POST">
					<p>Name: <input type="text" name="name" required /></p>
					<p>Contact Number: <input type="text" name="contactNum" placeholder="XXXX XXXX" pattern="[6,8,9]{1}[0-9]{7}" title="Please enter a valid 8 digit number" required /></p>
					<p>Email: <input type="email" name="email" required placeholder="example@example.com" /></p>
					<p>Product Number: <input type="text" name="productNum" placeholder="Etc. 01-10-11-abc" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[a-z,A-Z]{3}" title="Please enter a valid Product Number" required /></p>
					<p>Offer: <input type="number" name="offer" required /></p>

					<input type="reset" value="Reset" />
					<input type="submit" name="submit" value="Send Form" />
					
					<p><?php echo $errorMessage ?></p>
				</form>
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


