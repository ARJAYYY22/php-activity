<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FaceApp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .photo {
            margin-top: 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-container {
            margin: 20px auto;
            text-align: left;
            width: 320px;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>FaceApp</h1>
    <div class="form-container">
        <form method="post" action="">
            <label for="txtRange">Select Photo Size: </label> 
            <input type="range" name="txtRange" id="txtRange" min="0" max="100" value="50" step="10">
            <br>
            <label for="clrTheme">Select Border Color: </label>
            <input type="color" name="clrTheme" id="clrTheme">
            <br><br>
            <button type="submit" name="send">Process</button>
        </form> 
    </div>

    <?php
    // Default image and settings
    $image = "profile.jpg"; // Image is in the same directory as the HTML file
    $width = 100; // Default width of the image
    $borderColor = 'black'; // Default border color

    // Check if the form is submitted
    if (isset($_POST["send"])) {
        $width = $_POST["txtRange"];
        $borderColor = $_POST["clrTheme"];
    }

    echo "<img src='images/profile.jpg' alt='Profile Photo' class='photo' style='width:{$width}px; height:auto; border: 3px solid $borderColor;'>";
