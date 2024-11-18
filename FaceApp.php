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
            transition: border 0.3s ease;
        }

        .color-slider {
            display: flex;
            justify-content: space-between;
        }

    </style>
</head>
<body>

<div class="container">
    <h1>FaceApp</h1>
    <form method="post" action="" id="imageForm">
        <label for="txtRange">Select Photo Size:</label>
        <input type="range" name="txtRange" id="txtRange" min="50" max="300" value="150" step="10">

        <label for="clrTheme">Select Border Color:</label>
        <input type="color" name="clrTheme" id="clrTheme" value="#000000">

        <button type="button" id="processButton">Process</button>
    </form>

    <!-- Default Image (loaded from the server or static file) -->
    <img id="profileImage" src="images/profile.jpg" alt="Profile Photo" class="photo" style="width: 150px; height: auto; border: 3px solid #000000;">

</div>

<script>
    // Get references to the input elements
    const rangeInput = document.getElementById('txtRange');
    const colorInput = document.getElementById('clrTheme');
    const image = document.getElementById('profileImage');

    // Set the default border color from the color picker initially
    image.style.borderColor = colorInput.value;

    // Function to update the image size and border color
    function updateImage() {
        const width = rangeInput.value; // Get the current width from the slider
        const borderColor = colorInput.value; // Get the selected border color

        // Update the image styles in real time
        image.style.width = `${width}px`;
        image.style.height = 'auto'; // Keep the aspect ratio intact
        image.style.border = `3px solid ${borderColor}`;
    }

    // Event listeners to update the image when inputs change
    rangeInput.addEventListener('input', updateImage);
    colorInput.addEventListener('input', updateImage);
</script>

</body>
</html>
