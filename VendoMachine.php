<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            max-width: 420px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #495057;
            margin-bottom: 20px;
        }
        fieldset {
            border: none;
            padding: 0;
            margin-bottom: 20px;
        }
        legend {
            font-size: 16px;
            color: #343a40;
            font-weight: bold;
            margin-bottom: 10px;
        }
        label {
            display: flex;
            align-items: center;
            margin: 8px 0;
            color: #495057;
            cursor: pointer;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            outline: none;
            margin-bottom: 15px;
        }
        select:hover, input[type="number"]:hover {
            border-color: #28a745;
        }
        button {
            width: 100%;
            background-color: #17a2b8;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #138496;
        }
        .summary {
            margin-top: 20px;
            font-size: 14px;
            color: #495057;
        }
        .summary h4 {
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vendo Machine</h2>
        <form action="" method="post">
            <fieldset>
                <legend>Drinks</legend>
                <label><input type="checkbox" name="Drinks[]" value='{"name": "Coke", "price": 15}'> Coke - ₱15</label>
                <label><input type="checkbox" name="Drinks[]" value='{"name": "Sprite", "price": 20}'> Sprite - ₱20</label>
                <label><input type="checkbox" name="Drinks[]" value='{"name": "Royal", "price": 20}'> Royal - ₱20</label>
                <label><input type="checkbox" name="Drinks[]" value='{"name": "Pepsi", "price": 15}'> Pepsi - ₱15</label>
                <label><input type="checkbox" name="Drinks[]" value='{"name": "Mountain Dew", "price": 20}'> Mountain Dew - ₱20</label>
            </fieldset>
            <fieldset>
                <legend>Options</legend>
                <label for="size">Size:</label>
                <select name="size" id="size">
                    <option value="Regular">Regular</option>
                    <option value="Up-Size">Up-Size (add ₱5)</option>
                    <option value="Jumbo">Jumbo (add ₱10)</option>
                </select>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" required>
            </fieldset>
            <button type="submit" name="btnSend">Check Out</button>
        </form>

        <?php
        if (isset($_REQUEST['btnSend'])) {
            $arrDrinks = $_REQUEST['Drinks'] ?? [];
            $size = $_REQUEST['size'] ?? 'Regular';
            $quantity = intval($_REQUEST['quantity']) ?? 1;
            $totalAmount = 0;
            $totalItems = 0;
            $totalCost = 0;
            $purchaseSummary = [];

            if ($size === "Up-Size") {
                $totalCost = 5;
            } elseif ($size === "Jumbo") {
                $totalCost = 10;
            }

            echo "<div class='summary'><h4>Purchase Summary:</h4>";

            if (empty($arrDrinks)) {
                echo "<p>No drinks selected. Please choose at least one drink.</p>";
            } else {
                foreach ($arrDrinks as $drink) {
                    $drinkData = json_decode($drink, true);
                    $drinkName = $drinkData['name'] ?? 'Unknown Drink';
                    $price = intval($drinkData['price'] ?? 0);
                    $itemTotal = ($price + $totalCost) * $quantity;

                    $totalAmount += $itemTotal;
                    $totalItems += $quantity;

                    $purchaseSummary[] = ($quantity == 1) ? "$quantity piece of $size $drinkName amounting to ₱$itemTotal"
                                                          : "$quantity pieces of $size $drinkName amounting to ₱$itemTotal";
                }

                foreach ($purchaseSummary as $item) {
                    echo "<p>• $item</p>";
                }
                echo "<br><b>Total Number of Items:</b> $totalItems<br>";
                echo "<b>Total Amount:</b> ₱$totalAmount<br>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
