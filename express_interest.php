<!--
@file		express_interest.php
@author		Brandon Wong (kybw974@uowmail.edu.au)
@course		ISIT307
@group 	    G2 - T27
@assignment	1
@date 		26/1/2021
@brief	    express_interest is redirected from the shoe_details.php page. This is where the user fills up
			the form to express interest in the particular shoe. Information will be stored in ExpInterest.txt.
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<title>Shoes Fever</title>
				<meta name="description" content="">
					<meta name="viewport" content="width=device-width, initial-scale=1">
						<!--Please remember to change style sheet for each page-->
						<link rel="stylesheet" href="styles/express_interest.css" type="text/css"/>
					</head>
					<body>
						<header>
							<a href="index.php">
								<img class="logo" src="source/images/nav_logo.png" alt="logo"/>
								<!------------Nav Bar-------------------->
								<nav>
									<ul class="nav__links">
										<li>
											<a href="index.php">Home</a>
										</li>
										<li>
											<a href="shoe_list.php">View Listings</a>
										</li>
										<li>
											<a href="create_listing.php">Sell Your Shoes</a>
										</li>
										<li>
											<a href="#">Contact Us</a>
										</li>
										<!--This contact us page is stated here just for show. If we have time we can create a simple form that doesn't work-->
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
			
			//Declare error messages
			$nameError = $contactNumError = $emailError = $productNoError = $offerError = null;

			//ShoesSale to check if product number exists
			$shoeListingsFile = "./data/ShoesSale.txt";
			//ExpInterest to put the data in
			$expressInterest = "./data/ExpInterest.txt";
			
			if (isset($_POST['submit'])) {

					//Remove backslashes
					$name = stripslashes($_POST['name']);
					$contactNum = stripslashes($_POST['contactNum']);
					$email = stripslashes($_POST['email']);
					$productNo = stripslashes($_POST['productNo']);
					$offer = stripslashes($_POST['offer']);
					
					//Remove whitespaces
					$name = trim($_POST['name']);
					$contactNum = trim($_POST['contactNum']);
					$email = trim($_POST['email']);
					$productNo = trim($_POST['productNo']);
					$offer = trim($_POST['offer']);

					//This following code to replace all '~' with '-', as '~' will be used  
					//to seperate the different values in the text file
					$name = str_replace("~", "-", $name);
					$contactNum = str_replace("~", "-", $contactNum);
					$email = str_replace("~", "-", $email);
					$productNo = str_replace("~", "-", $productNo);
					$offer = str_replace("~", "-", $offer);

					$ExistingProductNum = array();	
					
					//Method to validate entries
					function correctValidation() : int {
					
					//Keep track of total false, the number represents the numbers of inputs failed
					$totalFalseCount = 0;
						
					if (empty($GLOBALS['name'])){
					$GLOBALS['nameError'] = "Please enter a value";
					$totalFalseCount++;
					}

					if (preg_match('/^[6,8,9]{1}[0-9]{7}$/', $GLOBALS['contactNum']) == 0){
					$GLOBALS['contactNumError'] = "Please enter a valid contact number";
					$totalFalseCount++;
					}
							
					if (filter_var($GLOBALS['email'], FILTER_VALIDATE_EMAIL) == false){
					$GLOBALS['emailError'] = "Please enter a valid email";
					$totalFalseCount++;
					}
							
					if (preg_match('/^[0-9]{2}\-[0-9]{2}\-[0-9]{2}\-[a-z,A-Z]{3}$/', $GLOBALS['productNo']) == 0){
					$GLOBALS['productNoError'] = "Please enter a valid Product Number";
					$totalFalseCount++;
					}
							
					if (is_numeric($GLOBALS['offer']) == false){
					$GLOBALS['offerError'] = "Please enter a valid offer";
					$totalFalseCount++;
					}

					return $totalFalseCount;
				}
						
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
					
					if(correctValidation() > 0){
						$errorMessage = "Please complete all fields";
					}
					
					//If they product numbers match, do not save and empty the productNo variable
					else if (in_array($productNo, $ExistingProductNum) == false)
					{
						$errorMessage = "Product number does not exist please input another";
						$productNo = "";

					}
					
					else
					{
						$expressInfo = "$productNo~$name~$contactNum~$email~$offer\n";
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
							$productNo = "";
							$offer = "";

						}
					}
			} 
			
			else {
							//Resets values
							$name = "";
							$contactNum = "";
							$email = "";
							$productNo = "";
							$offer = "";
			}

			?>
								<div class="expressInterest">
									<h1> Express Interest </h1>
									<form name="expressInterest" action="express_interest.php" method="POST">
										<p>Name: <input type="text" name="name" value="<?php echo $name;?>"/>
											<span class="errorMessage"><?php echo $nameError; ?>
											</span>
										</p>
										<p>Contact Number: <input type="text" name="contactNum" placeholder="XXXX XXXX" value="<?php echo $contactNum;?>"/>
											<span class="errorMessage"><?php echo $contactNumError; ?>
											</span>
										</p>
										<p>Email: <input type="email" name="email" placeholder="example@example.com" value="<?php echo $email;?>"/>
											<span class="errorMessage"><?php echo $emailError; ?>
											</span>
										</p>
										<p>Product Number: <input type="text" name="productNo" placeholder="Etc. 01-10-11-abc" value="<?php echo $productNo;?>"/>
											<span class="errorMessage"><?php echo $productNoError; ?>
											</span>
										</p>
										<p>Offer: $<input type="number" name="offer" value="<?php echo $offer;?>"/>
											<span class="errorMessage"><?php echo $offerError; ?>
											</span>
										</p>
										<input type="reset" value="Reset"/>
										<input type="submit" name="submit" value="Send Form"/>
										<p class="errorMessage"><?php echo $errorMessage ?>
										</p>
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


