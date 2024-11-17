<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FaceApp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }

        h1 {
            color: #28a745;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 1rem;
            font-weight: bold;
        }

        input[type="range"],
        input[type="color"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            outline: none;
        }

        input[type="range"]:hover,
        input[type="color"]:hover {
            border-color: #28a745;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        .photo {
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>FaceApp</h1>
    <form method="post" action="">
        <label for="txtRange">Select Photo Size:</label>
        <input type="range" name="txtRange" id="txtRange" min="50" max="300" value="150" step="10">

        <label for="clrTheme">Select Border Color:</label>
        <input type="color" name="clrTheme" id="clrTheme">

        <button type="submit" name="send">Process</button>
    </form>

    <?php
    // Correct image path if the image is inside a folder called 'images'
    $image = "images/profile.jpg";  // Path to the image
    $width = 150;  // Default width
    $borderColor = '#000000';  // Default border color

    if (isset($_POST["send"])) {
        $width = $_POST["txtRange"];
        $borderColor = $_POST["clrTheme"];
    }

    // Ensure the image exists and output the updated image with the selected size and border color
    if (file_exists($image)) {
        echo "<img src='$image' alt='Profile Photo' class='photo' style='width:{$width}px; height:auto; border: 3px solid $borderColor;'>";
    } else {
        echo "<p style='color: red;'>Image not found. Please ensure the image path is correct.</p>";
    }
    ?>

</div>

</body>
</html>
