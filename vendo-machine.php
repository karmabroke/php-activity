<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Order Form</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                width: 300px;
                margin: 20px auto;
            }
            .section {
                margin-bottom: 15px;
            }
            .summary {
                font-weight: bold;
                margin-top: 20px;
            }
            .summary-item {
                margin-left: 20px;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <form method="post">
            <div class="section">
                <label>Product:</label><br>
                <input type="checkbox" name="products[]" value="Coke|15"> Coke ₱ 15<br>
                <input type="checkbox" name="products[]" value="Sprite|20"> Sprite ₱ 20<br>
                <input type="checkbox" name="products[]" value="Royal|20"> Royal ₱ 20<br>
                <input type="checkbox" name="products[]" value="Pepsi|15"> Pepsi ₱ 15<br>
                <input type="checkbox" name="products[]" value="Mountain Dew|20"> Mountain Dew ₱ 20<br>
            </div>
            
            <div class="section">
                <label>Option:</label><br>
                <select name="size">
                    <option value="0">Small</option>
                    <option value="5">Up-size (add ₱ 5)</option>
                    <option value="10">Up-size Large (add ₱ 10)</option>
                </select>
                <input type="number" name="quantity" min="1" value="1">
            </div>
            
            <button type="submit">Check Out</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $products = isset($_POST['products']) ? $_POST['products'] : [];
                $size = isset($_POST['size']) ? (int)$_POST['size'] : 0;
                $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
                
                $totalQuantity = 0;
                $totalSales = 0;
                $summary = [];

                foreach ($products as $product) {
                    list($productName, $productPrice) = explode("|", $product);
                    $productPrice = (int)$productPrice;
                    $itemPrice = ($productPrice + $size) * $quantity;
                    
                    $summary[] = "$quantity piece(s) of " . ($size ? "Up-size (add ₱ $size) " : "") . "$productName amounting to ₱ $itemPrice";
                    $totalQuantity += $quantity;
                    $totalSales += $itemPrice;
                }
                
                if ($totalQuantity > 0) {
                    echo "<div class='summary'>Purchase Summary:</div>";
                    foreach ($summary as $item) {
                        echo "<div class='summary-item'>- $item</div>";
                    }
                    echo "<div class='summary'>Total Quantity of Items: $totalQuantity</div>";
                    echo "<div class='summary'>Total Sales: ₱ $totalSales</div>";
                } else {
                    echo "<div class='summary'>No items selected.</div>";
                }
            }
        ?>
    </div>

    </body>
</html>
