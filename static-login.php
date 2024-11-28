<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .login-container {
                width: 300px;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .form-group {
                margin-bottom: 15px;
            }
            .form-group label {
                display: block;
                font-weight: bold;
            }
            .form-group input {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                border: 1px solid #ddd;
                border-radius: 3px;
            }
            .btn {
                width: 100%;
                padding: 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                font-size: 16px;
            }
            .btn:hover {
                background-color: #45a049;
            }
            .message {
                margin-top: 15px;
                padding: 10px;
                border-radius: 3px;
                text-align: center;
                font-weight: bold;
            }
            .success {
                color: #155724;
                background-color: #d4edda;
                border: 1px solid #c3e6cb;
            }
            .error {
                color: #721c24;
                background-color: #f8d7da;
                border: 1px solid #f5c6cb;
            }
        </style>
    </head>
    <body>

    <div class="login-container">
        <form method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <small class="error-message" style="color: red; display: none;">Username is required</small>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <small class="error-message" style="color: red; display: none;">Password is required</small>
            </div>
            
            <button type="submit" class="btn">Login</button>
        </form>

        <?php
        // Predefined credentials
        $valid_username = "admin";
        $valid_password = "password123";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Server-side validation for empty fields
            if (empty($username) || empty($password)) {
                echo "<div class='message error'>Please fill in all fields.</div>";
            } else {
                // Validate credentials
                if ($username === $valid_username && $password === $valid_password) {
                    echo "<div class='message success'>Login Successful!</div>";
                } else {
                    echo "<div class='message error'>Invalid username or password.</div>";
                }
            }
        }
        ?>
    </div>

    <script>
        function validateForm() {
            let isValid = true;
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            // Clear previous error messages
            document.querySelectorAll(".error-message").forEach(el => el.style.display = "none");

            // Check if username is empty
            if (username === "") {
                document.querySelector("#username + .error-message").style.display = "block";
                isValid = false;
            }
            
            // Check if password is empty
            if (password === "") {
                document.querySelector("#password + .error-message").style.display = "block";
                isValid = false;
            }

            return isValid;
        }
    </script>

    </body>
</html>
