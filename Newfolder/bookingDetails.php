<?php
session_start();
include 'config.php';
?>

<!DOCTYPE HTML>
<HTML>
<head>
    <title>Book a Consultation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            transition: 0.3s;
            border-radius: 5px;
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
    </style>
    <BODY>
    
            <div id="stickybar">
                <h1>Hospital Finder</h1>
            </div>

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
                <div><a href="booking.html">
                    Book a Consultation</a></div>
                <div><a href="contact.html">
                    Contact Us
                </a></div>
                <div><a href="doctors.php">
            Doctors Registered
        </a></div>
            </div>

            <div class="alert alert-info">
    <strong>Info!</strong> Appointment booked successfully!
  </div>
        <?php
            $serverName = "SOME-PC"; 
            $database = "p1";
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
            $Name = $_SESSION["username"];
            $Email = $_SESSION['email'];
            $Doctor = $_GET["doctor"];
            $Date = $_GET["date"];

            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //     $search_query = $_POST["search_query"];
            //     // Perform SQL query
            //     $sql = "SELECT * FROM hospitals WHERE name LIKE '%$search_query%' OR address LIKE '%$search_query%'";
            //     $stmt = sqlsrv_query($conn, $sql);
            // }
            echo "<p>Name: $Name</p>";
            echo "<p>Email: $Email</p>";
            echo "<p>Doctor: $Doctor</p>";
            echo "<p>Date: $Date</p>"

        ?>
        <br />
        <FORM action="dashboard.php">
        <div class="form-group">
                <button id="send-sms" type="submit">Go to Dashboard</button>
        </div>
        </form>
    </BODY>
</HTML>

<?php
// Close the database connection
sqlsrv_close($conn);
?>