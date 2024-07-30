<?php
$errors = ''; // Initialize variable to store error messages
$output = ''; // Initialize variable to store output data

// checking if the form was submitted
if (isset($_POST['submit'])) {

    // getting data from the form
    $name = $_POST['nameInput'];
    $email = $_POST['emailInput'];
    $phone = $_POST['phoneInput'];
    $postcode = $_POST['postcodeInput'];
    $address = $_POST['addressInput'];
    $city = $_POST['cityInput'];
    $province = $_POST['provinceInput'];
    $participants = $_POST['participantsInput'];
    $event = $_POST['eventInput'];

    // checking if form input data is correct 
    if ($name == '') {
        $errors .= 'Please enter your Name <br>';
    }
    if ($email == '') {
        $errors .= 'Please enter your Email <br>';
    }
    if ($phone == '') {
        $errors .= 'Please enter Phone Number <br>';
    }
    if ($postcode == '') {
        $errors .= 'Please enter the Postcode <br>';
    }
    if ($address == '') {
        $errors .= 'Please enter Address Name<br>';
    }
    if ($city == '') {
        $errors .= 'Please enter City name<br>';
    }
    if ($province == '') {
        $errors .= 'Please enter Province name<br>';
    }
    if ($participants == '') {
        $errors .= 'Please enter Province name<br>';
    }
    if ($event == '') {
        $errors .= 'Please enter your Email <br><br>';
    }

    // Validate phone number using regex
    $phoneRegex = "/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/";
    if (!preg_match($phoneRegex, $phone)) {
        $errors .= 'Please use the format xxx xxx-xxxx for Phone Number<br>';
    }

    // Validate name using regex
    $nameRegex = "/^[A-Za-z\s\-]+$/";
    if (!preg_match($nameRegex, $name)) {
        $errors .= 'Please only use alphabets in name Field<br>';
    }

    // Validate province using regex
    $provinceRegex = "/^[A-Za-z\s\-]+$/";
    if (!preg_match($provinceRegex, $province)) {
        $errors .= 'Please only use alphabets for province<br>';
    }

    // Validate postcode using regex
    $postcodeRegex = "/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/";
    if (!preg_match($postcodeRegex, $postcode)) {
        $errors .= 'Please use the format A1A 1A1 for Postal Code<br>';
    }

    // Validate address using regex
    $addressRegex = "/^[A-Za-z0-9\s\-,\.]+$/";
    if (!preg_match($addressRegex, $address)) {
        $errors .= 'Please only use valid characters for address Field<br>';
    }

    // Validate city using regex
    $cityRegex = "/^[A-Za-z\s\-]+$/";
    if (!preg_match($cityRegex, $city)) {
        $errors .= 'Please use valid characters for city Field<br>';
    }

    // Validate email using regex
    $emailRegex = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/";
    if (!preg_match($emailRegex, $email)) {
        $errors .= 'Please write email in the format x@y.c<br>';
    }

    // Validate participants using regex 
    $participantsRegex = "/^[1-9]\d*$/";
    if (!preg_match($participantsRegex, $participants)) {
        $errors .= 'Please enter number greater than 0 in participants field<br>';
    }

    if ($errors == '') {

        // Store valid form data
        $output .= "Name: $name <br>";
        $output .= "Email: $email<br>";
        $output .= "Phone: $phone<br>";
        $output .= "Postcode: $postcode<br>";
        $output .= "address: $address<br>";
        $output .= "city: $city<br>";
        $output .= "province: $province<br>";
        $output .= "event: $event<br>";
    } else {
        $errors .= '<b><br>Cannot Proceed with invalid data<b><br>';
    }

    // Create database connection
    include('includes/db_connection.php');


    if ($errors == '') {
        // Create SQL query to insert data into database
        $dataIInsert = "INSERT INTO `registration` 
                        (`id`, `name`, `email`, `phone`, `postcode`, `address`, `city`, `province`, `participants`, `event` ) 
                        VALUES 
                        (NULL, '$name', '$email', '$phone', '$postcode', '$address', '$city', '$province', '$participants', '$event' )";

        // Execute the SQL query
        $sqlOutput = $db->query($dataIInsert);


        if (!$sqlOutput) {

            // Handle database error
            exit('There was an error while processing your request, Please try again');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Assignment 3</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Waterloo Events</h1>
    </header>
    <nav>
        <a href="index.php" id="navLinks">Home</a>
        <a href="registration.php" id="navLinks">Registration</a>
        <a href="Login.php" id="navLinks">Log In</a>
        <a href="LogOut.php" id="navLinks">Log Out</a>
    </nav>
    <main>

        <div id="products">
            <img src="images/Midweek Market.jpg" alt="productImage" id="catalogueImage">
            <div id="productDetails">
                <h2>Midweek Market</h2>
                <p id="productPara">
                    Join the Market every Wednesday in July and August for a Mid-Week Market sure to cover all of your weekly necessities!
                    <br><br>
                    On Eby Street you can find fresh produce, meat, dairy products, baked goods and more! In addition to your grocery shopping necessities, you’ll also find a range of artisanal products from our selection of vendors.
                    <br><br>
                    After you’ve shopped at the Mid-Week Market, come check out our Music at the Market series at 5 p.m. on the Piazza!
                    <br><br>
                    The Kitchener Market also invites pickleball fans to enjoy a match and then shop at the Kitchener Market. Three pickleball courts will be set up every Wednesday from 2- 9 p.m. in the covered area at the market along Eby St. Pickleball paddles and balls will be available, but players can also bring their own. On the day, players can sign up with Kitchener Market staff for a 30-minute time slot and then enjoy the Mid-Week Market or the Music at the Market on the piazza.
                    <br><br>
                    Free 2 hour parking vouchers will be available upon request from Kitchener Market staff.
                </p>

                <p><b>
                        <h3>DETAILS</h3>
                        Date:
                    </b> August 16

                    <br><br><b>Time:</b> 2:00 pm - 7:00 pm

                    <br><br><b>Series:</b> Midweek Market
                    <br><br><b>Event Category:</b> Food & Drink

                    <br><br><b>Website:</b> <a href="https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx " id="navLinks">https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx </a>

                </p>
            </div>
        </div>

        <div id="products">
            <img src="images/Music at the Market.jpg" alt="productImage" id="catalogueImage">
            <div id="productDetails">
                <h2>Music at the Market</h2>
                <p id="productPara">
                    Come join us at the Market every Wednesday in July and August for your new favourite weekly Summer outing!
                    <br><br>
                    We’re bringing back our Music at the Market series due to popular demand! From 5 to 9 p.m. out on
                    our Piazza (off King Street), you’ll be able to enjoy some delicious food and beverages while watching
                    the free live outdoor entertainment. Each Wednesday, there will be a rotating list of pop-up food vendors
                    from the region and a bar onsite for you to enjoy dinner and drinks while watching talented local musicians.
                    <br><br>
                    These events will be going forward rain or shine. In the event of inclement weather, the events will be moved to a covered area.
                </p>

                <p><b>
                        <h3>DETAILS</h3>
                        Date:
                    </b> August 16

                    <br><br><b>Time:</b> 2:00 pm - 7:00 pm

                    <br><br><b>Series:</b> Midweek Market
                    <br><br><b>Event Category:</b> Food & Drink

                    <br><br><b>Website:</b> <a href="https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx " id="navLinks">https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx </a>

                </p>
            </div>
        </div>

        <div id="products">
            <img src="images/Waterhill Farm Summer Series Dog Days of Summer.jpg" alt="productImage" id="catalogueImage">
            <div id="productDetails">
                <h2>Waterhill Farm Summer Series: Dog Days of Summer</h2>
                <p id="productPara">
                    Join Waterhill Farm and Dog Friendly KW for some delicious alcohol-free beer, wine, and spirits at Waterhill Farm in Cambridge.
                    <br><br>
                    This weekday celebration features many local businesses, fun themes (this month, it’s the Dog Days of Summer –
                    and your four-legged friends are welcome!), and most importantly, we will be showcasing TONS of alcohol-free (AF)
                    beverages from our favourite breweries and businesses. Join us in our boozeless barn as we serve up incredible
                    mocktails mixed by one of the region’s best mixologists, or hang out in our “beer” garden and enjoy an AF lager
                    or IPA.
                    <br><br>
                    Connect with likeminded members of the community, enjoy a night out and wake up refreshed,
                    Best of all- all proceeds will be going to our local chapter of Kidsability!
                    <br><br>
                    Tickets are $35. Each ticket includes 2 beverages and all proceeds will be donated to Kidsability.
                </p>

                <p><b>
                        <h3>DETAILS</h3>
                        Date:
                    </b> August 16

                    <br><br><b>Time:</b> 2:00 pm - 7:00 pm

                    <br><br><b>Series:</b> Midweek Market
                    <br><br><b>Event Category:</b> Food & Drink

                    <br><br><b>Website:</b> <a href="https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx " id="navLinks">https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx </a>

                </p>
            </div>
        </div>

        <div id="products">
            <img src="images/DTK Latin Heat.jpg" alt="productImage" id="catalogueImage">
            <div id="productDetails">
                <h2>DTK Latin Heat</h2>
                <p id="productPara">
                    Join local dance company TenC Dance Co for high-energy Latin dance on Wednesday evenings all summer!
                    Dance the night away and cool off in the Carl Zehr Square splashpad (don’t forget a towel!)
                    Free to all.
                    <br><br>
                    Take a quick lesson before the social dance begins.
                </p>

                <p><b>
                        <h3>DETAILS</h3>
                        Date:
                    </b> August 16

                    <br><br><b>Time:</b> 2:00 pm - 7:00 pm

                    <br><br><b>Series:</b> Midweek Market
                    <br><br><b>Event Category:</b> Food & Drink

                    <br><br><b>Website:</b> <a href="https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx " id="navLinks">https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx </a>

                </p>
            </div>
        </div>

        <div id="products">
            <img src="images/Historic St. Jacobs Walking Tour.jpg" alt="productImage" id="catalogueImage">
            <div id="productDetails">
                <h2>Historic St. Jacobs Walking Tour</h2>
                <p id="productPara">
                    St. Jacobs might look like a town frozen in time, but its history tells another tale. This small village
                    blends the modern and traditional but always stays connected to its roots.
                    <br><br>
                    This town has made a big name for itself, and the story is best told through intriguing local tales: the
                    milling company that pioneered new technology in 1875; the early schoolteacher from Sierra Leone, the
                    woman whose love for books built the library; the horse that delivered the mail for decades and a hardware
                    store that became a nation-wide company.
                    <br><br>
                    Our 75-90 minute guided walking tour is led by locals who know the town best. You will leave feeling
                    happier, healthier and smarter! Or maybe you won’t want to leave! Accessibility: Route follows paved
                    surfaces on main town streets and side streets. There is one downhill and uphill section at the beginning
                    of the walk. Sidewalks are quite narrow in the Village of St. Jacobs, but still accessible for scooters
                    & wheelchairs.
                    <br><br>
                    Where to Meet: The parkette & benches beside Scotiabank & The Shed: Café by Lenjo Bakes
                </p>

                <p><b>
                        <h3>DETAILS</h3>
                        Date:
                    </b> August 16

                    <br><br><b>Time:</b> 2:00 pm - 7:00 pm

                    <br><br><b>Series:</b> Midweek Market
                    <br><br><b>Event Category:</b> Food & Drink

                    <br><br><b>Website:</b> <a href="https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx " id="navLinks">https://www.kitchenermarket.ca/en/whats-happening/mid-week-market.aspx </a>

                </p>
            </div>
        </div>



        <form method="POST" onsubmit="return formValidator();" id="purchaseForm" action="" name="recieptForm">

            <div id="checkoutDetails">


                <div>
                    <h2>Registration Form:</h2>
                    <label id="formText">Enter your Name: </label>
                    <input type="text" id="nameField" name="nameInput">
                    <span id="nameFieldError"></span>
                    <br>
                    <label id="formText">Enter your Phone Number: </label>
                    <input type="text" id="phoneField" name="phoneInput">
                    <span id="phoneFieldError"></span>
                    <br>
                    <label id="formText">Enter your Email: </label>
                    <input type="text" id="emailField" name="emailInput">
                    <span id="emailFieldError"></span>
                    <br>
                    <label id="formText">Enter your Postcode: </label>
                    <input type="text" id="postcodeField" name="postcodeInput">
                    <span id="postcodeFieldError"></span>
                    <br>
                    <label id="formText">Enter your Address: </label>
                    <input type="text" id="addressField" name="addressInput">
                    <span id="addressFieldError"></span>
                    <br>
                    <label id="formText">Enter your City: </label>
                    <input type="text" id="cityField" name="cityInput">
                    <span id="cityFieldError"></span>
                    <br>
                    <label id="formText">Enter your Province: </label>
                    <input type="text" id="provinceField" name="provinceInput">
                    <span id="provinceFieldError"></span>
                    <br>
                    <label id="formText">Enter Event Name: </label>
                    <select id="eventField" name="eventInput">
                        <option value="">Select Event Name</option>
                        <option value="Midweek Market">Midweek Market</option>
                        <option value="Music at the Market">Music at the Market</option>
                        <option value="Waterhill Farm Summer Series Dog Days of Summer">Waterhill Farm Summer Series: Dog Days of Summer</option>
                        <option value="DTK Latin Heat">DTK Latin Heat</option>
                        <option value="Historic St. Jacobs Walking Tour">Historic St. Jacobs Walking Tour</option>
                    </select>
                    <br>
                    <label id="formText">Enter number of Participants: </label>
                    <input type="text" id="participantsField" name="participantsInput">
                    <span id="participantsFieldError"></span>
                    <br>
                    <br>
                    <br>
                    <span id="generalError"></span>
                    <br>
                    <input type="submit" id="confirmPurchase" value="submit" name="submit">

                </div>

        </form>

        <div id="receipt">
            <p id="errors">
                <?php
                if ($errors) {
                    echo "<h3>ERROR OCCURRED: </h3>";
                    echo $errors;
                }
                ?>
            </p>
            <p id="formResult">
                <?php
                if ($output) {
                    echo "<h3>RECEIPT: </h3>";
                    echo $output;
                }
                ?>
            </p>
        </div>

    </main>
    <footer>
        Copyright &copy; 2023, Conestoga College
    </footer>
</body>

</html>