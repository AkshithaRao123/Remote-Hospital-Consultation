<?php
session_start();
include 'config.php';
?>

<!DOCTYPE HTML>
<HTML>
<head>
    <title>Hospital Finder</title>
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
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
        .form-group button:hover {
            background-color: #45a049;
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
    <form method="post" action="login.html">
        <button type="submit"><u>Login</u></button>
    </form>
</div>

    <div id="content">
        <h1 style="color:#006600;">Book a Consultation</h1>
        
        <div class="container">
        <h1>Book a Doctor Consultation</h1>
        <form action="bookingDetails.php" method="get">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <select id="doctor" name="doctor" required>
                    <option value="">Select a doctor</option>
                    <option value="dr_shruti">Dr. Shruti</option>
                    <option value="dr_ashu">Dr. Ashu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="symptoms">Symptoms:</label>
                <textarea id="symptoms" name="symptoms" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <button id="send-sms" type="submit">Book Consultation</button>
            </div>
        </form>
    </div>

</body>
<script>
    // JavaScript code to restrict past dates and times
    window.onload = function() {
        var currentDate = new Date().toISOString().split('T')[0];
        var currentTime = new Date().toTimeString().split(' ')[0];

        document.getElementById("date").setAttribute("min", currentDate);
        document.getElementById("time").setAttribute("min", currentTime);
    };
</script>
</HTML>
