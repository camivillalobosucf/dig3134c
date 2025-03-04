<!--Cami Villalobos Assignment 01 2/7-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 1 - Camila Villalobos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">


</head>
<body>

    <div class="container">
        <h1>Form about Kitties!</h1>
        <h3>Because I barely like anything more than kitties</h3>

        <?php
        //start of form
        ?>
        <form method="post" action="form_preview.php"> <!--as assign. req using POST and going to the 2nd page-->

            <!-- 1st Fieldset -->
            <fieldset>

                <legend>Personal Information</legend>

                <!--input + cookie, 1st checks if cookie exists,
                if cookie exists fills the info, if not leaves blank
                this is the exact same logic for the rest of the input fields -->

                <!--also wrapping in divs for puting the label beside the input with css-->
                <div class="input-group">
                    <label for="firstName">First Name:</label>
                    <input id="firstName" name="firstName" type="text" value="<?php if (isset($_COOKIE['firstName'])) {
                                                                //curly for condition met
                                                                print $_COOKIE['firstName'];
                                                                }
                                                                ?>"><br><br>
                </div>

                <div class="input-group">
                    <label for="lastName">Last Name:</label>
                    <input id="lastName" name="lastName" type="text" value="<?php if (isset($_COOKIE['lastName'])) {
                                                                print $_COOKIE['lastName'];
                                                                }
                                                                ?>"><br><br>
                </div>

                <div class="input-group">
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="email" value="<?php if (isset($_COOKIE['email'])) {
                                                                print $_COOKIE['email'];
                                                            }
                                                            ?>"><br><br>
                </div>

                <div class="input-group">
                    <label for="phone">Phone Number:</label>
                    <input id="phone" name="phone" type="tel" value="<?php if (isset($_COOKIE['phone'])) {
                                                                print $_COOKIE['phone'];
                                                            }
                                                            ?>"><br><br>
                </div>

                <div class="input-group">
                    <label for="serverAddress">Student's Server Address:</label>
                    <input id="serverAddress" name="serverAddress" type="text" value="<?php
                                                            if (isset($_COOKIE      ['serverAddress'])) {
                                                                print $_COOKIE['serverAddress'];
                                                            }
                                                            ?>"><br><br>
                </div>

            </fieldset>
            <br>

            <!-- 2nd Fieldset -->
            <fieldset>
            <legend>How much do you know about our Kitty friends? Let's find out!</legend>

                <label for="q1">1. What is the secret identity of most cats when humans aren't looking?</label><br>
                <input id="q1" name="q1" type="text" value="<?php if (isset($_COOKIE['q1'])) {
                                                                print $_COOKIE['q1'];
                                                            }
                                                            ?>"><br><br>

                <label for="q2">2. If cats could talk, what would they most likely complain about?</label><br>
                <input id="q2" name="q2" type="text" value="<?php if (isset($_COOKIE['q2'])) {
                                                                print $_COOKIE['q2'];
                                                            }
                                                            ?>"><br><br>

                <label for="q3">3. Why do cats knock things off tables? (Be creative!)</label><br>
                <input id="q3" name="q3" type="text" value="<?php if (isset($_COOKIE['q3'])) {
                                                                print $_COOKIE['q3'];
                                                            }
                                                            ?>"><br><br>

                <label for="q4">4. What is a cat's favorite conspiracy theory?</label><br>
                <input id="q4" name="q4" type="text" value="<?php if (isset($_COOKIE['q4'])) {
                                                                print $_COOKIE['q4'];
                                                            }
                                                            ?>"><br><br>

                <label for="q5">5. If cats had their own TV channel, what would they watch all day?</label><br>
                <input id="q5" name="q5" type="text" value="<?php if (isset($_COOKIE['q5'])) {
                                                                print $_COOKIE['q5'];
                                                            }
                                                            ?>"><br><br>

            </fieldset>

            <br>

            <button type="submit" name="submit">Preview Answers</button>
        </form>
    </div>

</body>
</html>
