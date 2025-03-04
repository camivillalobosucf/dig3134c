<!-- Cami Villalobos Assignment 02 2/18 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Assignment 02 - Part 2 - Camila Villalobos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <h2>Review Product IDs Files</h2>

    <!--form using post as required -->
    <form method="POST">
        <label for="file-select">Select a file:</label>
        <select id="file-select" name="file" class="select">


            <!--using a dropdown with the value of each file we want
            value sent via post :)  -->
            <option value="ford.txt"
                <?php
                /*checks if exists as usual, then matches the file name I want
                if so it selects that one and KEEPS it selected, same with
                all the other ones*/
                if (!empty($_POST['file']) && $_POST['file'] === "ford.txt") {
                    echo "selected";
                }
                ?>> Ford
            </option>

            <option value="toyota.txt"
                <?php
                if (!empty($_POST['file']) && $_POST['file'] === "toyota.txt") {
                    echo "selected";
                }
                ?>> Toyota
            </option>

            <option value="landrover.txt"
                <?php
                if (!empty($_POST['file']) && $_POST['file'] === "landrover.txt") {
                    echo "selected";
                }
                ?>> Land Rover
            </option>

            <option value="algonquin.txt"
                <?php
                if (!empty($_POST['file']) && $_POST['file'] === "algonquin.txt") {
                    echo "selected";
                }
                ?>> Algonquin
            </option>

            <option value="errors.txt"
                <?php
                if (!empty($_POST['file']) && $_POST['file'] === "errors.txt") {
                    echo "selected";
                }
                ?>>
                Errors
            </option>
        </select>


        <button type="submit" class="buttons">View File</button>
    </form>

    <?php

    //OUTPUT SECTION
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['file'])) {

        //check if running locally or on the server
        if ($_SERVER['HTTP_HOST'] === 'localhost') {
            $selected_file = "C:/xampp/htdocs/dig3134c/assignment02-part2/" . basename($_POST['file']);
        } else {
            $selected_file = "/home/ad/ca575679/public_html/dig3134c/assignment02/assignment02-part2/" . basename($_POST['file']);
        }

        //check if the file exists before reading
        if (file_exists($selected_file)) {
            //read the file
            $content = file_get_contents($selected_file);
            //display file name
            print "<h3>Contents of " . $_POST['file'] . "</h3>";
            //usee <pre> to keep original like break
            print "<pre>";
            print $content; //print file content
            print "</pre>";

        } else {
            print '<div class="error">
                    <p>File not found.</p>
                   </div>';
        }

    }

?>
</body>

</html>
