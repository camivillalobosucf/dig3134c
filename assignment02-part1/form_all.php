<!-- Cami Villalobos Assignment 02 2/17 -->



<?php
//COOKIES before anything else on document
//st cookies before output
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //PERSONAL INFO COOKIES
    if (isset($_POST['firstName'])) { // Store cookie even if empty
        setcookie("firstName", $_POST['firstName'], time() + 1800);
    }
    if (isset($_POST['lastName'])) {
        setcookie("lastName", $_POST['lastName'], time() + 1800);
    }

    if (isset($_POST['emailAddress'])) {
        setcookie("emailAddress", $_POST['emailAddress'], time() + 1800);
    }

    if (isset($_POST['phone'])) {
        setcookie("phone", $_POST['phone'], time() + 1800);
    }

    if (isset($_POST['serverAddress'])) {
        setcookie("serverAddress", $_POST['serverAddress'], time() + 1800);
    }

    //QKITTY QUESTIONS COOKIES
    if (isset($_POST['q1'])) {
        setcookie("q1", $_POST['q1'], time() + 1800);
    }
    if (isset($_POST['q2'])) {
        setcookie("q2", $_POST['q2'], time() + 1800);
    }

    if (isset($_POST['q3'])) {
        setcookie("q3", $_POST['q3'], time() + 1800);
    }

    if (isset($_POST['q4'])) {
        setcookie("q4", $_POST['q4'], time() + 1800);
    }

    if (isset($_POST['q5'])) {
        setcookie("q5", $_POST['q5'], time() + 1800);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 02 - Part 1 - Camila Villalobos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="review-container">
    <?php

    //FORM_CONFIRMED, if finish button is clicked, show confirmation
    if (isset($_POST['finish'])) { ?>
        <p>Thank you, your data has been submitted</p>

    <?php

    //FORM PREVIEW if preview button is clicked, and not epmty show preview
        } elseif (isset($_POST['submit'])
                && !empty($_POST['firstName'])
                && !empty($_POST['lastName'])
                && !empty($_POST['emailAddress'])
                && !empty($_POST['phone'])
                && !empty($_POST['serverAddress'])
                && !empty($_POST['q1'])
                && !empty($_POST['q2'])
                && !empty($_POST['q3'])
                && !empty($_POST['q4'])
                && !empty($_POST['q5'])) {
    ?>

        <h1>Preview your Answers!</h1>

            <!--PERSONAL INFO PART-->
            <h2>Personal Information</h2>
            <p>First Name: <strong>
                <?php
                if (isset($_POST['firstName'])) {
                    print $_POST['firstName'];
                } elseif (isset($_COOKIE['firstName'])) {
                    print $_COOKIE['firstName'];
                }
                ?></strong>
            </p>

            <p>Last Name: <strong>
                <?php
                if (isset($_POST['lastName'])) {
                    print $_POST['lastName'];
                } elseif (isset($_COOKIE['lastName'])) {
                    print $_COOKIE['lastName'];
                }
                ?> </strong>
            </p>

            <p>Email: <strong>
                <?php
                if (isset($_POST['emailAddress'])) {
                    print $_POST['emailAddress'];
                } elseif (isset($_COOKIE['emailAddress'])) {
                    print $_COOKIE['emailAddress'];
                }
                ?> </strong></p>

            <p>Phone Number: <strong>
                <?php
                if (isset($_POST['phone'])) {
                    print $_POST['phone'];
                } elseif (isset($_COOKIE['phone'])) {
                    print $_COOKIE['phone'];
                }
                ?>
            </strong></p>

            <p>Student's Server Address: <strong>
                <?php
                if (isset($_POST['serverAddress'])) {
                    print $_POST['serverAddress'];
                } elseif (isset($_COOKIE['serverAddress'])) {
                    print $_COOKIE['serverAddress'];
                }
                ?>
            </strong></p>


            <br>

            <h2>Kitty Quiz Answers</h2>
            <p>1. Secret Identity: <strong>
                <?php
                if (isset($_POST['q1'])) {
                    print $_POST['q1'];
                } elseif (isset($_COOKIE['q1'])) {
                    print $_COOKIE['q1'];
                }
                ?> </strong>
            </p>

            <p>2. Complaints: <strong>
                <?php
                if (isset($_POST['q2'])) {
                    print $_POST['q2'];
                } elseif (isset($_COOKIE['q2'])) {
                    print $_COOKIE['q2'];
                }
                ?> </strong>
            </p>

            <p>3. Why they knock things off tables: <strong>
                <?php
                if (isset($_POST['q3'])) {
                    print $_POST['q3'];
                } elseif (isset($_COOKIE['q3'])) {
                    print $_COOKIE['q3'];
                }
                ?>
            </strong></p>

            <p>4. Favorite Conspiracy Theory: <strong>
                <?php
                if (isset($_POST['q4'])) {
                    print $_POST['q4'];
                } elseif (isset($_COOKIE['q4'])) {
                    print $_COOKIE['q4'];
                }
                ?>
            </strong></p>

            <p>5. Favorite TV Channel Content: <strong>
                <?php
                if (isset($_POST['q5'])) {
                    print $_POST['q5'];
                } elseif (isset($_COOKIE['q5'])) {
                    print $_COOKIE['q5'];
                }
                ?>
            </strong></p>


            <br>

            <form method="post">
                <div class="button-container">
                    <button type="submit" name="edit">Edit</button>
                    <button type="submit" name="finish">Finish</button>
                </div>
            </form>
    </div>

    <?php

    //FORM ENTRY iff Edit button is clicked or no button has been clicked, show the form
    } else { ?>

        <h1>Form about Kitties!</h1>
        <h3>Because I barely like anything more than kitties</h3>

        <form method="post">

            <!-- 1st Fieldset -->
            <fieldset>
                <legend>Personal Information</legend>

                <div class="input-group">
                    <!--first checks if blank and gives required alert, if not displays the submitted input
                    same logic for each input field-->
                    <label for="firstName">First Name:</label>
                    <?php if (isset($_POST['submit']) && empty($_POST['firstName'])) { ?>
                        <div class="missing">First name is required!</div>
                    <?php } ?>
                    <input id="firstName" name="firstName" type="text"
                        value="<?= $_POST['firstName'] ?? $_COOKIE['firstName'] ?? '' ?>"><br><br>

                </div>

                <!--also wrapping in divs for puting the label beside the input with css-->
                <div class="input-group">
                    <label for="lastName">Last Name:</label>
                    <?php if (isset($_POST['submit']) && empty($_POST['lastName'])) { ?>
                        <div class="missing">Last name is required!</div>
                    <?php } ?>
                    <input id="lastName" name="lastName" type="text"
                        value="<?= $_POST['lastName'] ?? $_COOKIE['lastName'] ?? '' ?>"><br><br>
                </div>

                <div class="input-group">
                    <label for="emailAddress">Email:</label>
                    <?php if (isset($_POST['submit']) && empty($_POST['emailAddress'])) { ?>
                        <div class="missing">Email is required!</div>
                    <?php } ?>
                    <input id="emailAddress" name="emailAddress" type="text"
                        value="<?= $_POST['emailAddress'] ?? $_COOKIE['emailAddress'] ?? '' ?>"><br><br>
                </div>

                <div class="input-group">
                    <label for="phone">Phone Number:</label>
                    <?php if (isset($_POST['submit']) && empty($_POST['phone'])) { ?>
                        <div class="missing">Phone number is required!</div>
                    <?php } ?>
                    <input id="phone" name="phone" type="text" value="<?= $_POST['phone'] ?? $_COOKIE['phone'] ?? '' ?>"><br><br>
                </div>

                <div class="input-group">
                    <label for="serverAddress">Student's Server Address:</label>
                    <?php if (isset($_POST['submit']) && empty($_POST['serverAddress'])) { ?>
                        <div class="missing">Server address is required!</div>
                    <?php } ?>
                    <input id="serverAddress" name="serverAddress" type="text"
                    value="<?= $_POST['serverAddress'] ?? $_COOKIE['serverAddress'] ?? '' ?>"><br><br>
                </div>


            </fieldset>
            <br>

            <!-- 2nd Fieldset -->
            <fieldset>
                <legend>How much do you know about our Kitty friends? Let's find out!</legend>

                <label for="q1">1. What is the secret identity of most cats when humans aren't looking?</label><br>
                <?php if (isset($_POST['submit']) && empty($_POST['q1'])) { ?>
                    <div class="missing">Question 1 is required!</div>
                <?php } ?>
                <input id="q1" name="q1" type="text"
                    value="<?= $_POST['q1'] ?? $_COOKIE['q1'] ?? '' ?>"><br><br>


                <label for="q2">2. If cats could talk, what would they most likely complain about?</label><br>
                <?php if (isset($_POST['submit']) && empty($_POST['q2'])) { ?>
                    <div class="missing">Question 2 is required!</div>
                <?php } ?>
                <input id="q2" name="q2" type="text"
                value="<?= $_POST['q2'] ?? $_COOKIE['q2'] ?? '' ?>"><br><br>


                <label for="q3">3. Why do cats knock things off tables? (Be creative!)</label><br>
                <?php if (isset($_POST['submit']) && empty($_POST['q3'])) { ?>
                    <div class="missing">Question 3 is required!</div>
                <?php } ?>
                <input id="q3" name="q3" type="text"
                    value="<?= $_POST['q3'] ?? $_COOKIE['q3'] ?? '' ?>"><br><br>


                <label for="q4">4. What is a cat's favorite conspiracy theory?</label><br>
                <?php if (isset($_POST['submit']) && empty($_POST['q4'])) { ?>
                    <div class="missing">Question 4 is required!</div>
                <?php } ?>
                <input id="q4" name="q4" type="text"
                    value="<?= $_POST['q4'] ?? $_COOKIE['q4'] ?? '' ?>"><br><br>

                <label for="q5">5. If cats had their own TV channel, what would they watch all day?</label><br>
                <?php if (isset($_POST['submit']) && empty($_POST['q5'])) { ?>
                    <div class="missing">Question 5 is required!</div>
                <?php } ?>
                <input id="q5" name="q5" type="text"
                value="<?= $_POST['q5'] ?? $_COOKIE['q5'] ?? '' ?>"><br><br>

            </fieldset>

            <br>
            <button type="submit" name="submit">Preview Answers</button>
        </form>

    <?php } ?>
</div>

</body>
</html>
