<?php
session_start();
// print_r($_SESSION);

$medical_history = array(
    array("Date" => "2024-04-30", "Description" => "Checkup for fever and cough"),
    array("Date" => "2024-03-15", "Description" => "Blood test for cholesterol levels"),
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
                body {
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
        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .welcome {
            text-align: center;
            margin-bottom: 20px;
        }
        button {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
</div>

    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p class="welcome">Your data:</p>
        
        <!-- Medical History Section -->
        <h3>Medical History</h3>
        <table border="1">
            <tr>
                <th>Date</th>
                <th>Description</th>
            </tr>
            <?php foreach ($medical_history as $entry): ?>
                <tr>
                    <td><?php echo $entry['Date']; ?></td>
                    <td><?php echo $entry['Description']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <form method="post" name="logout" action="logout.php">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>
</html>
