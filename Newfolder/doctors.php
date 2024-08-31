<?php
session_start();
include 'config.php';
?>

<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>Doctors Registered</TITLE>
        <style>
        body  
        {
            height: 100%;
            background-position: center;
            background-size: cover;
            position: sticky;
            color: #333;
            font-family: Arial, sans-serif;
            background: linear-gradient(3deg, rgba(150, 250, 230, 1) 0%, rgba(254, 255, 255, 1) 100%);
        }
        .flex-container 
        {
            display: flex;
            background-color: #4ad2db;
        }
        .flex-container > div 
        {
            background-color: #9be4e9;
            margin: 10px;
            padding: 10px;
            font-size: 15px;
        }
        .flex-container a
        {
            color:blue;
        }
        #stickybar
        {
            text-align: center;
            background-color: #00bfff;
            color: #fff;
            padding: 20px;
        }
        #content
        {
            background-color: #fff;
            color: #333;
            padding: 20px;
            margin: 30px;
            text-align: center;
        }
        .services-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
        .service {
            flex: 1;
            margin: 20px;
            padding: 20px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .service h2 > a {
            color: #006600;
        }
    </style>
    </HEAD>
    <BODY>
    <div id="stickybar"><h1>Hospital Finder</h1></div>

        <div class="flex-container">
        <div><a href="index.html">
            Home
        </a></div>
        <div><a href="aboutPage.html">
            About Us
        </a></div>
        <div><a href="find-hospital.php">
            Find a Hospital
        </a></div>
        <div><a href="booking.php">
            Book a Consultation</a></div>
        <div><a href="contact.html">
            Contact Us
        </a></div>
        <div><a href="doctors.php">
            Doctors Registered
        </a></div>
    </div>

    <div id="content">
        <h1>Doctors and their Specializations</h1>
        
        <div class="services-container">
            <?php
            $sql = "SELECT * FROM doc";
            // echo "blahhhhhhhhhhhhhhhhhhhhhh";
            $stmt = sqlsrv_query($conn, $sql);
            // echo "blahhhhhhhhhhhhhhhhhhhhhh";
            $results = [];
            
            if ($stmt) {
                // Retrieve results
                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                    $results[] = $row;
                }
                sqlsrv_free_stmt($stmt);
            } else {
                echo "Error in executing query: " . print_r(sqlsrv_errors(), true);
            }
            ?>

            <form method="post" action='booking.php'><?php
            foreach ($results as $hospital) {
                echo '<div class="service">';
                echo '<button type="submit" name='.$hospital["username"].'>';
                echo '<h2>' . $hospital["username"] . '</h2>';
                echo '</button>';
                echo '<p>Specialises in: ' . $hospital["docSpecialty"] . '</p>';
                echo '<p>Hospital: ' . $hospital["hosp"] . '</p>';
                echo '</div>';
            }
            ?>
            </form>
            
    </div>
    </BODY>
</HTML>