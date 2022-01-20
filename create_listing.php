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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">View Listings</a></li>
                    <li><a href="#">Sell Your Shoes</a></li>
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
		<div class="listingInfo">
				<form name="createListing" action="create_listing.php" method="post">
		<header class="head">
			<p class="piAndsi"> Personal Information </p>
		</header>
			<p>First Name: <input type="text" name="fName" /></p>
			<p>Last Name: <input type="text" name="lName" /></p>
			<p>Contact Number: <input type="text" name="contactNum" /></p>
			<p>Email: <input type="text" name="email" /></p>
		<header class="head">
			<p class="piAndsi"> Shoe Information </p>
		</header>
			<p>Product No: <input type="text" name="productNum" /></p>
			<p>Lisiting Name: <input type="text" name="listingName" /></p>
			<p>Brand: <input type="text" name="brand" /></p>
		
		<p>Size:
		<select>
			<option value="Select">Select</option>
			<option value="us6">US 6</option>
			<option value="us7">US 7</option>
			<option value="us8">US 8</option>
			<option value="us9">US 9</option>
			<option value="us10">US 10</option>
			<option value="us11">US 11</option>
			<option value="us12">US 12</option>
			<option value="us13">US 13</option>
			<option value="us14">US 14</option>
			<option value="us15">US 15</option>
		</select>
		</p>
		
		<p>Condition:
		<select>
			<option value="Select">Select</option>
			<option value="brandNew">Brand New</option>
			<option value="almostNew">Almost New</option>
			<option value="used">Used</option>
			<option value="wellUsed">Well Used</option>
		</select>
		</p>
		
					<p>Price: <input type="int" name="price" /></p>
					<label for="description">Description: </label>
					<textarea id="description" name="description" rows="4" cols="50"> </textarea>
		
					<p><input type="reset" value="Reset" />&nbsp;&nbsp;
					<input type="submit" name="Submit" value="Send Form" />
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


