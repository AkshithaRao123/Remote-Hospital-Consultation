<!DOCTYPE HTML>
<HTML>
<head>
    <title>Find a Hospital - Hospital Finder</title>
    <style>
        body  
        {
            background-color: #f5f5f5;
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
        .flex-container button 
        {
            background-color: #9be4e9;
            margin: 10px;
            padding: 10px;
            font-size: 15px;
            cursor: pointer;
            border: none;
            color: #0033cc;
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
        .search-container {
            margin-top: 30px;
            text-align: center;
        }
        .search-container input[type=text] {
            padding: 10px;
            margin: 10px;
            width: 50%;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .search-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #45a049;
        }
        .results-container {
            margin-top: 30px;
            text-align: center;
        }
        .hospital {
            margin: 20px;
            padding: 20px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .hospital h2 {
            color: #006600;
        }
    </style>
</head>
<body>
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
    <form method="post" action="login.html">
            <button type="submit"><u>Login</u></button>
    </form>
</div>
    <?php
    $serverName = "SOME-PC"; 
    $database = "HOSPINFO";
    $uid = "";
    $password = "";
    $connectionOptions = array(
        "Database" => $database,
        "Uid" => $uid,
        "PWD" => $password
    );

    // Create connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . print_r(sqlsrv_errors(), true));
    }

    // Define variables
    $search_query = "";
    $results = [];

    // Process search query
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Should run only if coming to this page after posting the form
        $search_query = $_POST["search_query"];
        // Perform SQL query
        $sql = "SELECT * FROM hospitals WHERE hname LIKE '%$search_query%' OR haddress LIKE '%$search_query%'";
        $stmt = sqlsrv_query($conn, $sql);

        if ($stmt) {
            // Retrieve results
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $results[] = $row;
            }
            sqlsrv_free_stmt($stmt);
        } else {
            echo "Error in executing query: " . print_r(sqlsrv_errors(), true);
        }
    }
    ?>

    <div id="content">
        <h1 style="color:#006600;">Find a Hospital</h1>
        <div class="search-container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" name="search_query" placeholder="Enter location or hospital name" value="<?php echo $search_query; ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="results-container">
            <?php
            // Display search results
            foreach ($results as $hospital) {
                echo '<div class="hospital">';
                echo '<h2>' . $hospital["hname"] . '</h2>';
                echo '<p>Address: ' . $hospital["haddress"] . '</p>';
                echo '<p>Phone: ' . $hospital["hphone"] . '</p>';
                // print_r($hospital["otime"]);
                echo '<p>Opens at: '; 
                $tempDate = DateTime::createFromFormat('H:i:s', '09:00:00');
                echo $tempDate->format('H:i:s') . '</p>';
                echo '<p>Closes at: ';
                $tempDate = DateTime::createFromFormat('H:i:s', '23:00:10');
                echo $tempDate->format('H:i:s') . '</p>'; 

                // echo '<p>Phone: ' . $hospital["hphone"] . '</p>';
                // $hospital["cTime"]["date"] . '</p>';
                
                echo '</div>';
            }
            ?>
            <!-- <a href="sms:+91-8431574541?body=Hello%20world!">Send SMS</a> -->
        </div>
    </div>
</body>
</HTML>

<?php
// Close the database connection
sqlsrv_close($conn);
?>
