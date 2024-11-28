<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Face App</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }
            .image-container {
                position: relative;
                display: inline-block;
                margin: 20px 0;
            }
            .image {
                display: block;
                width: 300px;
                height: auto;
                border: <?php echo isset($_POST['border_thickness']) ? $_POST['border_thickness'] : '5'; ?>px solid <?php echo isset($_POST['border_color']) ? $_POST['border_color'] : '#000000'; ?>;
                <?php if (isset($_POST['gradient'])): ?>
                    background: linear-gradient(
                        <?php echo $_POST['gradient']; ?>deg,
                        <?php echo $_POST['border_color']; ?>,
                        #FFFFFF
                    );
                    background-clip: padding-box;
                <?php endif; ?>
                border-radius: 10px;
            }
            .controls {
                display: flex;
                flex-direction: column;
                max-width: 400px;
                gap: 15px;
            }
            .controls label {
                font-weight: bold;
            }
            .controls input[type="range"] {
                width: 100%;
            }
        </style>
    </head>
    <body>

    <h1>Face App - Adjust Image Border</h1>

    <div class="image-container">
        <!-- Placeholder image. Replace with actual image path -->
        <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D" alt="Face Image" class="image">
    </div>

    <form method="POST" class="controls">
        <label for="border_color">Border Color:</label>
        <input type="color" id="border_color" name="border_color" value="<?php echo isset($_POST['border_color']) ? $_POST['border_color'] : '#000000'; ?>">

        <label for="border_thickness">Border Thickness (1-20px):</label>
        <input type="range" id="border_thickness" name="border_thickness" min="1" max="20" value="<?php echo isset($_POST['border_thickness']) ? $_POST['border_thickness'] : '5'; ?>">

        <label for="gradient">Gradient Angle (0-360°):</label>
        <input type="range" id="gradient" name="gradient" min="0" max="360" value="<?php echo isset($_POST['gradient']) ? $_POST['gradient'] : '0'; ?>">

        <button type="submit">Apply Changes</button>
    </form>

    </body>
</html>
