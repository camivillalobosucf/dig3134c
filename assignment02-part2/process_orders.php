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
    <h2>Processing Orders Script</h2>
    <?php

/* this if for debug
        $orders = file_get_contents("https://students.gaim.ucf.edu/~novatnak/dig3134c/assignments/assignment02/orders.txt");

        if ($orders === false) {
            die("<p style='color: red;'> unable to access </p>");
        } else {
            print "<p>successfully reads orders.txt</p>";
            print "<pre>" . htmlspecialchars($orders) . "</pre>"; //show file contents
        }

*/


    //READ THE ORDERS ON NOVATNAK SERVER
    if ($_SERVER['HTTP_HOST'] === 'localhost') {
        //running locally on XAMPP access professor's server file
        $orders_location = "https://students.gaim.ucf.edu/~novatnak/dig3134c/assignments/assignment02/orders.txt";
    } else {
        //running on the ucf server use the direct file path
        $orders_location = "/home/ad/novatnak/public_html/dig3134c/assignments/assignment02/orders.txt";
    }

    //orders from the correct path
    $orders = file_get_contents($orders_location);

    //errors if the file is not accessible
    if (!$orders) {
        print '<div class="error">
                <p>Unable to fetch orders.txt</p>
               </div>';
    }



    //preg_replace replaces white space characters, explode splits the string into arraw based on the commas
    $orders_array = explode(",", trim($orders));

    if (empty($orders_array)) { //this is check if does not exist as assignment says we should do
        print '<div class="error">
                <p>No valid orders found</p>
               </div>';
    }



    //EMPTY ARRAYS FOR EACH CATEGORY
    $ford = [];
    $toyota = [];
    $landrover = [];
    $algonquin = [];
    $errors = [];

    //LOOP TO PROCESS EACH ITEM
    foreach ($orders_array as $order) {
        $order = trim($order); //remove spaces at the beginning and end
        $order = preg_replace('/[^A-Za-z0-9*\-]/', '', $order); //cleanup array

        //REGEX PATTERS for each company
        $fordPattern = "/^[AEIOU]{2}RE4[2-7]{3}$/";
        $toyotaPattern = "/^T(8\d{2}|9\d{2}|1\d{3}|2000)-[A-Za-z0-9]{1,5}$/";
        $landroverPattern = "/^LR(2\d{2}|3\d{2}|4\d{2}|500)v[1-3]$/";
        $algonquinPattern = "/^\d+\*[AEIOUaeiou]{3}$/";

        // Step 4: Check patterns one by one
        $isFord = preg_match($fordPattern, $order);
        if ($isFord) {
            $ford[] = $order;
        } else {
            $isToyota = preg_match($toyotaPattern, $order);
            if ($isToyota) {
                $toyota[] = $order;
            } else {
                $isLandRover = preg_match($landroverPattern, $order);
                if ($isLandRover) {
                    $landrover[] = $order;
                } else {
                    $isAlgonquin = preg_match($algonquinPattern, $order);
                    if ($isAlgonquin) {
                        $algonquin[] = $order;
                    } else {
                        $errors[] = $order;
                    }
                }
            }
        }
    }

        /*
        //this isfor dbug
        print "<p>Debugging Sorted Data:<p>";
        print "<pre>Ford: " . print_r($ford, true) . "</pre>";
        print "<pre>Toyota: " . print_r($toyota, true) . "</pre>";
        print "<pre>Land Rover: " . print_r($landrover, true) . "</pre>";
        print "<pre>Algonquin: " . print_r($algonquin, true) . "</pre>";
        print "<pre>Errors: " . print_r($errors, true) . "</pre>";
        */


        //OUTPUT folder, dynamic, this is so cool btw
        if ($_SERVER['HTTP_HOST'] === 'localhost') {
            //running locally on XAMPP
            $result = "C:/xampp/htdocs/dig3134c/assignment02-part2/";
        } else {
            //running on the server
            $result = "/home/ad/ca575679/public_html/dig3134c/assignment02/assignment02-part2/";
        }



        //file paths
        $ford_txt = $result . "ford.txt";
        $toyota_txt = $result . "toyota.txt";
        $landrover_txt = $result . "landrover.txt";
        $algonquin_txt = $result . "algonquin.txt";
        $errors_txt = $result . "errors.txt";

        //convert arrays to string using implode
        $ford_data = implode("\n", $ford);
        $toyota_data = implode("\n", $toyota);
        $landrover_data = implode("\n", $landrover);
        $algonquin_data = implode("\n", $algonquin);
        $errors_data = implode("\n", $errors);

        ////PUT CONTENTS (save file on each txt file)
        file_put_contents($ford_txt, $ford_data);
        file_put_contents($toyota_txt, $toyota_data);
        file_put_contents($landrover_txt, $landrover_data);
        file_put_contents($algonquin_txt, $algonquin_data);
        file_put_contents($errors_txt, $errors_data);


        // Print success message
        print "<p>Processing completed. Files have been created.</p>";
        print "<a href='view_sorted_ids.php'>View Sorted IDs</a>";


    ?>
</body>

</html>
