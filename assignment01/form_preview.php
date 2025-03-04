<!--Cami Villalobos Assignment 01 2/7-->

<!--COOKIES before anything else on document-->

<?php
//checks if input is set, if so creates a cookie, same logic to each one of input fields

//PERSONAL INFO COOKIES
if (isset($_POST['firstName'])) {
    setcookie("firstName", $_POST['firstName'], time() + 1800); //expires in 30 min
}
if (isset($_POST['lastName'])) {
    setcookie("lastName", $_POST['lastName'], time() + 1800);
}
if (isset($_POST['email'])) {
    setcookie("email", $_POST['email'], time() + 1800);
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1 - Camila Villalobos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">


</head>

<body>
    <h1>Preview your Answers!</h1>

    <!--debug hidden-->
    <!-- <div id="printr">
        <pre>
            <?php
            // print_r($_POST); //this is for debug
            ?>
        </pre>
    </div> -->

    <div class="review-container">

        <!--PERSONAL INFO PART-->
        <h2>Personal Information</h2>
        <!--first checks if blank, if not displays the submitted input
        same logic for each input field-->
        <?php if (empty($_POST['firstName']) && isset($_POST['submit'])) : ?>
            <p>First Name is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>First Name: <strong><?= $_POST['firstName'] ?></strong></p>
        <?php endif; ?>

        <?php if (empty($_POST['lastName']) && isset($_POST['submit'])) : ?>
            <p>Last Name is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>Last Name: <strong><?= $_POST['lastName'] ?></strong></p>
        <?php endif; ?>

        <?php if (empty($_POST['email']) && isset($_POST['submit'])) : ?>
            <p>Email is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>Email: <strong><?= $_POST['email'] ?></strong></p>
        <?php endif; ?>

        <?php if (empty($_POST['phone']) && isset($_POST['submit'])) : ?>
            <p>Phone Number is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>Phone Number: <strong><?= $_POST['phone'] ?></strong></p>
        <?php endif; ?>

        <?php if (empty($_POST['serverAddress']) && isset($_POST['submit'])) : ?>
            <p>Student's Server Address is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>Student's Server Address: <strong><?= $_POST['serverAddress'] ?></strong></p>
        <?php endif; ?>


        <!--QUIZ ANSWER PART-->
        <h2>Kitty Quiz Answers</h2>

        <?php if (empty($_POST['q1']) && isset($_POST['submit'])) : ?>
            <p>Question 1 is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>1. Secret Identity: <strong><?= $_POST['q1'] ?></strong></p>
        <?php endif; ?>

        <?php if (empty($_POST['q2']) && isset($_POST['submit'])) : ?>
            <p>Question 2 is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>2. Complaints: <strong><?= $_POST['q2'] ?></strong></p>
        <?php endif; ?>

        <?php if (empty($_POST['q3']) && isset($_POST['submit'])) : ?>
            <p>Question 3 is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>3. Why they knock things off tables: <strong><?= $_POST['q3'] ?></strong></p>
        <?php endif; ?>

        <?php if (empty($_POST['q4']) && isset($_POST['submit'])) : ?>
            <p>Question 4 is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>4. Favorite Conspiracy Theory: <strong><?= $_POST['q4'] ?></strong></p>
        <?php endif; ?>

        <?php if (empty($_POST['q5']) && isset($_POST['submit'])) : ?>
            <p>Question 5 is empty!</p>
        <?php elseif (isset($_POST['submit'])) : ?>
            <p>5. Favorite TV Channel Content: <strong><?= $_POST['q5'] ?></strong></p>
        <?php endif; ?>

        <br>

        <!--BUTTONS HERE-->
        <div class="button-container">
            <form action="form_entry.php" method="post"> <!--goes back as asign req-->
            <button type="submit" name="edit">Edit</button>
            </form>

            <form action="form_confirmed.php" method="post"> <!--finishes form/quiz-->
            <button type="submit" name="finish">Finish</button>
            </form>
        </div>

    </div>



</body>
</html>
