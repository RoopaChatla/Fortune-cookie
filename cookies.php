<!DOCTYPE html>
<!-- Author: Roopa Karanam (000847391)
Date: September 30th 2021  -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Fortune Cookies</title>

</head>

<body>
    <?php

    $error = false;
    $fname = filter_input(INPUT_GET, "fname", FILTER_SANITIZE_SPECIAL_CHARS); // sanitize strings

    if ($fname === null) { // looking for null and false values
        $error = true;
    }
    $lname = filter_input(INPUT_GET, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
    if ($lname === null) {
        $error = true;
    }
    $numofcookies = filter_input(INPUT_GET, "numofcookies", FILTER_VALIDATE_INT); // validating numbers from user
    if ($numofcookies === false || $numofcookies === null) {
        $error = true;
    }
    $luckeynumrange = filter_input(INPUT_GET, "luckeynumrange", FILTER_VALIDATE_INT);

    $color = filter_input(INPUT_GET, "color", FILTER_SANITIZE_SPECIAL_CHARS);

    ?>
    <?php

    if ($error === true) {  // this will warn the user to enter good data
        echo " <p class='error'>ERROT bad parameters </p>";
    } else {
        echo "<h1>Hello $fname  $lname Here are your cookies Enjoy!!</h1>";




        $userdata = [$fname, $lname, $numofcookies, $color, $luckeynumrange]; // array created for user data 

        $fortune = [  // the fortune array is the array which holds all the strings of fortune.
            "Delight the world with compassion,kindness and grace",
            "The early bird gets the worm, but the second mouse gets the cheese.",
            "Some days you are pigeon, some days you are statue.", " Today, bring umbrella.", "
            The fortune you seek is in another cookie.",
            "Be on the alert to recognize your prime at whatever time of your life it may occur.", "
            Your reality check about to bounce.", "
            Tension is who you think you should be. Relaxation is who you are.", "
            When blind leading the blind……..get out of the way.", "
            Everyone seems normal until you get to know them.", "
            Only difference between rut and a grave is depth.", "
            Experience is what you have left when everything else gone.", "
            A closed mouth gathers no feet.", "
            A conclusion is simply the place where you got tired of thinking.", "
            A cynic is only a frustrated optimist.", "
            A foolish man listens to his heart. A wise man listens to cookies.", "
            Your road to glory will be rocky but fulfilling.", "
            Courage is not simply one of the virtues, but the form of every virtue at the testing point.", "
            Patience is your alley at the moment. Don’t worry!", "
            Nothing is impossible to a willing heart.", "
            Don’t worry about money. The best things in life are free.", "
            Don’t pursue happiness – create it."
        ];


        for ($i = 0; $i <= $userdata[2]; $i++) { // for loop to generate cookies

            $quote = $fortune[rand(1, $userdata[4])];
            // the quote is the parameter that holds the stirng
            //rand() is used to generate random number between the range given by the user
            //the random number is the index to fetch the string from the array fortune.

            //  the $color parameter is used to change the color of cookies 

            echo "<section ><div  class=$color><p >$quote</p></div></section>";
        }
    }
    ?>




</body>

</html>