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
        <link rel= "stylesheet" href="styles/create_listing.css" type="text/css"/> 
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

			$shoeListingsFile = "./data/ShoesSale.txt";
			if (isset($_POST['submit'])) {

					$firstName = stripslashes($_POST['fName']);
					$lastName = stripslashes($_POST['lName']);
					$contactNum = stripslashes($_POST['contactNum']);
					$email = stripslashes($_POST['email']);
					$productNo = stripslashes($_POST['productNo']);
					$listingName = stripslashes($_POST['listingName']);
					$brand = stripslashes($_POST['brand']);
					$size = stripslashes($_POST['sizeSelection']);
					$condition = stripslashes($_POST['conditionSelection']);
					$price = stripslashes($_POST['price']);
					$description = stripslashes($_POST['description']);
					$colour = stripslashes($_POST['shoeColourSelection']);
					$shoeType = stripslashes($_POST['shoeTypeSelection']);
					
					//This following code to replace all '~' with '-', as '~' will be used  
					//to seperate the different values in the text file
					$firstName = str_replace("~", "-", $firstName);
					$lastName = str_replace("~", "-", $lastName);
					$contactNum = str_replace("~", "-", $contactNum);
					$email = str_replace("~", "-", $email);
					$productNo = str_replace("~", "-", $productNo);
					$listingName = str_replace("~", "-", $listingName);
					$brand = str_replace("~", "-", $brand);
					$size = str_replace("~", "-", $size);
					$condition = str_replace("~", "-", $condition);
					$price = str_replace("~", "-", $price);
					$description = str_replace("~", "-", $description);
					$colour = str_replace("~", "-", $colour);
					$shoeType = str_replace("~", "-", $shoeType);
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
							$productNo = "";
							$listingName = "";
							$brand = "";
							$size = "";
							$condition = "";
							$price = "";
							$description = "";
							$colour = "";
							$shoeType = "";
						}
					}
			}
					else {
							//Resets values
							$firstName = "";
							$lastName = "";
							$contactNum = "";
							$email = "";
							$productNo = "";
							$listingName = "";
							$brand = "";
							$size = "";
							$condition = "";
							$price = "";
							$description = "";
							$colour = "";
							$shoeType = "";
					}
			?>
		
		
		<div class="listingInfo">
			<form name="createListing" action="create_listing.php" method="POST">
		<header class="head">
			<p class="piAndsi"> Personal Information </p>
		</header>
			<p>First Name: <input type="text" name="fName" required value="<?php echo $firstName;?>" /> </p>
			<p>Last Name: <input type="text" name="lName" required value="<?php echo $lastName; ?>" /> </p>
			<p>Contact Number: <input type="text" name="contactNum" placeholder="XXXX XXXX" pattern="[6,8,9]{1}[0-9]{7}" title="Please enter a valid 8 digit number" required value="<?php echo $contactNum; ?>" /> </p>
			<p>Email: <input type="email" name="email" placeholder="example@example.com" required value="<?php echo $email; ?>" /> </p>
		<header class="head">
			<p class="piAndsi"> Shoe Information </p>
		</header>
			<p>Product No: <input type="text" name="productNo" placeholder="3 Letters (e.g Abc)" pattern="[a-z,A-Z]{3}" title="Please enter 3 letters" required value="<?php echo $productNo; ?>" /> </p>
			<p>Lisiting Name: <input type="text" name="listingName" required value="<?php echo $listingName; ?>" /> </p>
			<p>Brand: <input type="text" name="brand" required value="<?php echo $brand; ?>" /> </p>
			
		<p>Colour:
		<select name="shoeColourSelection" required oninvalid="this.setCustomValidity('Please select an option')" oninput="setCustomValidity('')" >
			<option option selected="true" disabled="disabled" value="">Select</option>
			<option value="Black">Black</option>
			<option value="White">White</option>
			<option value="Red">Red</option>
			<option value="Blue">Blue</option>
			<option value="Green">Green</option>
			<option value="Yellow">Yellow</option>
			<option value="Others">Others</option>
		</select>
		</p>
			
		<p>Shoe Type:
		<select name="shoeTypeSelection" required oninvalid="this.setCustomValidity('Please select an option')" oninput="setCustomValidity('')" >
			<option option selected="true" disabled="disabled" value="">Select</option>
			<option value="Sports">Sports</option>
			<option value="Hiking">Hiking</option>
			<option value="Casual">Casual</option>
			<option value="Boots">Boots</option>
			<option value="Others">Others</option>
		</select>
		</p>
		
		<p>Size:
		<select name="sizeSelection" required oninvalid="this.setCustomValidity('Please select an option')" oninput="setCustomValidity('')" >
			<option option selected="true" disabled="disabled" value="">Select</option>
			<option value="US6">US 6</option>
			<option value="US7">US 7</option>
			<option value="US8">US 8</option>
			<option value="US9">US 9</option>
			<option value="US10">US 10</option>
			<option value="US11">US 11</option>
			<option value="US12">US 12</option>
			<option value="US13">US 13</option>
			<option value="US14">US 14</option>
			<option value="US15">US 15</option>
		</select>
		</p>
		
		<p>Condition:
		<select name="conditionSelection" required oninvalid="this.setCustomValidity('Please select an option')" oninput="setCustomValidity('')" >
			<option option selected="true" disabled="disabled" value="">Select</option>
			<option value="Brand New">Brand New</option>
			<option value="Almost New">Almost New</option>
			<option value="Used">Used</option>
			<option value="Well Used">Well Used</option>
		</select>
		</p>
		
			<p>Price: $<input type="int" name="price" pattern="[0-9]*" title="Please enter a number" required value="<?php echo $price; ?>" /> </p>
				<label for="description">Description: </label>
				<textarea id="description" name="description" required rows="4" cols="50"><?php echo $description;?></textarea><br><br>
				
				<!--- Buttons down below --->
					<input type="reset" value="Reset" />
					<input type="submit" name="submit" value="Create Listing" /> <br>
					<p class="bottomMessage"> <?php echo $errorMessage; ?></p>
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