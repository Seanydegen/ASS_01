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
					$ExistingProductNum = array();
				
					//Code below checks if there is a listing with the same product number
					//Finds the 4th text as it is where the product number is saved
					if (file_exists($shoeListingsFile) && filesize($shoeListingsFile) > 0)
					{
						$MessageArray = file($shoeListingsFile);
						$count = count($MessageArray);
						for ($i = 0; $i < $count; ++$i) {
						$CurrMsg = explode("~", $MessageArray[$i]);
						$ExistingProductNum[] = $CurrMsg[4];
						}
					}
					
					//If they product numbers match, do not save and empty the productNo variable
					if (in_array($productNo, $ExistingProductNum))
					{
						echo "<p> The product number you have entered already exists!<br />\n";
						echo "Please enter another product number</p>";
						$productNo = "";
					}
					
					else
					{
						$listingInfo = "$productNo~$firstName~$lastName~$contactNum~$email~$listingName~$brand~$size~$condition~$price~$description\n";
						$shoeSalesFile = fopen($shoeListingsFile, "ab");// opens file for writing only and places the pointer at the end
						if ($shoeSalesFile === FALSE)
						{
							echo "There was an error saving your listing\n";
						}
						
						else {
							// Writes into shoeSalesFile, the listingInfo
							fwrite ($shoeSalesFile, $listingInfo);
							fclose($shoeSalesFile);
							echo "Listing Created!\n";
							
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
					}
			?>
		
		
		<div class="listingInfo">
			<form name="createListing" action="create_listing.php" method="POST">
		<header class="head">
			<p class="piAndsi"> Personal Information </p>
		</header>
			<p>First Name: <input type="text" name="fName" value="<?php echo $firstName; ?>" /></p>
			<p>Last Name: <input type="text" name="lName" value="<?php echo $lastName; ?>" /></p>
			<p>Contact Number: <input type="text" name="contactNum" value="<?php echo $contactNum; ?>" /></p>
			<p>Email: <input type="email" name="email" value="<?php echo $email; ?>" /></p>
		<header class="head">
			<p class="piAndsi"> Shoe Information </p>
		</header>
			<p>Product No: <input type="text" name="productNo" value="<?php echo $productNo; ?>" /></p>
			<p>Lisiting Name: <input type="text" name="listingName" value="<?php echo $listingName; ?>" /></p>
			<p>Brand: <input type="text" name="brand" value="<?php echo $brand; ?>" /></p>
		
		<p>Size:
		<select name="sizeSelection">
			<option value="Select">Select</option>
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
		<select name="conditionSelection">
			<option value="Select">Select</option>
			<option value="Brand New">Brand New</option>
			<option value="Almost New">Almost New</option>
			<option value="Used">Used</option>
			<option value="Well Used">Well Used</option>
		</select>
		</p>
		
			<p>Price: <input type="int" name="price" value="<?php echo $price; ?>" /></p>
				<label for="description">Description: </label>
				<textarea id="description" name="description" rows="4" cols="50"> 
				<?php echo $description; ?> 
				</textarea>
				
				<!--- Buttons down below --->
					<input type="reset" value="Reset" />
					<input type="submit" name="submit" value="Send Form"/>
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