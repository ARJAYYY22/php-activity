<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>FaceApp</h1>
    <form method="post" action="" style="width: 300px;">
        <label for="txtRange">Select Photo Size: </label> 
        <input type="range" name="txtRange" id="txtRange" min="0" max="100" value="50" step="10">
        <br>
        <label for="clrTheme">Select Border Color: </label>
        <input type="color" name="clrTheme" id="clrTheme">
        <br>
        <br>
        <button type="submit" name="send">Process</button>
        <br>
    </form> 
    <?php
    $image = "/images/profile.jpg";
    $width = 100; 
    $borderColor = 'black'; 

    if (isset($_POST["send"])) {
        $width = $_POST["txtRange"];
        $borderColor = $_POST["clrTheme"];
    }
    echo "<img src='$image' alt='Static Photo' class='photo' style='margin: 10px;width:{$width}px; height:auto; border: 3px solid $borderColor;'>";
    ?>
</body>
</html>
